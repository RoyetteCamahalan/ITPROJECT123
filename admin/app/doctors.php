<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class doctors extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'doctors';
	protected $primaryKey = 'doc_id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['doc_name','specialization_id_fk','birthday','contact_number','prc_license','email','is_active'];
}
