<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

   protected $fillable=['titulo','codigo_internacional','edicion','id_idioma','cantidad_disponible','id_categoria','id_autor'];

   // En el modelo Libro
public function categoria()
{
    return $this->belongsTo(Categoria::class, 'id_categoria');
}
public function idioma()
{
    return $this->belongsTo(Idioma::class, 'id_idioma');
}
public function autor()
{
    return $this->belongsTo(Autor::class, 'id_autor');
}
}
