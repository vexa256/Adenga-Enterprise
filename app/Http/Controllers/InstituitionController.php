<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use App\Models\Departments;
use App\Models\Institutions;
use Illuminate\Http\Request;

class InstituitionController extends Controller {

	public function ManageCountries() {
		$Countries = Countries::all();

		$data = [

			"Page"      => "sys.Countries.ManageCountries",
			"Title"     => "Country Management Interface",
			"Countries" => $Countries,

		];

		return view('sys.view.index', $data);
	}

	public function CreateCountry(request $request) {
		$request->validate([
			'Country' => 'required|unique:Countries',

		]);

		$Countries = new Countries;

		$Countries->Country = $request->input('Country');

		$Countries->save();

		return redirect()->route('ManageCountries')->with('status', 'The new country has been created successfully');

	}

	public function DeleteCountry($id) {

		$Countries = Countries::find($id);

		$Countries->delete();

		return redirect()->route('ManageCountries')->with('status', 'Country has been   successfully deleted');

	}

	public function ManageInstitutions() {

		$University = Institutions::all();

		$Countries = Countries::all();

		$data = [

			"Page"       => "sys.universities.ManageUniversities",
			"Title"      => "Institution's Management Interface",
			"Countries"  => $Countries,
			"University" => $University,

		];

		return view('sys.view.index', $data);

	}

	public function CreateInstitution(request $request) {

		$validatedData = $request->validate([
			'InstitutionName' => 'required|unique:Institutions',
			'Address'         => 'required',
			'Phone'           => 'required',
			'Email'           => 'required',
			'Description'     => 'required',
			'Country'         => 'required',
		]);

		$University = new Institutions;

		$University->InstitutionName = $request->input('InstitutionName');
		$University->Address         = $request->input('Address');
		$University->Phone           = $request->input('Phone');
		$University->Email           = $request->input('Email');
		$University->Description     = $request->input('Description');
		$University->Country         = $request->input('Country');

		$University->save();

		return redirect()->route('ManageInstitutions')->with('status', 'Institution has been   created successfully ');

	}

	public function DeleteInstitution($id) {

		$Institutions = Institutions::find($id);

		$Institutions->delete();

		return redirect()->route('ManageInstitutions')->with('status', 'Selected institution has been   deleted successfully ');

	}

	public function SelectInstitution() {

		$Institutions = Institutions::all();

		$data = [

			"Page"       => "sys.departments.select",
			"Title"      => "Select the institution whose departments are to be managed",

			"University" => $Institutions,

		];

		return view('sys.view.index', $data);
	}

	public function SubmitSelectInstitution(request $request) {

		$request->validate([
			'Institution' => 'required',

		]);

		$a = Institutions::where('InstitutionName', $request->input('Institution'))->first();

		$id = $a->id;

		$Departments = Departments::where('Institution', $id)->get();

		$data = [

			"Page"  => "sys.departments.ManageDepartments",
			"Title" => 'Manage departments attached to the institution <span class="text-danger font-weight-bold">' . $a->InstitutionName . '</span>',

			"Name"  => $a->InstitutionName,
			"id"    => $id,
			"depts" => $Departments,

		];

		return view('sys.view.index', $data);

	}

	public function ManageDepartments($id) {

		$a = Institutions::where('id', $id)->first();

		$Departments = Departments::where('Institution', $id)->get();

		$id = $a->id;

		$data = [

			"Page"  => "sys.departments.ManageDepartments",
			"Title" => 'Manage departments attached to the institution <span class="text-danger font-weight-bold">' . $a->InstitutionName . '</span>',

			"Name"  => $a->InstitutionName,
			"id"    => $id,
			"depts" => $Departments,

		];

		return view('sys.view.index', $data);

	}

	public function CreateDepartment(request $request) {

		$validatedData = $request->validate([
			'Department'  => 'required',
			'Description' => 'required',
			'id'          => 'required',

		]);

		$id = $request->input('id');

		$check = Departments::where('Department', $request->input('Department'))

			->where('Institution', $id)

			->count();

		if ($check > 0) {

			return redirect()->route('ManageDepartments', ['id' => $id])->with('error_a', 'The department name entered is already in use by the selected institution ');

		}

		$Departments = new Departments;

		$Departments->Department  = $request->input('Department');
		$Departments->Description = $request->input('Description');

		$Departments->Institution = $id;

		$Departments->save();

		return redirect()->route('ManageDepartments', ['id' => $id])->with('status', 'Department successfully attached to the selected institution ');

	}

	public function DeleteDepartment($id) {

		$Departments = Departments::find($id);

		$Departments->delete();

		return redirect()->back()->with('status', 'Department successfully deleted from the selected institution properties ');

	}

}
