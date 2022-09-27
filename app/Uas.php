<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uas extends Model
{
    protected $fillable = ['semester_id', 'uas', 'tanggal_awal', 'tanggal_akhir', 'file_uas', 'keterangan_uas', 'status', 'file_answer'];

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}
