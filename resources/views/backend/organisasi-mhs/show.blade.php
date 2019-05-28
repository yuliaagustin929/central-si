@extends('backend.layouts.app')

 @section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Organisasi Mahasiswa' => route('admin.organisasi-mhs.index'),
        'Detail' => '#'
    ]) !!}
@endsection

 @section('toolbar')
    {!! cui_toolbar_btn_delete(route('admin.organisasi-mhs.destroy', [$MhsOrganisasi->id]), $MhsOrganisasi->id, 'icon-trash', 'Hapus Organisasi Mahasiswa', 'Anda yakin akan menghapus data organisasi ini?') !!}
    {!! cui_toolbar_btn(route('admin.organisasi-mhs.index'), 'icon-list', 'List Organisasi Mahasiswa') !!}
    {!! cui_toolbar_btn(route('admin.organisasi-mhs.edit', [$MhsOrganisasi->id]), 'icon-pencil', 'Edit Organisasi Mahasiswa') !!}
@endsection

 @section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                 {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong>Organisasi Mahasiswa</strong>
                </div>

                 {{-- CARD BODY--}}
                <div class="card-body">

                     {{ Form::model($MhsOrganisasi, []) }}

                     <div class="form-group">
                        <label for="mahasiswa_id"> <b>ID Mahasiswa</b> </label>
                        {{ Form::text('mahasiswa_id', null, ['class' => 'form-control-plaintext', 'id' => 'mahasiswa_id', 'readonly' => 'readonly', 'disabled']) }}
                    </div>

                     <div class="form-group">
                        <label for="organisasi"> <b>Organisasi</b> </label>
                        {!! Form::text('organisasi', null, ['class' => 'form-control-plaintext', 'id' => 'organisasi', 'readonly' => 'readonly', 'disabled']) !!}
                    </div>

                     <div class="form-group">
                        <label for="jabatan_id"> <b>Jabatan</b> </label>
                        {{ Form::text('jabatan_id', null, ['class' => 'form-control-plaintext', 'id' => 'jabatan_id', 'readonly' => 'readonly', 'disabled']) }}
                    </div>

                     <div class="form-group">
                        <label for="tgl_mulai"> <b>Tanggal Mulai</b> </label>
                        {{ Form::input('date', 'tgl_mulai', null, ['class' => 'form-control-plaintext', 'id' => 'tgl_mulai', 'readonly' => 'readonly', 'disabled']) }}
                    </div>

                     <div class="form-group">
                        <label for="tgl_selesai"> <b>Tanggal Selesai</b> </label>
                        {{ Form::input('date', 'tgl_selesai', null, ['class' => 'form-control-plaintext', 'id' => 'tgl_selesai', 'readonly' => 'readonly', 'disabled']) }}
                    </div>
                    <div class="form-group">
                        <label for="file_bukti">File Bukti (PDF)</label>
                        {{ Form::file('file_bukti', null, ['class' => 'form-control-plaintext', 'id' => 'file_bukti', 'readonly' => 'readonly', 'disabled']) }}
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