<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class materialreplenishment extends Model {

	//
	protected $table = 'materialreplenishment';
	protected $primaryKey = 'id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['product_id_fk','material_id_fk','material_count'];

}
