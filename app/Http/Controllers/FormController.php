<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function Enkripsi(){
        return view('index');
    }
    public function tampilanform(){
        return view('formimage');
    }
    public function dekripsi(){
        
    }
}

