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
