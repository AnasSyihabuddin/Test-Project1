@extends('adminlte::page')
@section('title', 'Pendaftaran')
@section('content_header')
 <nav aria-label="breadcrumb">
 <ol class="breadcrumb">
 <li class="breadcrumb-item"><a href="/home">Home</a></li>
 <li class="breadcrumb-item"><a href="/data-online">
 Tabel Master Pangkat</a></li>
 <li class="breadcrumb-item active" aria-current="page">Ubah</li>
</ol>
</nav>
@stop
@section('content')
 <section class="content container-fluid">
 <div class="">
 <div class="col-md-12">
 @includeif('partials.errors')
 <div class="card card-default">
 <div class="card-header">
 <span class="card-title">
 <h3>Mengubah Data Pendaftar</h3>
 </span>
 </div>
<div class="card-body">
 <form method="POST"
 action="{{ route('data-online.update',
 $dataOnline->no_pendaftaran) }}" role="form"
 enctype="multipart/form-data">
 {{ method_field('PATCH') }}
 @csrf
 @include('data-online.form')
 </form>
 </div>
 </div>
 </div>
 </div>
 </section>
@endsection
@section('css')
 <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
 <script> console.log('Hi!'); </script>
@stop