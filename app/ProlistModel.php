<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProlistModel extends Model
{
    protected $table='goods';
    protected $primaryKey='g_id';
    public $timestamps=false;
    protected $guarded=[];
}
