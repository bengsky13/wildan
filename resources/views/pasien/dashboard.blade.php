@extends('adminlte::page')

@section('title', 'UPTD PUSKESMAS DTP CIDAHU')

@section('content_header')
    <h1 class="m-0 text-green">Dashboard {{ Auth::user()->jabatan }} </h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   <marquee> <p class="mb-0">Selamat Datang<b> {{ Auth::user()->jabatan}}</b> <b>{{ Auth::user()->name }}!</b> Sehat Selalu, Semoga Hari Anda Menyenangkan</p></marquee></p>
                
                 <div class="row clearfix">
                <div class="col-md-2,5"><x-adminlte-small-box title="Jumlah Pasien" theme="gray" text="{{ DB::table('pasiens')->count('id')}} Pasien" icon="fas fa-head-side-mask"/></div>
                &emsp;
                <x-adminlte-small-box title="Pasien Non BPJS" theme="blue" text="{{DB::table('pasiens')->where('tipas','non bpjs')
                     ->count('tipas');
                }} Pasien" icon="fas fa-head-side-mask"/>&emsp;
                 <x-adminlte-small-box title="Pasien BPJS 1" theme="green" text="{{DB::table('pasiens')->where('tipas','bpjs 1')
                     ->count('tipas');
                }} Pasien" icon="fas fa-head-side-mask"/>&emsp;
                 <x-adminlte-small-box title="Pasien BPJS 2" theme="yellow" text="{{DB::table('pasiens')->where('tipas','bpjs 2')
                     ->count('tipas');
                }} Pasien" icon="fas fa-head-side-mask"/>&emsp;
                <x-adminlte-small-box title="Pasien BPJS 3" theme="purple" text="{{DB::table('pasiens')->where('tipas','bpjs 3')
                     ->count('tipas');
                }} Pasien" icon="fas fa-head-side-mask"/>&emsp;
                </div>
                 <div class="row mt-4">
          <div class="col-md-7">
            <div style="width: auto; height: 500px ">
              <canvas id="myChart"></canvas>
              <label> Jumlah Data Pasien Perbulan</label>
            </div>&emsp;&emsp;&emsp;
          </div>
          <div class="col-md-3">
            <div style="width: 400px; height: 400px">
              <canvas id="myChart2"></canvas>
              <label>Persentase Golongan Pasien</label>
              <p class="mb-0 text-sm text-gray-600">©Copyright <a class="external">Muhamad Wildan</a><p>
            </div>
          </div>
        </div>
      </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script type="text/javascript">
                    <?php
                    $pasiens = DB::table('pasiens')->select(DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(created_at) as day_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Date(created_at)"))
                    ->pluck('count', 'day_name');
                    $labels = $pasiens->keys();
                    $data = $pasiens->values();
                    ?>
                    var labels =  {{ Js::from($labels) }};
                    var pasiens =  {{ Js::from($data) }};
                    var ctx = document.getElementById("myChart").getContext('2d');
                    var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                    labels: labels ,
                    datasets: [{
                    label: 'Jumlah Pasien Hari Ini',
                    data: pasiens,
                    backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
            </script>
                <script type="text/javascript">
                    <?php
                    $non = DB::table('pasiens')->where('tipas','non bpjs')
                     ->count('tipas');
                    $bp1 = DB::table('pasiens')->where('tipas','bpjs 1')
                     ->count('tipas');
                    $bp2 = DB::table('pasiens')->where('tipas','bpjs 2')
                     ->count('tipas');
                    $bp3 = DB::table('pasiens')->where('tipas','bpjs 3')
                     ->count('tipas');
                    ?>
                    var ctx2 = document.getElementById("myChart2").getContext('2d');
                    var myChart2 = new Chart(ctx2, {
                    type: 'doughnut',
                    data: {
                    labels: ["Pasien NON BPJS","Pasien BPJS 1", "Pasien BPJS 2", "Pasien BPJS 3"],
                    datasets: [{
                    label: '# of Votes',
                    data: [<?= $non; ?>, <?= $bp1; ?>, <?= $bp2; ?>, <?= $bp3; ?>],
                    backgroundColor: [
                'rgba(6, 86, 214, 0.2)',
                'rgba(17, 189, 28, 0.2)',
                'rgba(252, 186, 3, 0.2)',
                'rgba(177, 3, 252, 0.2)',
                ],
                borderColor: [
              'rgba((6, 86, 214, 1)',
              'rgba(17, 189, 28,1)',
              'rgba(252, 186, 03,1)',
              'rgba(177, 3, 252, 1)',
            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
            </script>
        </div>
    </div>
        </div>
    </div>
@stop
