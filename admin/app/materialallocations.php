<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class materialallocations extends Model {

	protected $table = 'materialallocations';
	protected $primaryKey = 'id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['material_map_fk','product_id_fk','material_id_fk','material_count'];


}
