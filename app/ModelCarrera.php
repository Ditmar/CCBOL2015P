<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelCarrera extends Model
{
    //
    protected $table="carrera";
    protected $fillable=["nombre","idUni"];
}
