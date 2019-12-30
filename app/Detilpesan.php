<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detilpesan extends Model
{
    protected $table = 'detilpenjualan';
    protected $guarded=[];

    //menonaktifkan angka
    public $incrementing = false;

    protected $fillable = ['NoPesan', 'KdBrg', 'JmlPesan', 'HargaBrg'];

    public $timestamps = false;
}
