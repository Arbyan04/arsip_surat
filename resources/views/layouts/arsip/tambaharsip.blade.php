@extends('layouts.master')

@section('content')
<section class="content-header">
    <h1>
      Arsip Surat
      <small>Unggah</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Arip</li>
    </ol><br>
  </section>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Tambah Data Arsip</h4>
                    <h5>Unggah surat yang telah terbit pada form ini untuk diarsipkan</h5>
                    <h5>Catatan :</h5>
                    <h5 class="text-bold">*Gunakan file berformat PDF</h5><hr>
                    <form method="POST" action="{{url ('arsip')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 ">
                            <label for="no_surat">No Surat</label>
                           <input type="text" class="form-control" name="no_surat" id="no_surat" value="{{ old('no_surat') }}" autocomplete="off">  
                        </div>
                        <div class="col-md-6">
                             <label for="kategori">Kategori</label>
                             <select class="form-control" id="kategori" name="kategori" value="{{ old('kategori') }}">
                                <option value="">All</option>
                                <option value="pengumuman">Pengumuman</option>
                                <option value="Undangan">Undangan</option>
                                <option value="Undangan">Nota Dinas</option>
                                <option value="Undangan">Pemberitahuan</option>
                            </select>      
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="judul">Judul</label>
                           <input type="text" class="form-control" name="judul" id="judul" value="{{ old('judul') }}" autocomplete="off">  
                        </div>
                        <div class="col-md-6">
                            <label for="dokumen">Dokumen</label>
                            <input type="file" class="form-control" value="{{ old('dokumen') }}" name="dokumen">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-1">
                            <button class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                        <div class="col-md-1">
                            <a href="/arsip" class="btn btn-warning">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection