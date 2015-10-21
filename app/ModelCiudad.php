<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelCiudad extends Model
{
    //
    protected $table="Ciudad";
    protected $fillable=["nombre","idPais"];
}
