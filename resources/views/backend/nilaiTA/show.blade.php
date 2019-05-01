@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'nilaiTA' => route('admin.nilaiTA.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn_delete(route('admin.nilaiTA.destroy', [$nilaiTA->id]), $nilaiTA->id, 'icon-trash', 'Hapus nilaiTA', 'Anda yakin akan menghapus data nilaiTA ini?') !!}
    {!! cui_toolbar_btn(route('admin.nilaiTA.index'), 'icon-list', 'List nilaiTA') !!}
    {!! cui_toolbar_btn(route('admin.nilaiTA.create'), 'icon-plus', 'Tambah nilaiTA') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                nilaiTA               
                 </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    {{ Form::model($nilaiTA, []) }}

                    <div class="form-group">
                        <label for="nama"><strong>Nama Mahasiswa</strong></label>
                        {{ Form::text('nama', null, ['class' => 'form-control-plaintext', 'id' => 'nama', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="nim"><strong>NIM</strong></label>
                        {{ Form::text('nim', null, ['class' => 'form-control-plaintext', 'id' => 'nim', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="angkatan"><strong>Angkatan</strong></label>
                        {{ Form::text('angkatan', null, ['class' => 'form-control-plaintext', 'id' => 'angkatan', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="sidang_at"><strong>Waktu Sidang</strong></label>
                        {{ Form::text('date','sidang_at', null, ['class' => 'form-control-plaintext', 'id' => 'sidang_at', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="sidang_time"><strong>Jam Sidang</strong></label>
                        {{ Form::text('time','sidang_time', null, ['class' => 'form-control-plaintext', 'id' => 'sidang_time', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="status"><strong>Status</strong></label>
                        {{ Form::input('status', null, ['class' => 'form-control-plaintext', 'id' => 'status', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="nilai_angka"><strong>Nilai Angka</strong></label>
                        {{ Form::text('nilai_angka, null, ['class' => 'form-control-plaintext', 'id' => 'nilai_angka', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="nilai_huruf"><strong>Nilai Huruf</strong></label>
                        {{ Form::text('nilai_huruf', null, ['class' => 'form-control-plaintext', 'id' => 'nilai_huruf', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="nilai_toefl"><strong>Nilai Toefl</strong></label>
                        {{ Form::text('nilai_toefl', null, ['class' => 'form-control-plaintext', 'id' => 'nilai_toefl', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="nilai_akhir_ta"><strong>Nilai Akhir Tugas Akhir</strong></label>
                        {{ Form::text('nilai_akhir_ta', null, ['class' => 'form-control-plaintext', 'id' => 'nilai_akhir_ta', 'readonly' => 'readonly']) }}
                    </div>

                   
                    {{ Form::close() }}

                </div>

                {{-- CARD FOOTER --}}
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
@endsection