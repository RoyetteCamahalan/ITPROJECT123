<?php namespace App\Http\Controllers;
use Redirect;
use App\specializations;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SpecializationsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
        $specialization = new specializations;
        $specialization->name = ucfirst( $input['name'] );
        if($specialization->save())
        	return Redirect::back()->withFlash_message([
            'msg' => ' Specialization successfully Added',
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
	public function update(Request $request)
	{
		$input = $request->all();
        $specialization =specializations::whereid($request->get('id'))->first();
        $specialization->name = ucfirst( $input['name'] );
        if($specialization->save())
        	return Redirect::back()->withFlash_message([
            'msg' => ' Specialization successfully Updated',
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
