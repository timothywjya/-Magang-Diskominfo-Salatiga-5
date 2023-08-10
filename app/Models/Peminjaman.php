<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $dates = ['waktu_awal', 'waktu_akhir'];
    public $timestamps = true;
    protected $guarded = [];
    public function Ruangan(){
        return $this->belongsTo(Ruangan::class,'ruangan_id', 'id');
    }
    public function Dinas(){
        return $this->belongsTo(Dinas::class,'dinas_peminjam_id', 'id');
    }
}
