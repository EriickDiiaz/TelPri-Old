<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lineas extends Model
{
    use HasFactory;

    /**
     * Obtener la LOCALIDAD a la que pertenece la linea. 
     */
    public function localidad()
    {
        return $this->belongsTo(Localidad::class);
    }
    /**
     * Obtener el PISO al que pertenece la linea. 
     */
    public function piso()
    {
        return $this->belongsTo(Piso::class, 'piso_id');
    }

    /**
     * Obtener el CAMPO al que pertenece la linea. 
     */
    public function campo()
    {
        return $this->belongsTo(Campo::class);
    }
}
