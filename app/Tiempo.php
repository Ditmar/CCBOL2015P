<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiempo extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tiempos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //se agrego username para el blog y tener una identificacion unica
    protected $fillable = ['dia','mes','anio','hora','minutos','segundos'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
