@extends('adminlte::page')

@section('title', 'UPTD PUSKESMAS DTP CIDAHU')

@section('content_header')
    <h1 class="m-0 text-green">Dashboard {{ Auth::user()->jabatan }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   <marquee> <p class="mb-0">Selamat Datang<b> {{ Auth::user()->jabatan}}</b> <b>{{ Auth::user()->name }}!</b> Sehat Selalu, Semoga Hari Anda Menyenangkan</p></marquee></p>
                
                 <div class="row clearfix">
                <div class="col-md-2"><x-adminlte-small-box title="Jumlah User" theme="gray" text="{{ DB::table('users')->count('id')}}" icon="fas fa-user"/></div>
                 <x-adminlte-small-box title="Administrator" theme="blue" text="{{DB::table('users')->where('position','superuser')
                     ->count('position');
                }}" icon="fas fa-laptop-medical"/>&emsp;
                <x-adminlte-small-box title="Pendaftaran" theme="orange" text="{{DB::table('users')->where('position','admin')
                     ->count('position');
                }}" icon="fas fa-laptop-medical"/>&emsp;
                  <x-adminlte-small-box class="col-md-2" title="Perawat" theme="green" text="{{DB::table('users')->where('position','medic1')
                     ->count('position');
                }}" icon="fas fa-user-md"/>&emsp;
                  <x-adminlte-small-box class="col-md-2" title="Dokter" theme="yellow" text="{{DB::table('users')->where('position','medic2')
                     ->count('position');
                }}" icon="fas fa-user-nurse"/>&emsp;
                 <x-adminlte-small-box class="col-md-2" title="Apoteker" theme="purple" text="{{DB::table('users')->where('position','apotek')
                     ->count('position');
                }}" icon="fas fa-user-md"/>&emsp;
                </div>
                 <div class="row mt-4">
          <div class="col-md-7">
            <div style="width: auto; height: 500px ">
              <canvas id="myChart"></canvas>
              <label>Data User</label>
            </div>&emsp;&emsp;&emsp;&nbsp;&emsp;&emsp;&emsp;&nbsp;
          </div>
          <div class="col-md-5">
            <div style="width: 450px; height: 450px">
              <canvas id="myChart2"></canvas>
              <label>Data Jabatan </label>
              <p class="mb-0 text-sm text-gray-600">©Copyright <a class="external">Muhamad Wildan</a><p>
            </div>
          </div>
        </div>
      </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script type="text/javascript">
                    <?php
                    $users = DB::table('users')->select(DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(created_at) as day_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Date(created_at)"))
                    ->pluck('count', 'day_name');
                    $labels = $users->keys();
                    $data = $users->values();
                    ?>
                    var labels =  {{ Js::from($labels) }};
                    var users =  {{ Js::from($data) }};
                    var ctx = document.getElementById("myChart").getContext('2d');
                    var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                    labels: labels ,
                    datasets: [{
                    label: 'Jumlah User ',
                    data:users,
                    backgroundColor: [
                'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
              'rgba(255,99,132,1)'
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
                    $non = DB::table('users')->where('position','superuser')
                     ->count('position');
                    $bp1 = DB::table('users')->where('position','admin')
                     ->count('position');
                    $bp2 = DB::table('users')->where('position','medic1')
                     ->count('position');
                     $bp3 = DB::table('users')->where('position','medic2')
                     ->count('position');
                    $bp4 = DB::table('users')->where('position','apotek')
                     ->count('position');
                    ?>
                    var ctx2 = document.getElementById("myChart2").getContext('2d');
                    var myChart2 = new Chart(ctx2, {
                    type: 'doughnut',
                    data: {
                    labels: ["Administrator","Pendaftaran","Perawat", "Dokter", "Apoteker"],
                    datasets: [{
                    label: '# of Votes',
                    data: [<?= $non; ?>, <?= $bp1; ?>, <?= $bp2; ?>, <?= $bp3; ?>,<?= $bp4 ?>],
                    backgroundColor: [
                'rgba(6, 86, 214, 0.2)',
                'rgba(255,61,3,0.2)',
                'rgba(17, 189, 28, 0.2)',
                'rgba(252, 186, 3, 0.2)',
                'rgba(177, 3, 252, 0.2)',
                ],
                borderColor: [
              'rgba((6, 86, 214, 1)',
               'rgba(255,61,3,0.2)',
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
