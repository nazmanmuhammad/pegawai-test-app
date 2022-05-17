<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    protected $table = "kelurahan";
    protected $fillable = ['kode','nama_kelurahan','kecamatan_id','status'];

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan','kecamatan_id');
    }
}
