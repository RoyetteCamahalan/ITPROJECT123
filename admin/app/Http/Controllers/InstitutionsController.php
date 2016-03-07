<?php namespace App\Http\Controllers;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\institutions;
use App\area;
use App\doctorclasses;
use App\doctors;
use App\institutiondoctorsmaps;
use Illuminate\Http\Request;

class InstitutionsController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}
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
        $map = new institutiondoctorsmaps;
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

	public function showmap($institution_id_fk)
	{
		$maps=institutiondoctorsmaps::join('doctors', 'doctors.doc_id', '=', 'institutiondoctorsmaps.doctor_id_fk')
				->join('doctorclasses', 'doctorclasses.id', '=', 'institutiondoctorsmaps.class_id_fk')
				->whereinstitution_id_fk($institution_id_fk)
				->get(array('institutiondoctorsmaps.id','institutiondoctorsmaps.institution_id_fk','doctors.doc_name','institutiondoctorsmaps.best_time_to_call','institutiondoctorsmaps.room_number','doctorclasses.name as classname','doctorclasses.max_visit'));
		$str='';
		foreach ($maps as $map) {
			$str=$str."<tr>
						<td class='center'>".$map->doc_name."</td>
						<td class='center'>".$map->classname."</td>
						<td class='center'>".$map->max_visit	."</td>
						<td class='center'>".$map->best_time_to_call."</td>
						<td class='center'>".$map->room_number."</td>
						<td class='center' style='text-align: center;'>
                            <a class='btn btn-info btn-xs view-edit-doctor' href='#' data-id=".$map->id.">
                                <i class='glyphicon glyphicon-edit icon-white'></i>
                            </a>
                            <a class='btn btn-danger btn-xs ' href='#' data-id=".$map->id.">
                                <i class='glyphicon glyphicon-trash'></i>
                            </a>
                            
                        </td></tr>";
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
	public function getdoctors($id){
		//$doctors=doctors::wheredoc_id($doc_id)->first();
		//return $doctors->toJson();
	}
}
