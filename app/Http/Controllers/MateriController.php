<?php

namespace App\Http\Controllers;

use App\Http\Requests\MateriRequest;
use App\{Materi, Semester};

class MateriController extends Controller
{
    public function semester_I_materi(Semester $semester)
    {
        return view('semester.semester_I.materi.index', [
            'semesters' => $semester->where([
                'semester' => 'Semester I',
                'user_id' => auth()->user()->id
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_I_materi_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_I.materi.mata_kuliah.index', [
            'mata_kuliah' => $semester,
        ]);
    }

    public function semester_I_materi_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_I.materi.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_I_materi_mata_kuliah_store(MateriRequest $materiRequest, Semester $semester, Materi $materi)
    {
        $attr = $materiRequest->all();

        if (request()->file('file_materi')) {
            $file_materi = request()->file('file_materi')->store('Semester I/materi');
        } else {
            $file_materi = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_materi'] = $file_materi;
        $materi->create($attr);

        session()->flash('success', 'Tambah Materi Berhasil!');
        return redirect("semester_I/materi/$semester->id");
    }

    public function semester_I_materi_mata_kuliah_show(Semester $semester, Materi $materi)
    {
        return view('semester.semester_I.materi.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'materis' => $materi
        ]);
    }

    public function semester_I_materi_mata_kuliah_delete(Semester $semester, Materi $materi)
    {
        \Storage::delete($materi->file_materi);
        $materi->delete();

        session()->flash('success', 'Hapus Materi Berhasil!');
        return redirect("semester_I/materi/$semester->id");
    }

    public function semester_I_materi_mata_kuliah_update(Semester $semester, Materi $materi)
    {
        return view('semester.semester_I.materi.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'materis' => $materi
        ]);
    }

    public function semester_I_materi_mata_kuliah_edit(Semester $semester, Materi $materi, MateriRequest $materiRequest)
    {
        $attr = $materiRequest->all();

        if (request()->file('file_materi')) {
            \Storage::delete($materi->file_materi);
            $file_materi = request()->file('file_materi')->store('Semester I/materi');
        } else {
            $file_materi = $materi->file_materi;
        }

        $attr['file_materi'] = $file_materi;
        $materi->update($attr);

        session()->flash('success', 'Update Materi Berhasil!');
        return redirect("semester_I/materi/$semester->id");
    }

    public function semester_I_materi_mata_kuliah_download(Semester $semester, Materi $materi)
    {
        return \Storage::download($materi->file_materi);
    }


    /* SEMESTER II */



    public function semester_II_materi(Semester $semester)
    {
        return view('semester.semester_II.materi.index', [
            'semesters' => $semester->where([
                'semester' => 'Semester II',
                'user_id' => auth()->user()->id
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_II_materi_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_II.materi.mata_kuliah.index', [
            'mata_kuliah' => $semester,
        ]);
    }

    public function semester_II_materi_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_II.materi.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_II_materi_mata_kuliah_store(MateriRequest $materiRequest, Semester $semester, Materi $materi)
    {
        $attr = $materiRequest->all();

        if (request()->file('file_materi')) {
            $file_materi = request()->file('file_materi')->store('Semester II/materi');
        } else {
            $file_materi = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_materi'] = $file_materi;
        $materi->create($attr);

        session()->flash('success', 'Tambah Materi Berhasil!');
        return redirect("semester_II/materi/$semester->id");
    }

    public function semester_II_materi_mata_kuliah_show(Semester $semester, Materi $materi)
    {
        return view('semester.semester_II.materi.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'materis' => $materi
        ]);
    }

    public function semester_II_materi_mata_kuliah_delete(Semester $semester, Materi $materi)
    {
        \Storage::delete($materi->file_materi);
        $materi->delete();

        session()->flash('success', 'Hapus Materi Berhasil!');
        return redirect("semester_II/materi/$semester->id");
    }

    public function semester_II_materi_mata_kuliah_update(Semester $semester, Materi $materi)
    {
        return view('semester.semester_II.materi.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'materis' => $materi
        ]);
    }

    public function semester_II_materi_mata_kuliah_edit(Semester $semester, Materi $materi, MateriRequest $materiRequest)
    {
        $attr = $materiRequest->all();

        if (request()->file('file_materi')) {
            \Storage::delete($materi->file_materi);
            $file_materi = request()->file('file_materi')->store('Semester II/materi');
        } else {
            $file_materi = $materi->file_materi;
        }

        $attr['file_materi'] = $file_materi;
        $materi->update($attr);

        session()->flash('success', 'Update Materi Berhasil!');
        return redirect("semester_II/materi/$semester->id");
    }

    public function semester_II_materi_mata_kuliah_download(Semester $semester, Materi $materi)
    {
        return \Storage::download($materi->file_materi);
    }


    /* SEMESTER III */



    public function semester_III_materi(Semester $semester)
    {
        return view('semester.semester_III.materi.index', [
            'semesters' => $semester->where([
                'semester' => 'Semester III',
                'user_id' => auth()->user()->id
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_III_materi_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_III.materi.mata_kuliah.index', [
            'mata_kuliah' => $semester,
        ]);
    }

    public function semester_III_materi_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_III.materi.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_III_materi_mata_kuliah_store(MateriRequest $materiRequest, Semester $semester, Materi $materi)
    {
        $attr = $materiRequest->all();

        if (request()->file('file_materi')) {
            $file_materi = request()->file('file_materi')->store('Semester III/materi');
        } else {
            $file_materi = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_materi'] = $file_materi;
        $materi->create($attr);

        session()->flash('success', 'Tambah Materi Berhasil!');
        return redirect("semester_III/materi/$semester->id");
    }

    public function semester_III_materi_mata_kuliah_show(Semester $semester, Materi $materi)
    {
        return view('semester.semester_III.materi.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'materis' => $materi
        ]);
    }

    public function semester_III_materi_mata_kuliah_delete(Semester $semester, Materi $materi)
    {
        \Storage::delete($materi->file_materi);
        $materi->delete();

        session()->flash('success', 'Hapus Materi Berhasil!');
        return redirect("semester_III/materi/$semester->id");
    }

    public function semester_III_materi_mata_kuliah_update(Semester $semester, Materi $materi)
    {
        return view('semester.semester_III.materi.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'materis' => $materi
        ]);
    }

    public function semester_III_materi_mata_kuliah_edit(Semester $semester, Materi $materi, MateriRequest $materiRequest)
    {
        $attr = $materiRequest->all();

        if (request()->file('file_materi')) {
            \Storage::delete($materi->file_materi);
            $file_materi = request()->file('file_materi')->store('Semester III/materi');
        } else {
            $file_materi = $materi->file_materi;
        }

        $attr['file_materi'] = $file_materi;
        $materi->update($attr);

        session()->flash('success', 'Update Materi Berhasil!');
        return redirect("semester_III/materi/$semester->id");
    }

    public function semester_III_materi_mata_kuliah_download(Semester $semester, Materi $materi)
    {
        return \Storage::download($materi->file_materi);
    }


    /* SEMESTER IV */



    public function semester_IV_materi(Semester $semester)
    {
        return view('semester.semester_IV.materi.index', [
            'semesters' => $semester->where([
                'semester' => 'Semester IV',
                'user_id' => auth()->user()->id
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_IV_materi_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_IV.materi.mata_kuliah.index', [
            'mata_kuliah' => $semester,
        ]);
    }

    public function semester_IV_materi_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_IV.materi.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_IV_materi_mata_kuliah_store(MateriRequest $materiRequest, Semester $semester, Materi $materi)
    {
        $attr = $materiRequest->all();

        if (request()->file('file_materi')) {
            $file_materi = request()->file('file_materi')->store('Semester IV/materi');
        } else {
            $file_materi = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_materi'] = $file_materi;
        $materi->create($attr);

        session()->flash('success', 'Tambah Materi Berhasil!');
        return redirect("semester_IV/materi/$semester->id");
    }

    public function semester_IV_materi_mata_kuliah_show(Semester $semester, Materi $materi)
    {
        return view('semester.semester_IV.materi.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'materis' => $materi
        ]);
    }

    public function semester_IV_materi_mata_kuliah_delete(Semester $semester, Materi $materi)
    {
        \Storage::delete($materi->file_materi);
        $materi->delete();

        session()->flash('success', 'Hapus Materi Berhasil!');
        return redirect("semester_IV/materi/$semester->id");
    }

    public function semester_IV_materi_mata_kuliah_update(Semester $semester, Materi $materi)
    {
        return view('semester.semester_IV.materi.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'materis' => $materi
        ]);
    }

    public function semester_IV_materi_mata_kuliah_edit(Semester $semester, Materi $materi, MateriRequest $materiRequest)
    {
        $attr = $materiRequest->all();

        if (request()->file('file_materi')) {
            \Storage::delete($materi->file_materi);
            $file_materi = request()->file('file_materi')->store('Semester IV/materi');
        } else {
            $file_materi = $materi->file_materi;
        }

        $attr['file_materi'] = $file_materi;
        $materi->update($attr);

        session()->flash('success', 'Update Materi Berhasil!');
        return redirect("semester_IV/materi/$semester->id");
    }

    public function semester_IV_materi_mata_kuliah_download(Semester $semester, Materi $materi)
    {
        return \Storage::download($materi->file_materi);
    }


    /* SEMESTER V */



    public function semester_V_materi(Semester $semester)
    {
        return view('semester.semester_V.materi.index', [
            'semesters' => $semester->where([
                'semester' => 'Semester V',
                'user_id' => auth()->user()->id
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_V_materi_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_V.materi.mata_kuliah.index', [
            'mata_kuliah' => $semester,
        ]);
    }

    public function semester_V_materi_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_V.materi.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_V_materi_mata_kuliah_store(MateriRequest $materiRequest, Semester $semester, Materi $materi)
    {
        $attr = $materiRequest->all();

        if (request()->file('file_materi')) {
            $file_materi = request()->file('file_materi')->store('Semester V/materi');
        } else {
            $file_materi = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_materi'] = $file_materi;
        $materi->create($attr);

        session()->flash('success', 'Tambah Materi Berhasil!');
        return redirect("semester_V/materi/$semester->id");
    }

    public function semester_V_materi_mata_kuliah_show(Semester $semester, Materi $materi)
    {
        return view('semester.semester_V.materi.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'materis' => $materi
        ]);
    }

    public function semester_V_materi_mata_kuliah_delete(Semester $semester, Materi $materi)
    {
        \Storage::delete($materi->file_materi);
        $materi->delete();

        session()->flash('success', 'Hapus Materi Berhasil!');
        return redirect("semester_V/materi/$semester->id");
    }

    public function semester_V_materi_mata_kuliah_update(Semester $semester, Materi $materi)
    {
        return view('semester.semester_V.materi.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'materis' => $materi
        ]);
    }

    public function semester_V_materi_mata_kuliah_edit(Semester $semester, Materi $materi, MateriRequest $materiRequest)
    {
        $attr = $materiRequest->all();

        if (request()->file('file_materi')) {
            \Storage::delete($materi->file_materi);
            $file_materi = request()->file('file_materi')->store('Semester V/materi');
        } else {
            $file_materi = $materi->file_materi;
        }

        $attr['file_materi'] = $file_materi;
        $materi->update($attr);

        session()->flash('success', 'Update Materi Berhasil!');
        return redirect("semester_V/materi/$semester->id");
    }

    public function semester_V_materi_mata_kuliah_download(Semester $semester, Materi $materi)
    {
        return \Storage::download($materi->file_materi);
    }


    /* SEMESTER VI */



    public function semester_VI_materi(Semester $semester)
    {
        return view('semester.semester_VI.materi.index', [
            'semesters' => $semester->where([
                'semester' => 'Semester VI',
                'user_id' => auth()->user()->id
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_VI_materi_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_VI.materi.mata_kuliah.index', [
            'mata_kuliah' => $semester,
        ]);
    }

    public function semester_VI_materi_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_VI.materi.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_VI_materi_mata_kuliah_store(MateriRequest $materiRequest, Semester $semester, Materi $materi)
    {
        $attr = $materiRequest->all();

        if (request()->file('file_materi')) {
            $file_materi = request()->file('file_materi')->store('Semester VI/materi');
        } else {
            $file_materi = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_materi'] = $file_materi;
        $materi->create($attr);

        session()->flash('success', 'Tambah Materi Berhasil!');
        return redirect("semester_VI/materi/$semester->id");
    }

    public function semester_VI_materi_mata_kuliah_show(Semester $semester, Materi $materi)
    {
        return view('semester.semester_VI.materi.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'materis' => $materi
        ]);
    }

    public function semester_VI_materi_mata_kuliah_delete(Semester $semester, Materi $materi)
    {
        \Storage::delete($materi->file_materi);
        $materi->delete();

        session()->flash('success', 'Hapus Materi Berhasil!');
        return redirect("semester_VI/materi/$semester->id");
    }

    public function semester_VI_materi_mata_kuliah_update(Semester $semester, Materi $materi)
    {
        return view('semester.semester_VI.materi.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'materis' => $materi
        ]);
    }

    public function semester_VI_materi_mata_kuliah_edit(Semester $semester, Materi $materi, MateriRequest $materiRequest)
    {
        $attr = $materiRequest->all();

        if (request()->file('file_materi')) {
            \Storage::delete($materi->file_materi);
            $file_materi = request()->file('file_materi')->store('Semester VI/materi');
        } else {
            $file_materi = $materi->file_materi;
        }

        $attr['file_materi'] = $file_materi;
        $materi->update($attr);

        session()->flash('success', 'Update Materi Berhasil!');
        return redirect("semester_VI/materi/$semester->id");
    }

    public function semester_VI_materi_mata_kuliah_download(Semester $semester, Materi $materi)
    {
        return \Storage::download($materi->file_materi);
    }


    /* SEMESTER VII */



    public function semester_VII_materi(Semester $semester)
    {
        return view('semester.semester_VII.materi.index', [
            'semesters' => $semester->where([
                'semester' => 'Semester VII',
                'user_id' => auth()->user()->id
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_VII_materi_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_VII.materi.mata_kuliah.index', [
            'mata_kuliah' => $semester,
        ]);
    }

    public function semester_VII_materi_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_VII.materi.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_VII_materi_mata_kuliah_store(MateriRequest $materiRequest, Semester $semester, Materi $materi)
    {
        $attr = $materiRequest->all();

        if (request()->file('file_materi')) {
            $file_materi = request()->file('file_materi')->store('Semester VII/materi');
        } else {
            $file_materi = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_materi'] = $file_materi;
        $materi->create($attr);

        session()->flash('success', 'Tambah Materi Berhasil!');
        return redirect("semester_VII/materi/$semester->id");
    }

    public function semester_VII_materi_mata_kuliah_show(Semester $semester, Materi $materi)
    {
        return view('semester.semester_VII.materi.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'materis' => $materi
        ]);
    }

    public function semester_VII_materi_mata_kuliah_delete(Semester $semester, Materi $materi)
    {
        \Storage::delete($materi->file_materi);
        $materi->delete();

        session()->flash('success', 'Hapus Materi Berhasil!');
        return redirect("semester_VII/materi/$semester->id");
    }

    public function semester_VII_materi_mata_kuliah_update(Semester $semester, Materi $materi)
    {
        return view('semester.semester_VII.materi.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'materis' => $materi
        ]);
    }

    public function semester_VII_materi_mata_kuliah_edit(Semester $semester, Materi $materi, MateriRequest $materiRequest)
    {
        $attr = $materiRequest->all();

        if (request()->file('file_materi')) {
            \Storage::delete($materi->file_materi);
            $file_materi = request()->file('file_materi')->store('Semester VII/materi');
        } else {
            $file_materi = $materi->file_materi;
        }

        $attr['file_materi'] = $file_materi;
        $materi->update($attr);

        session()->flash('success', 'Update Materi Berhasil!');
        return redirect("semester_VII/materi/$semester->id");
    }

    public function semester_VII_materi_mata_kuliah_download(Semester $semester, Materi $materi)
    {
        return \Storage::download($materi->file_materi);
    }


    /* SEMESTER VIII */



    public function semester_VIII_materi(Semester $semester)
    {
        return view('semester.semester_VIII.materi.index', [
            'semesters' => $semester->where([
                'semester' => 'Semester VIII',
                'user_id' => auth()->user()->id
            ])->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_VIII_materi_mata_kuliah(Semester $semester)
    {
        return view('semester.semester_VIII.materi.mata_kuliah.index', [
            'mata_kuliah' => $semester,
        ]);
    }

    public function semester_VIII_materi_mata_kuliah_create(Semester $semester)
    {
        return view('semester.semester_VIII.materi.mata_kuliah.create', [
            'mata_kuliah' => $semester
        ]);
    }

    public function semester_VIII_materi_mata_kuliah_store(MateriRequest $materiRequest, Semester $semester, Materi $materi)
    {
        $attr = $materiRequest->all();

        if (request()->file('file_materi')) {
            $file_materi = request()->file('file_materi')->store('Semester VIII/materi');
        } else {
            $file_materi = null;
        }

        $attr['semester_id'] = $semester->id;
        $attr['file_materi'] = $file_materi;
        $materi->create($attr);

        session()->flash('success', 'Tambah Materi Berhasil!');
        return redirect("semester_VIII/materi/$semester->id");
    }

    public function semester_VIII_materi_mata_kuliah_show(Semester $semester, Materi $materi)
    {
        return view('semester.semester_VIII.materi.mata_kuliah.show', [
            'mata_kuliah' => $semester,
            'materis' => $materi
        ]);
    }

    public function semester_VIII_materi_mata_kuliah_delete(Semester $semester, Materi $materi)
    {
        \Storage::delete($materi->file_materi);
        $materi->delete();

        session()->flash('success', 'Hapus Materi Berhasil!');
        return redirect("semester_VIII/materi/$semester->id");
    }

    public function semester_VIII_materi_mata_kuliah_update(Semester $semester, Materi $materi)
    {
        return view('semester.semester_VIII.materi.mata_kuliah.update', [
            'mata_kuliah' => $semester,
            'materis' => $materi
        ]);
    }

    public function semester_VIII_materi_mata_kuliah_edit(Semester $semester, Materi $materi, MateriRequest $materiRequest)
    {
        $attr = $materiRequest->all();

        if (request()->file('file_materi')) {
            \Storage::delete($materi->file_materi);
            $file_materi = request()->file('file_materi')->store('Semester VIII/materi');
        } else {
            $file_materi = $materi->file_materi;
        }

        $attr['file_materi'] = $file_materi;
        $materi->update($attr);

        session()->flash('success', 'Update Materi Berhasil!');
        return redirect("semester_VIII/materi/$semester->id");
    }

    public function semester_VIII_materi_mata_kuliah_download(Semester $semester, Materi $materi)
    {
        return \Storage::download($materi->file_materi);
    }
}
