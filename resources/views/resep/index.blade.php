@extends('adminlte::page')

@section('title','Data Obat')

@section('content_header')

<b><h1 class = "m-0 text-green" align="center">List Pemberian </br>Resep Obat</h1></b>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>Nomor Resep</th>
                            <th>Nomor Rekam Medis</th>
                            <th> Dokter Pemberi Obat</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                            
                        @foreach($reseps as $key =>$resep)
                            <tr>
                                <td>{{$resep->noresep}}</td>
                                <td>{{$resep->noremed}}</td>
                                <td>{{$resep->namdok}}</td>
                                <td>
                                	
                                    <a href="{{route('reseps.show', $resep)}}" class="btn btn-success btn-xs">
                                        <i class="fa fa-lg fa-fw fa-pen"></i> Proses
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