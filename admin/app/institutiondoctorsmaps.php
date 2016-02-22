<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class institutiondoctorsmaps extends Model {

	//
	protected $table = 'institutiondoctorsmaps';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['institution_id_fk','doctor_id_fk','class_id_fk','best_time_to_call','room_number'];

}
