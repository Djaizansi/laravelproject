<?php

/**
 * Created by Reliese Model.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Salle
 * 
 * @property int $id_salle
 * @property int $numero_salle
 * @property string $nom_salle
 * @property int $etage_salle
 * @property int $places
 *
 * @package App\Models
 */
class Salle extends Model
{
	protected $table = 'salles';
	protected $primaryKey = 'id_salle';
	public $timestamps = false;

	protected $casts = [
		'numero_salle' => 'int',
		'etage_salle' => 'int',
		'places' => 'int'
	];

	protected $fillable = [
		'numero_salle',
		'nom_salle',
		'etage_salle',
		'places'
	];
}
