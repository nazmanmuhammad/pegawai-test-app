@extends('admin.layouts.master')
@section('content')
<div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Tambah Pegawai</p>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">Pegawai</p>
              <div class="row">
                <form action="{{ route('pegawai.store') }}" method="post">
                    @csrf
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama Pegawai</label>
                        <input class="form-control @error('nama_pegawai') is-invalid @enderror" type="text" name="nama_pegawai" placeholder="@error('nama_pegawai') {{$message}} @enderror">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tempat Lahir</label>
                        <input class="form-control @error('tempat_lahir') is-invalid @enderror" type="text" name="tempat_lahir" placeholder="@error('tempat_lahir') {{$message}} @enderror">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tanggal Lahir</label>
                        <input class="form-control @error('tanggal_lahir') is-invalid @enderror" type="date" name="tanggal_lahir" placeholder="@error('tanggal_lahir') {{$message}} @enderror">
                    </div>
                    <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Jenis Kelamin</label><br>
                        <input type="radio" id="html" name="jenis_kelamin" value="pria">
                        <label for="html">Pria</label><br>
                        <input type="radio" id="css" name="jenis_kelamin" value="wanita">
                        <label for="css">Wanita</label><br>
                    </div>
                    <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Jenis Kelamin</label><br>
                        <input type="radio" id="html" name="agama" value="islam">
                        <label for="html">Islam</label><br>
                        <input type="radio" id="css" name="agama" value="kristen">
                        <label for="css">Kristen</label><br>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Alamat</label>
                        <textarea type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="@error('alamat') {{$message}} @enderror"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama Kelurahan</label>
                        <select name="kelurahan_id" id="status" class="form-control @error('kelurahan_id') is-invalid @enderror" placeholder="@error('kelurahan_id') {{$message}} @enderror">
                            <option value="" readonly>-- Pilih Provinsi -- </option>
                            @foreach($data_kelurahan as $kelurahan)
                              @if($kelurahan->status=="aktif")
                              <option value="{{$kelurahan->id}}">{{$kelurahan->nama_kelurahan}}</option>
                              @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama Provinsi</label>
                        <select name="provinsi_id" id="status" class="form-control @error('provinsi_id') is-invalid @enderror" placeholder="@error('provinsi_id') {{$message}} @enderror">
                            <option value="" readonly>-- Pilih Provinsi -- </option>
                            @foreach($data_provinsi as $provinsi)
                            @if($provinsi->status=="aktif")
                            <option value="{{$provinsi->id}}">{{$provinsi->nama_provinsi}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                 </div>
                    <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                </form>
              </div>
            </div>
          </div>
        </div>
@stop