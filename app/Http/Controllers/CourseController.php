<?php

namespace App\Http\Controllers;
use App\Models\CourseInstructors;
use App\Models\Courses;
use App\Models\Departments;
use App\Models\Institutions;
use Illuminate\Http\Request;
use Validator;

class CourseController extends Controller {
	//

	public function SelectCourseInstitution() {
		$Institutions = Institutions::all();

		$data = [

			"Page"       => "sys.courses.SelectInstitution",
			"Title"      => "Course creation process, Which institution will the course belong to ?",

			"University" => $Institutions,

		];

		return view('sys.view.index', $data);

	}

	public function CourseInstitutionSelected(request $request) {

		$request->validate([
			'Institution' => 'required',

		]);

		$id = $request->input('Institution');

		$Departments = Departments::where("Institution", $id)->get();

		$data = [

			"Page"        => "sys.courses.SelectDepartment",
			"Title"       => "Course creation process, Which department will the course belong to ?",

			"Departments" => $Departments,

		];

		return view('sys.view.index', $data);

	}

	public function SelectCourseDepartment(request $request) {

		$request->validate([
			'Department' => 'required',

		]);

		$Departments = Departments::find($request->input('Department'));

		$CourseInstructors = CourseInstructors::where('Institution',

			$Departments->Institution)

			->where('Department', $Departments->id)->get();

		$data = [

			"Page"              => "sys.courses.SelectInstructor",
			"Title"             => "Course creation process, Which instructor will operate the course?",

			"CourseInstructors" => $CourseInstructors,

		];

		return view('sys.view.index', $data);

	}

	public function CreateCourse(request $request) {

		$request->validate([
			'Instructor' => 'required',

		]);

		$CourseInstructors = CourseInstructors::find($request->input('Instructor'));

		$inst = $CourseInstructors->Institution;
		$dept = $CourseInstructors->Department;

		$a = Departments::find($dept);
		$b = Institutions::find($inst);

		$Courses = Courses::where('Institution', $inst)

			->where('Department', $dept)

			->get();

		$data = [

			"Page"              => "sys.courses.ManageCourses",
			"Title"             => 'Manage all courses attached to the selected entities',
			"a"                 => $a,
			"b"                 => $b,
			"Courses"           => $Courses,
			"CourseInstructors" => $CourseInstructors,

		];

		return view('sys.view.index', $data);

	}

	public function GetCreateCourse($id) {

		$CourseInstructors = CourseInstructors::find($id);

		$inst = $CourseInstructors->Institution;
		$dept = $CourseInstructors->Department;

		$a = Departments::find($dept);
		$b = Institutions::find($inst);

		$Courses = Courses::where('Institution', $inst)

			->where('Department', $dept)

			->get();

		$data = [

			"Page"              => "sys.courses.ManageCourses",
			"Title"             => 'Manage all courses attached to the selected entities',
			"a"                 => $a,
			"b"                 => $b,
			"Courses"           => $Courses,
			"CourseInstructors" => $CourseInstructors,

		];

		return view('sys.view.index', $data);

	}

	public function CreateCourseLogic(request $request) {

		$validator = Validator::make($request->all(), [
			'Institution' => 'required',
			'Department'  => 'required',
			'CourseName'  => 'required',
			'Description' => 'required',
			'Instructor'  => 'required',

		]);

		if ($validator->fails()) {

			return redirect()->route('GetCreateCourse',

				['id' => $request->input('Instructor'),

				])->withErrors($validator)

				->withInput();
		}

		$Courses = new Courses;

		$Courses->Institution = $request->input('Institution');
		$Courses->Department  = $request->input('Department');
		$Courses->CourseName  = $request->input('CourseName');
		$Courses->Instructor  = $request->input('Instructor');
		$Courses->Description = $request->input('Description');

		$Courses->save();

		return redirect()->route('GetCreateCourse', ['id' => $request->input('Instructor')])->with('status', 'The new course has been created successfully');

	}

	public function DeleteCourse($id, $instructor) {

		$Courses = Courses::find($id);

		$Courses->delete();

		return redirect()->route('GetCreateCourse', ['id' => $instructor])->with('status', 'The selected course has been deleted successfully');

	}

}
