@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'nilaiTA' => route('admin.nilaiTA.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.nilaiTA.create'), 'icon-plus', 'Tambah nilaiTA') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong>List Dosen</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">
                            <form method="post" action="{{ route('admin.dosencari.show') }}" class="form-inline">
                                {{ csrf_field() }}
                                <input type="text" name="keyword" class="form-control" value="@if(isset($keyword)) {{ $keyword }} @endif" placeholder="Masukkan Keyword" />
                                <input type="submit" name="submit" class="btn btn-primary" value="Cari" />
                            </form>
                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $nilaiTAs->links() }}
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Nama Mahasiswa</th>
                            <th class="text-center">NIM</th>
                            <th class="text-center">Angkatan</th>
                            <th class="text-center">Waktu Sidang</th>
                            <th class="text-center">Jam Sidang</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Nilai Angka</th>
                            <th class="text-center">Nilai Huruf</th>
                            <th class="text-center">Nilai Toefl</th>
                            <th class="text-center">Nilai Tugas Akhir</th>
                            <th class="text-center">Dosen</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($nilaiTAs as $nilaiTA)
                            <tr>
                                <td class="text-center">
                                <td class="text-center">
                                <td class="text-center">
                                <td class="text-center">{{ $nilaiTA->sidang_at }}</td>
                                <td class="text-center">{{ $nilaiTA->sidang_time }}</td>
                                <td class="text-center">{{ $nilaiTA->status }}</td>
                                <td class="text-center">{{ $nilaiTA->nilai_angka }}</td>
                                <td class="text-center">{{ $nilaiTA->nilai_huruf }}</td>
                                <td class="text-center">{{ $nilaiTA->nilai_toefl }}</td>
                                <td class="text-center">{{ $nilaiTA->nilai_akhir_ta }}</td>
                                <td class="text-center">
                                <td class="text-center">
                                    {!! cui_btn_view(route('admin.nilaiTA.show', [$nilaiTA->id])) !!}
                                    {!! cui_btn_edit(route('admin.nilaiTA.edit', [$nilaiTA->id])) !!}
                                    {!! cui_btn_delete(route('admin.nilaiTA.destroy', [$nilaiTA->id]), "Anda yakin akan menghapus data nilai tugas akhir ini?") !!}
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="12" class="text-center">
                                <h8> data penelitian belum ada </h8>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">

                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $nilaiTAs->links() }}
                            </div>
                        </div>
                    </div>

                </div><!--card-body-->

                {{-- CARD FOOTER--}}
                <div class="card-footer">
                </div>

            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

@endsection
