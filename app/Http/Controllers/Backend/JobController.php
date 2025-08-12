<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobController extends Controller{
    public function index(){
        try{
            return view('backend.jobs.index');
        }catch(\Exception $e){
            abort('500');
        }
    }

    public function create(){
        // try{
            return view('backend.jobs.create');
        // }catch(\Exception $e){
        //     abort('500');
        // }
    }

    public function edit(){
        try{
            return view('backend.jobs.edit');
        }catch(\Exception $e){
            abort('500');
        }
    }
}
