@extends('adminlte::page')

@section('title','Data Pegawai')

@section('content_header')

<b><h1 class = "m-0 text-green" align="center">Sekilas Informasi </br>Data Pegawai</h1></b>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('users.create')}}" class="btn btn-primary mb-3">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>Nip</th>
                            <th>Nama</th>
                            <th>Bagian</th>
                            <th>Jabatan</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $key => $user)
                            <tr>
                                <td>{{$user->nip}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->bagian}}</td>
                                <td>{{$user->jabatan}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->telepon}}</td>
                                <td>
                                	 <a href="{{route('users.show', $user)}}" class="btn btn-info btn-xs">
                                         <i class="fa fa-lg fa-fw fa-eye"></i> Lihat
                                    </a>
                                    <a href="{{route('users.edit', $user)}}" class="btn btn-success btn-xs">
                                        <i class="fa fa-lg fa-fw fa-pen"></i> Ubah
                                    </a>
                                    <a href="{{route('users.destroy', $user)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                         <i class="fa fa-lg fa-fw fa-trash"></i> Hapus
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