<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Pengabdian;
use App\RefSkemaPengabdian;
use App\RefSumberdana;
class PengabdianController extends Controller
{
    public  function index()

    {
        $Pengabdians = Pengabdian::paginate(25);
        // dd($Pengabdians);
        return view('backend.Pengabdian.index', compact('Pengabdians'));

}
public  function edit(pengabdian $pengabdian){
    {
        return view('backend.pengabdian.edit', compact('pengabdian'));
    }
}
public function show(pengabdian $pengabdian)
    {
        // dd($pengabdian);
        $id = $pengabdian->id;
        $pengabdian = Pengabdian
                    ::join('ref_skema_pengabdian', 'ref_skema_pengabdian.id', '=', 'pengabdian.skema_pengabdian_id')
                    ->join('ref_sumber_dana', 'ref_sumber_dana.id', '=', 'pengabdian.sumber_dana_id')
                    ->select('judul', 'tahun', 'total_dana', 'ref_skema_pengabdian.nama as skema', 'ref_sumber_dana.nama as sumber_dana')
                    ->where('pengabdian.id', '=', $id)
                    ->get();
                    // dd($pengabdian);
        $pengabdian = $pengabdian[0];
                    return view('backend.pengabdian.show', compact('pengabdian'));
    }



    public function store(Request $request){
      
        $request->validate([
            'judul'=>'required',
            'tahun'=>'required|digits:4',
            'total_dana'=>'required',
            'skema_pengabdian_id'=>'required',
            'sumber_dana_id'=>'required',
            'file_kontrak '=>'file|mimes:pdf',
            'file_laporan'=>'file|mimes:pdf',
        ]);
        $pengabdian =new Pengabdian();
        $pengabdian->judul =$request->input('judul');
        $pengabdian->tahun =$request->input('tahun');
        $pengabdian->total_dana=$request->input('total_dana');
        $pengabdian->skema_pengabdian_id=$request->input('skema_pengabdian_id');
        $pengabdian->sumber_dana_id =$request->input('sumber_dana_id');

    if($request->file('file_kontrak')->isValid())
    {
                $filename=uniqid('kontrak-pengabdian-');
                $fileext =$request->file('file_kontrak')->extension();
                $filenameext =$filename.$fileext;
                $filepath=$request->input('file_kontrak')->storeAs('pengabdian_kontrak',$filenameext);
                $pengabdian->file_kontrak=$file_path;
         }


         if($request->file('file_laporan')->isValid())
    {
                $filename=uniqid('laporan-pengabdian-');
                $fileext =$request->file('file_laporan')->extension();
                $filenameext =$filename.fileext;
                $filepath=$request->input('file_laporan')->storeAs('pengabdian_laporan',$filenameext);
                $pengabdian->file_laporan=$file_path;
                


         }
            $pengabdian->save();

            return redirect()->route('admin.pengabdian.show',[$pengabdian->id]);

        }
    
    


    public function create()
{   
        $skema_pengabdian = RefSkemapengabdian::pluck('nama','id');
        $sumber_dana =RefSumberdana::pluck('nama','id');

     
     
        return view('backend.Pengabdian.create' ,compact('skema_pengabdian' ,'sumber_dana'));
    }


   
    public function destroy($id){
        Pengabdian::destroy($id);
        return redirect()->route('admin.pengabdian.index');
    }

}
