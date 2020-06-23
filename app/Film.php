<?php

/**
 * Created by Reliese Model.
 */

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Film
 * 
 * @property int $id_film
 * @property int $id_genre
 * @property int $id_distributeur
 * @property string $titre
 * @property string $resum
 * @property Carbon $date_debut_affiche
 * @property Carbon $date_fin_affiche
 * @property int $duree_minutes
 * @property int $annee_production
 *
 * @package App\Models
 */
class Film extends Model
{
	protected $table = 'films';
	protected $primaryKey = 'id_film';
	public $timestamps = false;

	protected $casts = [
		'id_genre' => 'int',
		'id_distributeur' => 'int',
		'duree_minutes' => 'int',
		'annee_production' => 'int'
	];

	protected $dates = [
		'date_debut_affiche',
		'date_fin_affiche'
	];

	protected $fillable = [
		'id_genre',
		'id_distributeur',
		'titre',
		'resum',
		'date_debut_affiche',
		'date_fin_affiche',
		'duree_minutes',
		'annee_production'
	];

	public function genre()
	{
		return $this->belongsTo(Genre::class, 'id_genre');
	}

	public function distributeur()
	{
		return $this->belongsTo('App\Distributeur', 'id_distributeur');
	}
}
