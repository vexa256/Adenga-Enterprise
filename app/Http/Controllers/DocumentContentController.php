<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class DocumentContentController extends Controller {

	public function DocumentSelectCourse() {

		$Courses = Courses::all();

		$data = [

			"Page"    => "sys.content.DocumentSelectCourse",
			"Title"   => "Select course to attach document content to  (course content) ",

			"Courses" => $Courses,

		];

		return view('sys.view.index', $data);
	}

	public function DocumentSelectModule(request $request) {

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

			"Page"    => "sys.content.DocumentSelectModule",
			"Title"   => "Select module to attach document content to  (course content) ",

			"Courses" => $CourseModules,

		];

		return view('sys.view.index', $data);

	}

	public function ManageDocumentContent(request $request) {

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

		$notes = DB::table('documents')
			->where('Institution', $inst)
			->where('Department', $dept)
			->where('Instructor', $instructor)
			->where('Course', $cos)
			->where('Module', $id)
			->get();

		$data = [

			"Page"       => "sys.content.ManageDocumentContent",
			"Title"      => 'Document content for the Course :: ' . $CourseModules->CourseName . ', Module :: ' . $CourseModules->ModuleName . '</span>',

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

	public function GetManageDocumentContent($id) {

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

		$notes = DB::table('Documents')
			->where('Institution', $inst)
			->where('Department', $dept)
			->where('Instructor', $instructor)
			->where('Course', $cos)
			->where('Module', $id)
			->get();

		$data = [

			"Page"       => "sys.content.ManageDocumentContent",
			"Title"      => 'Document content for the Course :: ' . $CourseModules->CourseName . ', Module :: ' . $CourseModules->ModuleName . '</span>',

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

	public function PostDocumentContent(request $request) {

		$validator = Validator::make($request->all(), [
			'inst'        => 'required',
			'cos'         => 'required',
			'dept'        => 'required',
			'instructor'  => 'required',
			'DocName'     => 'required|unique:documents',
			'Module'      => 'required',
			'file'        => 'required|mimes:pdf,pptx, ppt|max:5314',
			'Description' => 'required',

		]);

		//	return dd($request->input('Module'));

		if ($validator->fails()) {

			return redirect()->route('GetManageDocumentContent',

				['id' => $request->input('Module'),

				])->withErrors($validator)

				->withInput();

		}

		$DocName = time() . '.' . $request->file->getClientOriginalExtension();

		$request->file->move(public_path('sys/docs'), $DocName);

		$Document = new Documents;

		if ($request->file->getClientOriginalExtension() == 'pdf' || $request->file->getClientOriginalExtension() == 'PDF') {

			$Document->pdf = 'true';
		}

		$Document->Institution = $request->input('inst');
		$Document->Instructor  = $request->input('instructor');
		$Document->Course      = $request->input('cos');
		$Document->Department  = $request->input('dept');
		$Document->Module      = $request->input('Module');
		$Document->Description = $request->input('Description');
		$Document->DocName     = $request->input('DocName');
		$Document->Url         = "sys/docs/" . $DocName;

		$Document->save();

		return redirect()->route('GetManageDocumentContent',

			['id' => $request->input('Module'),

			])->with('status', 'The Document course content has been created successfully');

	}

	public function DeleteDocumentFile($id, $Module) {

		$Document = Documents::find($id);

		unlink(public_path($Document->Url));

		$Document->delete();

		return redirect()->route('GetManageDocumentContent',

			['id' => $Module,

			])->with('status', 'The Document course content has been deleted successfully');
	}

}
