<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = "pegawai";
    protected $fillable = ['nama_pegawai','tempat_lahir','tanggal_lahir','jenis_kelamin','agama','alamat','kelurahan_id','provinsi_id'];

    public function kelurahan(){
        return $this->belongsTo('App\Models\Kelurahan','kelurahan_id');
    }

    public function provinsi(){
        return $this->belongsTo('App\Models\Provinsi','provinsi_id');
    }
}
