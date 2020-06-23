<?php

/**
 * Created by Reliese Model.
 */

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Personne
 * 
 * @property int $id_personne
 * @property string $nom
 * @property string $prenom
 * @property Carbon $date_naissance
 * @property string $email
 * @property string $adresse
 * @property string $cpostal
 * @property string $ville
 * @property string $pays
 *
 * @package App\Models
 */
class Personne extends Model
{
	protected $table = 'personnes';
	protected $primaryKey = 'id_personne';
	public $timestamps = false;

	protected $dates = [
		'date_naissance'
	];

	protected $fillable = [
		'nom',
		'prenom',
		'date_naissance',
		'email',
		'adresse',
		'cpostal',
		'ville',
		'pays'
	];
	public function fonctions()
	{
		return $this->belongsToMany('App\Fonction','employes', 'id_personne', 'id_fonction');
	}

	public function hasFonction(string $fonction_name)
	{
		foreach($this->fonctions as $fonction)
		{
			if($fonction->nom == $fonction_name)
				return true;
		}
		return false;
	}
}
