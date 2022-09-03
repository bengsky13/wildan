@extends('adminlte::page')
@section('title', 'Form Pemeriksaan Dokter')
@section('content_header')
<!-- <link rel="stylesheet" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">-->
    <h1 class="m-0 text-blue"  align="center"><b>Form Pemeriksaan Dokter</h1>
@stop
@section('content')
 <form action="{{route('medic2s.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                     <div class="form-group">
                        <div class="row clearfix">
                            <div class="col-sm-2">
                        <label for="exampleInputNoremed">Nomor Rekam Medis</label>
                        <input type="text" class="form-control @error('noremed') is-invalid @enderror" id="exampleInputNoremed" placeholder="{{old('noremed')}}" name="noremed" value="RM.{{$antrian2s->kopasant??old('noremed')}}"
                        readonly >
                        @error('noremed') <span class="text-danger">{{$message}}</span> @enderror
                    </div>&emsp;
                    <div class="form-group">
                        <label for="exampleInputKopasant">Kode Pasien</label>
                        <input type="text" class="form-control @error('kopasant') is-invalid @enderror" id="exampleInputKopasant" placeholder="{{$antrian->kopasant ?? old('kopasant')}}" name="kopasant" value="{{$antrian2s->kopasant ?? old('kopasant')}}"
                        readonly >
                        @error('kopas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    &emsp;
                    <div class="form-group">
                        <label for="exampleInputNamapasant">Nama</label>
                        <input type="text" class="form-control @error('namapasant') is-invalid @enderror" id="exampleInputNamapasant" placeholder="Nama lengkap" name="namapasant" value="{{$antrian2s->namapasant ?? old('namapasant')}}" readonly >
                        @error('namapasant') <span class="text-danger">{{$message}}</span> @enderror
                    </div>&emsp;
                    <div class="form-group">
                        <label for="exampleInputTipasant">Golongan Pasien</label>
                        <select type="text" class="form-control @error('Golongan Pasien') is-invalid @enderror" id="exampleInputTipas" name="tipasant" readonly >
                            <option value="{{$antrian2s->tipasant ?? old('tipasant')}}">{{$antrian2s->tipasant ?? old('tipasant')}}</option>
                            <option value="non bpjs">Non BPJS</option>
                            <option value="bpjs 1">BPJS 1</option>
                            <option value="bpjs 2">BPJS 2</option>
                            <option value="bpjs 3">BPJS 3</option>
                        </select>
                        @error('Golongan Pasien') <span class="text-danger">{{$message}}</span> @enderror
                    </div>&emsp;
                    <div class="form-group">
                        <label for="exampleInputTangantpas">Tanggal Rekam</label>
                          <input type="date" class="form-control @error('tangantpas') is-invalid @enderror" id="tanggal_daftar" placeholder="Tanggal Daftar" name="tangantpas" value="{{$antrian2s->tangantpas ?? old('tangantpas')}}" readonly >
                        @error('tangantpas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                    <label>1. Data Pemeriksaan Awal </label>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>Berat Badan</th>
                            <th>Tinggi Badan</th>
                            <th>Lingkar Perut</th>
                            <th>Suhu Badan</th>
                            <th>Tekanan Darah</th>
                        </tr>
                        </thead>
                         
                        <tbody><?php
                            $antri = $antrian2s->kopasant;
                            $data = DB::table('medic1s')->where('kopasant',$antri)
                            ->first();
                            ?>
                        <tr>
                            <td align = "right">{{$data->berat}}</td>
                            <td align = "right">{{$data->tinggi}}</td>
                            <td align = "right">{{$data->lingper}}</td>
                            <td align = "right">{{$data->suhu}}</td>
                            <td align = "right">{{$data->tekdar}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table table-hover table-bordered table-stripped" id="example3">
                        <thead>
                        <tr>
                            <th>Alergi Obat</th>
                            <th>Kolesterol</th>
                            <th>Asam Urat</th>
                            <th>Glukosa</th>
                            <th>Hemoglobin</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td align = "right">{{$data->alergi}}</td>
                                <td align = "right">{{$data->kolest}}</td>
                                <td align = "right">{{$data->asur}}</td>
                                <td align = "right">{{$data->glukos}}</td>
                                <td align = "right">{{$data->hemog}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <label for="exampleInputKeluhan">Keluhan</label>
                        <textarea type="text" class="form-control @error('keluhan') is-invalid @enderror" id="exampleInputKeluhan" placeholder="Keluhan" name="keluhan" value="{{$data->keluhan}}" readonly > {{$data->keluhan}}</textarea>
                        @error('keluhan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <label>2. Pemeriksaan Lanjut dan Diagnosa</label>
                     <div class="form-group">
                        <label for="exampleInputNamdok">Dokter Pemeriksa</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama lengkap" name="namdok" value="Dr. {{ Auth::user()->name}}" readonly>
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPeriksa">Pemeriksaan Lanjut</label>
                        <textarea type="text" class="form-control @error('periksa') is-invalid @enderror" id="exampleInputPeriksa" placeholder="Pemeriksaan" name="periksa" value="" ></textarea>
                        @error('periksa') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDiagnosa">Diagnosa</label>
                        <textarea type="text" class="form-control @error('diagnosa') is-invalid @enderror" id="exampleInputDiagnosa" placeholder="Diagnosa" name="diagnosa" value="" ></textarea>
                        @error('diagnosa') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                     <label>3. Resep Obat</label>
                     <div class="form-group">
                        <label for="exampleInputNoresep">Nomor Resep</label>
                        <input type="text" class="form-control @error('noresep') is-invalid @enderror" id="exampleInputNoresep" placeholder="resep" name="noresep" value="<?php
                        $awal='APT.';
                        $tengah = date('d.m.y');
                        $count =DB::table('reseps')->count('id');
                        $max=DB::table('reseps')->max('id');
                        $akhir= $max - $count;
                        $no=$max - $akhir+1;
                        $s=1;
                        if ($no){
                            echo "$awal$tengah.$no";}
                            else {
                                echo "$awal$tengah$s";
                            }
                         ?>" readonly>
                        @error('noresep') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                     <div class="form-group">
                        <label for="exampleInputObat">Obat dan Dosis</label>
                        <textarea type="text" class="form-control @error('obat') is-invalid @enderror" id="exampleInputObat" placeholder="Obat dan Dosis" name="obat" value="" ></textarea>
                        @error('obat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
            </div>
                    <div class="card-footer">
                     <button type="submit" class="btn btn-primary">Lanjut</button>
                    <a href="{{route('antrian2s.index')}}" class="btn btn-default">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop