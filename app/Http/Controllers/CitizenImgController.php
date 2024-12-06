<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citizen;


class CitizenImgController extends Controller
{
    public function index() : view 
    {
        $citizens = Citizen::all();
        return view('index', compact('citizens'));
    }

    
}
