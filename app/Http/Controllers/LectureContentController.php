<?php

namespace App\Http\Controllers;
use App\Models\Audio;
use App\Models\Courses;
use App\Models\Documents;
use App\Models\Notes;
use App\Models\Video;
use Illuminate\Http\Request;

class LectureContentController extends Controller {

	public function SelectCourseAttendLectures() {

		$Courses = Courses::all();

		$data = [

			"Page"    => "sys.AttendLectures.SelectCourse",
			"Title"   => "Attend Virtual Leactures, Select Applicable Course",

			"Courses" => $Courses,

		];

		return view('sys.view.index', $data);

	}

	public function AttendLecturesSelectCourse(request $request) {

		$request->validate([
			'Course' => 'required',

		]);

		$id = $request->input('Course');

		$a = Courses::find($id);

		$VideoCount     = Video::where('Course', $id)->count();
		$AudioCount     = Audio::where('Course', $id)->count();
		$DocumentsCount = Documents::where('Course', $id)->count();
		$NotesCount     = Notes::where('Course', $id)->count();

		$Video     = Video::where('Course', $id)->get();
		$Audio     = Audio::where('Course', $id)->get();
		$Documents = Documents::where('Course', $id)->get();
		$Notes     = Notes::where('Course', $id)->get();

		$data = [

			"Page"      => "sys.AttendLectures.LectureRoom",
			"Title"     => 'Virtual Classroom Cloud Console',

			"Video"     => $Video,
			"Audio"     => $Audio,
			"Documents" => $Documents,
			"Notes"     => $Notes,
			"Course"    => $a->CourseName,
		];

		return view('sys.view.index', $data);

	}
}
