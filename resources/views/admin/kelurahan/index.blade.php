@extends('admin.layouts.master')
@section('content')
<div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Tambah Kelurahan</p>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">kelurahan</p>
                 <a href="{{ route('kelurahan.create' )}}" class="btn btn-primary btn-sm">Tambah Provinsi</a>
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
                            @foreach($data_kelurahan as $kelurahan)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $kelurahan->kode }}</td>
                                <td>{{ $kelurahan->nama_kelurahan}}</td>
                                <td>{{ $kelurahan->kecamatan->nama_kecamatan}}</td>
                                <td>{{ $kelurahan->status }}</td>
                                <td><a href="{{ route('kelurahan.edit',[$kelurahan->id])}}" class="btn btn-warning btn-sm">Ubah</a>
                                <form action="{{ route('kelurahan.destroy',[$kelurahan->id])}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus Kelurahan: {{ $kelurahan->nama_kelurahan }}')">Hapus</button>
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