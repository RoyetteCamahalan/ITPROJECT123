<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\calls;
use App\User;
use DB;
class ReportController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users=User::whereposition('Medical Representative')->get();
		return view('report',compact('users'));
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
		$reports=DB::select("select i.name as institutionname, d.doc_name as doctorname, s.name as specialization, dc.name as classname, dc.max_visit, DATE(c.START_DATETIME) as calldate, c.START_DATETIME as callstart, c.END_DATETIME as callend, TIMESTAMPDIFF(SECOND, c.START_DATETIME, c.END_DATETIME)as timespent from calls c INNER JOIN users u on u.id=c.user_id_fk INNER JOIN institutiondoctorsmaps idm on idm.id=c.INST_DOC_ID_FK INNER JOIN doctors d on d.doc_id=idm.doctor_id_fk INNER JOIN doctorclasses dc on dc.id=idm.class_id_fk INNER JOIN institution i on i.id=idm.institution_id_fk INNER JOIN specializations s on s.id=d.specialization_id_fk
				WHERE u.id=".$id);
		$str='';
		foreach ($reports as $report){
			$str=$str."<tr>
						<td class='center'>".$report->institutionname."</td>
						<td class='center'>".$report->doctorname."</td>
						<td class='center'>".$report->specialization."</td>
						<td class='center'>".$report->classname." (".$report->max_visit.") </td>
						<td class='center'>".$report->calldate."</td>
						<td class='center'>".$report->callstart."</td>
						<td class='center'>".$report->callend."</td>
						<td class='center'>".$report->timespent." s</td></tr>";
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
	public function update($id)
	{
		//
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

}
