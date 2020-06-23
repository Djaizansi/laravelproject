<?php

/**
 * Created by Reliese Model.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fonction
 * 
 * @property int $id_fonction
 * @property string $nom
 * @property string $salaire
 * @property bool $cadre
 *
 * @package App\Models
 */
class Fonction extends Model
{
	protected $table = 'fonctions';
	protected $primaryKey = 'id_fonction';
	public $timestamps = false;

	protected $casts = [
		'cadre' => 'bool'
	];

	protected $fillable = [
		'nom',
		'salaire',
		'cadre'
	];

	public function personne()
	{
		return $this->belongsToMany('App\Personne', 'employe','id_fonction','id_personne');
	}
}
