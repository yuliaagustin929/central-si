@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'nilaiTA' => route('admin.nilaiTA.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.nilaiTA.create'), 'icon-plus', 'Tambah nilaiTA') !!}
    {!! cui_toolbar_btn(route('admin.nilaiTA.index'), 'icon-list', 'List Data Nilai Tugas Akhir') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{ Form::model($nilaiTA, ['route' => ['admin.nilaiTA.update', $nilaiTA->id], 'method' =>'patch']) }}

                {{--CARD HEADER --}}
                <div class="card-header">
                    Edit Nilai Tugas Akhir
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
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
                </div>

                {{-- CARD FOOTER--}}
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Simpan"/>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
