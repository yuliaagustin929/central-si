<?php

namespace App\Http\Controllers;

use App\Penelitian;
use App\RefSkemaPenelitian;
use App\RefSumberDana;
use Illuminate\Http\Request;

class PenelitianController extends Controller
{
    public function create()
    {
        $skema_penelitian = RefSkemaPenelitian::all()->pluck('nama', 'id');
        $sumber_dana = RefSumberDana::all()->pluck('nama', 'id');
        return view('backend.penelitian.create', compact('skema_penelitian', 'sumber_dana'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tahun' => 'required|digits:4',
            'lama_tahun' => 'digits:1',
            'total_dana' => 'numeric',
            'skema_penelitian_id' => 'required',
            'sumber_dana_id' => 'required',
            'file_kontrak' => 'file|mimes:pdf',
            'file_laporan' => 'file|mimes:pdf'
        ]);

        $penelitian = new Penelitian();
        $penelitian->judul = $request->input('judul');
        $penelitian->tahun = $request->input('tahun');
        $penelitian->lama_tahun = $request->input('lama_tahun');
        $penelitian->total_dana = $request->input('total_dana');
        $penelitian->skema_penelitian_id = $request->input('skema_penelitian_id');
        $penelitian->sumber_dana_id = $request->input('sumber_dana_id');
        //Simpan file upload
        if($request->file('file_kontrak')->isValid())
        {
            $filename = uniqid('kontrak-');
            $fileext = $request->file('file_kontrak')->extension();
            $filenameext = $filename.'.'.$fileext;

            $filepath = $request->file_kontrak->storeAs('penelitian_kontrak', $filenameext);
            $penelitian->file_kontrak = $filepath;
        }

        if($request->file('file_laporan')->isValid())
        {
            $filename = uniqid('laporan-');
            $fileext = $request->file('file_laporan')->extension();
            $filenameext = $filename.'.'.$fileext;

            $filepath = $request->file_laporan->storeAs('penelitian_laporan', $filenameext);
            $penelitian->file_laporan = $filepath;
        }
        $penelitian->save();

        //Redirect ke halaman detail
        return redirect()->route('admin.penelitian.show', [$penelitian]);
    }

    public function show(Penelitian $penelitian)
    {

    }
}
