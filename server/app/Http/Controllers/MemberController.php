<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    
    public function createMember(Request $request){
        $member = Member::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address
        ]);

        return redirect()->back()->with('OK', 'Berhasil menambahkan data member');
    }
    
    public function editMember(Request $request, $id){
        $member = Member::find($id);

        $member->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address
        ]);

        return redirect()->back()->with('OK', 'Berhasil mengedit data member');
    }
    
    public function deleteMember($id){
        $member = Member::find($id);
        $member->delete();

        return redirect()->back()->with('OK', 'Berhasil menghapus data member');
    }

}
