@extends('adminlte::page')
@section('title', 'Pasien Baru')
@section('content_header')
<!-- <link rel="stylesheet" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">-->
    <h1 class="m-0 text-blue"  align="center"><b>Input Data Pasien Baru</h1>
@stop
@section('content')
    <form action="{{route('pasiens.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputKopas">Kode Pasien</label>
                        <input type="text" class="form-control @error('kopas') is-invalid @enderror" id="exampleInputKopas" placeholder="" name="kopas" value="<?php
                        $awal='PSN';
                        $tengah = date('d.m.y');
                        $count =DB::table('antrians')->count('id');
                        $max=DB::table('antrians')->max('id');
                        $akhir= $max - $count;
                        $no=$max - $akhir+1;
                        $s=1;
                        if ($no){
                            echo "$awal$tengah.$no";}
                            else {
                                echo "$awal$tengah$s";
                            }
                         ?>"
                         size="15" readonly>
                        @error('kopas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNamepas" name="status" value="daftar">Nama</label>
                        <input type="text" class="form-control @error('namepas') is-invalid @enderror" id="exampleInputNamepas" placeholder="Nama lengkap" name="namepas" value="{{old('namepas')}}">
                        @error('namepas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputJenkel">Jenis Kelamin</label>
                        <select type="text" class="form-control @error('Jenis Kelamin') is-invalid @enderror" id="exampleInputJenkelpas" name="jenkelpas">
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                        @error('Jenis Kelamin') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTtlpas">Tanggal Lahir</label>
                          <input type="date" class="form-control @error('ttlpas') is-invalid @enderror" id="tanggal_lahir" placeholder="Tanggal Lahir" name="ttlpas" value="{{old('ttlpas')}}">
                        @error('ttl') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsiapas">Usia</label>
                          <input type="number" class="form-control @error('usiapas') is-invalid @enderror" id="usiapas" placeholder="Usia Pasien" name="usiapas" value="{{old('usiapas')}}">
                        @error('usiapas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAlamatpas">Alamat</label>
                        <textarea type="text" class="form-control @error('alamatpas') is-invalid @enderror" id="exampleInputAlamatpas" placeholder="Alamat Lengkap" name="alamatpas" value="{{old('alamatpas')}}"> {{old('alamatpas')}}</textarea>
                        @error('alamatpas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTelppas">Telepon</label>
                        <input type="text" class="form-control @error('telppas') is-invalid @enderror" id="exampleInputTelppas" placeholder="Telepon" name="telppas" value="{{old('telppas')}}">
                        @error('telppas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputKontak">Kontak Darurat</label>
                        <input type="text" class="form-control @error('kontdarpas') is-invalid @enderror" id="exampleInputKontdarpas" placeholder="Kontak Darurat" name="kontdarpas" value="{{old('kontdarpas')}}">
                        @error('kontdarpas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTipas">Golongan Pasien</label>
                        <select type="text" class="form-control @error('Golongan Pasien') is-invalid @enderror" id="exampleInputTipas" name="tipas">
                            <option value="non bpjs">Non BPJS</option>
                            <option value="bpjs 1">BPJS 1</option>
                            <option value="bpjs 2">BPJS 2</option>
                            <option value="bpjs 3">BPJS 3</option>
                        </select>
                        @error('Golongan Pasien') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTangdappas">Tanggal Daftar</label>
                          <input type="date" class="form-control @error('tangdappas') is-invalid @enderror" id="tanggal_daftar" placeholder="Tanggal Daftar" name="tangdappas" value="{{old('tangdappas')}}">
                        @error('tangdappas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                     <!--<div class="form-group">
                        <label for="exampleInputAntri">Status Antrian</label>
                        <input type="text" class="form-control @error('status') is-invalid @enderror" id="exampleInputAntri" placeholder="" name="status" value="daftar"readonly>
                        @error('status') <span class="text-danger">{{$message}}</span> @enderror
                    </div>-->
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('pasiens.index')}}" class="btn btn-default">
                        Batal
                    </a>

                </div>
            </div>
        </div>
    </div>
@stop