<?php

/**
 * Created by Reliese Model.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Genre
 * 
 * @property int $id_genre
 * @property string $nom
 *
 * @package App\Models
 */
class Genre extends Model
{
	protected $table = 'genres';
	protected $primaryKey = 'id_genre';
	public $timestamps = false;

	protected $fillable = [
		'nom'
	];

	public function film()
	{
		return $this->hasMany('App\Film');
	}
}
