@extends('adminlte::page')
@section('title', 'Data Pemeriksaan Awal')
@section('content_header')
<!-- <link rel="stylesheet" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">-->
    <h1 class="m-0 text-blue"  align="center"><b>Data Pemeriksaan Awal</h1>
@stop
@section('content')
 <form action="{{route('medic1s.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                     <div class="form-group">
                        <div class="row clearfix">
                            <div class="col-sm-2">
                        <label for="exampleInputNoremed">Nomor Rekam Medis</label>
                        <input type="text" class="form-control @error('noremed') is-invalid @enderror" id="exampleInputNoremed" placeholder="{{old('noremed')}}" name="noremed" value="RM.{{$antrian->kopasant??old('noremed')}}"
                        readonly >
                        @error('noremed') <span class="text-danger">{{$message}}</span> @enderror
                    </div>&emsp;
                    <div class="form-group">
                        <label for="exampleInputKopasant">Kode Pasien</label>
                        <input type="text" class="form-control @error('kopasant') is-invalid @enderror" id="exampleInputKopasant" placeholder="{{$antrian->kopasant ?? old('kopasant')}}" name="kopasant" value="{{$antrian->kopasant ?? old('kopasant')}}"
                        readonly >
                        @error('kopas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    &emsp;
                    <div class="form-group">
                        <label for="exampleInputNamapasant">Nama</label>
                        <input type="text" class="form-control @error('namapasant') is-invalid @enderror" id="exampleInputNamapasant" placeholder="Nama lengkap" name="namapasant" value="{{$antrian->namapasant ?? old('namapasant')}}" readonly >
                        @error('namapasant') <span class="text-danger">{{$message}}</span> @enderror
                    </div>&emsp;
                    <div class="form-group">
                        <label for="exampleInputTipasant">Golongan Pasien</label>
                        <select type="text" class="form-control @error('Golongan Pasien') is-invalid @enderror" id="exampleInputTipas" name="tipasant" readonly >
                            <option value="{{$antrian->tipasant ?? old('tipasant')}}">{{$antrian->tipasant ?? old('tipasant')}}</option>
                            <option value="non bpjs">Non BPJS</option>
                            <option value="bpjs 1">BPJS 1</option>
                            <option value="bpjs 2">BPJS 2</option>
                            <option value="bpjs 3">BPJS 3</option>
                        </select>
                        @error('Golongan Pasien') <span class="text-danger">{{$message}}</span> @enderror
                    </div>&emsp;
                    <div class="form-group">
                        <label for="exampleInputTangantpas">Tanggal Rekam</label>
                          <input type="date" class="form-control @error('tangantpas') is-invalid @enderror" id="tanggal_daftar" placeholder="Tanggal Daftar" name="tangantpas" value="{{$antrian->tangantpas ?? old('tangantpas')}}" readonly >
                        @error('tangantpas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
            </div>
                    <label>1. Pengukuran</label>
                     <div class="row clearfix">
                        <div class="col-sm-2">
                            <label for="exampleInputBerat">Berat Badan</label>
                            <input type="text" class="form-control @error('Berat') is-invalid @enderror" id="exampleInputBerat" placeholder="BB" name="berat" value="" >
                            @error('berat') <span class="text-danger">{{$message}}</span> @enderror
                        </div>&emsp;
                    <div class="form-group">
                        <label for="exampleInputTinggi">Tinggi Badan</label>
                        <input type="text" class="form-control @error('tinggi') is-invalid @enderror" id="exampleInputTinggi" placeholder="TB" name="tinggi" value="" >
                        @error('tinggi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    &emsp;
                    <div class="form-group">
                        <label for="exampleInputLingper">Lingkar Perut</label>
                        <input type="text" class="form-control @error('lingper') is-invalid @enderror" id="exampleInputLingper" placeholder="LP" name="lingper" value="">
                        @error('lingper') <span class="text-danger">{{$message}}</span> @enderror
                    </div>&emsp;
                    <div class="form-group">
                        <label for="exampleInputSuhu">Suhu Badan</label>
                        <input type="text" class="form-control @error('suhu') is-invalid @enderror" id="exampleInputLingper" placeholder="SB" name="suhu" value="">
                        @error('suhu') <span class="text-danger">{{$message}}</span> @enderror
                    </div>&emsp;
                     <div class="form-group">
                        <label for="exampleInputTekdar">Tekanan Darah</label>
                        <input type="text" class="form-control @error('tekdar') is-invalid @enderror" id="exampleInputTekdar" placeholder="TD" name="tekdar" value="">
                        @error('tekdar') <span class="text-danger">{{$message}}</span> @enderror
                    </div>&emsp;
                </div>
                <label>2. Kondisi</label>
                <div class="form-group">
                     <div class="row clearfix">
                        <div class="col-sm-2">
                            <label for="exampleAlergiobat">Alergi Obat</label>
                             <select name="alergi" class="form-control show-tick">
                                                <option value="">----------Pilih----------</option>
                                                <option value="IYA">YA</option>
                                                <option value="TIDAK">TIDAK</option>
                                              </select>
                            @error('alergi') <span class="text-danger">{{$message}}</span> @enderror
                        </div>&emsp;
                    <div class="form-group">
                        <label for="exampleInputTinggi">Kolesterol</label>
                        <select name="kolest" class="form-control show-tick">
                                                <option value="">----------Pilih----------</option>
                                                <option value="IYA">YA</option>
                                                <option value="TIDAK">TIDAK</option>
                                              </select>
                        @error('koles') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    &emsp;
                    <div class="form-group">
                        <label for="exampleInputLingper">Asam Urat</label>
                        <select name="asur" class="form-control show-tick">
                                                <option value="">----------Pilih----------</option>
                                                <option value="IYA">YA</option>
                                                <option value="TIDAK">TIDAK</option>
                                              </select>
                        @error('asur') <span class="text-danger">{{$message}}</span> @enderror
                    </div>&emsp;
                    <div class="form-group">
                        <label for="exampleInputGlukosa">Glukosa</label>
                       <select name="glukos" class="form-control show-tick">
                                                <option value="">----------Pilih----------</option>
                                                <option value="IYA">YA</option>
                                                <option value="TIDAK">TIDAK</option>
                                              </select>
                        @error('glukos') <span class="text-danger">{{$message}}</span> @enderror
                    </div>&emsp;
                     <div class="form-group">
                        <label for="exampleInputHemog">Hemoglobin</label>
                        <select name="hemog" class="form-control show-tick">
                                                <option value="">----------Pilih----------</option>
                                                <option value="IYA">YA</option>
                                                <option value="TIDAK">TIDAK</option>
                                              </select>
                        @error('hemog') <span class="text-danger">{{$message}}</span> @enderror
                    </div>&emsp;
                </div>
                <div class="form-group">
                        <label for="exampleInputKeluhan">3. Keluhan</label>
                        <div class="demo-checkbox">

                        <input type="checkbox" id="batuk" name="keluhan[]" value="Batuk" class="chk-col-red" />
                        <label for="batuk">BATUK &emsp;</label>

                        <input type="checkbox" id="flu" name="keluhan[]" value="Flu" class="chk-col-red" />
                        <label for="flu">FLU &emsp;</label>

                        <input type="checkbox" id="demam" name="keluhan[]" value="Demam" class="chk-col-red" />
                        <label for="demam">DEMAM &emsp;</label>

                        <input type="checkbox" id="pusing" name="keluhan[]" value="Pusing" class="chk-col-red" />
                        <label for="pusing">PUSING &emsp;</label>

                        <input type="checkbox" id="mual" name="keluhan[]" value="Mual" class="chk-col-red" />
                        <label for="mual">MUAL &emsp;</label>

                        <input type="checkbox" id="muntah" name="keluhan[]" value="Muntah" class="chk-col-red" />
                        <label for="muntah">MUNTAH &emsp;</label>
                        </div>
                        <textarea type="text" class="form-control @error('keluhan') is-invalid @enderror" id="exampleInputKeluhan" placeholder="Keluhan" name="keluhan" value="{{old('keluhan')}}"> {{old('keluhan')}}</textarea>
                        @error('keluhan') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
            </div>
                    <div class="card-footer">
                     <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('pasiens.index')}}" class="btn btn-default">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop