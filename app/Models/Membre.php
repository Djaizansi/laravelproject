<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Membre
 * 
 * @property int $id_membre
 * @property int $id_personne
 * @property int $id_abonnement
 * @property Carbon $date_inscription
 * @property Carbon $debut_abonnement
 *
 * @package App\Models
 */
class Membre extends Model
{
	protected $table = 'membres';
	protected $primaryKey = 'id_membre';
	public $timestamps = false;

	protected $casts = [
		'id_personne' => 'int',
		'id_abonnement' => 'int'
	];

	protected $dates = [
		'date_inscription',
		'debut_abonnement'
	];

	protected $fillable = [
		'id_personne',
		'id_abonnement',
		'date_inscription',
		'debut_abonnement'
	];
}
