<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class keluargaontroller extends Controller
{
    return redirect()->route('admin.keluarga.show', [$keluarga->id]);
    
}
