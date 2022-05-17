@extends('admin.layouts.master')
@section('content')
<div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Data Kelurahan</p>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">kelurahan</p>
                 <a href="{{ route('kelurahan.create' )}}" class="btn btn-primary btn-sm">Tambah Kelurahan</a>
              <div class="row">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama Kelurahan</th>
                                <th>Nama Kecamatan</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @foreach($data_kelurahan as $kelurahan)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $kelurahan->kode }}</td>
                                <td>{{ $kelurahan->nama_kelurahan}}</td>
                                <td>{{ $kelurahan->kecamatan->nama_kecamatan}}</td>
                                @if($kelurahan->status=='aktif')<td><div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck2" checked disabled></td>
                                @elseif($kelurahan->status=='tidak_aktif')<td><div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck2" disabled></td>
                                @endif
                                <td><a href="{{ route('kelurahan.edit',[$kelurahan->id])}}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('kelurahan.destroy',[$kelurahan->id])}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus Kelurahan: {{ $kelurahan->nama_kelurahan }}')">Delete</button>
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