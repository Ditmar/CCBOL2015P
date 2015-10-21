<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelUni extends Model
{
    protected $table="Universidad";
    protected $fillable=["nombre"];
}
