@extends('adminlte::page')
@section('title', 'Edit User')
@section('content_header')
    <h1 class="m-0 text-dark">Edit User</h1>
@stop
@section('content')
    <form action="{{route('users.update', $user)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                     <div class="form-group">
                        <label for="exampleInputNip">NIP</label>
                        <input type="text" class="form-control @error('nip') is-invalid @enderror" id="exampleInputNip" placeholder="Nomor Induk Pegawai" name="nip" value="{{$user->nip ?? old('nip')}}" maxlength="12" size="12" disabled>
                        @error('nip') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama lengkap" name="name" value="{{$user->name ?? old('name')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputJenkel">Jenis Kelamin</label>
                        <select type="text" class="form-control @error('Jenis Kelamin') is-invalid @enderror" id="exampleInputJenkel" name="jenkel">
                            <!--<option value="">{{$user->jenkel}}</option>-->
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                        @error('Jenis Kelamin') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTtl">Tanggal Lahir</label>
                          <input type="date" class="form-control @error('ttl') is-invalid @enderror" id="tanggal_lahir" placeholder="Tanggal Lahir" name="ttl" value="{{$user->ttl ?? old('ttl')}}">
                        @error('ttl') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                     <div class="form-group">
                        <label for="exampleInputAlamat">Alamat</label>
                        <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" id="exampleInputAlamat" placeholder="Alamat Lengkap" name="alamat">{{$user->alamat ?? old('alamat')}}</textarea>
                        @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Alamat Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email" value="{{$user->email ?? old('email')}}">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTelepon">Telepon</label>
                        <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="exampleInputTelepon" placeholder="Telepon" name="telepon" value="{{$user->telepon ?? old('telepon')}}">
                        @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputKontak">Kontak Darurat</label>
                        <input type="text" class="form-control @error('kontak_darurat') is-invalid @enderror" id="exampleInputKontak" placeholder="Kontak Darurat" name="kontak_darurat" value="{{$user->kontak_darurat ?? old('kontak_darurat')}}">
                        @error('kontak_darurat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputJabatan">Jabatan</label>
                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="exampleInputJabatan" placeholder="Jabatan" name="jabatan" value="{{$user->jabatan ?? old('jabatan')}}">
                        @error('jabatan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBagian">Bagian</label>
                        <input type="text" class="form-control @error('bagian') is-invalid @enderror" id="exampleInputBagian" placeholder="Bagian" name="bagian" value="{{$user->bagian ?? old('bagian')}}">
                        @error('bagian') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputJenkel">Hak Akses</label>
                        <select type="text" class="form-control @error('Hak Akses') is-invalid @enderror" id="exampleInputPosition" name="position">
                            <option value="">---Pilih Satu Ya..---</option>
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
                    <a href="{{route('users.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop