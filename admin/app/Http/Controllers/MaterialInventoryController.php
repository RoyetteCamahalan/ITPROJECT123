<?php namespace App\Http\Controllers;
use Redirect;
use DB;
use App\products;
use App\materials;
use App\materialreplenishment;
use App\materialallocations;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MaterialInventoryController extends Controller {


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
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products=products::all();
		$materials=materials::all();
		$replenishments=materialreplenishment::join('products', 'products.id', '=', 'materialreplenishment.product_id_fk')
			->join('materials', 'materials.id', '=', 'materialreplenishment.material_id_fk')
			->get(array('materialreplenishment.id','products.name as productname','materials.name as materialname',
				'materialreplenishment.material_count','materialreplenishment.material_id_fk',
				'materialreplenishment.product_id_fk','materialreplenishment.created_at'));


		$inventories=DB::select("select p.id,p.name, COALESCE(SUM(CASE WHEN x.MATERIAL_ID_FK = 1 THEN x.MATERIAL_COUNT END),0) Sample, COALESCE(SUM(CASE WHEN x.MATERIAL_ID_FK = 2 THEN x.MATERIAL_COUNT END),0) Literatures, COALESCE(SUM(CASE WHEN x.MATERIAL_ID_FK = 3 THEN x.MATERIAL_COUNT END),0) Promomaterials from ( select id,'0' as map_id, product_id_fk,material_id_fk,material_count from materialreplenishment union select id,material_map_fk, product_id_fk,material_id_fk,material_count*-1 from materialallocations) as x right join products p on p.id=x.product_id_fk GROUP BY p.id,p.name");
		$allocations=materialallocations::join('products', 'products.id', '=', 'materialallocations.product_id_fk')
			->join('materials', 'materials.id', '=', 'materialallocations.material_id_fk')
			->join('institutiondoctorsmaps', 'institutiondoctorsmaps.id', '=', 'materialallocations.material_map_fk')
			->join('doctors', 'doctors.doc_id', '=', 'institutiondoctorsmaps.doctor_id_fk')
			->join('institution', 'institution.id', '=', 'institutiondoctorsmaps.institution_id_fk')
			->get(array('materialallocations.id','products.name as productname','materials.name as materialname',
				'materialallocations.material_count','materialallocations.material_id_fk',
				'materialallocations.product_id_fk','materialallocations.created_at',
				'doctors.doc_name as doctorname','institution.name as institutionname'));
		return view('materialinventory',compact('products','materials','replenishments','inventories','allocations'));
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
		$materialreplenishment=new materialreplenishment;
		$materialreplenishment->fill($request->all());
		if($materialreplenishment->save())
        	return Redirect::back()->withFlash_message([
            'msg' => ' Material Replenishment successfully Added',
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
	public function updatereplenishment(Request $request)
	{
		$materialreplenishment=materialreplenishment::whereid($request->get('id'))->first();
		$materialreplenishment->fill($request->all());
		if($materialreplenishment->save())
        	return Redirect::back()->withFlash_message([
            'msg' => ' Material Replenishment successfully updated',
            'type' => 'success'
        ]);
        return false;
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
