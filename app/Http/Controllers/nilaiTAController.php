<?php

namespace App\Http\Controllers;

use App\nilaiTA;
use App\User;
use Illuminate\Http\Request;
use DB;

class nilaiTAController extends Controller
{
    public function index()
    {
        // $nilaiTAs = nilaiTA::paginate(25);
        // dd(nilaiTA::find(2)->ta_semhas->peserta_semhas->mahasiswa);
        $nilaiTAs = nilaiTA::select('mahasiswa.nama as mahasiswa','mahasiswa.nim as nim','mahasiswa.angkatan as angkatan','ta_sidang.sidang_at as sidang_at','ta_sidang.sidang_time as sidang_time','ta_sidang.status as status','ta_sidang.nilai_angka as nilai_angka','ta_sidang.nilai_huruf as nilai_huruf','ta_sidang.nilai_toefl as nilai_toefl','ta_sidang.nilai_akhir_ta as nilai_akhir_ta','dosen.nama as nama')->join('ta_semhas','ta_sidang.ta_semhas_id','=','ta_semhas.id')->join('ta_peserta_semhas','ta_semhas.id','=','ta_peserta_semhas.ta_semhas_id')->join('mahasiswa','ta_peserta_semhas.mahasiswa_id','=','mahasiswa.id');
        $nilaiTAs = $nilaiTAs->join('ta_penguji_sidang','ta_sidang.id','=','ta_penguji_sidang.ta_sidang_id')->join('dosen','ta_penguji_sidang.dosen_id','=','dosen.id')->get();
        // $nilaiTAs =DB::table('mahasiswa')
        //     ->join('ta_peserta_semhas', 'ta_peserta_semhas.mahasiswa_id', '=', 'mahasiswa.id')
        //     ->join('ta_semhas', 'ta_semhas.id','=','ta_peserta_semhas.ta_semhas_id')
        //     //->join('ta_sidang', 'ta_sidang.ta_semhas_id','=','ta_semhas.id') //'ta_sidang.ta_semhas_id'
        //     // ->join('ta_penguji_sidang', 'ta_penguji_sidang.ta_sidang_id','=','ta_peserta_semhas.id')        
        //     // ->join('dosen', 'dosen.id','=','ta_penguji_sidang.dosen_id')        
        // ->select('mahasiswa.nama', 'mahasiswa.nim', 'mahasiswa.angkatan')->get();


// dd($nilaiTAs);
        //dd($nilaiTAs);

        return view('backend.nilaiTA.index', compact('nilaiTAs'));
    }
    public function update(Request $request, nilaiTA $nilaiTA)
    {
        $this->validate($request, $this->validation_rules);

        $dosen->update($request->only(
            'sidang_at',
            'sidang_time',
            'status',
            'nilai_angka',
            'nilai_huruf',
            'nilai_toefl',
            'nilai_akhir_ta'));

        $dosen->user->update([
            'password' => bcrypt('secret'),
            'email' => request('email'),
            'status' => 1,
        ]);

        session()->flash('flash_success', 'Berhasil mengupdate data nilaiTA '.$nilaiTA->nama);
        return redirect()->route('admin.nilaiTA.show', [$nilaiTA->id]);
    }
    public function create()
    {
        return view('backend.nilaiTA.create');
    }
    public function show(nilaiTA $nilaiTA)
    {
        return view('backend.nilaiTA.show', compact('nilaiTA'));
    }

    public function edit(nilaiTA $nilaiTA)
    {

        return view('backend.nilaiTA.edit', compact('nilaiTA'));
    }

    public function destroy(nilaiTA $nilaiTA)
    {
        $user = User::find($nilaiTA->id);
        $nilaiTA->delete();
        optional($user)->delete();

        session()->flash('flash_success', "Berhasil menghapus nilai Tugas Akhir ".$nilaiTA->nama);
        return redirect()->route('admin.nilaiTA.index');
    }
}
