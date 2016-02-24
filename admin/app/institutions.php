<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class institutions extends Model {

	protected $table = 'institution';
	protected $primaryKey = 'id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name','address','area_id'];

}
