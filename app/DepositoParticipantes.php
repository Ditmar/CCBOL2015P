<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;

class DepositoParticipantes extends Model
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'deposito';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //se agrego username para el blog y tener una identificacion unica
    protected $fillable = ['id', 'codigo','monto','fecha','hora','depositante','ci_depositante','imgboleta'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
