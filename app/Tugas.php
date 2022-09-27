<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $fillable = ['semester_id', 'tugas', 'tanggal_awal', 'tanggal_akhir', 'file_tugas', 'keterangan_tugas', 'status', 'file_answer'];

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}
