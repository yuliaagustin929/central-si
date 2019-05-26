<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\Pengabdian;
use Illuminate\Http\Request;

class PengabdianController extends Controller
{
    public function index()
    {
        $pengabdians = Pengabdian::paginate(25);
        return view('backend.pengabdian.index', compact('pengabdians'));
    }
}
