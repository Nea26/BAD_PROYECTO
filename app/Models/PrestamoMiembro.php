<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestamoMiembro extends Model
{
    use HasFactory;

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'id_ejemplar');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
