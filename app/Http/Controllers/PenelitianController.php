<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\Penelitian;
use Illuminate\Http\Request;

class PenelitianController extends Controller
{
    public function index()
    {
        $penelitians = Penelitian::paginate(25);
        return view('backend.penelitian.index', compact('penelitians'));
    }
}
