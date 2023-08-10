<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dinas extends Model{
    protected $table = 'dinas';
    public $timestamps = true;
    public function Ruangan(){
        return $this->hasMany(Ruangan::class,'dinas_id', 'id');
    }

    public function Peminjaman(){
        return $this->hasMany(Peminjaman::class,'dinas_peminjam_id', 'id');
    }
    public function User(){
        return $this->hasMany(User::class,'dinas_id', 'id');
    }
}
