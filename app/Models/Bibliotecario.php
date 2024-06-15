<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bibliotecario
 * 
 * @property int $ID_BIBLIOTECARIO
 * @property int $user_id
 * @property int|null $ID_MULTA
 * @property string $NOMBRE
 * @property string $APELLIDO
 * @property string $USER_NAME
 * @property string $PASSWORD
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Bibliotecario extends Model
{
	protected $table = 'bibliotecario';
	protected $primaryKey = 'ID_BIBLIOTECARIO';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'ID_MULTA' => 'int'
	];

	protected $fillable = [
		'user_id',
		'ID_MULTA',
		'NOMBRE',
		'APELLIDO',
		'USER_NAME',
		'PASSWORD'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
