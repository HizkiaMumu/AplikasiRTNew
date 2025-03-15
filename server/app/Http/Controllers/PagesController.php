<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Member;
use App\Models\User;
use App\Models\TemplateSurat;
use App\Models\Surat;
use App\Models\SuratData;

class PagesController extends Controller
{

    public function loginPage(){
        return view('pages/auth/login');
    }

    public function registerPage(){
        return view('pages/auth/register');
    }
    
    public function dashboardPage(){
        return view('pages/dashboard/index');
    }

    public function membersPage(){
        $data['members'] = Member::all();
        return view('pages/members/index', $data);
    }

    public function servicePage(){
        $data['services'] = Service::all();

        return view('pages/service/index', $data);
    }

    public function tambahServicePage(){
        $data['members'] = Member::all();
        $data['cs'] = User::where('role', 'cs')->get();
        $data['teknisi'] = User::where('role', 'teknisi')->get();

        return view('pages/service/create', $data);
    }

    public function editServicePage($id){
        $data['service'] = Service::find($id);
        $data['members'] = Member::all();
        $data['cs'] = User::where('role', 'cs')->get();
        $data['teknisi'] = User::where('role', 'teknisi')->get();

        return view('pages/service/edit', $data);
    }

    public function usersPage(){
        $data['users'] = User::all();
        return view('pages/users/index', $data);
    }

    public function templateSuratPage(){
        $data['templates'] = TemplateSurat::all();
        return view('pages/template-surat/index', $data);
    }

    public function isiDataSuratPage($id){
        $data['surat']      = Surat::find($id);
        $data['surat_data'] = SuratData::where('surat_id', $id)->get();

        return view('pages/surat/isi-data', $data);
    }
    
}
