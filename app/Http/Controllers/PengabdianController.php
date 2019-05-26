<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\Pengabdian;
use App\RefSkemaPengabdian;
use App\RefSumberDana;
use Illuminate\Http\Request;

class PengabdianController extends Controller
{
    public function index()
    {
        $pengabdians = Pengabdian::paginate(25);
        return view('backend.pengabdian.index', compact('pengabdians'));
    }

    public function create()
    {
        $skema_pengabdian = RefSkemaPengabdian::all()->pluck('nama','id');
        $sumber_dana = RefSumberDana::all()->pluck('nama', 'id');
        return view('backend.pengabdian.create', compact('skema_pengabdian', 'sumber_dana'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tahun' => 'required|digits:4',
            'total_dana' => 'numeric',
            'skema_pengabdian_id' => 'required',
            'sumber_dana_id' => 'required',
            'file_kontrak' => 'file|mimes:pdf',
            'file_laporan' => 'file|mimes:pdf'
        ]);

        $pengabdian = new Pengabdian();
        $pengabdian->judul = $request->input('judul');
        $pengabdian->tahun = $request->input('tahun');
        $pengabdian->total_dana = $request->input('total_dana');
        $pengabdian->skema_pengabdian_id = $request->input('skema_pengabdian_id');
        $pengabdian->sumber_dana_id = $request->input('sumber_dana_id');
   
        if($request->file('file_kontrak')->isValid())
        {
            $filename = uniqid('kontrak-pengabdian-');
            $fileext = $request->file('file_kontrak')->extension();
            $filenameext = $filename.'.'.$fileext;

            $filepath = $request->file_kontrak->storeAs('pengabdian_kontrak', $filenameext);
            $pengabdian->file_kontrak = $filepath;
        }
        if($request->file('file_laporan')->isValid())
        {
            $filename = uniqid('laporan-pengabdian-');
            $fileext = $request->file('file_laporan')->extension();
            $filenameext = $filename.'.'.$fileext;

            $filepath = $request->file_laporan->storeAs('pengabdian_laporan', $filenameext);
            $pengabdian->file_laporan = $filepath;
        }
        $pengabdian->save();
        return redirect()->route('admin.pengabdian.show', [$pengabdian->id]);
    }
    public function show(Pengabdian $pengabdian){

    }
}
