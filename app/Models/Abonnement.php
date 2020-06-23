<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Abonnement
 * 
 * @property int $id_abonnement
 * @property int $id_forfait
 * @property Carbon $debut
 *
 * @package App\Models
 */
class Abonnement extends Model
{
	protected $table = 'abonnements';
	protected $primaryKey = 'id_abonnement';
	public $timestamps = false;

	protected $casts = [
		'id_forfait' => 'int'
	];

	protected $dates = [
		'debut'
	];

	protected $fillable = [
		'id_forfait',
		'debut'
	];
}
