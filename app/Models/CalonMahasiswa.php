<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonMahasiswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function peminatans()
    {
        return $this->belongsTo(Peminatan::class, 'peminatan_id', 'id');
    }
    public function subKriterias()
    {
        return $this->belongsToMany(SubKriteria::class, 'calon_mahasiswa_sub_kriteria');
    }
    public function jurusans()
    {
        return $this->belongsToMany(Jurusan::class, 'calon_mahasiswa_jurusan')
            ->withPivot('hasil')->orderByPivot('hasil', 'desc');
    }
}
