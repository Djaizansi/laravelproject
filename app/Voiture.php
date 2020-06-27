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
class Voiture extends Model
{
    protected $table = 'voiture';
    protected $primaryKey = 'id';

	protected $casts = [
		'id_marque' => 'int',
		'id_modele' => 'int',
		'prix' => 'float',
		'couleur' => 'string',
		'image' => 'string',
		'description' => 'string',
		'kilometrage' => 'string'
	];

	protected $dates = [
		'date_immat',
	];

	protected $fillable = [
		'id_marque',
		'id_modele',
		'prix',
		'couleur',
		'date_immat',
		'image',
		'description',
		'kilometrage'
	];

	public function marques()
	{
		return $this->belongsTo('App\Marque', 'id_marque');
	}

	public function modeles()
	{
		return $this->belongsTo('App\Modele', 'id_modele');
	}



}
