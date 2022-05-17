<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Kelurahan;
use App\Models\Provinsi;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pegawai = Pegawai::get();
        $data_kelurahan = Kelurahan::get();
        $data_provinsi = Provinsi::get();
        return view('admin.pegawai.index',compact('data_pegawai','data_kelurahan','data_provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_kelurahan = Kelurahan::get();
        $data_provinsi = Provinsi::get();
        return view('admin.pegawai.create',compact('data_kelurahan','data_provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_pegawai' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'kelurahan_id' => 'required',
            'provinsi_id' => 'required'
        ],[
            'nama_pegawai.required' => 'Nama Pegawai tidak boleh dikosongkan!',
            'tempat_lahir.required' => 'Tempat Lahir tidak boleh dikosongkan!',
            'tanggal_lahir.required' => 'Tempat Lahir tidak boleh dikosongkan!',
            'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh dikosongkan!',
            'agama.required' => 'Agama tidak boleh dikosongkan!',
            'alamat.required' => 'Alamat tidak boleh dikosongkan!',
            'kelurahan_id.required' => 'Kelurahan Kecamatan tidak boleh dikosongkan!',
            'provinsi_id.required' => 'Provinsi tidak boleh dikosongkan!'
        ]);

        Pegawai::create([
            'nama_pegawai' => $request->get('nama_pegawai'),
            'tempat_lahir' => $request->get('tempat_lahir'),
            'tanggal_lahir' => $request->get('tanggal_lahir'),
            'jenis_kelamin' => $request->get('jenis_kelamin'),
            'agama' => $request->get('agama'),
            'alamat' => $request->get('alamat'),
            'kelurahan_id' => $request->get('kelurahan_id'),
            'provinsi_id' => $request->get('provinsi_id')
        ]);

        return redirect()->route('pegawai.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data_pegawai = Pegawai::find($id);
        $data_kelurahan = Kelurahan::get();
        $data_provinsi = Provinsi::get();
        return view('admin.pegawai.edit',compact('data_pegawai','data_kelurahan','data_provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_pegawai' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'kelurahan_id' => 'required',
            'provinsi_id' => 'required'
        ],[
            'nama_pegawai.required' => 'Nama Pegawai tidak boleh dikosongkan!',
            'tempat_lahir.required' => 'Tempat Lahir tidak boleh dikosongkan!',
            'tanggal_lahir.required' => 'Tempat Lahir tidak boleh dikosongkan!',
            'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh dikosongkan!',
            'agama.required' => 'Agama tidak boleh dikosongkan!',
            'alamat.required' => 'Alamat tidak boleh dikosongkan!',
            'kelurahan_id.required' => 'Kelurahan Kecamatan tidak boleh dikosongkan!',
            'provinsi_id.required' => 'Provinsi tidak boleh dikosongkan!'
        ]);

        $data_pegawai = Pegawai::find($id);
        $data_pegawai->update([
            'nama_pegawai' => $request->get('nama_pegawai'),
            'tempat_lahir' => $request->get('tempat_lahir'),
            'tanggal_lahir' => $request->get('tanggal_lahir'),
            'jenis_kelamin' => $request->get('jenis_kelamin'),
            'agama' => $request->get('agama'),
            'alamat' => $request->get('alamat'),
            'kelurahan_id' => $request->get('kelurahan_id'),
            'provinsi_id' => $request->get('provinsi_id')
        ]);

        return redirect()->route('pegawai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_pegawai = Pegawai::find($id);
        $data_pegawai->delete();
        return redirect()->route('pegawai.index');
    }
}
