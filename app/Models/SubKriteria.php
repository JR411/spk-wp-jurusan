<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function kriterias()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id', 'id');
    }
    public function jurusans()
    {
        return $this->belongsToMany(Jurusan::class, 'jurusan_sub_kriteria')
            ->withPivot('bobot')->orderByPivot('bobot', 'desc');
    }
    public function calonMahasiswas()
    {
        return $this->belongsToMany(CalonMahasiswa::class, 'calon_mahasiswa_sub_kriteria');
    }
}
