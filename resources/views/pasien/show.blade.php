@extends('adminlte::page')
@section('title', 'Data Lengkap Pasien')
@section('content_header')
<!-- <link rel="stylesheet" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">-->
    <h1 class="m-0 text-blue"  align="center"><b>Data Lengkap Pasien </h1>
@stop
@section('content')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputKopas">Kode Pasien</label>
                        <input type="text" class="form-control @error('kopas') is-invalid @enderror" id="exampleInputKopas" placeholder="{{$pasien->kopas ?? old('kopas')}}" name="kopas" value=""
                         size="15" readonly="true">
                        @error('kopas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNamepas">Nama</label>
                        <input type="text" class="form-control @error('namepas') is-invalid @enderror" id="exampleInputNamepas" placeholder="Nama lengkap" name="namepas" value="{{$pasien->namepas ?? old('namepas')}}" readonly="true">
                        @error('namepas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
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
                    </div>
                    <div class="form-group">
                        <label for="exampleInputKontak">Kontak Darurat</label>
                        <input type="text" class="form-control @error('kontdarpas') is-invalid @enderror" id="exampleInputKontdarpas" placeholder="Kontak Darurat" name="kontdarpas" value="{{$pasien->kontdarpas ?? old('kontdarpas')}}"readonly>
                        @error('kontdarpas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTipas">Golongan Pasien</label>
                        <select type="text" class="form-control @error('Golongan Pasien') is-invalid @enderror" id="exampleInputTipas" name="tipas"disabled>
                            <option value="$pasien->tipas ?? old(tipas)">{{$pasien->tipas ?? old('tipas')}}</option>
                            <option value="non bpjs">Non BPJS</option>
                            <option value="bpjs 1">BPJS 1</option>
                            <option value="bpjs 2">BPJS 2</option>
                            <option value="bpjs 3">BPJS 3</option>
                        </select>
                        @error('Golongan Pasien') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTangdappas">Tanggal Daftar</label>
                          <input type="date" class="form-control @error('tangdappas') is-invalid @enderror" id="tanggal_daftar" placeholder="Tanggal Daftar" name="tangdappas" value="{{$pasien->tangdappas ?? old('tangdappas')}}"readonly>
                        @error('tangdappas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="card-footer">
                    <a href="{{route('pasiens.index')}}" class="btn btn-default">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop