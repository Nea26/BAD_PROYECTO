<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Autor
 * 
 * @property int $id
 * @property string $nombre
 * 
 * @property Collection|Libro[] $libros
 *
 * @package App\Models
 */
class Autor extends Model
{
	protected $table = 'autor';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];

	public function libros()
	{
		return $this->hasMany(Libro::class, 'id_autor');
	}
}
