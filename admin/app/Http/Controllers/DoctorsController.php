<?php namespace App\Http\Controllers;
use Redirect;
use App\doctors;
use App\specializations;
use App\institutions;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
class DoctorsController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$doctors=doctors::join('specializations', 'specializations.id', '=', 'doctors.specialization_id_fk')->where('is_active','!=','0')->get();
		$forapproval=doctors::join('specializations', 'specializations.id', '=', 'doctors.specialization_id_fk')->where('is_active','=','0')->get();
		$specializations=specializations::all();
		$institutions=institutions::all();
		return view('doctors',compact('doctors','forapproval','specializations','institutions'));
	}

	public function show($doc_id){
		$doctors=doctors::wheredoc_id($doc_id)->first();
		return $doctors->toJson();
	}
	public function store(Request $request){
		$input = $request->all();
        $doctor = new doctors;
        $doctor->doc_name = ucfirst( $input['doc_name'] );
        $doctor->prc_license = $input['prc_license'];
        $doctor->specialization_id_fk = $input['specialization_id_fk'];
        $doctor->birthday = $input['birthday'];
        $doctor->email = $input['email'];
        $doctor->contact_number = $input['contact_number'];
        if($doctor->save())
        	return Redirect::to( route('doctors') );
        return false;
	}

	public function update(Request $request){

		$doctors=doctors::wheredoc_id($request->get('doc_id'))->first();
		$doctors->fill($request->all());
		if($doctors->save())
        	return Redirect::back()->withFlash_message([
            'msg' => ' Doctor successfully edited',
            'type' => 'success'
        ]);
        return Redirect::back()->withFlash_message([
            'msg' => ' Edit Failed',
            'type' => 'warning'
        ]);
	}

}
