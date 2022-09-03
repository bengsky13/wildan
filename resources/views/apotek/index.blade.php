@extends('adminlte::page')

@section('title','Data Obat Tersedia')

@section('content_header')

<b><h1 class = "m-0 text-green" align="center">Sekilas Informasi </br>Data Obat</h1></b>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('apoteks.create')}}" class="btn btn-primary mb-3">
                        Obat Baru
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>Kode Obat</th>
                            <th>Nama Obat</th>
                            <th>Jenis Obat</th>
                            <th>Kemasan</th>
                            <th>Isi Per Kemasan</th>
                            <th>Stok Obat</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($apoteks as $key => $apoteks)
                            <tr>
                                <td>{{$apoteks->kobat}}</td>
                                <td>{{$apoteks->namobat}}</td>
                                <td>{{$apoteks->jenobat}}</td>
                                <td>{{$apoteks->kemobat}}</td>
                                <td>{{$apoteks->satobat}}</td>
                                <td>{{$apoteks->stokobat}}</td>
                                <td>
                                	
                                    <a href="{{route('apoteks.edit', $apoteks)}}" class="btn btn-success btn-xs">
                                        <i class="fa fa-lg fa-fw fa-pen"></i> Tambah Stok
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