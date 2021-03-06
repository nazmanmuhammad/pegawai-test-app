@extends('admin.layouts.master')
@section('content')
<div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Ubah Pegawai</p>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">Pegawai</p>
              <div class="row">
                <form action="{{ route('pegawai.update',[$data_pegawai->id]) }}" method="post">
                    @csrf
                    {{ method_field('PUT')}}
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama Pegawai</label>
                        <input class="form-control" type="text" name="nama_pegawai" value="{{ $data_pegawai->nama_pegawai}}">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tempat Lahir</label>
                        <input class="form-control" type="text" name="tempat_lahir" value="{{ $data_pegawai->tempat_lahir}}">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tanggal Lahir</label>
                        <input class="form-control" type="date" name="tanggal_lahir" value="{{ $data_pegawai->tanggal_lahir}}">
                    </div>
                    <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Jenis Kelamin</label><br>
                        <input type="radio" id="html" name="jenis_kelamin" value="pria" {{$data_pegawai->jenis_kelamin == 'pria'? 'checked' : ''}}>
                        <label for="html">Pria</label><br>
                        <input type="radio" id="css" name="jenis_kelamin" value="wanita" {{$data_pegawai->jenis_kelamin == 'wanita'? 'checked' : ''}}>
                        <label for="css">Wanita</label><br>
                    </div>
                    <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Agama</label><br>
                        <input type="radio" id="html" name="agama" value="islam" {{$data_pegawai->agama == 'islam'? 'checked' : ''}}>
                        <label for="html">Islam</label><br>
                        <input type="radio" id="css" name="agama" value="kristen" {{$data_pegawai->agama == 'kristen'? 'checked' : ''}}>
                        <label for="css">Kristen</label><br>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Alamat</label>
                        <textarea type="text" name="alamat" class="form-control" value="{{$data_pegawai->alamat}}">{{$data_pegawai->alamat}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama Kelurahan</label>
                        <select name="kelurahan_id" id="status" class="form-control">
                            <option value="{{$data_pegawai->kelurahan_id}}">selected: {{$data_pegawai->kelurahan->nama_kelurahan}} </option>
                            @foreach($data_kelurahan as $kelurahan)
                            <option value="{{$kelurahan->id}}">{{$kelurahan->nama_kelurahan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama Provinsi</label>
                        <select name="provinsi_id" id="status" class="form-control">
                            <option  value="{{$data_pegawai->provinsi_id}}">selected: {{$data_pegawai->provinsi->nama_provinsi}} </option>
                            @foreach($data_provinsi as $provinsi)
                            <option value="{{$provinsi->id}}">{{$provinsi->nama_provinsi}}</option>
                            @endforeach
                        </select>
                    </div>
                 </div>
                    <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
@stop