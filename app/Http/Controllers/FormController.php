<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citizen;

class FormController extends Controller
{
    public function Enkripsi(){
        $citizens = Citizen::all();
        return view('index', compact('citizens'));
    }
    public function tampilanform(){
        return view('formimage');
    }
    public function dekripsi(){
        
    }
}

