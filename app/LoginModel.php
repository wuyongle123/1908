<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    protected $table='reg';
    protected $primaryKey='reg_id';
    public $timestamps=false;
    protected $guarded=[];
}
