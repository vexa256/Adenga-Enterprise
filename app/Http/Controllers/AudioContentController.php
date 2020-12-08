<?php

namespace App\Http\Controllers;
use App\Models\Audio;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class AudioContentController extends Controller {

	public function AudioSelectCourse() {

		$Courses = Courses::all();

		$data = [

			"Page"    => "sys.content.AudioSelectCourse",
			"Title"   => "Select course to attach audio content to  (course content) ",

			"Courses" => $Courses,

		];

		return view('sys.view.index', $data);
	}

	public function AudioSelectModule(request $request) {

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

			"Page"    => "sys.content.AudioSelectModule",
			"Title"   => "Select module to attach audio content to  (course content) ",

			"Courses" => $CourseModules,

		];

		return view('sys.view.index', $data);

	}

	public function ManageAudioContent(request $request) {

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

		$notes = DB::table('audio')
			->where('Institution', $inst)
			->where('Department', $dept)
			->where('Instructor', $instructor)
			->where('Course', $cos)
			->where('Module', $id)
			->get();

		$data = [

			"Page"       => "sys.content.ManageAudioContent",
			"Title"      => 'Audio content for the Course :: ' . $CourseModules->CourseName . ', Module :: ' . $CourseModules->ModuleName . '</span>',

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

	public function GetManageAudioContent($id) {

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

		$notes = DB::table('audio')
			->where('Institution', $inst)
			->where('Department', $dept)
			->where('Instructor', $instructor)
			->where('Course', $cos)
			->where('Module', $id)
			->get();

		$data = [

			"Page"       => "sys.content.ManageAudioContent",
			"Title"      => 'Audio content for the Course :: ' . $CourseModules->CourseName . ', Module :: ' . $CourseModules->ModuleName . '</span>',

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

	public function PostAduioContent(request $request) {

		$validator = Validator::make($request->all(), [
			'inst'        => 'required',
			'cos'         => 'required',
			'dept'        => 'required',
			'instructor'  => 'required',
			'AudioName'   => 'requiredrequired|unique:audio',
			'Module'      => 'required',
			'file'        => 'required|mimes:audio/mpeg,mp3',
			'Description' => 'required',

		]);

		//	return dd($request->input('Module'));

		if ($validator->fails()) {

			return redirect()->route('GetManageAudioContent',

				['id' => $request->input('Module'),

				])->withErrors($validator)

				->withInput();
		}

		$audioName = time() . '.' . $request->file->getClientOriginalExtension();

		$request->file->move(public_path('sys/audio'), $audioName);

		$Audio = new Audio;

		$Audio->Institution = $request->input('inst');
		$Audio->Instructor  = $request->input('instructor');
		$Audio->Course      = $request->input('cos');
		$Audio->Department  = $request->input('dept');
		$Audio->Module      = $request->input('Module');
		$Audio->Description = $request->input('Description');
		$Audio->AudioName   = $request->input('AudioName');
		$Audio->Url         = "sys/audio/" . $audioName;

		$Audio->save();

		return redirect()->route('GetManageAudioContent',

			['id' => $request->input('Module'),

			])->with('status', 'The audio course content has been created successfully');

	}

	public function DeleteAudioFile($id, $Module) {

		$Audio = Audio::find($id);

		unlink(public_path($Audio->Url));

		$Audio->delete();

		return redirect()->route('GetManageAudioContent',

			['id' => $Module,

			])->with('status', 'The audio course content has been deleted successfully');
	}

}
