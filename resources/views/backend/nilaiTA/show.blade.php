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

                   
                    {{ Form::close() }}

                </div>

                {{-- CARD FOOTER --}}
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
@endsection