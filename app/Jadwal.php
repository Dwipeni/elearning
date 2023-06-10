<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $fillable = ['name_tutor', 'type_mapel', 'time_mapel'];

    // public function jadwal()
    // {
    //     return $this->hasMany('App\Jadwal');
    // }
}