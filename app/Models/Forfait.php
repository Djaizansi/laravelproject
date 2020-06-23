<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Forfait
 * 
 * @property int $id_forfait
 * @property string $nom
 * @property string $resum
 * @property int $prix
 * @property int $duree_jours
 *
 * @package App\Models
 */
class Forfait extends Model
{
	protected $table = 'forfaits';
	protected $primaryKey = 'id_forfait';
	public $timestamps = false;

	protected $casts = [
		'prix' => 'int',
		'duree_jours' => 'int'
	];

	protected $fillable = [
		'nom',
		'resum',
		'prix',
		'duree_jours'
	];
}
