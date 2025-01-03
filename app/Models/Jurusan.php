<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function peminatans()
    {
        return $this->belongsTo(Peminatan::class, 'peminatan_id', 'id');
    }
    public function subKriterias()
    {
        return $this->belongsToMany(SubKriteria::class, 'jurusan_sub_kriteria')
            ->withPivot('bobot')->orderByPivot('bobot', 'desc');
    }
    public function calonMahasiswas()
    {
        return $this->belongsToMany(CalonMahasiswa::class, 'calon_mahasiswa_jurusan')
            ->withPivot('hasil')->orderByPivot('hasil', 'desc');
    }
}
