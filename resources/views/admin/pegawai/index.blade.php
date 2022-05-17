@extends('admin.layouts.master')
@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Pegawai</p>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">Pegawai</p>
                 <a href="{{ route('pegawai.create' )}}" class="btn btn-primary btn-sm">Tambah Pegawai</a>
              <div class="row">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Provinsi</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Agama</th>
                                <th>Alamat</th>
                                <th>Kelurahan</th>
                                <th>Kecamatan</th>
                                <th>Provinsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @foreach($data_pegawai as $pegawai)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $pegawai->nama_pegawai }}</td>
                                <td>{{ $pegawai->tempat_lahir}}</td>
                                <td>{{ $pegawai->tanggal_lahir}}</td>
                                <td>{{ $pegawai->agama }}</td>
                                <td>{{ $pegawai->alamat}}</td>
                                <td>{{ $pegawai->kelurahan->nama_kelurahan}}</td>
                                <td>{{ $pegawai->kelurahan->kecamatan_id}}</td>
                                <td>{{ $pegawai->provinsi->nama_provinsi}}</td>
                                <td>
                                    <a href="{{route('pegawai.edit',[$pegawai->id])}}" class="btn btn-warning btn-sm">Ubah</a>
                                    <form action="{{ route('pegawai.destroy',[$pegawai->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="text" class="btn btn-danger" onclick="return confirm('Apakah kamu yakin ingin menghapus data pegawai: {{$pegawai->nama_pegawai}}')">Delete</button>
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