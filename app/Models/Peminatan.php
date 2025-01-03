<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminatan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function jurusans()
    {
        return $this->hasMany(Jurusan::class, 'peminatan_id', 'id');
    }
    public function calonMahasiswas()
    {
        return $this->hasMany(CalonMahasiswa::class, 'peminatan_id', 'id');
    }
}
