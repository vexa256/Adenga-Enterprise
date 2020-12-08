<?php

namespace App\Http\Controllers;
use App\Models\Courses;
use App\Models\Scoreboard;
use App\Models\StructuredExams;
use Auth;
use Illuminate\Http\Request;

class ScoreboardContentController extends Controller {

	public function getPercentage($total, $number) {
		if ($total > 0) {
			return round($number * ($total / 100));
		} else {
			return 0;
		}
	}

	public function ScoreboardSelectCourse() {

		$Courses = Courses::all();

		$data = [

			"Page"    => "sys.scoreboard.SelectCourse",
			"Title"   => "Student performance review, Select the course required for performance monitoring",

			"Courses" => $Courses,

		];

		return view('sys.view.index', $data);

	}

	public function StudentScoreboard(request $request) {

		$request->validate([
			'Course' => 'required',

		]);

		$id = $request->input('Course');

		$gh = Courses::find($id);

		$CourseName = $gh->CourseName;

		$ExamCount = StructuredExams::where('Course', $id)->count();

		$AttemptCount = Scoreboard::where('UserID', Auth::user()->UserID)

			->where('Course', $id)

			->count();

		$FailedExamCount = Scoreboard::where('UserID', Auth::user()->UserID)

			->where('Course', $id)

			->where('score', 'fail')

			->count();

		$PassedExamCount = Scoreboard::where('UserID', Auth::user()->UserID)

			->where('Course', $id)

			->where('score', 'pass')

			->count();

		$CertificationStatus = 'false';

		$Passmark = ($PassedExamCount / $ExamCount) * 100;

		$Failmark = ($FailedExamCount / $ExamCount) * 100;

		if ($Passmark >= 50) {

			$CertificationStatus = 'true';
		}

		$data = [

			"Page"                => "sys.scoreboard.ScoreBoard",
			"Title"               => 'Student Perfomance Monitoring Dashboard',

			"AttemptCount"        => $AttemptCount,
			"CertificationStatus" => $CertificationStatus,
			"Failmark"            => $Failmark,
			"Passmark"            => $Passmark,
			"ExamCount"           => $ExamCount,
			"CourseName"          => $CourseName,
			"id"                  => $id,
		];

		return view('sys.view.index', $data);

	}

	public function ReAttemptExam($id) {

		$UserID = Auth::user()->UserID;

		$Scoreboard = Scoreboard::where('UserID', $UserID)

			->where('Course', $id)
			->delete();

		return redirect()->route('AttemptExam')->with('status', 'You have successfully cleared your scorebord for the selected course. Select the course and re-attempt the course exam to certify');

	}

}
