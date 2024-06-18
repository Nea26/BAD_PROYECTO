<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Idioma
 * 
 * @property int $id
 * @property string $nombre_idioma
 * 
 * @property Collection|Libro[] $libros
 *
 * @package App\Models
 */
class Idioma extends Model
{
	protected $table = 'idiomas';
	public $timestamps = false;

	protected $fillable = [
		'nombre_idioma'
	];

	public function libros()
	{
		return $this->hasMany(Libro::class, 'id_idioma');
	}
}
