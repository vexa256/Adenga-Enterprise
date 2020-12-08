<?php

namespace App\Http\Controllers;
use App\Models\Courses;
use App\Models\Scoreboard;
use App\Models\StructuredExams;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class AttemptExamContentController extends Controller {

	public function AttemptExam() {

		$Courses = Courses::all();

		$data = [

			"Page"    => "sys.AttemptExams.SelectCourse",
			"Title"   => "Attempt exams !!, Select the course exams to attempt",

			"Courses" => $Courses,

		];

		return view('sys.view.index', $data);

	}

	/**disconnected***/

	public function AttemptExamSelectModule(request $request) {

		$request->validate([
			'Course' => 'required',

		]);

		$id = $request->input('Course');

		$a = Courses::find($id);

		$CourseModules = DB::table('course_modules AS C')

			->where('C.Course', $a->id)

			->join('course_instructors AS T', 'C.Instructor', '=', 'T.id')

			->select('C.*', 'T.InstructorName', )

			->get();

		$data = [

			"Page"    => "sys.AttemptExams.SelectModule",
			"Title"   => "Attempt exams !!, Select the course module exams to attempt ",

			"Courses" => $CourseModules,

		];

		return view('sys.view.index', $data);

	}

	public function SelectExam(request $request) {

		$request->validate([
			'Course' => 'required',

		]);

		$id = $request->input('Course');

		$ExamCount = StructuredExams::where('Course', $id)->count();

		$AttemptCount = Scoreboard::where('UserID', Auth::user()->UserID)

			->where('Course', $id)

			->count();

		$Courses = DB::table('courses AS C')

			->where('C.id', $id)

			->join('course_instructors AS T', 'C.Instructor', '=', 'T.id')

			->select('C.*', 'T.InstructorName')

			->first();

		$cos = $Courses->id;

		$UserID = Auth::user()->UserID;

		$notes = DB::table('structured_exams AS S')
			->where('S.Course', $cos)

			->get();

		$a = DB::table('structured_exams AS S')
			->where('S.Course', $cos)

			->first();

		$data = [

			"Page"         => "sys.AttemptExams.SelectExam",
			"Title"        => 'Exam questions  for the Course :: ' . $Courses->CourseName . '</span>',

			"notes"        => $notes,
			"Course"       => $Courses->CourseName,
			"inst"         => $a->Course,
			"dept"         => $a->Department,
			"instructor"   => $a->Instructor,
			"cos"          => $cos,
			"Mod"          => $a->Module,
			"ExamCount"    => $ExamCount,
			"AttemptCount" => $AttemptCount,
		];

		return view('sys.view.index', $data);

	}

	public function GetSelectExam($id) {

		$ExamCount = StructuredExams::where('Course', $id)->count();

		$AttemptCount = Scoreboard::where('UserID', Auth::user()->UserID)

			->where('Course', $id)

			->count();

		$Courses = DB::table('courses AS C')

			->where('C.id', $id)

			->join('course_instructors AS T', 'C.Instructor', '=', 'T.id')

			->select('C.*', 'T.InstructorName')

			->first();

		$cos = $Courses->id;

		$UserID = Auth::user()->UserID;

		$notes = DB::table('structured_exams AS S')
			->where('S.Course', $cos)

			->get();

		$a = DB::table('structured_exams AS S')
			->where('S.Course', $cos)

			->first();

		$data = [

			"Page"         => "sys.AttemptExams.SelectExam",
			"Title"        => 'Exam questions  for the Course :: ' . $Courses->CourseName . '</span>',

			"notes"        => $notes,
			"Course"       => $Courses->CourseName,
			"inst"         => $a->Course,
			"dept"         => $a->Department,
			"instructor"   => $a->Instructor,
			"cos"          => $cos,
			"Mod"          => $a->Module,
			"ExamCount"    => $ExamCount,
			"AttemptCount" => $AttemptCount,
		];

		return view('sys.view.index', $data);

	}

	public function SubmitExamAnswer(request $request) {

		$validator = Validator::make($request->all(), [
			'inst'       => 'required',
			'cos'        => 'required',
			'dept'       => 'required',
			'instructor' => 'required',
			'UserAnswer' => 'required',
			'id'         => 'required',

		]);

		//	return dd($request->input('Module'));

		if ($validator->fails()) {

			return redirect()->route('GetSelectExam',

				['id' => $request->input('cos'),

				])->withErrors($validator)

				->withInput();
		}

		$ExamID = $request->input('id');

		$UserID = Auth::user()->UserID;

		$checker = Scoreboard::where('exam', $ExamID)

			->where('UserID', $UserID)

			->count();

		$CurrentExam = StructuredExams::find($ExamID);

		if ($checker > 0) {

			return redirect()->route('GetSelectExam',

				['id' => $request->input('cos'),

				])->with('error_a', 'You have already attempted the selected exam question. Try another question or check your Scoreboard for details');

		} else {

			$Scoreboard = new Scoreboard;

			$Scoreboard->Institution = $request->input('inst');
			$Scoreboard->Instructor  = $request->input('instructor');
			$Scoreboard->Course      = $request->input('cos');
			$Scoreboard->Department  = $request->input('dept');
			$Scoreboard->Module      = 'NA';
			$Scoreboard->UserAnswer  = $request->input('UserAnswer');
			$Scoreboard->Questionkey = 'NA';
			$Scoreboard->UserID      = $UserID;
			$Scoreboard->Ans         = $CurrentExam->Ans;
			$Scoreboard->UserID      = $UserID;
			$Scoreboard->exam        = $CurrentExam->id;
			$Scoreboard->user        = Auth::user()->id;

			if ($request->input('UserAnswer') == $CurrentExam->Ans) {

				$Scoreboard->score = 'pass';

			} else {

				$Scoreboard->score = 'fail';
			}

			$Scoreboard->save();

			return redirect()->route('GetSelectExam',

				['id' => $request->input('cos'),

				])->with('status', 'You successfully attempted the selected question  , Attempt all the questions shown here to complete the course exam and then check your Scoreboard for details');

		}
	}
}
