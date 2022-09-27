<?php

namespace App\Http\Controllers;

use App\{User, Materi, Semester, Tugas, Uas, Uts};
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function users()
    {
        return view('users.index', [
            'users' => User::get()
        ]);
    }

    public function users_create()
    {
        return view('users.create');
    }

    public function users_store(UserRequest $userRequest, User $user)
    {
        $attr = $userRequest->all();

        $attr['password'] = bcrypt(request('password'));
        $create = $user->create($attr);

        if (request('hak_akses') == 'admin') {
            $create->assignRole('admin');
        } else {
            $create->assignRole('user');
        }


        session()->flash('success', 'Tambah User Berhasil!');
        return redirect('users');
    }

    public function users_update(User $user)
    {
        return view('users.update', [
            'users' => $user
        ]);
    }

    public function users_edit(User $user)
    {
        $attr = request()->validate([
            'name' => 'required|string|min:3|max:100',
            'username' => 'required|alpha_num|string|min:3|max:30',
            'email' => 'required|string|email|max:255',
            'hak_akses' => 'required|string|max:30',
        ]);


        if (request('old-password')) {

            $currentPassword = $user->password;
            $old_password = request('old-password');

            if (Hash::check($old_password, $currentPassword)) {
                $attr = request()->validate([
                    'name' => 'required|string|min:3|max:100',
                    'username' => 'required|alpha_num|string|min:3|max:30',
                    'email' => 'required|string|email|max:255',
                    'password' => 'required|string|min:8|confirmed',
                ]);

                if (strcmp(request('old-password'), request('password')) == 0) {
                    return back()->withErrors(['password' => 'password baru tidak boleh sama dengan password Anda saat ini!']);
                }

                $attr['password'] = bcrypt(request('password'));

                $user->update($attr);

                if (request('hak_akses') == 'admin') {
                    $user->syncRoles('admin');
                } else {
                    $user->syncRoles('user');
                }

                session()->flash('success', 'Update User Berhasil!');
                return redirect('users');
            } else {
                return back()->withErrors(['old-password' => 'password yang anda masukkan salah!']);
            }
        } else {
            $user->update($attr);

            if (request('hak_akses') == 'admin') {
                $user->syncRoles('admin');
            } else {
                $user->syncRoles('user');
            }

            session()->flash('success', 'Update User Berhasil!');
            return redirect('users');
        }
    }

    public function users_delete()
    {
        $user = User::find(request('id'));
        $semester = Semester::where('user_id', request('id'))->get();

        foreach ($semester as $ss) {

            $materi = Materi::where('semester_id', $ss->id)->get();
            foreach ($materi as $m) {
                \Storage::delete($m->file_materi);
            }
            $materi = Materi::where('semester_id', $ss->id)->delete();


            $tugas = Tugas::where('semester_id', $ss->id)->get();
            foreach ($tugas as $task) {
                \Storage::delete($task->file_tugas);
                \Storage::delete($task->file_answer);
            }
            $tugas = Tugas::where('semester_id', $ss->id)->delete();


            $uts = Uts::where('semester_id', $ss->id)->get();
            foreach ($uts as $ut) {
                \Storage::delete($ut->file_uts);
                \Storage::delete($ut->file_answer);
            }
            $uts = Uts::where('semester_id', $ss->id)->delete();


            $uas = Uas::where('semester_id', $ss->id)->get();
            foreach ($uas as $ua) {
                \Storage::delete($ua->file_uas);
                \Storage::delete($ua->file_answer);
            }
            $uas = Uas::where('semester_id', $ss->id)->delete();
        }


        $user->semesters()->delete();
        $user->delete();

        session()->flash('success', 'Delete User Berhasil!');
        return redirect('users');
    }
}
