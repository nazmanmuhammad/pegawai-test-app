@extends('admin.layouts.master')
@section('content')
<div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Provinsi</p>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">Provinsi</p>
              <div class="row">
                <form action="{{ route('provinsi.update',[$data_provinsi->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Kode</label>
                        <input class="form-control" type="text" name="kode" value="{{ $data_provinsi->kode }}">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama Provinsi</label>
                        <input class="form-control" type="text" name="nama_provinsi" value="{{ $data_provinsi->nama_provinsi }}">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="{{ $data_provinsi->status }}" readonly>Selected {{ $data_provinsi->status }}</option>
                            <option value="aktif">Aktif</option>
                            <option value="tidak aktif">Tidak Aktif</option>
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