@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Nilai Tugas Akhir' => route('admin.nilaiTA.index'),
        'Tambah' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.nilaiTA.index'), 'icon-list', 'List nilaiTA') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

             
                {{-- CARD HEADER --}}
                <div class="card-header">
                    Tambah Data Nilai Tugas Akhir
                </div>

                {{-- CARD BODY --}}
                <div class="card-body">
                    <!-- @include('backend.nilaiTA._form') -->
                    {{ Form::model($nilaiTAs, []) }}  
                    <div class="form-group">
    <label for="nama">Nama Mahasiswa</label>
    {{ Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Nama Mahasiswa']) }}
</div>

<div class="form-group">
    <label for="nim">NIM</label>
    {{ Form::text('nim', null, ['class' => 'form-control', 'id' => 'nim', 'placeholder' => 'NIM Mahasiswa']) }}
</div>

<div class="form-group">
    <label for="angkatan">Angkatan</label>
    {{ Form::text('angkatan', null, ['class' => 'form-control', 'id' => 'angkatan', 'placeholder' => 'Angkatan']) }}
</div>

<div class="form-group">
    <label for="sidang_at"> Waktu Sidang</label>
    {{ Form::input('date','sidang_at', null, ['class' => 'form-control', 'id' => 'sidang_at', 'placeholder' => 'waktu Sidang']) }}
</div>

<div class="form-group">
    <label for="sidang_time">Jam Sidang</label>
    {{ Form::input('time','sidang_time', null, ['class' => 'form-control', 'id' => 'sidang_time', 'placeholder' => 'Jam Sidang']) }}
</div>

<div class="form-group">
    <label for="status">Status</label>
    {{ Form::text('status', null, ['class' => 'form-control', 'id' => 'status', 'placeholder' => 'status']) }}
</div>

<div class="form-group">
    <label for="nilai_angka">Nilai Angka</label>
    {{ Form::text('nilai_angka', null, ['class' => 'form-control', 'id' => 'nilai_angka', 'placeholder' => 'Nilai Angka']) }}
</div>

<div class="form-group">
    <label for="nilai_huruf">Nilai Huruf</label>
    {{ Form::text('nilai_huruf', null, ['class' => 'form-control', 'id' => 'nilai_huruf', 'placeholder' => 'Nilai Huruf']) }}
</div>

<div class="form-group">
    <label for="nilai_toefl">Nilai Toefl</label>
    {{ Form::text('nilai_toefl', null, ['class' => 'form-control', 'id' => 'nilai_toefl', 'placeholder' => 'Nilai Toefl']) }}
</div>

<div class="form-group">
    <label for="nilai_akhir_ta">Nilai Akhir Tugas Akhir</label>
    {{ Form::text('nilai_akhir_ta', null, ['class' => 'form-control', 'id' => 'nilai_akhir_ta', 'placeholder' => 'Nilai Akhir Tugas Akhir']) }}
</div>

<div class="form-group">
    <label for="dosen"> Nama dosen</label>
    {{ Form::text('nama', null, ['class' => 'form-control', 'id' => 'dosen', 'placeholder' => 'Nama dosen']) }}
</div>


                </div>

                {{-- CARD FOOTER --}}

                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection
