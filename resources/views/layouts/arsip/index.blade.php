@extends('layouts.master')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
  table, th, td {
    border-collapse: collapse;
  }

  .alert{
    height: 50px;
  }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  @section('content')
  <section class="content-header">
    <h1>
      Arsip Surat
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Arip</li>
    </ol><br>
  </section>
<div>
    @if (Session()->has('message'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ Session()->get('message')}}
      </div>
    @endif
</div>
        <div class="table-responsive col-md-12">
          <div class="col-md-6">
            <a href="/tambaharsip" class="btn btn-success">(<i class="fa fa-solid fa-plus"></i>)</a>
        </div>
            <div class="col-md-6 ">
              <form action="/arsip" method="GET">
               <input type="search" class="form-control" name="search" id="search" placeholder="Search">  
              </form>
              </div>
            <table class="table table-bordered table-striped" id="tbCaseData" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center">No Surat</th>
                      <th class="text-center">Kategori</th>
                      <th class="text-center">Judul</th>
                      <th class="text-center">Waktu Pengarsipan</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key=>$value)
                    <tr>
                      <td style='text-align:center; vertical-align:middle'>{{$value->no_surat}}</td>
                      <td style='text-align:center; vertical-align:middle'>{{$value->kategori}}</td>
                      <td style='text-align:center; vertical-align:middle'>{{$value->judul}}</td>
                      <td style='text-align:center; vertical-align:middle'>{{$value->created_at}}</td>
                      <td style='text-align:center; vertical-align:middle'>
                        <a href="#" class="btn btn-danger delete" data-id="{{ $value->id }}"  data-judul="{{ $value->judul }}" ><i class="fa fa-solid fa-trash"></i>  </a>
                        <a href="dokument/{{ $value->dokumen}}"><button class="btn btn-info"><i class="fa fa-solid fa-download"></i></button></a>
                        <a href="/show/{{ $value->id }}" class="btn btn-warning"><i class="fa fa-solid fa-eye"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
            {{ $data->links() }}
            <script>
              $('.delete').click(function(){
            
                var arsipid = $(this).attr('data-id');
                var arsipjudul = $(this).attr('data-judul');
            
                swal({
                  title: "Yakin ?",
                  text: "Kamu akan menghapus data arsip dengan judul "+arsipjudul+"",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((willDelete) => {
                  if (willDelete) {
                    window.location="/delete/"+arsipid+""
                    swal("Data berhasil dihapus", {
                      icon: "success",
                    });
                   } else {
                    swal("Data tidak jadi dihapus");
                  }
               });
              });
            </script>
            
            <script>
              @if (Session::has('message'))
                  toastr.success("{{ Session::get('message') }}")
              @endif 
            </script>
        </div>

  @endsection

  

