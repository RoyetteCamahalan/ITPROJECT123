<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class calls extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'calls';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['INST_DOC_ID_FK','day_number','STATUS_ID_FK','PLANNED','MAKEUP',
							'START_DATETIME','END_DATETIME','LATITUDE','LONGITUDE','RESCHEDULE_DATE','SIGNED_DAY_ID',
							'RETRY_COUNT','JOINT_CALL','QUICK_SIGN'];

}
