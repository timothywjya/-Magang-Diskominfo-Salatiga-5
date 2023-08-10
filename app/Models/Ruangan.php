<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';
    public $timestamps = true;

    public function Dinas(){
        return $this->belongsTo(Dinas::class,'dinas_id', 'id');
    }
    public function Peminjaman(){
        return $this->hasMany(Peminjaman::class,'ruangan_id', 'id');
    }
}
