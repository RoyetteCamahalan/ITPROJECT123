<?php namespace App\Http\Controllers;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\plans;
use App\plandetails;
use DB;
class PlansController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$forapprovals=plans::join('users','plans.user_id_fk','=','users.id')
				->where('plans.status_id','=','0')
				->get(array('users.fname','users.lname','plans.id','plans.year','plans.cycle_number'));
		$mcps=plans::join('users','plans.user_id_fk','=','users.id')
				->where('plans.status_id','=','1')
				->get(array('users.fname','users.lname','plans.id','plans.year','plans.cycle_number','plans.status_date'));
		return view('plans',compact('forapprovals','mcps'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$plandays=DB::select("select DISTINCT day_number from plandetails where plan_id_fk=".$id);
		$str='';
		foreach ($plandays as $planday) {
			$str=$str."<tr>
						<td class='center'>".$planday->day_number."</td>";
			$doctors=plandetails::join('institutiondoctorsmaps', 'institutiondoctorsmaps.id', '=', 'plandetails.inst_doc_id_fk')
			->join('doctors', 'doctors.doc_id', '=', 'institutiondoctorsmaps.doctor_id_fk')
			->join('institution', 'institution.id', '=', 'institutiondoctorsmaps.institution_id_fk')
			->join('doctorclasses', 'doctorclasses.id', '=', 'institutiondoctorsmaps.class_id_fk')
			->whereplan_id_fk($id)
			->whereday_number($planday->day_number)
			->get(array('doctors.doc_name as doctorname','institution.name as institutionname',
						'doctorclasses.max_visit'));
			$str2="<td><ul class='list-unstyled'>";
			foreach ($doctors as $doctor) {
				$str2=$str2."<li>".$doctor->doctorname." (".$doctor->max_visit."X) (".$doctor->institutionname.")</li>";
			}
			$str2=$str2."</ul></td>";
			$str=$str.$str2."</tr>";
		}
		return $str;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		$plan=plans::whereid($request->get('id'))->first();
		$plan->fill($request->all());
		$successmsg='';
		$errormsg='';
		if($request->get('status')==1){
			$successmsg=' Plan successfully accepted!';
			$errormsg=' Failed accepting plan!';
		}else{
			$successmsg=' Plan successfully declined!';
			$errormsg=' Failed declining plan!';
		}
		if($plan->save())
        	return Redirect::back()->withFlash_message([
            'msg' => $successmsg,
            'type' => 'success'
        ]);
        return Redirect::back()->withFlash_message([
            'msg' => $errormsg,
            'type' => 'warning'
        ]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	public function doctorlist($day_number)
	{


	}

}
