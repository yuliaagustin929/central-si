<?php

namespace App\Http\Controllers;
use App\nilaiTA;
use App\User;
use Illuminate\Http\Request;

class nilaiTAcariController extends Controller
//{
   // public function show(Request $request)
   // {
        $this->validate($request, ['keyword' => 'required']);

        $keyword = $request->input('keyword');
        $filter = '%'.$keyword.'%';

        $nilaiTAs = nilaiTA::where('nama', 'like', $filter)
            ->orWhere('nip', 'like', $filter)
            ->paginate(25);

        return view('backend.nilaiTA.index', compact('nilaiTAs', 'keyword'));

    }
}
