<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Profesor
 * 
 * @property string $CARNET_PROFESOR
 * @property int $user_id
 * @property string $NOMBRE
 * @property string $APELLIDO
 * @property string $DUI
 * @property string $TELEFONO
 * @property string $CORREO
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Profesor extends Model
{
	protected $table = 'profesor';
	protected $primaryKey = 'CARNET_PROFESOR';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'CARNET_PROFESOR',
		'user_id',
		'NOMBRE',
		'APELLIDO',
		'DUI',
		'TELEFONO',
		'CORREO'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
