<?php

namespace App\Http\Controllers;
use App\Models\Courses;
use App\Models\Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class CourseContentController extends Controller {

	public function NotesContentSelectCourse() {

		$Courses = Courses::all();

		$data = [

			"Page"    => "sys.content.NotesSelectCourse",
			"Title"   => "Select course to attach text notes to  (course content) ",

			"Courses" => $Courses,

		];

		return view('sys.view.index', $data);
	}

	public function NotesSelectModule(request $request) {

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

			"Page"    => "sys.content.NotesSelectModule",
			"Title"   => "Select module to attach text notes to  (course content) ",

			"Courses" => $CourseModules,

		];

		return view('sys.view.index', $data);

	}

	public function ManageTextNotes(request $request) {

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

		$notes = DB::table('notes')
			->where('Institution', $inst)
			->where('Department', $dept)
			->where('Instructor', $instructor)
			->where('Course', $cos)
			->where('Module', $id)
			->get();

		$data = [

			"Page"       => "sys.content.ManageNotes",
			"Title"      => 'Text notes for Course ::

			<span class="text-danger">' . $CourseModules->CourseName . '</span> Module :: <span class="text-danger">' . $CourseModules->ModuleName . '</span>',

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

	public function GetManageTextNotes($id) {

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

		$notes = DB::table('notes')
			->where('Institution', $inst)
			->where('Department', $dept)
			->where('Instructor', $instructor)
			->where('Course', $cos)
			->where('Module', $id)
			->get();

		$data = [

			"Page"       => "sys.content.ManageNotes",
			"Title"      => 'Text notes for Course ::

			<span class="text-danger">' . $CourseModules->CourseName . '</span> Module :: <span class="text-danger">' . $CourseModules->ModuleName . '</span>',

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

	public function CreateTextNotes(request $request) {

		$validator = Validator::make($request->all(), [
			'inst'       => 'required',
			'cos'        => 'required',
			'dept'       => 'required',
			'instructor' => 'required',
			'NotesName'  => 'required',
			'Module'     => 'required',
			'Notes'      => 'required',

		]);

		//	return dd($request->input('Module'));

		if ($validator->fails()) {

			return redirect()->route('GetManageTextNotes',

				['id' => $request->input('Module'),

				])->withErrors($validator)

				->withInput();
		}

		$Notes = new Notes;

		$Notes->Institution = $request->input('inst');
		$Notes->Instructor  = $request->input('instructor');
		$Notes->Course      = $request->input('cos');
		$Notes->Module      = $request->input('Module');
		$Notes->Department  = $request->input('dept');
		$Notes->NotesName   = $request->input('NotesName');
		$Notes->Notes       = $request->input('Notes');

		$Notes->save();

		return redirect()->route('GetManageTextNotes',

			['id' => $request->input('Module'),

			])->with('status', 'The text notes have been created successfully');

	}

	public function DeleteCourseTextNotes($id, $Module) {

		$Notes = Notes::find($id);

		$Notes->delete();

		return redirect()->route('GetManageTextNotes',

			['id' => $Module,

			])->with('status', 'The text notes have been deleted successfully');

	}
}
