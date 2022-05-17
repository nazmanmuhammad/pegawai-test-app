@extends('admin.layouts.master')
@section('content')
<div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Tambah Provinsi</p>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">Provinsi</p>
                 <a href="{{ route('provinsi.create' )}}" class="btn btn-primary btn-sm">Tambah Provinsi</a>
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
                            @foreach($data_provinsi as $provinsi)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $provinsi->kode }}</td>
                                <td>{{ $provinsi->nama_provinsi}}</td>
                                <td>{{ $provinsi->status }}</td>
                                <td><a href="{{ route('provinsi.edit',[$provinsi->id]) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('provinsi.destroy',[$provinsi->id]) }}" method="post">
                                        {{ csrf_field()}}
                                        {{ method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus Provinsi: {{$provinsi->nama_provinsi}}')">Delete</button>
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