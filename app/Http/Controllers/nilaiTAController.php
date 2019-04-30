<?php

namespace App\Http\Controllers;

use App\nilaiTA;
use App\User;
use Illuminate\Http\Request;

class nilaiTAController extends Controller
{
    public function index()
    {
        $nilaiTAs = nilaiTA::paginate(25);
        return view('backend.nilaiTA.index', compact('nilaiTAs'));
    }

}
