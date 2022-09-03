@extends('adminlte::page')
@section('title', 'Pemberian Obat')
@section('content_header')
<!-- <link rel="stylesheet" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">-->
    <h1 class="m-0 text-blue"  align="center"><b>Form Pemberian Obat</h1>
@stop
@section('content')
    <form action="{{route('reseps.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                     <div class="form-group">
                        <label for="exampleInputNoresep">Nomor Resep</label>
                        <input type="text" class="form-control @error('noresep') is-invalid @enderror" id="exampleInputNoresep" placeholder="resep" name="noresep" value="{{$resep->noresep ?? old('noresep')}}" readonly>
                        @error('noresep') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNoresep">Nomor Rekam Medis</label>
                        <input type="text" class="form-control @error('noremed') is-invalid @enderror" id="exampleInputNoremed" placeholder="resep" name="noremed" value="{{$resep->noremed ?? old('noresep')}}" readonly>
                        @error('noresep') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNamapasant">Nama Dokter</label>
                        <input type="text" class="form-control @error('namdok') is-invalid @enderror" id="exampleInputNamdok" placeholder="Nama lengkap" name="namdok" value="{{$resep->namdok ?? old('namdok')}}" readonly >
                        @error('namdok') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                     <div class="form-group">
                        <label for="exampleInputDiagnosa">Obat dan Dosis</label>
                        <textarea type="text" class="form-control @error('obat') is-invalid @enderror" id="exampleInputObat" placeholder="Obat dan Dosis" name="obat" value="" readonly >{{$resep->obat ?? old('obat')}}</textarea>
                        @error('diagnosa') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Lanjut</button>
                    <a href="{{route('reseps.index')}}" class="btn btn-default">
                        Batal
                    </a>

                </div>
            </div>
        </div>
    </div>
@stop