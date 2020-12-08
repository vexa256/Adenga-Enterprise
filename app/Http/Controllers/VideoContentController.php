<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class VideoContentController extends Controller {

	public function VideoSelectCourse() {

		$Courses = Courses::all();

		$data = [

			"Page"    => "sys.content.VideoSelectCourse",
			"Title"   => "Select course to attach video content to  (course content) ",

			"Courses" => $Courses,

		];

		return view('sys.view.index', $data);
	}

	public function VideoSelectModule(request $request) {

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

			"Page"    => "sys.content.VideoSelectModule",
			"Title"   => "Select module to attach video content to  (course content) ",

			"Courses" => $CourseModules,

		];

		return view('sys.view.index', $data);

	}

	public function ManageVideoContent(request $request) {

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

		$notes = DB::table('videos')
			->where('Institution', $inst)
			->where('Department', $dept)
			->where('Instructor', $instructor)
			->where('Course', $cos)
			->where('Module', $id)
			->get();

		$data = [

			"Page"       => "sys.content.ManageVideoContent",
			"Title"      => 'Video content for the Course :: ' . $CourseModules->CourseName . ', Module :: ' . $CourseModules->ModuleName . '</span>',

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

	public function GetManageVideoContent($id) {

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

		$notes = DB::table('videos')
			->where('Institution', $inst)
			->where('Department', $dept)
			->where('Instructor', $instructor)
			->where('Course', $cos)
			->where('Module', $id)
			->get();

		$data = [

			"Page"       => "sys.content.ManageVideoContent",
			"Title"      => 'Video content for the Course :: ' . $CourseModules->CourseName . ', Module :: ' . $CourseModules->ModuleName . '</span>',

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

	public function PostVideoContent(request $request) {

		$validator = Validator::make($request->all(), [
			'inst'        => 'required',
			'cos'         => 'required',
			'dept'        => 'required',
			'instructor'  => 'required',
			'VideoName'   => 'required|unique:videos',
			'Module'      => 'required',
			'file'        => 'required|mimes:video/mp4,mp4',
			'Description' => 'required',

		]);

		//	return dd($request->input('Module'));

		if ($validator->fails()) {

			return redirect()->route('GetManageVideoContent',

				['id' => $request->input('Module'),

				])->withErrors($validator)

				->withInput();
		}

		$VideoName = time() . '.' . $request->file->getClientOriginalExtension();

		$request->file->move(public_path('sys/video'), $VideoName);

		$Video = new Video;

		$Video->Institution = $request->input('inst');
		$Video->Instructor  = $request->input('instructor');
		$Video->Course      = $request->input('cos');
		$Video->Department  = $request->input('dept');
		$Video->Module      = $request->input('Module');
		$Video->Description = $request->input('Description');
		$Video->VideoName   = $request->input('VideoName');
		$Video->Url         = "sys/video/" . $VideoName;

		$Video->save();

		return redirect()->route('GetManageVideoContent',

			['id' => $request->input('Module'),

			])->with('status', 'The Video course content has been created successfully');

	}

	public function DeleteVideoFile($id, $Module) {

		$Video = Video::find($id);

		unlink(public_path($Video->Url));

		$Video->delete();

		return redirect()->route('GetManageVideoContent',

			['id' => $Module,

			])->with('status', 'The Video course content has been deleted successfully');
	}

}
