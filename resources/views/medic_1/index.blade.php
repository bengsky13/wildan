@extends('adminlte::page')

@section('title','Antrian Pemeriksaan Awal')

@section('content_header')

<h1 class = "m-0 text-green" align="center"><b>Pemeriksaan Awal</br></h1></b>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!--<a href="{{route('users.create')}}" class="btn btn-primary mb-3">
                        Tambah
                    </a>-->
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>Antrian</th>
                            <th>Kode Pasien</th>
                            <th>Nama Pasien</th>
                            <th>Klasifikasi</th>
                            <th>Tanggal Periksa</th>
                            <!--<th>Telepon</th>-->
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($antrians as $antrian)
                            <tr>
                                <td>{{$antrian->noant}}</td>
                                <td>{{$antrian->kopasant}}</td>
                                <td>{{$antrian->namapasant}}</td>
                                <td>{{$antrian->tipasant}}</td>
                                <td>{{$antrian->tangantpas}}</td>
                                
                                <td>
                                	 <a href="{{route('antrians.show', $antrian)}}" class="btn btn-info btn-xs">
                                         <i class="fa fa-lg fa-fw fa-eye"></i> Proses
                                    </a>
                                    <!--<a href="{{route('antrians.edit', $antrian)}}" class="btn btn-success btn-xs">
                                        <i class="fa fa-lg fa-fw fa-pen"></i> Ubah-->
                                    </a>
                                    <!--<a href="{{route('antrians.destroy', $antrian)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                         <i class="fa fa-lg fa-fw fa-trash"></i> Hapus-->
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush