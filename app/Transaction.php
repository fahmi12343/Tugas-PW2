<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'buktipesan';
    protected $guarded=[];

    //menjadikan kd_matkul primary key
    protected $primaryKey = 'NoPesan';

    //menonaktifkan angka
    public $incrementing = false;

    protected $fillable = ['NoPesan', 'TglPesan', 'KdPlg'];

    public $timestamps = false;
}
