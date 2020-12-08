<?php

namespace App\Http\Controllers;

use App\Models\CourseModules;
use App\Models\Courses;
use App\Models\StructuredExams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class ExamsController extends Controller {

	public function ExamSelectCourse() {

		$Courses = Courses::all();

		$data = [

			"Page"    => "sys.exams.SelectCourse",
			"Title"   => "Select course to attach exams to",

			"Courses" => $Courses,

		];

		return view('sys.view.index', $data);
	}

	public function ExamSelectModule(request $request) {

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

			"Page"    => "sys.exams.ExamSelectModule",
			"Title"   => "Select module to attach exam content to  (course content) ",

			"Courses" => $CourseModules,

		];

		return view('sys.view.index', $data);

	}

	public function ManageExamsContent(request $request) {

		$request->validate([
			'Module' => 'required',

		]);

		$id = $request->input('Module');

		$CourseModules = DB::table('course_modules AS C')

			->where('C.id', $id)

			->join('course_instructors AS T', 'C.Instructor', '=', 'T.id')

			->join('courses AS D', 'C.Course', '=', 'D.id')

			->select('C.*', 'T.InstructorName', 'D.CourseName')

			->first();

		$inst       = $CourseModules->Institution;
		$dept       = $CourseModules->Department;
		$instructor = $CourseModules->Instructor;
		$cos        = $CourseModules->Course;

		$notes = DB::table('structured_exams')
			->where('Institution', $inst)
			->where('Department', $dept)
			->where('Instructor', $instructor)
			->where('Course', $cos)
			->where('Module', $id)
			->get();

		$data = [

			"Page"       => "sys.exams.ManageExamContent",
			"Title"      => 'Exam questions  for the Course :: ' . $CourseModules->CourseName . ', Module :: ' . $CourseModules->ModuleName . '</span>',

			"notes"      => $notes,
			"Course"     => $CourseModules->CourseName,
			"Module"     => $CourseModules->ModuleName,
			"inst"       => $inst,
			"dept"       => $dept,
			"instructor" => $instructor,
			"cos"        => $cos,
			"Mod"        => $id,
		];

		return view('sys.view.index', $data);

	}
	public function GetManageExamsContent($id) {

		$CourseModules = DB::table('course_modules AS C')

			->where('C.id', $id)

			->join('course_instructors AS T', 'C.Instructor', '=', 'T.id')

			->join('courses AS D', 'C.Course', '=', 'D.id')

			->select('C.*', 'T.InstructorName', 'D.CourseName')

			->first();

		$inst       = $CourseModules->Institution;
		$dept       = $CourseModules->Department;
		$instructor = $CourseModules->Instructor;
		$cos        = $CourseModules->Course;

		$notes = DB::table('structured_exams')
			->where('Institution', $inst)
			->where('Department', $dept)
			->where('Instructor', $instructor)
			->where('Course', $cos)
			->where('Module', $id)
			->get();

		$data = [

			"Page"       => "sys.exams.ManageExamContent",
			"Title"      => 'Exam questions  for the Course :: ' . $CourseModules->CourseName . ', Module :: ' . $CourseModules->ModuleName . '</span>',

			"notes"      => $notes,
			"Course"     => $CourseModules->CourseName,
			"Module"     => $CourseModules->ModuleName,
			"inst"       => $inst,
			"dept"       => $dept,
			"instructor" => $instructor,
			"cos"        => $cos,
			"Mod"        => $id,
		];

		return view('sys.view.index', $data);

	}

	public function CreateExams(request $request) {

		$validator = Validator::make($request->all(), [
			'inst'       => 'required',
			'cos'        => 'required',
			'dept'       => 'required',
			'instructor' => 'required',
			'Module'     => 'required',
			'Qn'         => 'required',
			'Ans'        => 'required',

		]);

		//	return dd($request->input('Module'));

		if ($validator->fails()) {

			return redirect()->route('GetManageExamsContent',

				['id' => $request->input('Module'),

				])->withErrors($validator)

				->withInput();
		}

		$iso = CourseModules::find($request->input('Module'));

		$StructuredExams = new StructuredExams;

		$StructuredExams->Institution = $request->input('inst');
		$StructuredExams->Instructor  = $request->input('instructor');
		$StructuredExams->Course      = $request->input('cos');
		$StructuredExams->Department  = $request->input('dept');
		$StructuredExams->Module      = $request->input('Module');
		$StructuredExams->Qn          = $request->input('Qn');
		$StructuredExams->Ans         = $request->input('Ans');
		$StructuredExams->Questionkey = $iso->ModuleName;

		$StructuredExams->save();

		return redirect()->route('GetManageExamsContent',

			['id' => $request->input('Module'),

			])->with('status', 'The exam question for the selected course has been set successfully');

	}

	public function DeleteExamQuestion($id, $Module) {

		$Audio = StructuredExams::find($id);

		$Audio->delete();

		return redirect()->route('GetManageExamsContent',

			['id' => $Module,

			])->with('status', 'The selected exam question the selected course has been deleted successfully');
	}

	public function UpdateExams(request $request) {

		$validator = Validator::make($request->all(), [

			'Qn'     => 'required',
			'Ans'    => 'required',
			'id'     => 'required',
			'Module' => 'required',

		]);

		//return dd($request->input('Module'));

		if ($validator->fails()) {

			return redirect()->route('GetManageExamsContent',

				['id' => $request->input('Module'),

				])->withErrors($validator)

				->withInput();
		}

		$StructuredExams = StructuredExams::find($request->input('id'));

		$StructuredExams->Qn  = $request->input('Qn');
		$StructuredExams->Ans = $request->input('Ans');

		$StructuredExams->save();

		return redirect()->route('GetManageExamsContent',

			['id' => $request->input('Module'),

			])->with('status', 'The selected exam question the selected course has been updated successfully');

	}

}
