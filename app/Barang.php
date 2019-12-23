<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $guarded=[];

    //menjadikan kd_matkul primary key
    protected $primaryKey = 'KdBrg';

    //menonaktifkan angka
    public $incrementing = false;

    protected $fillable = ['KdBrg', 'NmBrg', 'Satuan', 'HargaBrg', 'Stok', 'KdKategori'];

    public $timestamps = false;
}
