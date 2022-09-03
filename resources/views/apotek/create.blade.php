@extends('adminlte::page')
@section('title', 'Data Obat Baru')
@section('content_header')
<!-- <link rel="stylesheet" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">-->
    <h1 class="m-0 text-blue">Input Data Obat Baru</h1>
@stop
@section('content')
    <form action="{{route('apoteks.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                        <div class="form-group">
                        <label for="exampleInputKobat">Kode Obat</label>
                        <input type="text" class="form-control @error('kobat') is-invalid @enderror" id="exampleInputKobat" placeholder="Kode Obat" name="kobat" value=" <?php
                        $awal='OBT';
                        $tengah = '000';
                        $akhir =DB::table('apoteks')->max('id');
                        $no=$akhir+1;
                        $s=1;
                        if ($no){
                            echo "$awal$tengah$no";}
                            else {
                                echo "$awal$tengah$s";
                            }
                         ?>" maxlength="12" size="12" readonly>
                        @error('kobat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNamobat">Nama Obat</label>
                        <input type="text" class="form-control @error('namobat') is-invalid @enderror" id="exampleInputNamobat" placeholder="Nama Obat" name="namobat" value="{{old('namobat')}}">
                        @error('namobat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputJenobat">Jenis Obat</label>
                        <input type="text" class="form-control @error('jenis Obat') is-invalid @enderror" id="exampleInputJenobat" placeholder="Jenis Obat" name="jenobat" value="{{old('jenobat')}}">
                        @error('jenis Obat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputKemasan">Kemasan</label>
                        <input type="text" class="form-control @error('kemasan') is-invalid @enderror" id="exampleInputKemasan" placeholder="Kemasan Obat" name="kemobat" value="{{old('kemobat')}}">
                        @error('kemasan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputSatobat">Isi Per Kemasan</label>
                        <input type="text" class="form-control @error('Satuan Obat') is-invalid @enderror" id="exampleInputSatobat" placeholder="Isi Perkemasan" name="satobat" value="{{old('satobat')}}">
                        @error('satuan obat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputStokobat">Jumlah Masuk ( Kemasan X Isi Perkemasan )</label>
                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="exampleInputStokobat" placeholder="Jumlah Masuk" name="stokobat" value="{{old('stokobat')}}">
                        @error('jabatan') <span class="text-danger">{{$message}}</span> @enderror
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