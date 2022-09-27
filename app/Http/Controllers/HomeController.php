<?php

namespace App\Http\Controllers;

use App\Semester;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Semester $semester)
    {
        return view('home', [
            'semester_I' => $semester->where([
                'semester' => 'Semester I',
                'user_id' => auth()->user()->id,
            ])->get(),
            'semester_II' => $semester->where([
                'semester' => 'Semester II',
                'user_id' => auth()->user()->id,
            ])->get(),
            'semester_III' => $semester->where([
                'semester' => 'Semester III',
                'user_id' => auth()->user()->id,
            ])->get(),
            'semester_IV' => $semester->where([
                'semester' => 'Semester IV',
                'user_id' => auth()->user()->id,
            ])->get(),
            'semester_V' => $semester->where([
                'semester' => 'Semester V',
                'user_id' => auth()->user()->id,
            ])->get(),
            'semester_VI' => $semester->where([
                'semester' => 'Semester VI',
                'user_id' => auth()->user()->id,
            ])->get(),
            'semester_VII' => $semester->where([
                'semester' => 'Semester VII',
                'user_id' => auth()->user()->id,
            ])->get(),
            'semester_VIII' => $semester->where([
                'semester' => 'Semester VIII',
                'user_id' => auth()->user()->id,
            ])->get()
        ]);
    }
}
