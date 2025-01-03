<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function subKriterias()
    {
        return $this->hasMany(SubKriteria::class, 'kriteria_id', 'id');
    }
    public function getSlugAttribute()
    {
        return Str::slug($this->attributes['kriteria_nama']);
    }
}
