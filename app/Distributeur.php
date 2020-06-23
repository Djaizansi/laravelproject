<?php

/**
 * Created by Reliese Model.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Distributeur
 * 
 * @property int $id_distributeur
 * @property string $nom
 * @property string $telephone
 * @property string $adresse
 * @property string $cpostal
 * @property string $ville
 * @property string $pays
 *
 * @package App\Models
 */
class Distributeur extends Model
{
	protected $table = 'distributeurs';
	protected $primaryKey = 'id_distributeur';
	public $timestamps = false;

	protected $fillable = [
		'nom',
		'telephone',
		'adresse',
		'cpostal',
		'ville',
		'pays'
	];

}



