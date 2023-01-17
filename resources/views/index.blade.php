@extends('adminlte::page')
@section('title', 'Tabel Pendaftaran Mahasiswa')
@section('content_header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            Tabel Pangkat</li>
    </ol>
</nav>
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex;
 justify-content: space-between;
 align-items: center;">
                        <span id="card_title">
                            <h3>Tabel Pendaftaran Nilai Siswa</h3>
                        </span>
                        <div class="float-right">
                            @include('pendaftaran-siswa.search',
                            ['url'=>'pendaftaran-siswa',
                            'link'=>'pendaftaran-siswa'])
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No Pendaftaran</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Asal Sekolah</th>
                                    <th>Agama</th>
                                    <th>Nilai Bhs Indonesia</th>
                                    <th>Nilai Ipa</th>
                                    <th>Nilai Matematika</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendaftaranSiswa as $pendaftaranSiswas)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $pendaftaranSiswas->nama }}</td>
                                    <td>{{ $pendaftaranSiswas->alamat }}</td>
                                    <td>{{ $pendaftaranSiswas->tanggal_lahir }}</td>
                                    <td>{{ $pendaftaranSiswas->jenis_kelamin }}</td>
                                    <td>{{ $pendaftaranSiswas->asal_sekolah }}</td>
                                    <td>{{ $pendaftaranSiswas->agama_id }}</td>
                                    <td>{{ $pendaftaranSiswas->nilai_ind }}</td>
                                    <td>{{ $pendaftaranSiswas->nilai_ipa }}</td>
                                    <td>{{ $pendaftaranSiswas->nilai_mtk }}</td>
                                    <td>
                                        <form action="{{ route('pendaftaran-siswa.destroy',$pendaftaranSiswas->no_pendaftaran) }}"
                                         method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('pendaftaran-siswa.show',$pendaftaranSiswas->no_pendaftaran) }}">
                                                <i class="fa fa-fw fa-eye"></i> Lihat</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('pendaftaran-siswa.edit',$pendaftaranSiswas->no_pendaftaran) }}">
                                                <i class="fa fa-fw fa-edit"></i> Ubah</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-fw fa-trash">
                                                </i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $pendaftaranSiswa->links('pagination::bootstrap-4') !!}
        </div>
    </div>
</div>
@endsection