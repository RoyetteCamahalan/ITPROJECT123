<?php namespace App\Http\Controllers;
use Redirect;
use App\products;
use App\materials;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProductsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products=products::all();
		$materials=materials::all();
		return view('products',compact('products','materials'));
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
		$product= new products;
		$product->name=$input['name'];
		if($product->save())
        	return Redirect::back()->withFlash_message([
            'msg' => ' Product successfully Added',
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
	public function update(Request $request){

		$product=products::whereid($request->get('id'))->first();
		$product->fill($request->all());
		if($product->save())
        	return Redirect::back()->withFlash_message([
            'msg' => ' Product successfully edited',
            'type' => 'success'
        ]);
        return Redirect::back()->withFlash_message([
            'msg' => ' Edit Failed',
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

}
