<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Autenticable;
use Spatie\Permission\Traits\HasRoles;
/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $nombre
 * @property string $apellido
 * @property int $role_id
 * 
 * @property Role $role
 * @property Collection|Bibliotecario[] $bibliotecarios
 * @property Collection|Miembro[] $miembros
 * @property Collection|Profesor[] $profesors
 * @property Collection|RolesUsuario[] $roles_usuarios
 *
 * @package App\Models
 */
class User extends Autenticable
{
	use HasRoles;
	protected $table = 'users';

	protected $casts = [
		'email_verified_at' => 'datetime',
		'role_id' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'remember_token',
		'nombre',
		'apellido',
		'role_id'
	];

	
	public function bibliotecarios()
	{
		return $this->hasMany(Bibliotecario::class);
	}

	public function miembros()
	{
		return $this->hasMany(Miembro::class);
	}

	public function profesors()
	{
		return $this->hasMany(Profesor::class);
	}

}
