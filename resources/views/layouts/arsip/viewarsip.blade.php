@extends('layouts.master')

@section('content')
<section class="content-header">
    <h1>
      Arsip Surat
      <small>Lihat</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Arip</li>
    </ol><br>
  </section>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h4>Nomer : {{ $data->no_surat }}</h4>
            <h4>Kategori : {{ $data->kategori }}</h4>
            <h4>Judul : {{ $data->judul }}</h4>
            <h4>Waktu Unggah : {{ $data->created_at }}</h4>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <p style="text-align:center; vertical-align:middle"><iframe height="300" width="1000"  src="/dokument/{{ $data->dokumen }}"></iframe></p>
        </div>
    </div>
    <a href="/arsip" class="btn btn-warning">Kembali</a>
</div>


@endsection