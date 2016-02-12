<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class doctorclasses extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'doctorclasses';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name','max_visit'];

}
