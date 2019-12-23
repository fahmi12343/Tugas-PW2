<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $guarded=[];

    //menjadikan kd_matkul primary key
    protected $primaryKey = 'KdKategori';

    //menonaktifkan angka
    public $incrementing = false;

    protected $fillable = ['KdKategori', 'NmKategori'];

    public $timestamps = false;
}
