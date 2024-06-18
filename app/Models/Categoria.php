<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Categoria
 * 
 * @property int $id
 * @property string $nombre_categoria
 * @property string $tipo_medio
 * 
 * @property Collection|Libro[] $libros
 *
 * @package App\Models
 */
class Categoria extends Model
{
	protected $table = 'categoria';
	public $timestamps = false;

	protected $fillable = [
		'nombre_categoria',
		'tipo_medio'
	];

	public function libros()
	{
		return $this->hasMany(Libro::class, 'id_categoria');
	}
}
