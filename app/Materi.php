<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $fillable = ['semester_id', 'materi', 'file_materi', 'keterangan_materi'];

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}
