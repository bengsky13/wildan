@extends('adminlte::page')
@section('title', 'Data Antrian Periksa Dokter')
@section('content_header')
<!-- <link rel="stylesheet" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">-->
    <h1 class="m-0 text-blue"  align="center"><b>Form Antrian Pemeriksaan Dokter</h1>
@stop
@section('content')
 <form action="{{route('antrians.update', $medic1)}}" method="post">
   @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                     <div class="form-group">
                        <label for="exampleInputNoant">Nomor Antrian</label>
                        <input type="text" class="form-control @error('noant') is-invalid @enderror" id="exampleInputNoant" placeholder="{{old('noant')}}" name="noant" value="<?php 
                        $antri = $medic1->{'kopasant'};
                        $data = DB::table('antrians')->where('kopasant',$antri)->first();
                        $noant = $data->{'noant'};
                        echo $noant; 
                        ?>
                        "
                         size="15" readonly >
                        @error('kopas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputKopasant">Kode Pasien</label>
                        <input type="text" class="form-control @error('kopasant') is-invalid @enderror" id="exampleInputKopasant" placeholder="{{$medic1->kopasant ?? old('kopasant')}}" name="kopasant" value="{{$medic1->kopasant ?? old('kopasant')}}"
                         size="15" readonly >
                        @error('kopas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNamapasant">Nama</label>
                        <input type="text" class="form-control @error('namapasant') is-invalid @enderror" id="exampleInputNamapasant" placeholder="Nama lengkap" name="namapasant" value="{{$medic1->namapasant ?? old('namapasant')}}" readonly >
                        @error('namapasant') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <!--<div class="form-group">
                        <label for="exampleInputJenkel">Jenis Kelamin</label>
                        <select type="text" class="form-control @error('Jenis Kelamin') is-invalid @enderror" id="exampleInputJenkelpas" name="jenkelpas" disabled="true">
                            <option value="{{$pasien->jenkelpas ?? old('jenkelpas')}}">{{$pasien->jenkelpas ?? old('jenkelpas')}}</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                        @error('Jenis Kelamin') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTtlpas">Tanggal Lahir</label>
                          <input type="date" class="form-control @error('ttlpas') is-invalid @enderror" id="tanggal_lahir" placeholder="Tanggal Lahir" name="ttlpas" value="{{$pasien->ttlpas ??old('ttlpas')}}"readonly>
                        @error('ttl') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsiapas">Usia</label>
                          <input type="number" class="form-control @error('usiapas') is-invalid @enderror" id="usiapas" placeholder="Usia Pasien" name="usiapas" value="{{$pasien->usiapas ?? old('usiapas')}}"readonly>
                        @error('usiapas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAlamatpas">Alamat</label>
                        <textarea type="text" class="form-control @error('alamatpas') is-invalid @enderror" id="exampleInputAlamatpas" placeholder="Alamat Lengkap" name="alamatpas" value="{{$pasien->alamatpas ?? old('alamatpas')}}"readonly>{{$pasien->alamatpas ?? old('alamatpas')}}</textarea>
                        @error('alamatpas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTelppas">Telepon</label>
                        <input type="text" class="form-control @error('telppas') is-invalid @enderror" id="exampleInputTelppas" placeholder="Telepon" name="telppas" value="{{$pasien->telppas ?? old('telppas')}}"readonly>
                        @error('telppas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>-->
                    <div class="form-group">
                        <label for="exampleInputAntri">Status Antrian</label>
                        <input type="text" class="form-control @error('status') is-invalid @enderror" id="exampleInputAntri" placeholder="" name="status" value="medic1" readonly >
                        @error('status') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTipasant">Golongan Pasien</label>
                        <select type="text" class="form-control @error('Golongan Pasien') is-invalid @enderror" id="exampleInputTipas" name="tipasant" readonly >
                            <option value="{{$medic1->tipasant?? old('tipasant')}}">{{$medic1->tipasant ?? old('tipasant')}}</option>
                            <option value="non bpjs">Non BPJS</option>
                            <option value="bpjs 1">BPJS 1</option>
                            <option value="bpjs 2">BPJS 2</option>
                            <option value="bpjs 3">BPJS 3</option>
                        </select>
                        @error('Golongan Pasien') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTangantpas">Tanggal Daftar</label>
                          <input type="date" class="form-control @error('tangantpas') is-invalid @enderror" id="tanggal_daftar" placeholder="Tanggal Daftar" name="tangantpas" value="{{$medic1->tangantpas ?? old('tangantpas')}}" readonly >
                        @error('tangantpas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="card-footer">
                     <button type="submit" class="btn btn-primary">Lanjut</button>
                    <a href="{{route('antrians.index')}}" class="btn btn-default">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop