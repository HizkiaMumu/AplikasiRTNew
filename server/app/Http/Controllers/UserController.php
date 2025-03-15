<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    public function createUser(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->back()->with('OK', 'Berhasil menambahkan data user');
    }
    
    public function editUser(Request $request, $id){
        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->back()->with('OK', 'Berhasil mengedit data user');
    }
    
    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('OK', 'Berhasil menghapus data user');
    }

}
