<?php namespace App\Http\Controllers;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\institutions;
use App\area;
use App\doctorclasses;
use App\doctors;
use App\institutiondoctorsmap;
use Illuminate\Http\Request;

class InstitutionsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$institutions=institutions::join('areas','areas.id',"=","institution.area_id")->get(array('institution.id','institution.address','institution.name','institution.created_at','areas.name as area_name'));
		$areas=area::join('users','areas.assigned_employee',"=","users.id")->get(array('areas.id as id','areas.name','areas.description','areas.created_at','users.fname','users.lname'));
		$doctors=doctors::orderBy('doc_name','asc')->get();
		$doctorclasses=doctorclasses::all();
		return view('institutions',compact('institutions','areas','doctorclasses','doctors'));
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
	public function store(Request $request)
	{
		$input = $request->all();
        $institution = new institutions;
        $institution->name = ucfirst( $input['name'] );
        $institution->address = $input['address'];
        $institution->area_id = $input['area_id'];
        if($institution->save())
        	return Redirect::back()->withFlash_message([
            'msg' => ' Institution successfully Added',
            'type' => 'success'
        ]);
        return false;
	}
	public function storemap(Request $request)
	{
		$input = $request->all();
        $map = new institutiondoctorsmap;
        $map->institution_id_fk =  $input['institution_id_fk'];
        $map->doctor_id_fk = $input['doctor_id_fk'];
        $map->class_id_fk = $input['class_id_fk'];
        $map->best_time_to_call = $input['best_time_to_call'];
        $map->room_number = $input['room_number'];
        if($map->save())
        	return Redirect::back()->withFlash_message([
            'msg' => ' Doctor successfully Added',
            'type' => 'success'
        ]);
        return false;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
	public function getdoctors($id){
		//$doctors=doctors::wheredoc_id($doc_id)->first();
		//return $doctors->toJson();
	}
}
