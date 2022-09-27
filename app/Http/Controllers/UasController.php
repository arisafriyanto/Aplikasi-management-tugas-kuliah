<?php

namespace App\Http\Controllers;

use App\Http\Requests\UasRequest;
use App\{Semester, Uas};

class UasController extends Controller
{
    public function semester_I_uas()
    {
        return view('semester.semester_I.uas.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester I',
                'user_id' => auth()->user()->id,
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_I_uas_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_I.uas.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_I_uas_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_I.uas.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_I_uas_mata_kuliah_store(Semester $semester, UasRequest $uasRequest, Uas $uas)
    {
        $attr = $uasRequest->all();

        if (request()->file('file_uas')) {
            $file_uas = request()->file('file_uas')->store('Semester I/uas');
        } else {
            $file_uas = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uas'] = $file_uas;
        $attr['status'] = "belum";
        $uas->create($attr);

        session()->flash('success', 'Tambah Uas Berhasil!');
        return redirect("semester_I/uas/$semester->id");
    }

    public function semester_I_uas_mata_kuliah_show(Semester $semester, Uas $uas)
    {
        return view('semester.semester_I.uas.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_I_uas_mata_kuliah_delete(Semester $semester, Uas $uas)
    {
        \Storage::delete($uas->file_uas);
        \Storage::delete($uas->file_answer);
        $uas->delete();


        session()->flash('success', 'Delete Uas Berhasil!');
        return redirect("semester_I/uas/$semester->id");
    }

    public function semester_I_uas_mata_kuliah_update(Semester $semester, Uas $uas)
    {
        return view('semester.semester_I.uas.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_I_uas_mata_kuliah_edit(Semester $semester, Uas $uas, UasRequest $uasRequest)
    {
        $attr = $uasRequest->all();

        if (request()->file('file_uas')) {
            \Storage::delete($uas->file_uas);
            $file_uas = request()->file('file_uas')->store('Semester I/uas');
        } else {
            $file_uas = $uas->file_uas;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uas'] = $file_uas;

        $uas->update($attr);

        session()->flash('success', 'Update Uas Berhasil!');
        return redirect("semester_I/uas/$semester->id");
    }

    public function semester_I_uas_mata_kuliah_download(Semester $semester, Uas $uas)
    {
        return \Storage::download($uas->file_uas);
    }

    public function semester_I_uas_mata_kuliah_answer(Semester $semester, Uas $uas)
    {
        return view('semester.semester_I.uas.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_I_uas_mata_kuliah_answer_uas(Semester $semester, Uas $uas)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($uas->file_answer);
            $answer = request()->file('file_answer')->store('Semester I/uas/answer');
        } else {
            $answer = $uas->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($uas->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $uas->update($attr);

        session()->flash('success', 'Upload Jawaban Uas Berhasil!');
        return redirect()->back();
    }

    public function semester_I_uas_mata_kuliah_download_answer(Semester $semester, Uas $uas)
    {
        return \Storage::download($uas->file_answer);
    }

    /* SEMESTER II */


    public function semester_II_uas()
    {
        return view('semester.semester_II.uas.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester II',
                'user_id' => auth()->user()->id,
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_II_uas_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_II.uas.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_II_uas_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_II.uas.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_II_uas_mata_kuliah_store(Semester $semester, UasRequest $uasRequest, Uas $uas)
    {
        $attr = $uasRequest->all();

        if (request()->file('file_uas')) {
            $file_uas = request()->file('file_uas')->store('Semester II/uas');
        } else {
            $file_uas = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uas'] = $file_uas;
        $attr['status'] = "belum";
        $uas->create($attr);

        session()->flash('success', 'Tambah Uas Berhasil!');
        return redirect("semester_II/uas/$semester->id");
    }

    public function semester_II_uas_mata_kuliah_show(Semester $semester, Uas $uas)
    {
        return view('semester.semester_II.uas.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_II_uas_mata_kuliah_delete(Semester $semester, Uas $uas)
    {
        \Storage::delete($uas->file_uas);
        \Storage::delete($uas->file_answer);
        $uas->delete();


        session()->flash('success', 'Delete Uas Berhasil!');
        return redirect("semester_II/uas/$semester->id");
    }

    public function semester_II_uas_mata_kuliah_update(Semester $semester, Uas $uas)
    {
        return view('semester.semester_II.uas.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_II_uas_mata_kuliah_edit(Semester $semester, Uas $uas, UasRequest $uasRequest)
    {
        $attr = $uasRequest->all();

        if (request()->file('file_uas')) {
            \Storage::delete($uas->file_uas);
            $file_uas = request()->file('file_uas')->store('Semester II/uas');
        } else {
            $file_uas = $uas->file_uas;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uas'] = $file_uas;

        $uas->update($attr);

        session()->flash('success', 'Update Uas Berhasil!');
        return redirect("semester_II/uas/$semester->id");
    }

    public function semester_II_uas_mata_kuliah_download(Semester $semester, Uas $uas)
    {
        return \Storage::download($uas->file_uas);
    }

    public function semester_II_uas_mata_kuliah_answer(Semester $semester, Uas $uas)
    {
        return view('semester.semester_II.uas.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_II_uas_mata_kuliah_answer_uas(Semester $semester, Uas $uas)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($uas->file_answer);
            $answer = request()->file('file_answer')->store('Semester II/uas/answer');
        } else {
            $answer = $uas->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($uas->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $uas->update($attr);

        session()->flash('success', 'Upload Jawaban Uas Berhasil!');
        return redirect()->back();
    }

    public function semester_II_uas_mata_kuliah_download_answer(Semester $semester, Uas $uas)
    {
        return \Storage::download($uas->file_answer);
    }



    /* SEMESTER III */


    public function semester_III_uas()
    {
        return view('semester.semester_III.uas.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester III',
                'user_id' => auth()->user()->id,
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_III_uas_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_III.uas.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_III_uas_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_III.uas.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_III_uas_mata_kuliah_store(Semester $semester, UasRequest $uasRequest, Uas $uas)
    {
        $attr = $uasRequest->all();

        if (request()->file('file_uas')) {
            $file_uas = request()->file('file_uas')->store('Semester III/uas');
        } else {
            $file_uas = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uas'] = $file_uas;
        $attr['status'] = "belum";
        $uas->create($attr);

        session()->flash('success', 'Tambah Uas Berhasil!');
        return redirect("semester_III/uas/$semester->id");
    }

    public function semester_III_uas_mata_kuliah_show(Semester $semester, Uas $uas)
    {
        return view('semester.semester_III.uas.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_III_uas_mata_kuliah_delete(Semester $semester, Uas $uas)
    {
        \Storage::delete($uas->file_uas);
        \Storage::delete($uas->file_answer);
        $uas->delete();


        session()->flash('success', 'Delete Uas Berhasil!');
        return redirect("semester_III/uas/$semester->id");
    }

    public function semester_III_uas_mata_kuliah_update(Semester $semester, Uas $uas)
    {
        return view('semester.semester_III.uas.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_III_uas_mata_kuliah_edit(Semester $semester, Uas $uas, UasRequest $uasRequest)
    {
        $attr = $uasRequest->all();

        if (request()->file('file_uas')) {
            \Storage::delete($uas->file_uas);
            $file_uas = request()->file('file_uas')->store('Semester III/uas');
        } else {
            $file_uas = $uas->file_uas;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uas'] = $file_uas;

        $uas->update($attr);

        session()->flash('success', 'Update Uas Berhasil!');
        return redirect("semester_III/uas/$semester->id");
    }

    public function semester_III_uas_mata_kuliah_download(Semester $semester, Uas $uas)
    {
        return \Storage::download($uas->file_uas);
    }

    public function semester_III_uas_mata_kuliah_answer(Semester $semester, Uas $uas)
    {
        return view('semester.semester_III.uas.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_III_uas_mata_kuliah_answer_uas(Semester $semester, Uas $uas)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($uas->file_answer);
            $answer = request()->file('file_answer')->store('Semester III/uas/answer');
        } else {
            $answer = $uas->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($uas->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $uas->update($attr);

        session()->flash('success', 'Upload Jawaban Uas Berhasil!');
        return redirect()->back();
    }

    public function semester_III_uas_mata_kuliah_download_answer(Semester $semester, Uas $uas)
    {
        return \Storage::download($uas->file_answer);
    }



    /* SEMESTER IV */


    public function semester_IV_uas()
    {
        return view('semester.semester_IV.uas.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester IV',
                'user_id' => auth()->user()->id,
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_IV_uas_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_IV.uas.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_IV_uas_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_IV.uas.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_IV_uas_mata_kuliah_store(Semester $semester, UasRequest $uasRequest, Uas $uas)
    {
        $attr = $uasRequest->all();

        if (request()->file('file_uas')) {
            $file_uas = request()->file('file_uas')->store('Semester IV/uas');
        } else {
            $file_uas = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uas'] = $file_uas;
        $attr['status'] = "belum";
        $uas->create($attr);

        session()->flash('success', 'Tambah Uas Berhasil!');
        return redirect("semester_IV/uas/$semester->id");
    }

    public function semester_IV_uas_mata_kuliah_show(Semester $semester, Uas $uas)
    {
        return view('semester.semester_IV.uas.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_IV_uas_mata_kuliah_delete(Semester $semester, Uas $uas)
    {
        \Storage::delete($uas->file_uas);
        \Storage::delete($uas->file_answer);
        $uas->delete();


        session()->flash('success', 'Delete Uas Berhasil!');
        return redirect("semester_IV/uas/$semester->id");
    }

    public function semester_IV_uas_mata_kuliah_update(Semester $semester, Uas $uas)
    {
        return view('semester.semester_IV.uas.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_IV_uas_mata_kuliah_edit(Semester $semester, Uas $uas, UasRequest $uasRequest)
    {
        $attr = $uasRequest->all();

        if (request()->file('file_uas')) {
            \Storage::delete($uas->file_uas);
            $file_uas = request()->file('file_uas')->store('Semester IV/uas');
        } else {
            $file_uas = $uas->file_uas;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uas'] = $file_uas;

        $uas->update($attr);

        session()->flash('success', 'Update Uas Berhasil!');
        return redirect("semester_IV/uas/$semester->id");
    }

    public function semester_IV_uas_mata_kuliah_download(Semester $semester, Uas $uas)
    {
        return \Storage::download($uas->file_uas);
    }

    public function semester_IV_uas_mata_kuliah_answer(Semester $semester, Uas $uas)
    {
        return view('semester.semester_IV.uas.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_IV_uas_mata_kuliah_answer_uas(Semester $semester, Uas $uas)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($uas->file_answer);
            $answer = request()->file('file_answer')->store('Semester IV/uas/answer');
        } else {
            $answer = $uas->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($uas->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $uas->update($attr);

        session()->flash('success', 'Upload Jawaban Uas Berhasil!');
        return redirect()->back();
    }

    public function semester_IV_uas_mata_kuliah_download_answer(Semester $semester, Uas $uas)
    {
        return \Storage::download($uas->file_answer);
    }



    /* SEMESTER V */


    public function semester_V_uas()
    {
        return view('semester.semester_V.uas.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester V',
                'user_id' => auth()->user()->id,
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_V_uas_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_V.uas.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_V_uas_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_V.uas.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_V_uas_mata_kuliah_store(Semester $semester, UasRequest $uasRequest, Uas $uas)
    {
        $attr = $uasRequest->all();

        if (request()->file('file_uas')) {
            $file_uas = request()->file('file_uas')->store('Semester V/uas');
        } else {
            $file_uas = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uas'] = $file_uas;
        $attr['status'] = "belum";
        $uas->create($attr);

        session()->flash('success', 'Tambah Uas Berhasil!');
        return redirect("semester_V/uas/$semester->id");
    }

    public function semester_V_uas_mata_kuliah_show(Semester $semester, Uas $uas)
    {
        return view('semester.semester_V.uas.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_V_uas_mata_kuliah_delete(Semester $semester, Uas $uas)
    {
        \Storage::delete($uas->file_uas);
        \Storage::delete($uas->file_answer);
        $uas->delete();


        session()->flash('success', 'Delete Uas Berhasil!');
        return redirect("semester_V/uas/$semester->id");
    }

    public function semester_V_uas_mata_kuliah_update(Semester $semester, Uas $uas)
    {
        return view('semester.semester_V.uas.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_V_uas_mata_kuliah_edit(Semester $semester, Uas $uas, UasRequest $uasRequest)
    {
        $attr = $uasRequest->all();

        if (request()->file('file_uas')) {
            \Storage::delete($uas->file_uas);
            $file_uas = request()->file('file_uas')->store('Semester V/uas');
        } else {
            $file_uas = $uas->file_uas;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uas'] = $file_uas;

        $uas->update($attr);

        session()->flash('success', 'Update Uas Berhasil!');
        return redirect("semester_V/uas/$semester->id");
    }

    public function semester_V_uas_mata_kuliah_download(Semester $semester, Uas $uas)
    {
        return \Storage::download($uas->file_uas);
    }

    public function semester_V_uas_mata_kuliah_answer(Semester $semester, Uas $uas)
    {
        return view('semester.semester_V.uas.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_V_uas_mata_kuliah_answer_uas(Semester $semester, Uas $uas)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($uas->file_answer);
            $answer = request()->file('file_answer')->store('Semester V/uas/answer');
        } else {
            $answer = $uas->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($uas->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $uas->update($attr);

        session()->flash('success', 'Upload Jawaban Uas Berhasil!');
        return redirect()->back();
    }

    public function semester_V_uas_mata_kuliah_download_answer(Semester $semester, Uas $uas)
    {
        return \Storage::download($uas->file_answer);
    }



    /* SEMESTER VI */


    public function semester_VI_uas()
    {
        return view('semester.semester_VI.uas.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester VI',
                'user_id' => auth()->user()->id,
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_VI_uas_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_VI.uas.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_VI_uas_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_VI.uas.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_VI_uas_mata_kuliah_store(Semester $semester, UasRequest $uasRequest, Uas $uas)
    {
        $attr = $uasRequest->all();

        if (request()->file('file_uas')) {
            $file_uas = request()->file('file_uas')->store('Semester VI/uas');
        } else {
            $file_uas = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uas'] = $file_uas;
        $attr['status'] = "belum";
        $uas->create($attr);

        session()->flash('success', 'Tambah Uas Berhasil!');
        return redirect("semester_VI/uas/$semester->id");
    }

    public function semester_VI_uas_mata_kuliah_show(Semester $semester, Uas $uas)
    {
        return view('semester.semester_VI.uas.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_VI_uas_mata_kuliah_delete(Semester $semester, Uas $uas)
    {
        \Storage::delete($uas->file_uas);
        \Storage::delete($uas->file_answer);
        $uas->delete();


        session()->flash('success', 'Delete Uas Berhasil!');
        return redirect("semester_VI/uas/$semester->id");
    }

    public function semester_VI_uas_mata_kuliah_update(Semester $semester, Uas $uas)
    {
        return view('semester.semester_VI.uas.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_VI_uas_mata_kuliah_edit(Semester $semester, Uas $uas, UasRequest $uasRequest)
    {
        $attr = $uasRequest->all();

        if (request()->file('file_uas')) {
            \Storage::delete($uas->file_uas);
            $file_uas = request()->file('file_uas')->store('Semester VI/uas');
        } else {
            $file_uas = $uas->file_uas;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uas'] = $file_uas;

        $uas->update($attr);

        session()->flash('success', 'Update Uas Berhasil!');
        return redirect("semester_VI/uas/$semester->id");
    }

    public function semester_VI_uas_mata_kuliah_download(Semester $semester, Uas $uas)
    {
        return \Storage::download($uas->file_uas);
    }

    public function semester_VI_uas_mata_kuliah_answer(Semester $semester, Uas $uas)
    {
        return view('semester.semester_VI.uas.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_VI_uas_mata_kuliah_answer_uas(Semester $semester, Uas $uas)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($uas->file_answer);
            $answer = request()->file('file_answer')->store('Semester VI/uas/answer');
        } else {
            $answer = $uas->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($uas->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $uas->update($attr);

        session()->flash('success', 'Upload Jawaban Uas Berhasil!');
        return redirect()->back();
    }

    public function semester_VI_uas_mata_kuliah_download_answer(Semester $semester, Uas $uas)
    {
        return \Storage::download($uas->file_answer);
    }



    /* SEMESTER VII */


    public function semester_VII_uas()
    {
        return view('semester.semester_VII.uas.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester VII',
                'user_id' => auth()->user()->id,
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_VII_uas_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_VII.uas.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_VII_uas_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_VII.uas.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_VII_uas_mata_kuliah_store(Semester $semester, UasRequest $uasRequest, Uas $uas)
    {
        $attr = $uasRequest->all();

        if (request()->file('file_uas')) {
            $file_uas = request()->file('file_uas')->store('Semester VII/uas');
        } else {
            $file_uas = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uas'] = $file_uas;
        $attr['status'] = "belum";
        $uas->create($attr);

        session()->flash('success', 'Tambah Uas Berhasil!');
        return redirect("semester_VII/uas/$semester->id");
    }

    public function semester_VII_uas_mata_kuliah_show(Semester $semester, Uas $uas)
    {
        return view('semester.semester_VII.uas.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_VII_uas_mata_kuliah_delete(Semester $semester, Uas $uas)
    {
        \Storage::delete($uas->file_uas);
        \Storage::delete($uas->file_answer);
        $uas->delete();


        session()->flash('success', 'Delete Uas Berhasil!');
        return redirect("semester_VII/uas/$semester->id");
    }

    public function semester_VII_uas_mata_kuliah_update(Semester $semester, Uas $uas)
    {
        return view('semester.semester_VII.uas.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_VII_uas_mata_kuliah_edit(Semester $semester, Uas $uas, UasRequest $uasRequest)
    {
        $attr = $uasRequest->all();

        if (request()->file('file_uas')) {
            \Storage::delete($uas->file_uas);
            $file_uas = request()->file('file_uas')->store('Semester VII/uas');
        } else {
            $file_uas = $uas->file_uas;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uas'] = $file_uas;

        $uas->update($attr);

        session()->flash('success', 'Update Uas Berhasil!');
        return redirect("semester_VII/uas/$semester->id");
    }

    public function semester_VII_uas_mata_kuliah_download(Semester $semester, Uas $uas)
    {
        return \Storage::download($uas->file_uas);
    }

    public function semester_VII_uas_mata_kuliah_answer(Semester $semester, Uas $uas)
    {
        return view('semester.semester_VII.uas.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_VII_uas_mata_kuliah_answer_uas(Semester $semester, Uas $uas)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($uas->file_answer);
            $answer = request()->file('file_answer')->store('Semester VII/uas/answer');
        } else {
            $answer = $uas->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($uas->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $uas->update($attr);

        session()->flash('success', 'Upload Jawaban Uas Berhasil!');
        return redirect()->back();
    }

    public function semester_VII_uas_mata_kuliah_download_answer(Semester $semester, Uas $uas)
    {
        return \Storage::download($uas->file_answer);
    }



    /* SEMESTER VIII */


    public function semester_VIII_uas()
    {
        return view('semester.semester_VIII.uas.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester VIII',
                'user_id' => auth()->user()->id,
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_VIII_uas_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_VIII.uas.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_VIII_uas_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_VIII.uas.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_VIII_uas_mata_kuliah_store(Semester $semester, UasRequest $uasRequest, Uas $uas)
    {
        $attr = $uasRequest->all();

        if (request()->file('file_uas')) {
            $file_uas = request()->file('file_uas')->store('Semester VIII/uas');
        } else {
            $file_uas = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uas'] = $file_uas;
        $attr['status'] = "belum";
        $uas->create($attr);

        session()->flash('success', 'Tambah Uas Berhasil!');
        return redirect("semester_VIII/uas/$semester->id");
    }

    public function semester_VIII_uas_mata_kuliah_show(Semester $semester, Uas $uas)
    {
        return view('semester.semester_VIII.uas.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_VIII_uas_mata_kuliah_delete(Semester $semester, Uas $uas)
    {
        \Storage::delete($uas->file_uas);
        \Storage::delete($uas->file_answer);
        $uas->delete();


        session()->flash('success', 'Delete Uas Berhasil!');
        return redirect("semester_VIII/uas/$semester->id");
    }

    public function semester_VIII_uas_mata_kuliah_update(Semester $semester, Uas $uas)
    {
        return view('semester.semester_VIII.uas.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_VIII_uas_mata_kuliah_edit(Semester $semester, Uas $uas, UasRequest $uasRequest)
    {
        $attr = $uasRequest->all();

        if (request()->file('file_uas')) {
            \Storage::delete($uas->file_uas);
            $file_uas = request()->file('file_uas')->store('Semester VIII/uas');
        } else {
            $file_uas = $uas->file_uas;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_uas'] = $file_uas;

        $uas->update($attr);

        session()->flash('success', 'Update Uas Berhasil!');
        return redirect("semester_VIII/uas/$semester->id");
    }

    public function semester_VIII_uas_mata_kuliah_download(Semester $semester, Uas $uas)
    {
        return \Storage::download($uas->file_uas);
    }

    public function semester_VIII_uas_mata_kuliah_answer(Semester $semester, Uas $uas)
    {
        return view('semester.semester_VIII.uas.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'uas' => $uas
        ]);
    }

    public function semester_VIII_uas_mata_kuliah_answer_uas(Semester $semester, Uas $uas)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($uas->file_answer);
            $answer = request()->file('file_answer')->store('Semester VIII/uas/answer');
        } else {
            $answer = $uas->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($uas->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $uas->update($attr);

        session()->flash('success', 'Upload Jawaban Uas Berhasil!');
        return redirect()->back();
    }

    public function semester_VIII_uas_mata_kuliah_download_answer(Semester $semester, Uas $uas)
    {
        return \Storage::download($uas->file_answer);
    }
}
