@extends('adminlte::page')

@section('title','Antrian Pemeriksaan Dokter')

@section('content_header')

<h1 class = "m-0 text-green" align="center"><b>Pemeriksaan Dokter</br></h1></b>
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
                        @foreach($antrian2s as $antrian2)
                            <tr>
                                <td>{{$antrian2->noant}}</td>
                                <td>{{$antrian2->kopasant}}</td>
                                <td>{{$antrian2->namapasant}}</td>
                                <td>{{$antrian2->tipasant}}</td>
                                <td>{{$antrian2->tangantpas}}</td>
                                
                                <td>
                                	 <a href="{{route('antrian2s.show', $antrian2)}}" class="btn btn-info btn-xs">
                                         <i class="fa fa-lg fa-fw fa-eye"></i> Proses
                                    </a>
                                    <a href="{{route('antrian2s.destroy', $antrian2)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-success btn-xs">
                                         <i class="fa fa-lg fa-fw fa-check-circle"></i> Selesai
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
            if (confirm('Lanjutkan Untuk pengambilan Obat ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush