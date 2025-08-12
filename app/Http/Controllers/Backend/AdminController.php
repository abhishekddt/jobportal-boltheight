<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create(){
        try{
            return view('backend.auth.login');
        }catch(\Exception $e){
            abort('500');
        }
    }

    public function loginStore(LoginRequest $request){
        try{
            $request->authenticate();
            $request->session()->regenerate();
            return redirect('admin/dashboard');
        }catch(\Exception $e){
            abort('500');
        }
    }

    public function adminDashboard(){
        try{
            return view('backend.dashboard.index');
        }catch(\Exception $e){
            abort('500');
        }
    }

    public function adminList(){
        try{
            return view('backend.admins.index');
        }catch(\Exception $e){
            abort('500');
        }
    }
    public function editAdmin(){
        try{
            return view('backend.admins.edit');
        }catch(\Exception $e){
            abort('500');
        }
    }
    public function createAdmin(){
        try{
            return view('backend.admins.create');
        }catch(\Exception $e){
            abort('500');
        }
    }


}
