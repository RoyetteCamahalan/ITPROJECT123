<?php namespace App\Http\Controllers;
use DB;
class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}
	public function getinventory()
	{
		$inventories=DB::select("select p.id,p.name, COALESCE(SUM(CASE WHEN x.MATERIAL_ID_FK = 1 THEN x.MATERIAL_COUNT END),0) Sample, COALESCE(SUM(CASE WHEN x.MATERIAL_ID_FK = 2 THEN x.MATERIAL_COUNT END),0) Literatures, COALESCE(SUM(CASE WHEN x.MATERIAL_ID_FK = 3 THEN x.MATERIAL_COUNT END),0) Promomaterials from ( select id,'0' as map_id, product_id_fk,material_id_fk,material_count from materialreplenishment union select id,material_map_fk, product_id_fk,material_id_fk,material_count*-1 from materialallocations) as x right join products p on p.id=x.product_id_fk GROUP BY p.id,p.name");
		return json_encode($inventories);
	}

}
