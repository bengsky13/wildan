@extends('adminlte::page')

@section('title', 'UPTD PUSKESMAS DTP CIDAHU')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard {{ Auth::user()->position }}</h1>
    <script src="/vendor/js/chart.js"></script>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   <marquee> <p class="mb-0">Selamat Datang<b> {{ Auth::user()->jabatan}}</b> <b>{{ Auth::user()->name }}!</b> Sehat Selalu, Semoga Hari Anda Menyenangkan</p></marquee>
                </div>
                </div>
            </div>
        </div>
    </div>
@stop
