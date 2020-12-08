<?php

namespace App\Http\Controllers;
use App\Models\Countries;
use App\Models\CourseInstructors;
use App\Models\Departments;
use App\Models\Institutions;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;

class CourseInstructorController extends Controller {

	public function CourseInstructorSelectInstitution() {

		$Institutions = Institutions::all();

		$data = [

			"Page"       => "sys.instructors.SelectInstitution",
			"Title"      => "Instructor creation process, Which institution will the instructor belong to ?",

			"University" => $Institutions,

		];

		return view('sys.view.index', $data);

	}

	public function CourseInstructorInstitutionSelected(request $request) {

		$request->validate([
			'Institution' => 'required',

		]);

		$id = $request->input('Institution');

		$Departments = Departments::where("Institution", $id)->get();

		$data = [

			"Page"        => "sys.instructors.SelectDepartment",
			"Title"       => "Instructor creation process, Which department will the instructor belong to ?",

			"Departments" => $Departments,

		];

		return view('sys.view.index', $data);

	}

	public function CreateCourseInstructor(request $request) {

		$request->validate([
			'Department' => 'required',

		]);

		$email = Auth::user()->email;

		$Departments = Departments::find($request->input('Department'));

		$d_id = $Departments->id;

		$results = DB::table('departments AS D')

			->where('D.id', $d_id)

			->join('institutions AS I', 'I.id', '=', 'D.Institution')

			->select('I.*', 'D.*', 'D.institution AS I_ID')

			->first();

		$CourseInstructors = CourseInstructors::where('institution', $results->I_ID)

			->where('Department', $d_id)

			->get();

		$Countries = Countries::all();

		$data = [

			"Page"           => "sys.instructors.ManageInstructors",
			"Title"          => "Course instructor management interface",

			"Department_id"  => $d_id,
			"institution_id" => $results->I_ID,
			"Institution"    => $results->InstitutionName,
			"Department"     => $results->Department,
			"Instructors"    => $CourseInstructors,
			"Countries"      => $Countries,

		];

		return view('sys.view.index', $data);

	}

	public function GetCreateCourseInstructor($id) {

		$email = Auth::user()->email;

		$Departments = Departments::find($id);

		$d_id = $Departments->id;

		$results = DB::table('departments AS D')

			->where('D.id', $d_id)

			->join('institutions AS I', 'I.id', '=', 'D.Institution')

			->select('I.*', 'D.*', 'D.institution AS I_ID')

			->first();

		$CourseInstructors = CourseInstructors::where('institution', $results->I_ID)

			->where('Department', $d_id)

			->get();

		$Countries = Countries::all();

		$data = [

			"Page"           => "sys.instructors.ManageInstructors",
			"Title"          => "Course instructor management interface",

			"Department_id"  => $d_id,
			"institution_id" => $results->I_ID,
			"Institution"    => $results->InstitutionName,
			"Department"     => $results->Department,
			"Instructors"    => $CourseInstructors,
			"Countries"      => $Countries,

		];

		return view('sys.view.index', $data);

	}

	public function SubmitInstructor(request $request) {

		$validator = Validator::make($request->all(), [
			'password'       => 'required|confirmed',
			'InstructorName' => 'required',
			'PhoneNumber'    => 'required',
			'Address'        => 'required',
			'Country'        => 'required',
			'Email'          => 'email|required|unique:course_instructors',
			'Email'          => 'email|unique:users,email',
			'DepartmentID'   => 'required',
			'InstitutionID'  => 'required',
		]);

		if ($validator->fails()) {

			return redirect()->route('GetCreateCourseInstructor',

				['id' => $request->input('DepartmentID'),

				])->withErrors($validator)

				->withInput();
		}

		$av       = Carbon::now();
		$Password = $request->input('password');
		$Email    = $request->input('Email');
		$a        = $av . '' . $Password . '' . $Email;
		$UserID   = Hash::make($a);

		$User           = new User;
		$User->name     = $request->input('InstructorName');
		$User->email    = $request->input('Email');
		$User->password = Hash::make($request->input('password'));
		$User->UserID   = $UserID;
		$User->role     = 'instructor';

		$User->save();

		$CourseInstructors = new CourseInstructors;

		$CourseInstructors->Institution    = $request->input('InstitutionID');
		$CourseInstructors->Department     = $request->input('DepartmentID');
		$CourseInstructors->InstructorName = $request->input('InstructorName');
		$CourseInstructors->PhoneNumber    = $request->input('PhoneNumber');
		$CourseInstructors->Address        = $request->input('Address');
		$CourseInstructors->Country        = $request->input('Country');
		$CourseInstructors->Email          = $request->input('Email');
		$CourseInstructors->UserID         = $UserID;

		$CourseInstructors->save();

		return redirect()->route('GetCreateCourseInstructor',

			['id' => $request->input('DepartmentID')])

			->with('status', 'Course instructor account created successfully');

	}

	public function DeleteInstructor($id, $Departments) {

		$CourseInstructors = CourseInstructors::find($id);

		$CourseInstructors->delete();

		return redirect()->route('GetCreateCourseInstructor',

			['id' => $Departments])

			->with('status', 'Course instructor account deleted successfully');

	}

}
