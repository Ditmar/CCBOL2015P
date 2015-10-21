<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;

class ModelParticipantes extends Model
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'participante';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //se agrego username para el blog y tener una identificacion unica
    protected $fillable = ['nombres', 'apellidos','nick','ci','semestre','sexo','emails','IdUsAgr','participacion'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
