<?php namespace App\Http\Controllers;
use Redirect;
use Mail;

use App\User;
use App\specializations;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
class EmployeesController extends Controller {

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
		//$doctors=doctors::join('specializations', 'specializations.id', '=', 'doctors.specialization_id_fk')->where('is_active','!=','0')->get();
		//$forapproval=doctors::join('specializations', 'specializations.id', '=', 'doctors.specialization_id_fk')->where('is_active','=','0')->get();
		$User =User::all();
		return view('employees',compact('User'));
	}

	/*	public function show($doc_id){
		$doctors=doctors::wheredoc_id($doc_id)->first();
		return $doctors->toJson();
	}*/
	public function store(Request $request){
        $user = new User;
        $user->fill($request->all());
        $data['name']=$request->username;
        $data['email']=$request->email;
        if($user->save())
        	Mail::send('welcome',['data'=>$data],function($mail) use ($data){
        		$mail->to($data['email'],$data['name'])->from('royette.camahalan09@gmail.com')->subject('Welcome to ECE Calls');
        	});
        	return Redirect::back()->withFlash_message([
            'msg' => ' Employee successfully Added',
            'type' => 'success'
        ]);
        return false;
	}
/*
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
	}*/

}
