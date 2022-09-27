<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uts extends Model
{

    protected $fillable = ['semester_id', 'uts', 'tanggal_awal', 'tanggal_akhir', 'file_uts', 'keterangan_uts', 'status', 'file_answer'];

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}
