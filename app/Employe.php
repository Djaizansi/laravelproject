<?php

/**
 * Created by Reliese Model.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employe
 * 
 * @property int $id_employe
 * @property int $id_personne
 * @property int $id_fonction
 *
 * @package App\Models
 */
class Employe extends Model
{
	protected $table = 'employes';
	protected $primaryKey = 'id_employe';
	public $timestamps = false;

	protected $casts = [
		'id_personne' => 'int',
		'id_fonction' => 'int'
	];

	protected $fillable = [
		'id_personne',
		'id_fonction'
	];
}
