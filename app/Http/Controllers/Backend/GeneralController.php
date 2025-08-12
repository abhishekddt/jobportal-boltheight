<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneralController extends Controller{
    public function index(){
        try{
            return view('backend.general.index');
        }catch(\Exception $e){
            abort('500');
        }
    }
}
