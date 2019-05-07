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

            {{ Form::model($nilaiTA, ['route' => ['admin.nilaiTA.update', $nilaiTA->id], 'method' => 'patch']) }}       
                {{-- CARD HEADER --}}
                <div class="card-header">
                    Tambah Data Nilai Tugas Akhir
                </div>

                {{-- CARD BODY --}}
                <div class="card-body">
                    @include('backend.nilaiTA._form')
                </div>

                {{-- CARD FOOTER --}}

                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection
