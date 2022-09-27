<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = ['mata_kuliah', 'semester', 'keterangan'];

    protected $with = ['materis', 'tugas', 'uts', 'uas'];

    public function materis()
    {
        return $this->hasMany(Materi::class);
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }

    public function uts()
    {
        return $this->hasMany(Uts::class);
    }

    public function uas()
    {
        return $this->hasMany(Uas::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
