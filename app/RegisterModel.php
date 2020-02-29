<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterModel extends Model
{
    protected $table="reg";
    protected $primaryKey="reg_id";
    public $timestamps=false;
    protected $guarded=[];
}
