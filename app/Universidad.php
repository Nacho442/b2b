<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{
    //    
    protected $table = 'empresa';
    protected $fillable = [	'id', 'nombre', 'calle', 'numero', 'colinia', 'ciudad', 'estado','activo','telefono'];
}
