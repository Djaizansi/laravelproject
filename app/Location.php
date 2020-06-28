<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Voiture
 * 
 * @property int $id
 * @property int $id_marque
 * @property int $id_modele
 * @property float $prix
 * @property Carbon $date_immat
 *
 * @package App\Models
 */
class Location extends Model
{
    protected $table = 'locations';
    protected $primaryKey = 'id';

	protected $casts = [
        'date_debut' => 'date',
		'date_fin' => 'date',
        'prix' => 'float',
        'id_user' => 'int',
        'id_voiture' => 'int'
	];

	protected $dates = [
        'date_debut',
        'date_fin'
	];

	protected $fillable = [
		'date_debut',
		'date_fin',
		'prix',
		'id_user',
		'id_voiture',
	];

	public function users()
	{
		return $this->belongsTo('App\User', 'id_user');
	}

	public function voitures()
	{
		return $this->belongsTo('App\Voiture', 'id_voiture');
	}

}
