<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

   protected $fillable=['titulo','codigo_internacional','edicion','idioma','cantidad_disponible'];
}
