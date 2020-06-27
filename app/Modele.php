<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Modele
 * 
 * @property int $id
 * @property string $nom
 *
 * @package App\Models
 */
class Modele extends Model
{
    protected $table = 'modeles';
    protected $primaryKey = 'id';

	protected $casts = [
        'nom' => 'string',
        'id_marque' => 'int'
	];

	protected $fillable = [
        'nom',
        'id_marque'
    ];

    public function marques()
	{
		return $this->belongsTo('App\Marque', 'id_marque');
    }
    
    /* public function hasMarque(string $marque_name)
	{
		foreach($this->marque as $uneMarque)
		{
			if($uneMarque->nom == $marque_name)
				return true;
		}
		return false;
	} */
}