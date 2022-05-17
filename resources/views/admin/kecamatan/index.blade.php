@extends('admin.layouts.master')
@section('content')
<div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Tambah kecamatan</p>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">kecamatan</p>
                 <a href="{{ route('kecamatan.create' )}}" class="btn btn-primary btn-sm">Tambah Provinsi</a>
              <div class="row">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama Provinsi</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @foreach($data_kecamatan as $kecamatan)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $kecamatan->kode }}</td>
                                <td>{{ $kecamatan->nama_kecamatan}}</td>
                                @if($kecamatan->status=='aktif')<td><div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck2" checked></td>
                                @elseif($kecamatan->status=='tidak aktif')<td><div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck2"></td>
                                @endif
                                <td><a href="{{ route('kecamatan.edit',[$kecamatan->id]) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('kecamatan.destroy',[$kecamatan->id]) }}" method="post">
                                        {{ csrf_field()}}
                                        {{ method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus Provinsi: {{$kecamatan->nama_kecamatan}}')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
              </div>
            </div>
          </div>
        </div>
@stop