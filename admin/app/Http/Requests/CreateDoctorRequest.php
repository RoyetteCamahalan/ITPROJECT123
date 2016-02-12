<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateDoctorRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'doc_name'=>'required',
			'prc_licence'=>'required',
			'specialization_id_fk'=>'required'
		];
	}

}
