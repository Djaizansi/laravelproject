<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reduction
 * 
 * @property int $id_reduction
 * @property string $nom
 * @property Carbon $date_debut
 * @property Carbon $date_fin
 * @property int $pourcentage_reduction
 *
 * @package App\Models
 */
class Reduction extends Model
{
	protected $table = 'reductions';
	protected $primaryKey = 'id_reduction';
	public $timestamps = false;

	protected $casts = [
		'pourcentage_reduction' => 'int'
	];

	protected $dates = [
		'date_debut',
		'date_fin'
	];

	protected $fillable = [
		'nom',
		'date_debut',
		'date_fin',
		'pourcentage_reduction'
	];
}
