<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployersController extends Controller{
    public function index(){
        try{
            return view('backend.employers.index');
        }catch(\Exception $e){
            abort('500');
        }
    }

    public function create(){
        try{
            return view('backend.employers.create');
        }catch(\Exception $e){
            abort('500');
        }
    }

    public function edit(){
        try{
            return view('backend.employers.edit');
        }catch(\Exception $e){
            abort('500');
        }
    }

}
