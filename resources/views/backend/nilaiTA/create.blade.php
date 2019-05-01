@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'nilaiTA' => route('admin.nilaiTA.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.nilaiTA.index'), 'icon-list', 'List nilaiTA') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{ Form::open(['route' => 'admin.nilaiTA.store', 'method' => 'post']) }}

                {{-- CARD HEADER--}}
                <div class="card-header">
                    Tambah nilaiTA
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    @include('backend.nilaiTA._form')
                </div>

                {{--CARD FOOTER--}}
                <div class="card-footer">
                    <input type="submit" value="Simpan" class="btn btn-primary"/>
                </div>

                {{ Form::close() }}
            </div>

        </div>
    </div>
@endsection
