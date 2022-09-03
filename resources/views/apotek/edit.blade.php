@extends('adminlte::page')
@section('title', 'Tambah Stok Obat')
@section('content_header')
<!-- <link rel="stylesheet" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">-->
    <h1 class="m-0 text-blue" align="center">Tambah Stok Obat</h1>
@stop
@section('content')
    <form action="{{route('apoteks.update', $apotek)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                     <script>
                            function jumlah(e1,e2){
                            var e1 = document.getElementById('exampleInputStokapot').value;
                            var e2 = document.getElementById('exampleInputJumasuk').value;
                            var e3 =  e1 - e2 * -1 ;
                            document.getElementById('exampleInputStokobat').value = e3;
                        }
                        </script>
                    <div class="form-group">
                        <label for="exampleInputKobat">Kode Obat</label>
                        <input type="text" class="form-control @error('kobat') is-invalid @enderror" id="exampleInputKobat" placeholder="Kode Obat" name="kobat" value="{{$apotek->kobat ?? old('kobat')}}" maxlength="12" size="12" readonly>
                        @error('kobat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNamobat">Nama Obat</label>
                        <input type="text" class="form-control @error('namobat') is-invalid @enderror" id="exampleInputNamobat" placeholder="Nama Obat" name="namobat" value="{{$apotek->namobat ??old('namobat')}}" readonly>
                        @error('namobat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputJenobat">Jenis Obat</label>
                        <input type="text" class="form-control @error('jenis Obat') is-invalid @enderror" id="exampleInputJenobat" placeholder="Jenis Obat" name="jenobat" value="{{$apotek->jenobat ??old('jenobat')}}" readonly>
                        @error('jenis Obat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputKemasan">Kemasan</label>
                        <input type="text" class="form-control @error('kemasan') is-invalid @enderror" id="exampleInputKemasan" placeholder="Kemasan Obat" name="kemobat" value="{{$apotek->kemobat ?? old('kemobat')}}" readonly>
                        @error('kemasan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputSatobat">Isi Per Kemasan</label>
                        <input type="text" class="form-control @error('Satuan Obat') is-invalid @enderror" id="exampleInputSatobat" placeholder="Isi Perkemasan" name="satobat" value="{{$apotek->satobat ??old('satobat')}}" readonly>
                        @error('satuan obat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                     <div class="form-group">
                        <label for="exampleInputStokapot">Stok Apotek</label>
                        <input type="number" class="form-control @error('stok apotek') is-invalid @enderror" id="exampleInputStokapot" onkeyup="jumlah();" placeholder="" name="stokapot" value= "{{$apotek->stokobat ?? old}}"readonly  >
                        @error('stok apotek') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputJumasuk">Jumlah Masuk ( Kemasan X Isi Perkemasan )</label>
                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="exampleInputJumasuk" onkeyup="jumlah();" placeholder="Jumlah Masuk" name="jumasuk" value="{{old('jumasuk')}}">
                        @error('jumlah') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                     <div class="form-group">
                        <label for="exampleInputStokobat">Total Stok ( Stok Apotek + Jumlah Masuk )</label>
                        <input type="number" class="form-control @error('stok obat') is-invalid @enderror" id="exampleInputStokobat" placeholder="" name="stokobat" value= "jumlah"readonly>
                        @error('jumlah') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('apoteks.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop