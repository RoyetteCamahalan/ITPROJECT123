<?php namespace App\Http\Controllers;
use Redirect;
use Input;
use Mail;
use Validator;
use App\User;
use App\specializations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Exceptions\Handler;
class EmployeesController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}
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

	protected function validator(array $data){

        /*$messages = [
            'fname.required' => 'Please enter First Name.',
            'lname.required' => 'Please enter Last Name.',
            'password.required' => 'Please enter your desired password.',
            'password_confirmation.same' => 'Please confirm your password.'
        ];

        $rules = [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password|min:6',
        ];*/

        return Validator::make($data, [
			'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password|min:6'
		]);
    }
	public function store(){

        $errors = [];
        $input = Input::all();

        $validator = Validator::make($input, [
			'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|max:255|unique:users',
			'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password|min:6'
		]);
        if( $validator->fails() ){
            $errors =  $validator->errors()->toArray()  ;
        }

        $return_data = [];  // structure for this variable is array( $status_code, $errors )

        
        if(empty($errors)){
	       $user = new User;
                $user->fname=$input['fname'];
                $user->mname=$input['mname'];
                $user->lname=$input['lname'];
                $user->username=$input['username'];
                $user->email=$input['email'];
                $user->position=$input['position'];
                if($input['position']=='Admin'){
                    $user->password=bcrypt($input['password']);
                }else{
                    $user->password=$input['password'];
                }
                $user->access_level=0;
                $user->branch_id=0;

                $fname=$input['fname'];
                $lname=$input['lname'];
                $email=$input['email'];
                $uname=$input['username'];
                $password=$input['password'];
                if($user->save()){
	       			$return_data['status_code'] = '200';
                     $mail = new \PHPMailer(true); 
                             $mail->IsSMTP(); //set mailer to user SMTP
                                $mail->SMTPDebug = 2;
                                $mail->From = "junixcordero@bsit701.com";
                                $mail->FromName = "ECE Calls";
                                $mail->Host = "bsit701.com"; //specif smtp server
                                $mail->SMTPSecure = "ssl"; //Used instead of TLS when only POP mail is
                                $mail->Port = 465; //Used instead of 587 when only POP mail is selected
                                $mail->SMTPAuth = true;
                                $mail->Username = "junixcordero@bsit701.com"; //smtp username
                                $mail->Password = "/.,mnbvcxz"; //smtp password
                                $mail->AddAddress($email, ""); //where email will be send to               variable
                                $mail->WordWrap = 1000; //set word wrap
                                //$mail->AddAttachment(); //add attachments
                                //$mail->AddAttachment();
                        
                                $mail->IsHTML(true); //set email format to HTML
                                $mail->Body = "<!DOCTYPE html>
                                                <html lang='en-US'>
                                                    <head>
                                                        <meta charset='utf-8'>
                                                    </head>
                                                    <body>
                                                        <style type='text/css'>
                                                            table{
                                                                background-size: cover;
                                                                background-position-x: -260px;
                                                            }
                                                        </style>
                                                        <table style='font-family: 'Source Sans Pro',sans-serif;
                                                            font-size: medium;
                                                            background-color: rgba(0, 128, 0, 0.15);
                                                            border-radius: 5px;
                                                            border: 1px solid;
                                                            background: #f5f5f5;
                                                            padding: 10px 10px 0;
                                                            font: 14px/1.4285714 Arial,sans-serif;
                                                            display: table;
                                                            border-collapse: separate;
                                                            border-spacing: 2px;
                                                            border-color: rgba(128, 128, 128, 0.52);
                                                            background-size: cover;
                                                            background-position-x: -260px;'>
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <div style='font-size: larger;'>Welcome to ECE Calls</div>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div style='font-size: 14px;color:black !important;'>
                                                                            <span>Hi ".$fname." ".$lname."</span><br/>
                                                                            You have been added as employee to ECE Calls. <br/>
                                                                            <span style='color:black;'>Please login using this credentials:</span>
                                                                            <br/><br/>
                                                                            <span style='color:black;'>Email: </span><code>".$email."</code><br/>
                                                                            <span style='color:black;'>Username: </span><code>".$uname."</code><br/>
                                                                            <span style='color:black;'>Password: </span><code>".$password."</code>
                                                                            <br/><br/>
                                                                            <div style='text-align: center;'>
                                                                                <a style='-webkit-box-shadow: none;
                                                                                    box-shadow: none;
                                                                                    background-color: #00a65a;
                                                                                    border-color: #008d4c;
                                                                                    display: inline-block;
                                                                                    padding: 6px 12px;
                                                                                    margin-bottom: 0;
                                                                                    font-size: 14px;
                                                                                    font-weight: 400;
                                                                                    line-height: 1.42857143;
                                                                                    text-align: center;
                                                                                    white-space: nowrap;
                                                                                    vertical-align: middle;
                                                                                    -ms-touch-action: manipulation;
                                                                                    touch-action: manipulation;
                                                                                    cursor: pointer;
                                                                                    -webkit-user-select: none;
                                                                                    -moz-user-select: none;
                                                                                    -ms-user-select: none;
                                                                                    user-select: none;
                                                                                    background-image: none;
                                                                                    border: 1px solid transparent;
                                                                                    border-radius: 0;
                                                                                    -webkit-box-shadow: none;
                                                                                    -moz-box-shadow: none;
                                                                                    box-shadow: none;
                                                                                    border-width: 1px;
                                                                                    color: #fff;
                                                                                    text-decoration: none;' href='http://bsit701.com/ece_calls/itproject123/admin/public/auth/login'
                                                                                    onmouseover='this.style.backgroundColor='#008d4c'' onmouseout='this.style.backgroundColor='#449d44''>Login now</a>
                                                                            </div>
                                                                            <br/>
                                                                            <b style='font-size: 13px;color: black;'>Note: It is strictly recommended that you change your password after your first login.</b>
                                                                            <br/>
                                                                            <br/>
                                                                            
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td>
                                                                        <i>
                                                                            <code>
                                                                                <small>
                                                                                    If the link above doesn't work. Please copy and paste this url to your browser.
                                                                                    <br/>
                                                                                    http://bsit701.com/ece_calls/itproject123/admin/public/auth/login
                                                                                </small>
                                                                            </code>
                                                                        </i>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </body>
                                                </html>";
                                $mail->Send();
                }
		}
        $return_data['errors'] = $errors;
        return json_encode($return_data);
	}

	public function update(Request $request){

		$user=User::whereid($request->get('id'))->first();
		$user->fill($request->all());
		if($user->save())
        	return Redirect::back()->withFlash_message([
            'msg' => ' Employee successfully edited',
            'type' => 'success'
        ]);
        return Redirect::back()->withFlash_message([
            'msg' => ' Edit Failed',
            'type' => 'warning'
        ]);
	}


	/*public function update_area(Request $request){

		$input = $request->all();
		$areas = area::whereid($request->get('id'))->first();
        $areas->fill($request->all());
        if($areas->save())
        	return Redirect::back()->withFlash_message([
            'msg' => ' Area Updated successfully',
            'type' => 'success'
        ]);
        return Redirect::back()->withFlash_message([
            'msg' => ' Edit Failed',
            'type' => 'warning'
        ]);
	}*/
}
