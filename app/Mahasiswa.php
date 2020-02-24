<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['nama', 'nim', 'id_dosen'];
    public $timestamps = true;
    public function wali()
    {
        return $this->hasOne('App\Wali', 'id_mahasiswa');
    }

    public function dosen()
    {
        return $this->belongsTo('App\Dosen', 'id_dosen');
    }

    public function hobi()
    {
        return $this->belongsToMany('App\Hobi', 'mahasiswa_hobis', 'id_mahasiswa', 'id_hobi');
    }
}
