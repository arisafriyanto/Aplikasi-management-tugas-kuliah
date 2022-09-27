<?php

namespace App\Http\Controllers;

use App\Http\Requests\TugasRequest;
use App\{Semester, Tugas};

class TugasController extends Controller
{
    public function semester_I_tugas()
    {
        return view('semester.semester_I.tugas.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester I',
                'user_id' => auth()->user()->id,
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_I_tugas_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_I.tugas.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_I_tugas_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_I.tugas.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_I_tugas_mata_kuliah_store(TugasRequest $tugasRequest, Tugas $tugas, Semester $semester)
    {
        $attr = $tugasRequest->all();

        if (request()->file('file_tugas')) {
            $file_tugas = request()->file('file_tugas')->store('Semester I/tugas');
        } else {
            $file_tugas = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_tugas'] = $file_tugas;
        $attr['status'] = "belum";
        $tugas->create($attr);

        session()->flash('success', 'Tambah Tugas Berhasil!');
        return redirect("semester_I/tugas/$semester->id");
    }

    public function semester_I_tugas_mata_kuliah_show(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_I.tugas.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_I_tugas_mata_kuliah_delete(Semester $semester, Tugas $tugas)
    {
        \Storage::delete($tugas->file_tugas);
        \Storage::delete($tugas->file_answer);
        $tugas->delete();


        session()->flash('success', 'Delete Tugas Berhasil!');
        return redirect("semester_I/tugas/$semester->id");
    }

    public function semester_I_tugas_mata_kuliah_update(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_I.tugas.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_I_tugas_mata_kuliah_edit(Semester $semester, Tugas $tugas, TugasRequest $tugasRequest)
    {
        $attr = $tugasRequest->all();

        if (request()->file('file_tugas')) {
            \Storage::delete($tugas->file_tugas);
            $file_tugas = request()->file('file_tugas')->store('Semester I/tugas');
        } else {
            $file_tugas = $tugas->file_tugas;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_tugas'] = $file_tugas;

        $tugas->update($attr);

        session()->flash('success', 'Update Tugas Berhasil!');
        return redirect("semester_I/tugas/$semester->id");
    }

    public function semester_I_tugas_mata_kuliah_download(Semester $semester, Tugas $tugas)
    {
        return \Storage::download($tugas->file_tugas);
    }

    public function semester_I_tugas_mata_kuliah_answer(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_I.tugas.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_I_tugas_mata_kuliah_answer_tugas(Semester $semester, Tugas $tugas)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($tugas->file_answer);
            $answer = request()->file('file_answer')->store('Semester I/tugas/answer');
        } else {
            $answer = $tugas->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($tugas->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $tugas->update($attr);

        session()->flash('success', 'Upload Jawaban Berhasil!');
        return redirect()->back();
    }

    public function semester_I_tugas_mata_kuliah_download_answer(Semester $semester, Tugas $tugas)
    {
        return \Storage::download($tugas->file_answer);
    }


    /* SEMESTER II */


    public function semester_II_tugas()
    {
        return view('semester.semester_II.tugas.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester II',
                'user_id' => auth()->user()->id,
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_II_tugas_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_II.tugas.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_II_tugas_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_II.tugas.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_II_tugas_mata_kuliah_store(TugasRequest $tugasRequest, Tugas $tugas, Semester $semester)
    {
        $attr = $tugasRequest->all();

        if (request()->file('file_tugas')) {
            $file_tugas = request()->file('file_tugas')->store('Semester II/tugas');
        } else {
            $file_tugas = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_tugas'] = $file_tugas;
        $attr['status'] = "belum";
        $tugas->create($attr);

        session()->flash('success', 'Tambah Tugas Berhasil!');
        return redirect("semester_II/tugas/$semester->id");
    }

    public function semester_II_tugas_mata_kuliah_show(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_II.tugas.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_II_tugas_mata_kuliah_delete(Semester $semester, Tugas $tugas)
    {
        \Storage::delete($tugas->file_tugas);
        \Storage::delete($tugas->file_answer);
        $tugas->delete();


        session()->flash('success', 'Delete Tugas Berhasil!');
        return redirect("semester_II/tugas/$semester->id");
    }

    public function semester_II_tugas_mata_kuliah_update(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_II.tugas.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_II_tugas_mata_kuliah_edit(Semester $semester, Tugas $tugas, TugasRequest $tugasRequest)
    {
        $attr = $tugasRequest->all();

        if (request()->file('file_tugas')) {
            \Storage::delete($tugas->file_tugas);
            $file_tugas = request()->file('file_tugas')->store('Semester II/tugas');
        } else {
            $file_tugas = $tugas->file_tugas;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_tugas'] = $file_tugas;

        $tugas->update($attr);

        session()->flash('success', 'Update Tugas Berhasil!');
        return redirect("semester_II/tugas/$semester->id");
    }

    public function semester_II_tugas_mata_kuliah_download(Semester $semester, Tugas $tugas)
    {
        return \Storage::download($tugas->file_tugas);
    }

    public function semester_II_tugas_mata_kuliah_answer(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_II.tugas.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_II_tugas_mata_kuliah_answer_tugas(Semester $semester, Tugas $tugas)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($tugas->file_answer);
            $answer = request()->file('file_answer')->store('Semester II/tugas/answer');
        } else {
            $answer = $tugas->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($tugas->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $tugas->update($attr);

        session()->flash('success', 'Upload Jawaban Berhasil!');
        return redirect()->back();
    }

    public function semester_II_tugas_mata_kuliah_download_answer(Semester $semester, Tugas $tugas)
    {
        return \Storage::download($tugas->file_answer);
    }


    /* SEMESTER III */


    public function semester_III_tugas()
    {
        return view('semester.semester_III.tugas.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester III',
                'user_id' => auth()->user()->id,
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_III_tugas_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_III.tugas.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_III_tugas_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_III.tugas.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_III_tugas_mata_kuliah_store(TugasRequest $tugasRequest, Tugas $tugas, Semester $semester)
    {
        $attr = $tugasRequest->all();

        if (request()->file('file_tugas')) {
            $file_tugas = request()->file('file_tugas')->store('Semester III/tugas');
        } else {
            $file_tugas = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_tugas'] = $file_tugas;
        $attr['status'] = "belum";
        $tugas->create($attr);

        session()->flash('success', 'Tambah Tugas Berhasil!');
        return redirect("semester_III/tugas/$semester->id");
    }

    public function semester_III_tugas_mata_kuliah_show(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_III.tugas.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_III_tugas_mata_kuliah_delete(Semester $semester, Tugas $tugas)
    {
        \Storage::delete($tugas->file_tugas);
        \Storage::delete($tugas->file_answer);
        $tugas->delete();


        session()->flash('success', 'Delete Tugas Berhasil!');
        return redirect("semester_III/tugas/$semester->id");
    }

    public function semester_III_tugas_mata_kuliah_update(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_III.tugas.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_III_tugas_mata_kuliah_edit(Semester $semester, Tugas $tugas, TugasRequest $tugasRequest)
    {
        $attr = $tugasRequest->all();

        if (request()->file('file_tugas')) {
            \Storage::delete($tugas->file_tugas);
            $file_tugas = request()->file('file_tugas')->store('Semester III/tugas');
        } else {
            $file_tugas = $tugas->file_tugas;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_tugas'] = $file_tugas;

        $tugas->update($attr);

        session()->flash('success', 'Update Tugas Berhasil!');
        return redirect("semester_III/tugas/$semester->id");
    }

    public function semester_III_tugas_mata_kuliah_download(Semester $semester, Tugas $tugas)
    {
        return \Storage::download($tugas->file_tugas);
    }

    public function semester_III_tugas_mata_kuliah_answer(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_III.tugas.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_III_tugas_mata_kuliah_answer_tugas(Semester $semester, Tugas $tugas)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($tugas->file_answer);
            $answer = request()->file('file_answer')->store('Semester III/tugas/answer');
        } else {
            $answer = $tugas->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($tugas->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $tugas->update($attr);

        session()->flash('success', 'Upload Jawaban Berhasil!');
        return redirect()->back();
    }

    public function semester_III_tugas_mata_kuliah_download_answer(Semester $semester, Tugas $tugas)
    {
        return \Storage::download($tugas->file_answer);
    }


    /* SEMESTER IV */


    public function semester_IV_tugas()
    {
        return view('semester.semester_IV.tugas.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester IV',
                'user_id' => auth()->user()->id,
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_IV_tugas_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_IV.tugas.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_IV_tugas_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_IV.tugas.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_IV_tugas_mata_kuliah_store(TugasRequest $tugasRequest, Tugas $tugas, Semester $semester)
    {
        $attr = $tugasRequest->all();

        if (request()->file('file_tugas')) {
            $file_tugas = request()->file('file_tugas')->store('Semester IV/tugas');
        } else {
            $file_tugas = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_tugas'] = $file_tugas;
        $attr['status'] = "belum";
        $tugas->create($attr);

        session()->flash('success', 'Tambah Tugas Berhasil!');
        return redirect("semester_IV/tugas/$semester->id");
    }

    public function semester_IV_tugas_mata_kuliah_show(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_IV.tugas.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_IV_tugas_mata_kuliah_delete(Semester $semester, Tugas $tugas)
    {
        \Storage::delete($tugas->file_tugas);
        \Storage::delete($tugas->file_answer);
        $tugas->delete();


        session()->flash('success', 'Delete Tugas Berhasil!');
        return redirect("semester_IV/tugas/$semester->id");
    }

    public function semester_IV_tugas_mata_kuliah_update(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_IV.tugas.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_IV_tugas_mata_kuliah_edit(Semester $semester, Tugas $tugas, TugasRequest $tugasRequest)
    {
        $attr = $tugasRequest->all();

        if (request()->file('file_tugas')) {
            \Storage::delete($tugas->file_tugas);
            $file_tugas = request()->file('file_tugas')->store('Semester IV/tugas');
        } else {
            $file_tugas = $tugas->file_tugas;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_tugas'] = $file_tugas;

        $tugas->update($attr);

        session()->flash('success', 'Update Tugas Berhasil!');
        return redirect("semester_IV/tugas/$semester->id");
    }

    public function semester_IV_tugas_mata_kuliah_download(Semester $semester, Tugas $tugas)
    {
        return \Storage::download($tugas->file_tugas);
    }

    public function semester_IV_tugas_mata_kuliah_answer(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_IV.tugas.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_IV_tugas_mata_kuliah_answer_tugas(Semester $semester, Tugas $tugas)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($tugas->file_answer);
            $answer = request()->file('file_answer')->store('Semester IV/tugas/answer');
        } else {
            $answer = $tugas->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($tugas->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $tugas->update($attr);

        session()->flash('success', 'Upload Jawaban Berhasil!');
        return redirect()->back();
    }

    public function semester_IV_tugas_mata_kuliah_download_answer(Semester $semester, Tugas $tugas)
    {
        return \Storage::download($tugas->file_answer);
    }


    /* SEMESTER V */


    public function semester_V_tugas()
    {
        return view('semester.semester_V.tugas.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester V',
                'user_id' => auth()->user()->id,
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_V_tugas_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_V.tugas.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_V_tugas_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_V.tugas.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_V_tugas_mata_kuliah_store(TugasRequest $tugasRequest, Tugas $tugas, Semester $semester)
    {
        $attr = $tugasRequest->all();

        if (request()->file('file_tugas')) {
            $file_tugas = request()->file('file_tugas')->store('Semester V/tugas');
        } else {
            $file_tugas = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_tugas'] = $file_tugas;
        $attr['status'] = "belum";
        $tugas->create($attr);

        session()->flash('success', 'Tambah Tugas Berhasil!');
        return redirect("semester_V/tugas/$semester->id");
    }

    public function semester_V_tugas_mata_kuliah_show(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_V.tugas.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_V_tugas_mata_kuliah_delete(Semester $semester, Tugas $tugas)
    {
        \Storage::delete($tugas->file_tugas);
        \Storage::delete($tugas->file_answer);
        $tugas->delete();


        session()->flash('success', 'Delete Tugas Berhasil!');
        return redirect("semester_V/tugas/$semester->id");
    }

    public function semester_V_tugas_mata_kuliah_update(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_V.tugas.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_V_tugas_mata_kuliah_edit(Semester $semester, Tugas $tugas, TugasRequest $tugasRequest)
    {
        $attr = $tugasRequest->all();

        if (request()->file('file_tugas')) {
            \Storage::delete($tugas->file_tugas);
            $file_tugas = request()->file('file_tugas')->store('Semester V/tugas');
        } else {
            $file_tugas = $tugas->file_tugas;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_tugas'] = $file_tugas;

        $tugas->update($attr);

        session()->flash('success', 'Update Tugas Berhasil!');
        return redirect("semester_V/tugas/$semester->id");
    }

    public function semester_V_tugas_mata_kuliah_download(Semester $semester, Tugas $tugas)
    {
        return \Storage::download($tugas->file_tugas);
    }

    public function semester_V_tugas_mata_kuliah_answer(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_V.tugas.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_V_tugas_mata_kuliah_answer_tugas(Semester $semester, Tugas $tugas)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($tugas->file_answer);
            $answer = request()->file('file_answer')->store('Semester V/tugas/answer');
        } else {
            $answer = $tugas->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($tugas->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $tugas->update($attr);

        session()->flash('success', 'Upload Jawaban Berhasil!');
        return redirect()->back();
    }

    public function semester_V_tugas_mata_kuliah_download_answer(Semester $semester, Tugas $tugas)
    {
        return \Storage::download($tugas->file_answer);
    }


    /* SEMESTER VI */


    public function semester_VI_tugas()
    {
        return view('semester.semester_VI.tugas.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester VI',
                'user_id' => auth()->user()->id,
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_VI_tugas_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_VI.tugas.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_VI_tugas_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_VI.tugas.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_VI_tugas_mata_kuliah_store(TugasRequest $tugasRequest, Tugas $tugas, Semester $semester)
    {
        $attr = $tugasRequest->all();

        if (request()->file('file_tugas')) {
            $file_tugas = request()->file('file_tugas')->store('Semester VI/tugas');
        } else {
            $file_tugas = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_tugas'] = $file_tugas;
        $attr['status'] = "belum";
        $tugas->create($attr);

        session()->flash('success', 'Tambah Tugas Berhasil!');
        return redirect("semester_VI/tugas/$semester->id");
    }

    public function semester_VI_tugas_mata_kuliah_show(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_VI.tugas.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_VI_tugas_mata_kuliah_delete(Semester $semester, Tugas $tugas)
    {
        \Storage::delete($tugas->file_tugas);
        \Storage::delete($tugas->file_answer);
        $tugas->delete();


        session()->flash('success', 'Delete Tugas Berhasil!');
        return redirect("semester_VI/tugas/$semester->id");
    }

    public function semester_VI_tugas_mata_kuliah_update(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_VI.tugas.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_VI_tugas_mata_kuliah_edit(Semester $semester, Tugas $tugas, TugasRequest $tugasRequest)
    {
        $attr = $tugasRequest->all();

        if (request()->file('file_tugas')) {
            \Storage::delete($tugas->file_tugas);
            $file_tugas = request()->file('file_tugas')->store('Semester VI/tugas');
        } else {
            $file_tugas = $tugas->file_tugas;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_tugas'] = $file_tugas;

        $tugas->update($attr);

        session()->flash('success', 'Update Tugas Berhasil!');
        return redirect("semester_VI/tugas/$semester->id");
    }

    public function semester_VI_tugas_mata_kuliah_download(Semester $semester, Tugas $tugas)
    {
        return \Storage::download($tugas->file_tugas);
    }

    public function semester_VI_tugas_mata_kuliah_answer(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_VI.tugas.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_VI_tugas_mata_kuliah_answer_tugas(Semester $semester, Tugas $tugas)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($tugas->file_answer);
            $answer = request()->file('file_answer')->store('Semester VI/tugas/answer');
        } else {
            $answer = $tugas->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($tugas->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $tugas->update($attr);

        session()->flash('success', 'Upload Jawaban Berhasil!');
        return redirect()->back();
    }

    public function semester_VI_tugas_mata_kuliah_download_answer(Semester $semester, Tugas $tugas)
    {
        return \Storage::download($tugas->file_answer);
    }


    /* SEMESTER VII */


    public function semester_VII_tugas()
    {
        return view('semester.semester_VII.tugas.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester VII',
                'user_id' => auth()->user()->id,
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_VII_tugas_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_VII.tugas.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_VII_tugas_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_VII.tugas.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_VII_tugas_mata_kuliah_store(TugasRequest $tugasRequest, Tugas $tugas, Semester $semester)
    {
        $attr = $tugasRequest->all();

        if (request()->file('file_tugas')) {
            $file_tugas = request()->file('file_tugas')->store('Semester VII/tugas');
        } else {
            $file_tugas = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_tugas'] = $file_tugas;
        $attr['status'] = "belum";
        $tugas->create($attr);

        session()->flash('success', 'Tambah Tugas Berhasil!');
        return redirect("semester_VII/tugas/$semester->id");
    }

    public function semester_VII_tugas_mata_kuliah_show(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_VII.tugas.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_VII_tugas_mata_kuliah_delete(Semester $semester, Tugas $tugas)
    {
        \Storage::delete($tugas->file_tugas);
        \Storage::delete($tugas->file_answer);
        $tugas->delete();


        session()->flash('success', 'Delete Tugas Berhasil!');
        return redirect("semester_VII/tugas/$semester->id");
    }

    public function semester_VII_tugas_mata_kuliah_update(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_VII.tugas.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_VII_tugas_mata_kuliah_edit(Semester $semester, Tugas $tugas, TugasRequest $tugasRequest)
    {
        $attr = $tugasRequest->all();

        if (request()->file('file_tugas')) {
            \Storage::delete($tugas->file_tugas);
            $file_tugas = request()->file('file_tugas')->store('Semester VII/tugas');
        } else {
            $file_tugas = $tugas->file_tugas;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_tugas'] = $file_tugas;

        $tugas->update($attr);

        session()->flash('success', 'Update Tugas Berhasil!');
        return redirect("semester_VII/tugas/$semester->id");
    }

    public function semester_VII_tugas_mata_kuliah_download(Semester $semester, Tugas $tugas)
    {
        return \Storage::download($tugas->file_tugas);
    }

    public function semester_VII_tugas_mata_kuliah_answer(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_VII.tugas.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_VII_tugas_mata_kuliah_answer_tugas(Semester $semester, Tugas $tugas)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($tugas->file_answer);
            $answer = request()->file('file_answer')->store('Semester VII/tugas/answer');
        } else {
            $answer = $tugas->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($tugas->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $tugas->update($attr);

        session()->flash('success', 'Upload Jawaban Berhasil!');
        return redirect()->back();
    }

    public function semester_VII_tugas_mata_kuliah_download_answer(Semester $semester, Tugas $tugas)
    {
        return \Storage::download($tugas->file_answer);
    }


    /* SEMESTER VIII */


    public function semester_VIII_tugas()
    {
        return view('semester.semester_VIII.tugas.index', [
            'semesters' => Semester::where([
                'semester' => 'Semester VIII',
                'user_id' => auth()->user()->id,
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_VIII_tugas_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_VIII.tugas.mata_kuliah.index', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_VIII_tugas_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_VIII.tugas.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_VIII_tugas_mata_kuliah_store(TugasRequest $tugasRequest, Tugas $tugas, Semester $semester)
    {
        $attr = $tugasRequest->all();

        if (request()->file('file_tugas')) {
            $file_tugas = request()->file('file_tugas')->store('Semester VIII/tugas');
        } else {
            $file_tugas = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_tugas'] = $file_tugas;
        $attr['status'] = "belum";
        $tugas->create($attr);

        session()->flash('success', 'Tambah Tugas Berhasil!');
        return redirect("semester_VIII/tugas/$semester->id");
    }

    public function semester_VIII_tugas_mata_kuliah_show(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_VIII.tugas.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_VIII_tugas_mata_kuliah_delete(Semester $semester, Tugas $tugas)
    {
        \Storage::delete($tugas->file_tugas);
        \Storage::delete($tugas->file_answer);
        $tugas->delete();


        session()->flash('success', 'Delete Tugas Berhasil!');
        return redirect("semester_VIII/tugas/$semester->id");
    }

    public function semester_VIII_tugas_mata_kuliah_update(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_VIII.tugas.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_VIII_tugas_mata_kuliah_edit(Semester $semester, Tugas $tugas, TugasRequest $tugasRequest)
    {
        $attr = $tugasRequest->all();

        if (request()->file('file_tugas')) {
            \Storage::delete($tugas->file_tugas);
            $file_tugas = request()->file('file_tugas')->store('Semester VIII/tugas');
        } else {
            $file_tugas = $tugas->file_tugas;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_tugas'] = $file_tugas;

        $tugas->update($attr);

        session()->flash('success', 'Update Tugas Berhasil!');
        return redirect("semester_VIII/tugas/$semester->id");
    }

    public function semester_VIII_tugas_mata_kuliah_download(Semester $semester, Tugas $tugas)
    {
        return \Storage::download($tugas->file_tugas);
    }

    public function semester_VIII_tugas_mata_kuliah_answer(Semester $semester, Tugas $tugas)
    {
        return view('semester.semester_VIII.tugas.mata_kuliah.answer', [
            'mata_kuliah' => $semester,
            'tugas' => $tugas
        ]);
    }

    public function semester_VIII_tugas_mata_kuliah_answer_tugas(Semester $semester, Tugas $tugas)
    {
        $attr = request()->validate([
            'file_answer' => 'file|mimes:pdf|max:20048'
        ]);

        if (request()->file('file_answer')) {
            \Storage::delete($tugas->file_answer);
            $answer = request()->file('file_answer')->store('Semester VIII/tugas/answer');
        } else {
            $answer = $tugas->file_answer;
        }

        if (date('d m Y') > date('d m Y', strtotime($tugas->tanggal_akhir))) {
            $status = "belum";
        } else {
            $status = "selesai";
        }

        $attr['semester_id'] = $semester->id;
        $attr['status'] = $status;
        $attr['file_answer'] = $answer;

        $tugas->update($attr);

        session()->flash('success', 'Upload Jawaban Berhasil!');
        return redirect()->back();
    }

    public function semester_VIII_tugas_mata_kuliah_download_answer(Semester $semester, Tugas $tugas)
    {
        return \Storage::download($tugas->file_answer);
    }
}
