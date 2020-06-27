<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Marque
 * 
 * @property int $id
 * @property string $nom
 *
 * @package App\Models
 */
class Marque extends Model
{
    protected $table = 'marques';
    protected $primaryKey = 'id';

	protected $casts = [
		'nom' => 'string'
	];

	protected $fillable = [
        'nom'
    ];

    public function modeles()
	{
		return $this->hasMany('App\Modele', 'id_modele');
	}
}