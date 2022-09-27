<?php

namespace App\Http\Controllers;

use App\{Materi, Semester, Tugas, Uas, Uts};
use App\Http\Requests\SemesterRequest;

class SemesterController extends Controller
{
    /* SEMESTER I */

    public function semester_I_index()
    {
        return view('semester.semester_I.index', [
            'semesters' => Semester::where('semester', 'Semester I')->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_I_create()
    {
        return view('semester.semester_I.create');
    }

    public function semester_I_store(SemesterRequest $semesterRequest, Semester $semester)
    {
        $attr = $semesterRequest->all();
        $semester = auth()->user()->semesters()->create($attr);

        session()->flash('success', 'Tambah Mata Kuliah Berhasil!');
        return redirect('semester_I');
    }

    public function semester_I_update(Semester $semester)
    {
        return view('semester.semester_I.update', [
            'semesters' => $semester,
        ]);
    }

    public function semester_I_edit(SemesterRequest $semesterRequest, Semester $semester)
    {
        $this->authorize('edit', $semester);

        $attr = $semesterRequest->all();
        $semester->update($attr);

        session()->flash('success', 'Update Mata Kuliah Berhasil!');
        return redirect('semester_I');
    }


    public function semester_I_delete()
    {
        $this->authorize('delete', Semester::find(request()->id));

        $materi = Materi::where('semester_id', request()->id)->get();
        $tugas = Tugas::where('semester_id', request()->id)->get();
        $uts = Uts::where('semester_id', request()->id)->get();
        $uas = Uas::where('semester_id', request()->id)->get();

        foreach ($materi as $m) {
            \Storage::delete($m->file_materi);
        }

        foreach ($tugas as $task) {
            \Storage::delete($task->file_tugas);
            \Storage::delete($task->file_answer);
        }

        foreach ($uts as $ut) {
            \Storage::delete($ut->file_uts);
            \Storage::delete($ut->file_answer);
        }

        foreach ($uas as $us) {
            \Storage::delete($us->file_uas);
            \Storage::delete($us->file_answer);
        }

        $materi = Materi::where('semester_id', request()->id)->delete();
        $tugas = Tugas::where('semester_id', request()->id)->delete();
        $uts = Uts::where('semester_id', request()->id)->delete();
        $uas = Uas::where('semester_id', request()->id)->delete();
        $semester = Semester::find(request()->id)->delete();

        session()->flash('success', 'Hapus Mata Kuliah Berhasil!');
        return redirect('semester_I');
    }



    /* SEMESTER II */



    public function semester_II_index()
    {
        return view('semester.semester_II.index', [
            'semesters' => Semester::where('semester', 'Semester II')->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_II_create()
    {
        return view('semester.semester_II.create');
    }

    public function semester_II_store(SemesterRequest $semesterRequest, Semester $semester)
    {
        $attr = $semesterRequest->all();
        $semester = auth()->user()->semesters()->create($attr);

        session()->flash('success', 'Tambah Mata Kuliah Berhasil!');
        return redirect('semester_II');
    }

    public function semester_II_update(Semester $semester)
    {
        return view('semester.semester_II.update', [
            'semesters' => $semester,
        ]);
    }

    public function semester_II_edit(SemesterRequest $semesterRequest, Semester $semester)
    {
        $this->authorize('edit', $semester);

        $attr = $semesterRequest->all();
        $semester->update($attr);

        session()->flash('success', 'Update Mata Kuliah Berhasil!');
        return redirect('semester_II');
    }


    public function semester_II_delete()
    {
        $this->authorize('delete', Semester::find(request()->id));

        $materi = Materi::where('semester_id', request()->id)->get();
        $tugas = Tugas::where('semester_id', request()->id)->get();
        $uts = Uts::where('semester_id', request()->id)->get();
        $uas = Uas::where('semester_id', request()->id)->get();

        foreach ($materi as $m) {
            \Storage::delete($m->file_materi);
        }

        foreach ($tugas as $task) {
            \Storage::delete($task->file_tugas);
            \Storage::delete($task->file_answer);
        }

        foreach ($uts as $ut) {
            \Storage::delete($ut->file_uts);
            \Storage::delete($ut->file_answer);
        }

        foreach ($uas as $us) {
            \Storage::delete($us->file_uas);
            \Storage::delete($us->file_answer);
        }

        $materi = Materi::where('semester_id', request()->id)->delete();
        $tugas = Tugas::where('semester_id', request()->id)->delete();
        $uts = Uts::where('semester_id', request()->id)->delete();
        $uas = Uas::where('semester_id', request()->id)->delete();
        $semester = Semester::find(request()->id)->delete();

        session()->flash('success', 'Hapus Mata Kuliah Berhasil!');
        return redirect('semester_II');
    }

    /* SEMESTER III */



    public function semester_III_index()
    {
        return view('semester.semester_III.index', [
            'semesters' => Semester::where('semester', 'Semester III')->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_III_create()
    {
        return view('semester.semester_III.create');
    }

    public function semester_III_store(SemesterRequest $semesterRequest, Semester $semester)
    {
        $attr = $semesterRequest->all();
        $semester = auth()->user()->semesters()->create($attr);

        session()->flash('success', 'Tambah Mata Kuliah Berhasil!');
        return redirect('semester_III');
    }

    public function semester_III_update(Semester $semester)
    {
        return view('semester.semester_III.update', [
            'semesters' => $semester,
        ]);
    }

    public function semester_III_edit(SemesterRequest $semesterRequest, Semester $semester)
    {
        $this->authorize('edit', $semester);

        $attr = $semesterRequest->all();
        $semester->update($attr);

        session()->flash('success', 'Update Mata Kuliah Berhasil!');
        return redirect('semester_III');
    }


    public function semester_III_delete()
    {
        $this->authorize('delete', Semester::find(request()->id));

        $materi = Materi::where('semester_id', request()->id)->get();
        $tugas = Tugas::where('semester_id', request()->id)->get();
        $uts = Uts::where('semester_id', request()->id)->get();
        $uas = Uas::where('semester_id', request()->id)->get();

        foreach ($materi as $m) {
            \Storage::delete($m->file_materi);
        }

        foreach ($tugas as $task) {
            \Storage::delete($task->file_tugas);
            \Storage::delete($task->file_answer);
        }

        foreach ($uts as $ut) {
            \Storage::delete($ut->file_uts);
            \Storage::delete($ut->file_answer);
        }

        foreach ($uas as $us) {
            \Storage::delete($us->file_uas);
            \Storage::delete($us->file_answer);
        }

        $materi = Materi::where('semester_id', request()->id)->delete();
        $tugas = Tugas::where('semester_id', request()->id)->delete();
        $uts = Uts::where('semester_id', request()->id)->delete();
        $uas = Uas::where('semester_id', request()->id)->delete();
        $semester = Semester::find(request()->id)->delete();

        session()->flash('success', 'Hapus Mata Kuliah Berhasil!');
        return redirect('semester_III');
    }


    /* SEMESTER IV */



    public function semester_IV_index()
    {
        return view('semester.semester_IV.index', [
            'semesters' => Semester::where('semester', 'Semester IV')->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_IV_create()
    {
        return view('semester.semester_IV.create');
    }

    public function semester_IV_store(SemesterRequest $semesterRequest, Semester $semester)
    {
        $attr = $semesterRequest->all();
        $semester = auth()->user()->semesters()->create($attr);

        session()->flash('success', 'Tambah Mata Kuliah Berhasil!');
        return redirect('semester_IV');
    }

    public function semester_IV_update(Semester $semester)
    {
        return view('semester.semester_IV.update', [
            'semesters' => $semester,
        ]);
    }

    public function semester_IV_edit(SemesterRequest $semesterRequest, Semester $semester)
    {
        $this->authorize('edit', $semester);

        $attr = $semesterRequest->all();
        $semester->update($attr);

        session()->flash('success', 'Update Mata Kuliah Berhasil!');
        return redirect('semester_IV');
    }


    public function semester_IV_delete()
    {
        $this->authorize('delete', Semester::find(request()->id));

        $materi = Materi::where('semester_id', request()->id)->get();
        $tugas = Tugas::where('semester_id', request()->id)->get();
        $uts = Uts::where('semester_id', request()->id)->get();
        $uas = Uas::where('semester_id', request()->id)->get();

        foreach ($materi as $m) {
            \Storage::delete($m->file_materi);
        }

        foreach ($tugas as $task) {
            \Storage::delete($task->file_tugas);
            \Storage::delete($task->file_answer);
        }

        foreach ($uts as $ut) {
            \Storage::delete($ut->file_uts);
            \Storage::delete($ut->file_answer);
        }

        foreach ($uas as $us) {
            \Storage::delete($us->file_uas);
            \Storage::delete($us->file_answer);
        }

        $materi = Materi::where('semester_id', request()->id)->delete();
        $tugas = Tugas::where('semester_id', request()->id)->delete();
        $uts = Uts::where('semester_id', request()->id)->delete();
        $uas = Uas::where('semester_id', request()->id)->delete();
        $semester = Semester::find(request()->id)->delete();

        session()->flash('success', 'Hapus Mata Kuliah Berhasil!');
        return redirect('semester_IV');
    }


    /* SEMESTER V */



    public function semester_V_index()
    {
        return view('semester.semester_V.index', [
            'semesters' => Semester::where('semester', 'Semester V')->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_V_create()
    {
        return view('semester.semester_V.create');
    }

    public function semester_V_store(SemesterRequest $semesterRequest, Semester $semester)
    {
        $attr = $semesterRequest->all();
        $semester = auth()->user()->semesters()->create($attr);

        session()->flash('success', 'Tambah Mata Kuliah Berhasil!');
        return redirect('semester_V');
    }

    public function semester_V_update(Semester $semester)
    {
        return view('semester.semester_V.update', [
            'semesters' => $semester,
        ]);
    }

    public function semester_V_edit(SemesterRequest $semesterRequest, Semester $semester)
    {
        $this->authorize('edit', $semester);

        $attr = $semesterRequest->all();
        $semester->update($attr);

        session()->flash('success', 'Update Mata Kuliah Berhasil!');
        return redirect('semester_V');
    }


    public function semester_V_delete()
    {
        $this->authorize('delete', Semester::find(request()->id));

        $materi = Materi::where('semester_id', request()->id)->get();
        $tugas = Tugas::where('semester_id', request()->id)->get();
        $uts = Uts::where('semester_id', request()->id)->get();
        $uas = Uas::where('semester_id', request()->id)->get();

        foreach ($materi as $m) {
            \Storage::delete($m->file_materi);
        }

        foreach ($tugas as $task) {
            \Storage::delete($task->file_tugas);
            \Storage::delete($task->file_answer);
        }

        foreach ($uts as $ut) {
            \Storage::delete($ut->file_uts);
            \Storage::delete($ut->file_answer);
        }

        foreach ($uas as $us) {
            \Storage::delete($us->file_uas);
            \Storage::delete($us->file_answer);
        }

        $materi = Materi::where('semester_id', request()->id)->delete();
        $tugas = Tugas::where('semester_id', request()->id)->delete();
        $uts = Uts::where('semester_id', request()->id)->delete();
        $uas = Uas::where('semester_id', request()->id)->delete();
        $semester = Semester::find(request()->id)->delete();

        session()->flash('success', 'Hapus Mata Kuliah Berhasil!');
        return redirect('semester_V');
    }

    /* SEMESTER VI */



    public function semester_VI_index()
    {
        return view('semester.semester_VI.index', [
            'semesters' => Semester::where('semester', 'Semester VI')->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_VI_create()
    {
        return view('semester.semester_VI.create');
    }

    public function semester_VI_store(SemesterRequest $semesterRequest, Semester $semester)
    {
        $attr = $semesterRequest->all();
        $semester = auth()->user()->semesters()->create($attr);

        session()->flash('success', 'Tambah Mata Kuliah Berhasil!');
        return redirect('semester_VI');
    }

    public function semester_VI_update(Semester $semester)
    {
        return view('semester.semester_VI.update', [
            'semesters' => $semester,
        ]);
    }

    public function semester_VI_edit(SemesterRequest $semesterRequest, Semester $semester)
    {
        $this->authorize('edit', $semester);

        $attr = $semesterRequest->all();
        $semester->update($attr);

        session()->flash('success', 'Update Mata Kuliah Berhasil!');
        return redirect('semester_VI');
    }


    public function semester_VI_delete()
    {
        $this->authorize('delete', Semester::find(request()->id));

        $materi = Materi::where('semester_id', request()->id)->get();
        $tugas = Tugas::where('semester_id', request()->id)->get();
        $uts = Uts::where('semester_id', request()->id)->get();
        $uas = Uas::where('semester_id', request()->id)->get();

        foreach ($materi as $m) {
            \Storage::delete($m->file_materi);
        }

        foreach ($tugas as $task) {
            \Storage::delete($task->file_tugas);
            \Storage::delete($task->file_answer);
        }

        foreach ($uts as $ut) {
            \Storage::delete($ut->file_uts);
            \Storage::delete($ut->file_answer);
        }

        foreach ($uas as $us) {
            \Storage::delete($us->file_uas);
            \Storage::delete($us->file_answer);
        }

        $materi = Materi::where('semester_id', request()->id)->delete();
        $tugas = Tugas::where('semester_id', request()->id)->delete();
        $uts = Uts::where('semester_id', request()->id)->delete();
        $uas = Uas::where('semester_id', request()->id)->delete();
        $semester = Semester::find(request()->id)->delete();

        session()->flash('success', 'Hapus Mata Kuliah Berhasil!');
        return redirect('semester_VI');
    }
    /* SEMESTER VII */



    public function semester_VII_index()
    {
        return view('semester.semester_VII.index', [
            'semesters' => Semester::where('semester', 'Semester VII')->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_VII_create()
    {
        return view('semester.semester_VII.create');
    }

    public function semester_VII_store(SemesterRequest $semesterRequest, Semester $semester)
    {
        $attr = $semesterRequest->all();
        $semester = auth()->user()->semesters()->create($attr);

        session()->flash('success', 'Tambah Mata Kuliah Berhasil!');
        return redirect('semester_VII');
    }

    public function semester_VII_update(Semester $semester)
    {
        return view('semester.semester_VII.update', [
            'semesters' => $semester,
        ]);
    }

    public function semester_VII_edit(SemesterRequest $semesterRequest, Semester $semester)
    {
        $this->authorize('edit', $semester);

        $attr = $semesterRequest->all();
        $semester->update($attr);

        session()->flash('success', 'Update Mata Kuliah Berhasil!');
        return redirect('semester_VII');
    }


    public function semester_VII_delete()
    {
        $this->authorize('delete', Semester::find(request()->id));

        $materi = Materi::where('semester_id', request()->id)->get();
        $tugas = Tugas::where('semester_id', request()->id)->get();
        $uts = Uts::where('semester_id', request()->id)->get();
        $uas = Uas::where('semester_id', request()->id)->get();

        foreach ($materi as $m) {
            \Storage::delete($m->file_materi);
        }

        foreach ($tugas as $task) {
            \Storage::delete($task->file_tugas);
            \Storage::delete($task->file_answer);
        }

        foreach ($uts as $ut) {
            \Storage::delete($ut->file_uts);
            \Storage::delete($ut->file_answer);
        }

        foreach ($uas as $us) {
            \Storage::delete($us->file_uas);
            \Storage::delete($us->file_answer);
        }

        $materi = Materi::where('semester_id', request()->id)->delete();
        $tugas = Tugas::where('semester_id', request()->id)->delete();
        $uts = Uts::where('semester_id', request()->id)->delete();
        $uas = Uas::where('semester_id', request()->id)->delete();
        $semester = Semester::find(request()->id)->delete();

        session()->flash('success', 'Hapus Mata Kuliah Berhasil!');
        return redirect('semester_VII');
    }


    /* SEMESTER VIII */



    public function semester_VIII_index()
    {
        return view('semester.semester_VIII.index', [
            'semesters' => Semester::where('semester', 'Semester VIII')->orderBy('mata_kuliah', 'asc')->get()
        ]);
    }

    public function semester_VIII_create()
    {
        return view('semester.semester_VIII.create');
    }

    public function semester_VIII_store(SemesterRequest $semesterRequest, Semester $semester)
    {
        $attr = $semesterRequest->all();
        $semester = auth()->user()->semesters()->create($attr);

        session()->flash('success', 'Tambah Mata Kuliah Berhasil!');
        return redirect('semester_VIII');
    }

    public function semester_VIII_update(Semester $semester)
    {
        return view('semester.semester_VIII.update', [
            'semesters' => $semester,
        ]);
    }

    public function semester_VIII_edit(SemesterRequest $semesterRequest, Semester $semester)
    {
        $this->authorize('edit', $semester);

        $attr = $semesterRequest->all();
        $semester->update($attr);

        session()->flash('success', 'Update Mata Kuliah Berhasil!');
        return redirect('semester_VIII');
    }


    public function semester_VIII_delete()
    {
        $this->authorize('delete', Semester::find(request()->id));

        $materi = Materi::where('semester_id', request()->id)->get();
        $tugas = Tugas::where('semester_id', request()->id)->get();
        $uts = Uts::where('semester_id', request()->id)->get();
        $uas = Uas::where('semester_id', request()->id)->get();

        foreach ($materi as $m) {
            \Storage::delete($m->file_materi);
        }

        foreach ($tugas as $task) {
            \Storage::delete($task->file_tugas);
            \Storage::delete($task->file_answer);
        }

        foreach ($uts as $ut) {
            \Storage::delete($ut->file_uts);
            \Storage::delete($ut->file_answer);
        }

        foreach ($uas as $us) {
            \Storage::delete($us->file_uas);
            \Storage::delete($us->file_answer);
        }

        $materi = Materi::where('semester_id', request()->id)->delete();
        $tugas = Tugas::where('semester_id', request()->id)->delete();
        $uts = Uts::where('semester_id', request()->id)->delete();
        $uas = Uas::where('semester_id', request()->id)->delete();
        $semester = Semester::find(request()->id)->delete();

        session()->flash('success', 'Hapus Mata Kuliah Berhasil!');
        return redirect('semester_VIII');
    }
}
