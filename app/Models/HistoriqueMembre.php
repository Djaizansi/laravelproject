<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HistoriqueMembre
 * 
 * @property int $id_historique
 * @property int $id_membre
 * @property int $id_seance
 * @property Carbon $date
 *
 * @package App\Models
 */
class HistoriqueMembre extends Model
{
	protected $table = 'historique_membre';
	protected $primaryKey = 'id_historique';
	public $timestamps = false;

	protected $casts = [
		'id_membre' => 'int',
		'id_seance' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'id_membre',
		'id_seance',
		'date'
	];
}
