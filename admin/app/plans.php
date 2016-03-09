<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class plans extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'plans';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['year','cycle_number','status','status_date'];

}
