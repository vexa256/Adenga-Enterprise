<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use App\Models\CourseModules;
use App\Models\Courses;
use App\Models\Departments;
use App\Models\Institutions;
use App\Models\StructuredExams;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller {

	public function CloudDrive() {

		if (Auth::user()->UserID == '') {

			$username = Auth::user()->email;
			$password = Auth::user()->password;

			$data = $username . 'Paassword' . $password;

			$user_id = Hash::make($data);

			$User = User::find(Auth::user()->id);

			$User->UserID = $user_id;

			$User->save();

		}

		if (Auth::user()->role == 'admin') {

			return $this->AdminConsole();

		} elseif (Auth::user()->role == 'user') {

			return $this->UserConsole();

		}

		return view('sys.view.index');

	}

	public function UserRegistration() {

		$Countries = Countries::all();

		$data = [

			'Countries' => $Countries,

		];

		return view('sys.dashboard.Register', $data);

	}

	public function AdminConsole() {

		$Countries     = Countries::count();
		$admin         = User::where('role', 'admin')->count();
		$instructor    = User::where('role', 'instructor')->count();
		$students      = User::where('role', 'user')->count();
		$Departments   = Departments::all()->count();
		$CourseModules = CourseModules::all()->count();
		$Courses       = Courses::all()->count();
		$Exams         = Courses::all()->count();
		$ExamQuestions = StructuredExams::all()->count();
		$Institutions  = Institutions::all()->count();

		$data = [

			"Page"          => "sys.dashboard.AdminDashboard",
			"Title"         => "SRL Uganda Elearning Platform Admin Dashboard",

			"Courses"       => $Courses,
			"Countries"     => $Countries,
			"admin"         => $admin,
			"instructor"    => $instructor,
			"students"      => $students,
			"Departments"   => $Departments,
			"CourseModules" => $CourseModules,
			"Exams"         => $Exams,
			"ExamQuestions" => $ExamQuestions,
			"Institutions"  => $Institutions,

		];

		return view('sys.view.index', $data);

	}

	public function UserConsole() {

		$Cos           = Courses::all();
		$Courses       = Courses::all()->count();
		$Exams         = Courses::all()->count();
		$ExamQuestions = StructuredExams::all()->count();
		$Institutions  = Institutions::all()->count();
		$CourseModules = CourseModules::all()->count();

		$data = [

			"Page"          => "sys.dashboard.UserDashboard",
			"Title"         => "SRL Uganda Elearning Platform Student Dashboard",
			"Courses"       => $Courses,
			"Exams"         => $Exams,
			"CourseModules" => $CourseModules,
			"Cos"           => $Cos,

		];

		return view('sys.view.index', $data);
	}

}
