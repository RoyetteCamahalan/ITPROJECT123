<?php namespace App\Http\Controllers;
use Redirect;
use Mail;

use App\User;
use App\specializations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Exceptions\Handler;
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
			/*$user = new User;
	        $user->fill($request->all());
	        $input = $request->all();
	        $fname=$input['fname'];
	        $lname=$input['lname'];
	        $email=$input['email'];;
	        $uname=$input['username'];;
	        $password=$input['password'];;
	        if($user->save()){*/
	        	/*$this->mailer->send( 'emails.register', function ($m){
	                        $m->subject('Pharmacy Tree Registration');
	                        $m->to('royette.camahalan09@gmail.com');
	                }); */
				 $mail = new \PHPMailer(true); 
				        $mail->isSMTP(); // tell to use smtp
				        $mail->CharSet = "utf-8"; // set charset to utf8
				        $mail->SMTPAuth = true;  // use smpt auth
				        $mail->SMTPSecure = "ssl"; // or ssl
				        $mail->Host = "smtp.gmail.com";
				        $mail->Port = 587; // most likely something different for you. This is the mailtrap.io port i use for testing. 
				        $mail->Username = "universalagencynotification@gmail.com";
				        $mail->Password = "universal1234";
				        $mail->setFrom("universalagencynotification@gmail.com", "ECE Calls");
				        $mail->Subject = "Test";
				        $mail->MsgHTML("This is a test");
				        $mail->addAddress("margiealviola29@gmail.com");
				        $mail->send();
	        	return Redirect::back()->withFlash_message([
	            'msg' => ' Employee successfully Added',
	            'type' => 'success'
	        ]);
	        //}
       
        	
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
