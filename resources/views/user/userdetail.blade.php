@extends('adminlte::page')
@section('title', 'Detail Pegawai')
@section('content_header')
    <h1 class="m-0 text-green" align="center">Detail Data Pegawai</h1></br>
    <h5 class="m-0 text-green" align="center">Silahkan Menghubungi Administrator Pegawai Jika Ada Perubahan Atau Kesalahan Data</h5>
@stop
@section('content')
        @method('PUT')
        @csrf
   <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                     <div class="form-group">
                        <label for="exampleInputNip">NIP</label>
                        <input type="text" class="form-control @error('nip') is-invalid @enderror" id="exampleInputNip" placeholder="Nomor Induk Pegawai" name="nip" value="{{Auth::user()->nip}}" maxlength="12" size="12" disabled>
                        @error('nip') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama lengkap" name="name" value="{{Auth::user()->name}}" disabled>
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputJenkel">Jenis Kelamin</label>
                        <select type="text" class="form-control @error('Jenis Kelamin') is-invalid @enderror" id="exampleInputJenkel" name="jenkel"disabled>
                            <option value="">{{Auth::user()->jenkel}}</option>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                        @error('Jenis Kelamin') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTtl">Tanggal Lahir</label>
                          <input type="date" class="form-control @error('ttl') is-invalid @enderror" id="tanggal_lahir" placeholder="Tanggal Lahir" name="ttl" value="{{Auth::user()->ttl}}"disabled>
                        @error('ttl') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                     <div class="form-group">
                        <label for="exampleInputAlamat">Alamat</label>
                        <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" id="exampleInputAlamat" placeholder="Alamat Lengkap" name="alamat"disabled>{{Auth::user()->alamat}}</textarea>
                        @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Alamat Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email" value="{{Auth::user()->email}}"disabled>
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTelepon">Telepon</label>
                        <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="exampleInputTelepon" placeholder="Telepon" name="telepon" value="{{Auth::user()->telepon}}"disabled>
                        @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputKontak">Kontak Darurat</label>
                        <input type="text" class="form-control @error('kontak_darurat') is-invalid @enderror" id="exampleInputKontak" placeholder="Kontak Darurat" name="kontak_darurat" value="{{Auth::user()->kontak_darurat}}"disabled>
                        @error('kontak_darurat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputJabatan">Jabatan</label>
                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="exampleInputJabatan" placeholder="Jabatan" name="jabatan" value="{{Auth::user()->jabatan}}"disabled>
                        @error('jabatan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBagian">Bagian</label>
                        <input type="text" class="form-control @error('bagian') is-invalid @enderror" id="exampleInputBagian" placeholder="Bagian" name="bagian" value="{{Auth::user()->bagian}}"disabled>
                        @error('bagian') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                     <div class="form-group">
                        <label for="exampleInputJenkel">Hak Akses</label>
                        <select type="text" class="form-control @error('Hak Akses') is-invalid @enderror" id="exampleInputPosition" name="position" disabled>
                            <option value="">{{Auth::user()->position}}</option>
                            <option value="superuser">Admin</option>
                            <option value="admin">Pendaftaran</option>
                            <option value="medic1">Perawat</option>
                            <option value="medic2">Dokter</option>
                            <option value="apotek">Apoteker</option>
                        </select>
                        @error('Hak Akses') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password">
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword" placeholder="Konfirmasi Password" name="password_confirmation">
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('dashboard')}}" class="btn btn-default">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop