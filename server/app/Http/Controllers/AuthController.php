<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    
    public function signIn(Request $request){
        $user = User::where('nik', $request->nik)->first();
        if ($user != null) {
            $user = Auth::attempt(['nik' => $request->nik, 'password' => $request->password]);

            if ($user) {
                return redirect('/dashboard');
            } else {
                return redirect()->back()->with('ERR', 'NIK atau password yang anda masukan salah.');
            }
        } else {
            return redirect()->back()->with('ERR', 'NIK atau password yang anda masukan salah.');
        }
    }

    public function signUp(Request $request){
        $user = User::where('nik', $request->nik)->first();

        if ($user != null) {
            return redirect()->back()->with('ERR', 'NIK yang anda masukan telah terdaftar.');
        }

        $user = User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_tanggal_lahir' => $request->tempat_tanggal_lahir,
            'warga_negara' => $request->warga_negara,
            'pekerjaan' => $request->pekerjaan,
        ]);

        return redirect('/login')->with('OK', 'Berhasil melakukan pendaftaran akun, silahkan login.');
    }

    public function signOut(){
        Auth::logout();
        return redirect('/login')->with('OK', 'Berhasil melakukan logout.');
    }

}
