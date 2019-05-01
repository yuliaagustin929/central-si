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
    {!! cui_toolbar_btn(route('admin.nilaiTA.index'), 'icon-list', 'List nilaiTA') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{ Form::model($nilaiTA, ['route' => ['admin.nilaiTA.update', $nilaiTA->id], 'method' => 'patch']) }}

                {{--CARD HEADER --}}
                <div class="card-header">
                    Edit nilaiTA
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    @include('backend.nilaiTA._form')
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
