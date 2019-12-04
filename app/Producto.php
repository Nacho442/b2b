<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //    
    protected $table = 'producto';
    protected $fillable = [	'nombre', 'nombre', 'precio', 'categoria', 'id_neg', 'direccion','descripcion','id_user'];
}
