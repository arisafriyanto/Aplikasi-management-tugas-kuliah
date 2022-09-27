<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function account(User $user)
    {
        return view('account.index', [
            'account' => $user
        ]);
    }

    public function account_edit(User $user)
    {
        $attr = request()->validate([
            'name' => 'required|string|min:3|max:100',
            'username' => 'required|alpha_num|string|min:3|max:30',
            'email' => 'required|string|email|max:255',
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

                session()->flash('success', 'Update Account Berhasil!');
                return redirect()->back();
            } else {
                return back()->withErrors(['old-password' => 'password yang anda masukkan salah!']);
            }
        } else {
            $user->update($attr);

            session()->flash('success', 'Update Account Berhasil!');
            return redirect()->back();
        }
    }
}
