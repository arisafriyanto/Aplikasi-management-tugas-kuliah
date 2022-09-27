<?php

namespace App\Http\Controllers;

use App\Http\Requests\UtsRequest;
use App\{Semester, Uts};

class UtsController extends Controller
{
    public function semester_I_uts()
    {
        return view('semester.semester_I.uts.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester I',
                'user_id' => auth()->user()->id
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_I_uts_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_I.uts.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_I_uts_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_I.uts.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_I_uts_mata_kuliah_store(Semester $semester, UtsRequest $utsRequest, Uts $uts)
    {
        $attr = $utsRequest->all();

        if (request()->file('file_uts')) {
            $file_uts = request()->file('file_uts')->store('Semester I/uts');
        } else {
            $file_uts = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uts'] = $file_uts;
        $attr['status'] = "belum";
        $uts->create($attr);

        session()->flash('success', 'Tambah Uts Berhasil!');
        return redirect("semester_I/uts/$semester->id");
    }

    public function semester_I_uts_mata_kuliah_show(Semester $semester, Uts $uts)
    {
        return view('semester.semester_I.uts.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_I_uts_mata_kuliah_delete(Semester $semester, Uts $uts)
    {
        \Storage::delete($uts->file_uts);
        \Storage::delete($uts->file_answer);
        $uts->delete();


        session()->flash('success', 'Delete Uts Berhasil!');
        return redirect("semester_I/uts/$semester->id");
    }

    public function semester_I_uts_mata_kuliah_update(Semester $semester, Uts $uts)
    {
        return view('semester.semester_I.uts.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_I_uts_mata_kuliah_edit(Semester $semester, Uts $uts, UtsRequest $utsRequest)
    {
        $attr = $utsRequest->all();

        if (request()->file('file_uts')) {
            \Storage::delete($uts->file_uts);
            $file_uts = request()->file('file_uts')->store('Semester I/uts');
        } else {
            $file_uts = $uts->file_uts;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uts'] = $file_uts;

        $uts->update($attr);

        session()->flash('success', 'Update Uts Berhasil!');
        return redirect("semester_I/uts/$semester->id");
    }

    public function semester_I_uts_mata_kuliah_download(Semester $semester, Uts $uts)
    {
        return \Storage::download($uts->file_uts);
    }

    public function semester_I_uts_mata_kuliah_answer(Semester $semester, Uts $uts)
    {
        return view('semester.semester_I.uts.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_I_uts_mata_kuliah_answer_uts(Semester $semester, Uts $uts)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($uts->file_answer);
            $answer = request()->file('file_answer')->store('Semester I/uts/answer');
        } else {
            $answer = $uts->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($uts->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $uts->update($attr);

        session()->flash('success', 'Upload Jawaban Uts Berhasil!');
        return redirect()->back();
    }

    public function semester_I_uts_mata_kuliah_download_answer(Semester $semester, Uts $uts)
    {
        return \Storage::download($uts->file_answer);
    }


    /* SEMESTER II */



    public function semester_II_uts()
    {
        return view('semester.semester_II.uts.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester II',
                'user_id' => auth()->user()->id
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_II_uts_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_II.uts.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_II_uts_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_II.uts.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_II_uts_mata_kuliah_store(Semester $semester, UtsRequest $utsRequest, Uts $uts)
    {
        $attr = $utsRequest->all();

        if (request()->file('file_uts')) {
            $file_uts = request()->file('file_uts')->store('Semester II/uts');
        } else {
            $file_uts = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uts'] = $file_uts;
        $attr['status'] = "belum";
        $uts->create($attr);

        session()->flash('success', 'Tambah Uts Berhasil!');
        return redirect("semester_II/uts/$semester->id");
    }

    public function semester_II_uts_mata_kuliah_show(Semester $semester, Uts $uts)
    {
        return view('semester.semester_II.uts.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_II_uts_mata_kuliah_delete(Semester $semester, Uts $uts)
    {
        \Storage::delete($uts->file_uts);
        \Storage::delete($uts->file_answer);
        $uts->delete();


        session()->flash('success', 'Delete Uts Berhasil!');
        return redirect("semester_II/uts/$semester->id");
    }

    public function semester_II_uts_mata_kuliah_update(Semester $semester, Uts $uts)
    {
        return view('semester.semester_II.uts.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_II_uts_mata_kuliah_edit(Semester $semester, Uts $uts, UtsRequest $utsRequest)
    {
        $attr = $utsRequest->all();

        if (request()->file('file_uts')) {
            \Storage::delete($uts->file_uts);
            $file_uts = request()->file('file_uts')->store('Semester II/uts');
        } else {
            $file_uts = $uts->file_uts;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uts'] = $file_uts;

        $uts->update($attr);

        session()->flash('success', 'Update Uts Berhasil!');
        return redirect("semester_II/uts/$semester->id");
    }

    public function semester_II_uts_mata_kuliah_download(Semester $semester, Uts $uts)
    {
        return \Storage::download($uts->file_uts);
    }

    public function semester_II_uts_mata_kuliah_answer(Semester $semester, Uts $uts)
    {
        return view('semester.semester_II.uts.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_II_uts_mata_kuliah_answer_uts(Semester $semester, Uts $uts)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($uts->file_answer);
            $answer = request()->file('file_answer')->store('Semester II/uts/answer');
        } else {
            $answer = $uts->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($uts->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $uts->update($attr);

        session()->flash('success', 'Upload Jawaban Uts Berhasil!');
        return redirect()->back();
    }

    public function semester_II_uts_mata_kuliah_download_answer(Semester $semester, Uts $uts)
    {
        return \Storage::download($uts->file_answer);
    }


    /* SEMESTER III */



    public function semester_III_uts()
    {
        return view('semester.semester_III.uts.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester III',
                'user_id' => auth()->user()->id
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_III_uts_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_III.uts.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_III_uts_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_III.uts.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_III_uts_mata_kuliah_store(Semester $semester, UtsRequest $utsRequest, Uts $uts)
    {
        $attr = $utsRequest->all();

        if (request()->file('file_uts')) {
            $file_uts = request()->file('file_uts')->store('Semester III/uts');
        } else {
            $file_uts = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uts'] = $file_uts;
        $attr['status'] = "belum";
        $uts->create($attr);

        session()->flash('success', 'Tambah Uts Berhasil!');
        return redirect("semester_III/uts/$semester->id");
    }

    public function semester_III_uts_mata_kuliah_show(Semester $semester, Uts $uts)
    {
        return view('semester.semester_III.uts.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_III_uts_mata_kuliah_delete(Semester $semester, Uts $uts)
    {
        \Storage::delete($uts->file_uts);
        \Storage::delete($uts->file_answer);
        $uts->delete();


        session()->flash('success', 'Delete Uts Berhasil!');
        return redirect("semester_III/uts/$semester->id");
    }

    public function semester_III_uts_mata_kuliah_update(Semester $semester, Uts $uts)
    {
        return view('semester.semester_III.uts.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_III_uts_mata_kuliah_edit(Semester $semester, Uts $uts, UtsRequest $utsRequest)
    {
        $attr = $utsRequest->all();

        if (request()->file('file_uts')) {
            \Storage::delete($uts->file_uts);
            $file_uts = request()->file('file_uts')->store('Semester III/uts');
        } else {
            $file_uts = $uts->file_uts;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uts'] = $file_uts;

        $uts->update($attr);

        session()->flash('success', 'Update Uts Berhasil!');
        return redirect("semester_III/uts/$semester->id");
    }

    public function semester_III_uts_mata_kuliah_download(Semester $semester, Uts $uts)
    {
        return \Storage::download($uts->file_uts);
    }

    public function semester_III_uts_mata_kuliah_answer(Semester $semester, Uts $uts)
    {
        return view('semester.semester_III.uts.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_III_uts_mata_kuliah_answer_uts(Semester $semester, Uts $uts)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($uts->file_answer);
            $answer = request()->file('file_answer')->store('Semester III/uts/answer');
        } else {
            $answer = $uts->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($uts->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $uts->update($attr);

        session()->flash('success', 'Upload Jawaban Uts Berhasil!');
        return redirect()->back();
    }

    public function semester_III_uts_mata_kuliah_download_answer(Semester $semester, Uts $uts)
    {
        return \Storage::download($uts->file_answer);
    }


    /* SEMESTER IV */



    public function semester_IV_uts()
    {
        return view('semester.semester_IV.uts.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester IV',
                'user_id' => auth()->user()->id
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_IV_uts_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_IV.uts.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_IV_uts_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_IV.uts.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_IV_uts_mata_kuliah_store(Semester $semester, UtsRequest $utsRequest, Uts $uts)
    {
        $attr = $utsRequest->all();

        if (request()->file('file_uts')) {
            $file_uts = request()->file('file_uts')->store('Semester IV/uts');
        } else {
            $file_uts = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uts'] = $file_uts;
        $attr['status'] = "belum";
        $uts->create($attr);

        session()->flash('success', 'Tambah Uts Berhasil!');
        return redirect("semester_IV/uts/$semester->id");
    }

    public function semester_IV_uts_mata_kuliah_show(Semester $semester, Uts $uts)
    {
        return view('semester.semester_IV.uts.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_IV_uts_mata_kuliah_delete(Semester $semester, Uts $uts)
    {
        \Storage::delete($uts->file_uts);
        \Storage::delete($uts->file_answer);
        $uts->delete();


        session()->flash('success', 'Delete Uts Berhasil!');
        return redirect("semester_IV/uts/$semester->id");
    }

    public function semester_IV_uts_mata_kuliah_update(Semester $semester, Uts $uts)
    {
        return view('semester.semester_IV.uts.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_IV_uts_mata_kuliah_edit(Semester $semester, Uts $uts, UtsRequest $utsRequest)
    {
        $attr = $utsRequest->all();

        if (request()->file('file_uts')) {
            \Storage::delete($uts->file_uts);
            $file_uts = request()->file('file_uts')->store('Semester IV/uts');
        } else {
            $file_uts = $uts->file_uts;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uts'] = $file_uts;

        $uts->update($attr);

        session()->flash('success', 'Update Uts Berhasil!');
        return redirect("semester_IV/uts/$semester->id");
    }

    public function semester_IV_uts_mata_kuliah_download(Semester $semester, Uts $uts)
    {
        return \Storage::download($uts->file_uts);
    }

    public function semester_IV_uts_mata_kuliah_answer(Semester $semester, Uts $uts)
    {
        return view('semester.semester_IV.uts.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_IV_uts_mata_kuliah_answer_uts(Semester $semester, Uts $uts)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($uts->file_answer);
            $answer = request()->file('file_answer')->store('Semester IV/uts/answer');
        } else {
            $answer = $uts->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($uts->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $uts->update($attr);

        session()->flash('success', 'Upload Jawaban Uts Berhasil!');
        return redirect()->back();
    }

    public function semester_IV_uts_mata_kuliah_download_answer(Semester $semester, Uts $uts)
    {
        return \Storage::download($uts->file_answer);
    }


    /* SEMESTER V */



    public function semester_V_uts()
    {
        return view('semester.semester_V.uts.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester V',
                'user_id' => auth()->user()->id
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_V_uts_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_V.uts.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_V_uts_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_V.uts.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_V_uts_mata_kuliah_store(Semester $semester, UtsRequest $utsRequest, Uts $uts)
    {
        $attr = $utsRequest->all();

        if (request()->file('file_uts')) {
            $file_uts = request()->file('file_uts')->store('Semester V/uts');
        } else {
            $file_uts = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uts'] = $file_uts;
        $attr['status'] = "belum";
        $uts->create($attr);

        session()->flash('success', 'Tambah Uts Berhasil!');
        return redirect("semester_V/uts/$semester->id");
    }

    public function semester_V_uts_mata_kuliah_show(Semester $semester, Uts $uts)
    {
        return view('semester.semester_V.uts.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_V_uts_mata_kuliah_delete(Semester $semester, Uts $uts)
    {
        \Storage::delete($uts->file_uts);
        \Storage::delete($uts->file_answer);
        $uts->delete();


        session()->flash('success', 'Delete Uts Berhasil!');
        return redirect("semester_V/uts/$semester->id");
    }

    public function semester_V_uts_mata_kuliah_update(Semester $semester, Uts $uts)
    {
        return view('semester.semester_V.uts.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_V_uts_mata_kuliah_edit(Semester $semester, Uts $uts, UtsRequest $utsRequest)
    {
        $attr = $utsRequest->all();

        if (request()->file('file_uts')) {
            \Storage::delete($uts->file_uts);
            $file_uts = request()->file('file_uts')->store('Semester V/uts');
        } else {
            $file_uts = $uts->file_uts;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uts'] = $file_uts;

        $uts->update($attr);

        session()->flash('success', 'Update Uts Berhasil!');
        return redirect("semester_V/uts/$semester->id");
    }

    public function semester_V_uts_mata_kuliah_download(Semester $semester, Uts $uts)
    {
        return \Storage::download($uts->file_uts);
    }

    public function semester_V_uts_mata_kuliah_answer(Semester $semester, Uts $uts)
    {
        return view('semester.semester_V.uts.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_V_uts_mata_kuliah_answer_uts(Semester $semester, Uts $uts)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($uts->file_answer);
            $answer = request()->file('file_answer')->store('Semester V/uts/answer');
        } else {
            $answer = $uts->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($uts->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $uts->update($attr);

        session()->flash('success', 'Upload Jawaban Uts Berhasil!');
        return redirect()->back();
    }

    public function semester_V_uts_mata_kuliah_download_answer(Semester $semester, Uts $uts)
    {
        return \Storage::download($uts->file_answer);
    }


    /* SEMESTER VI */



    public function semester_VI_uts()
    {
        return view('semester.semester_VI.uts.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester VI',
                'user_id' => auth()->user()->id
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_VI_uts_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_VI.uts.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_VI_uts_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_VI.uts.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_VI_uts_mata_kuliah_store(Semester $semester, UtsRequest $utsRequest, Uts $uts)
    {
        $attr = $utsRequest->all();

        if (request()->file('file_uts')) {
            $file_uts = request()->file('file_uts')->store('Semester VI/uts');
        } else {
            $file_uts = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uts'] = $file_uts;
        $attr['status'] = "belum";
        $uts->create($attr);

        session()->flash('success', 'Tambah Uts Berhasil!');
        return redirect("semester_VI/uts/$semester->id");
    }

    public function semester_VI_uts_mata_kuliah_show(Semester $semester, Uts $uts)
    {
        return view('semester.semester_VI.uts.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_VI_uts_mata_kuliah_delete(Semester $semester, Uts $uts)
    {
        \Storage::delete($uts->file_uts);
        \Storage::delete($uts->file_answer);
        $uts->delete();


        session()->flash('success', 'Delete Uts Berhasil!');
        return redirect("semester_VI/uts/$semester->id");
    }

    public function semester_VI_uts_mata_kuliah_update(Semester $semester, Uts $uts)
    {
        return view('semester.semester_VI.uts.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_VI_uts_mata_kuliah_edit(Semester $semester, Uts $uts, UtsRequest $utsRequest)
    {
        $attr = $utsRequest->all();

        if (request()->file('file_uts')) {
            \Storage::delete($uts->file_uts);
            $file_uts = request()->file('file_uts')->store('Semester VI/uts');
        } else {
            $file_uts = $uts->file_uts;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uts'] = $file_uts;

        $uts->update($attr);

        session()->flash('success', 'Update Uts Berhasil!');
        return redirect("semester_VI/uts/$semester->id");
    }

    public function semester_VI_uts_mata_kuliah_download(Semester $semester, Uts $uts)
    {
        return \Storage::download($uts->file_uts);
    }

    public function semester_VI_uts_mata_kuliah_answer(Semester $semester, Uts $uts)
    {
        return view('semester.semester_VI.uts.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_VI_uts_mata_kuliah_answer_uts(Semester $semester, Uts $uts)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($uts->file_answer);
            $answer = request()->file('file_answer')->store('Semester VI/uts/answer');
        } else {
            $answer = $uts->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($uts->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $uts->update($attr);

        session()->flash('success', 'Upload Jawaban Uts Berhasil!');
        return redirect()->back();
    }

    public function semester_VI_uts_mata_kuliah_download_answer(Semester $semester, Uts $uts)
    {
        return \Storage::download($uts->file_answer);
    }


    /* SEMESTER VII */



    public function semester_VII_uts()
    {
        return view('semester.semester_VII.uts.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester VII',
                'user_id' => auth()->user()->id
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_VII_uts_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_VII.uts.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_VII_uts_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_VII.uts.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_VII_uts_mata_kuliah_store(Semester $semester, UtsRequest $utsRequest, Uts $uts)
    {
        $attr = $utsRequest->all();

        if (request()->file('file_uts')) {
            $file_uts = request()->file('file_uts')->store('Semester VII/uts');
        } else {
            $file_uts = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uts'] = $file_uts;
        $attr['status'] = "belum";
        $uts->create($attr);

        session()->flash('success', 'Tambah Uts Berhasil!');
        return redirect("semester_VII/uts/$semester->id");
    }

    public function semester_VII_uts_mata_kuliah_show(Semester $semester, Uts $uts)
    {
        return view('semester.semester_VII.uts.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_VII_uts_mata_kuliah_delete(Semester $semester, Uts $uts)
    {
        \Storage::delete($uts->file_uts);
        \Storage::delete($uts->file_answer);
        $uts->delete();


        session()->flash('success', 'Delete Uts Berhasil!');
        return redirect("semester_VII/uts/$semester->id");
    }

    public function semester_VII_uts_mata_kuliah_update(Semester $semester, Uts $uts)
    {
        return view('semester.semester_VII.uts.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_VII_uts_mata_kuliah_edit(Semester $semester, Uts $uts, UtsRequest $utsRequest)
    {
        $attr = $utsRequest->all();

        if (request()->file('file_uts')) {
            \Storage::delete($uts->file_uts);
            $file_uts = request()->file('file_uts')->store('Semester VII/uts');
        } else {
            $file_uts = $uts->file_uts;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uts'] = $file_uts;

        $uts->update($attr);

        session()->flash('success', 'Update Uts Berhasil!');
        return redirect("semester_VII/uts/$semester->id");
    }

    public function semester_VII_uts_mata_kuliah_download(Semester $semester, Uts $uts)
    {
        return \Storage::download($uts->file_uts);
    }

    public function semester_VII_uts_mata_kuliah_answer(Semester $semester, Uts $uts)
    {
        return view('semester.semester_VII.uts.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_VII_uts_mata_kuliah_answer_uts(Semester $semester, Uts $uts)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($uts->file_answer);
            $answer = request()->file('file_answer')->store('Semester VII/uts/answer');
        } else {
            $answer = $uts->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($uts->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $uts->update($attr);

        session()->flash('success', 'Upload Jawaban Uts Berhasil!');
        return redirect()->back();
    }

    public function semester_VII_uts_mata_kuliah_download_answer(Semester $semester, Uts $uts)
    {
        return \Storage::download($uts->file_answer);
    }


    /* SEMESTER VIII */



    public function semester_VIII_uts()
    {
        return view('semester.semester_VIII.uts.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester VIII',
                'user_id' => auth()->user()->id
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_VIII_uts_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_VIII.uts.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_VIII_uts_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_VIII.uts.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_VIII_uts_mata_kuliah_store(Semester $semester, UtsRequest $utsRequest, Uts $uts)
    {
        $attr = $utsRequest->all();

        if (request()->file('file_uts')) {
            $file_uts = request()->file('file_uts')->store('Semester VIII/uts');
        } else {
            $file_uts = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uts'] = $file_uts;
        $attr['status'] = "belum";
        $uts->create($attr);

        session()->flash('success', 'Tambah Uts Berhasil!');
        return redirect("semester_VIII/uts/$semester->id");
    }

    public function semester_VIII_uts_mata_kuliah_show(Semester $semester, Uts $uts)
    {
        return view('semester.semester_VIII.uts.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_VIII_uts_mata_kuliah_delete(Semester $semester, Uts $uts)
    {
        \Storage::delete($uts->file_uts);
        \Storage::delete($uts->file_answer);
        $uts->delete();


        session()->flash('success', 'Delete Uts Berhasil!');
        return redirect("semester_VIII/uts/$semester->id");
    }

    public function semester_VIII_uts_mata_kuliah_update(Semester $semester, Uts $uts)
    {
        return view('semester.semester_VIII.uts.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_VIII_uts_mata_kuliah_edit(Semester $semester, Uts $uts, UtsRequest $utsRequest)
    {
        $attr = $utsRequest->all();

        if (request()->file('file_uts')) {
            \Storage::delete($uts->file_uts);
            $file_uts = request()->file('file_uts')->store('Semester VIII/uts');
        } else {
            $file_uts = $uts->file_uts;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uts'] = $file_uts;

        $uts->update($attr);

        session()->flash('success', 'Update Uts Berhasil!');
        return redirect("semester_VIII/uts/$semester->id");
    }

    public function semester_VIII_uts_mata_kuliah_download(Semester $semester, Uts $uts)
    {
        return \Storage::download($uts->file_uts);
    }

    public function semester_VIII_uts_mata_kuliah_answer(Semester $semester, Uts $uts)
    {
        return view('semester.semester_VIII.uts.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'uts' => $uts
        ]);
    }

    public function semester_VIII_uts_mata_kuliah_answer_uts(Semester $semester, Uts $uts)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($uts->file_answer);
            $answer = request()->file('file_answer')->store('Semester VIII/uts/answer');
        } else {
            $answer = $uts->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($uts->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $uts->update($attr);

        session()->flash('success', 'Upload Jawaban Uts Berhasil!');
        return redirect()->back();
    }

    public function semester_VIII_uts_mata_kuliah_download_answer(Semester $semester, Uts $uts)
    {
        return \Storage::download($uts->file_answer);
    }
}
