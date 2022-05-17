@extends('admin.layouts.master')
@section('content')
<div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Kelurahan</p>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">Kelurahan</p>
              <div class="row">
                <form action="{{ route('kelurahan.update',[$data_kelurahan->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Kode</label>
                        <input class="form-control" type="text" name="kode" value="{{ $data_kelurahan->kode }}">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama Kelurahan</label>
                        <input class="form-control" type="text" name="nama_kelurahan" value="{{ $data_kelurahan->nama_kelurahan }}">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama Kecamatan</label>
                        <select name="kecamatan_id" id="status" class="form-control">
                            <option value="{{$data_kelurahan->kecamatan_id}}">Selected: {{ $data_kelurahan->kecamatan->nama_kecamatan }}</option>
                            @foreach($data_kecamatan as $kecamatan)
                            <option value="{{$kecamatan->id}}">{{$kecamatan->nama_kecamatan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="{{ $data_kelurahan->status }}">selected: {{ $data_kelurahan->status }}</option>
                            <option value="aktif">Aktif</option>
                            <option value="tidak_aktif">Tidak Aktif</option>
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