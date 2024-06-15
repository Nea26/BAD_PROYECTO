<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Miembro
 * 
 * @property string $CARNET_MIEMBRO
 * @property int $user_id
 * @property string $NOMBRE
 * @property string $APELLIDO
 * @property Carbon $FECHA_NACIMIENTO
 * @property string $DOC_IDENTIFICACION
 * @property string $NUM_DOC_IDENTIFICACION
 * @property string $TELEFONO
 * @property string $CORREO
 * @property Carbon $FECHA_MEMBRESIA
 * @property Carbon $VIGENCIA
 * @property int $COSTO_CARNET
 * @property bool $PENALIZADO
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Miembro extends Model
{
	protected $table = 'miembro';
	protected $primaryKey = 'CARNET_MIEMBRO';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'FECHA_NACIMIENTO' => 'datetime',
		'FECHA_MEMBRESIA' => 'datetime',
		'VIGENCIA' => 'datetime',
		'COSTO_CARNET' => 'int',
		'PENALIZADO' => 'bool'
	];

	protected $fillable = [
		'CARNET_MIEMBRO',
		'user_id',
		'NOMBRE',
		'APELLIDO',
		'FECHA_NACIMIENTO',
		'DOC_IDENTIFICACION',
		'NUM_DOC_IDENTIFICACION',
		'TELEFONO',
		'CORREO',
		'FECHA_MEMBRESIA',
		'VIGENCIA',
		'COSTO_CARNET',
		'PENALIZADO'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
