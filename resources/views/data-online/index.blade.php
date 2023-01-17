@extends('adminlte::page') @section('title', 'Pendaftaran Online')
@section('content_header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">
    Pendaftar Online
    </li>
    </ol>
</nav>
@stop @section('content')
<div class="container-fluid">
 <div class="row">
 <div class="col-sm-12">
 <div class="card">
 <div class="card-header">
 <div style="display: flex; justify-content: space-between;
 align-items: cente;">
 <span id="card_title">
 <h3>Pendaftar Online</h3>
 </span>
 <div class="float-right">
 @include('data-online.search',['url'=>'data-online',
 'link'=>'data-online'])
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
 <th>No</th>
 <th>NO PEND</th>
 <th>NAMA</th>
 <th>BHS IND</th>
 <th>MTK</th>
 <th>IPA</th>
 <th>TOTAL</th>
 <th></th>
 </tr>
 </thead>
 <tbody>
 @foreach ($data_Online as $data_Onlines)
 <tr>
 <td>{{ ++$i }}</td>
 <td>{{ $data_Onlines->no_pendaftaran }}</td>
 <td>{{ $data_Onlines->nama }}</td>
 <td>{{ $data_Onlines->nilai_ind }}</td>
 <td>{{ $data_Onlines->nilai_mtk }}</td>
 <td>{{ $data_Onlines->nilai_ipa }}</td>
 <td>
 <form action="{{ route('data-online.destroy',$data_Onlines->no_pendaftaran) }}"
 method="POST">
 <a class="btn btn-sm btn-primary"
 href="{{ route('data-online.show',$data_Onlines->no_pendaftaran) }}">
 <i class="fa fa-fw fa-eye"></i>Lihat</a>
 <a class="btn btn-sm btn-success"
 href="{{ route('data-online.edit',$data_Onlines->no_pendaftaran) }}">
 <i class="fa fa-fw fa-edit"></i>
 Ubah</a>
 @csrf @method('DELETE')
 <button type="submit"
 class="btn btn-danger btn-sm">
 <i class="fa fa-fw fa-trash"></i>
 Hapus
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
 {!! $data_Online->links('pagination::bootstrap-4') !!}
 </div>
 </div>
</div>
@endsection
