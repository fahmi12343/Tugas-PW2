<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $guarded=[];

    //menjadikan kd_matkul primary key
    protected $primaryKey = 'KdPlg';

    //menonaktifkan angka
    public $incrementing = false;

    protected $fillable = ['KdPlg', 'NmPlg', 'AlamatPlg', 'TelpPlg  '];

    public $timestamps = false;
}
