@extends('adminlte::page')

@section('title','Data Pasien')

@section('content_header')

<b><h1 class = "m-0 text-green" align="center">Sekilas Informasi </br>Data Pasien</h1></b>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                  <div class="row clearfix">
                    <x-adminlte-small-box title="Antrian Pasien" theme="purple" text="{{ DB::table('antrians')->count('id')}}" icon="fas fa-head-side-mask"/></div>
                    <a href="{{route('pasiens.create')}}" class="btn btn-primary mb-3">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>Kode Pasien</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Kontak Darurat</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pasien as $key => $pasien)
                            <tr>
                                <td>{{$pasien->kopas}}</td>
                                <td>{{$pasien->namepas}}</td>
                                <td>{{$pasien->alamatpas}}</td>
                                <td>{{$pasien->telppas}}</td>
                                <td>{{$pasien->kontdarpas}}</td>
                                <td>
                                	 <a href="{{route('pasiens.show', $pasien)}}" class="btn btn-info btn-xs">
                                         <i class="fa fa-lg fa-fw fa-laptop"></i> Daftar
                                    </a>
                                    <a href="{{route('pasiens.edit', $pasien)}}" class="btn btn-success btn-xs">
                                        <i class="fa fa-lg fa-fw fa-pen"></i> Ubah
                                    </a>
                                    <a href="{{route('pasiens.destroy', $pasien)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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