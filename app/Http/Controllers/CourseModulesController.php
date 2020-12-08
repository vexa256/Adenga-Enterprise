<?php

namespace App\Http\Controllers;

use App\Models\CourseModules;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseModulesController extends Controller {

	public function CourseModuleSelectCourse() {

		$Courses = $results = DB::table('courses AS C')

			->join('institutions AS I', 'I.id', '=', 'C.Institution')
			->join('departments AS D', 'D.id', '=', 'C.Department')
			->join('course_instructors AS T', 'T.id', '=', 'C.Instructor')

			->select('I.*', 'D.*', 'T.*', 'C.*',

				'D.Department AS DepartmentName',
				'C.Description AS CourseDescription',
				'C.created_at AS CreateWhen',
				'C.id AS CID',

			)

			->get();

		$data = [

			"Page"    => "sys.modules.SelectCourse",
			"Title"   => "Course module management interface :: Course Selection",
			"Courses" => $Courses,

		];

		return view('sys.view.index', $data);

	}

	public function ManageCourseModules($id) {

		$c = Courses::find($id);

		$CourseModules = DB::table('course_modules AS C')

			->where('C.Institution', $c->Institution)

			->where('C.Instructor', $c->Instructor)

			->where('C.Department', $c->Department)

			->where('C.Course', $c->id)

			->join('courses AS I', 'I.id', '=', 'C.Course')

			->select('C.*', 'I.CourseName')

			->get();

		$data = [

			"Page"    => "sys.modules.ManageModules",
			"Title"   => 'Manage all

			modules attached to the course <span class="text-danger font-weight-bold"> ' . $c->CourseName . '</span>',

			"Courses" => $CourseModules,
			"CID"     => $c->id,

		];

		return view('sys.view.index', $data);

	}

	public function CreateNewModule(request $request) {

		$request->validate([
			'CourseID'    => 'required',
			'ModuleName'  => 'required',
			'Description' => 'required',

		]);

		$c = Courses::find($request->input('CourseID'));

		$CourseModules = new CourseModules;

		$CourseModules->Institution = $c->Institution;
		$CourseModules->Instructor  = $c->Instructor;
		$CourseModules->Course      = $c->id;
		$CourseModules->Department  = $c->Department;
		$CourseModules->ModuleName  = $request->input('ModuleName');
		$CourseModules->Description = $request->input('Description');

		$CourseModules->save();

		return redirect()->back()->with('status', 'The course module was created successfully');

	}

	public function DeleteCourseModule($id) {

		$CourseModules = CourseModules::find($id);

		$CourseModules->delete();

		return redirect()->back()->with('status', 'The course module was deleted successfully');

	}

}
