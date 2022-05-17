<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelurahan;
use App\Models\Kecamatan;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_kelurahan = Kelurahan::get();
        $data_kecamatan = Kecamatan::get();
        return view('admin.kelurahan.index',compact('data_kelurahan','data_kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_kecamatan = Kecamatan::get();
        return view('admin.kelurahan.create',compact('data_kecamatan'));
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
            'kode' => 'required',
            'nama_kelurahan' => 'required',
            'kecamatan_id' => 'required',
            'status' => 'required'
        ],[
            'kode.required' => 'Kode tidak boleh dikosongkan!',
            'nama_kelurahan.required' => 'Nama Kelurahan tidak boleh dikosongkan!',
            'kecamatan_id.required' => 'Nama Kecamatan tidak boleh dikosongkan!',
            'status.required' => 'Status tidak boleh dikosongkan!'
        ]);

        Kelurahan::create([
            'kode' => $request->get('kode'),
            'nama_kelurahan' => $request->get('nama_kelurahan'),
            'kecamatan_id' => $request->get('kecamatan_id'),
            'status' => $request->get('status')
        ]);

        return redirect()->route('kelurahan.index');
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
        $data_kelurahan = Kelurahan::find($id);
        $data_kecamatan = Kecamatan::get();
        return view('admin.kelurahan.edit',compact('data_kelurahan','data_kecamatan'));
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
            'kode' => 'required',
            'nama_kelurahan' => 'required',
            'nama_kecamatan' => 'required',
            'status' => 'required'
        ],[
            'kode.required' => 'Kode tidak boleh dikosongkan!',
            'nama_kelurahan.required' => 'Nama Kelurahan tidak boleh dikosongkan!',
            'nama_kecamatan.required' => 'Nama Kecamatan tidak boleh dikosongkan!',
            'status.required' => 'Status tidak boleh dikosongkan!'
        ]);

        $data_kelurahan = Kelurahan::find($id);
        $data_kelurahan->update([
            'kode' => $request->get('kode'),
            'nama_kelurahan' => $request->get('nama_kelurahan'),
            'nama_kecamatan' => $request->get('nama_kecamatan'),
            'status' => $request->get('status')
        ]);

        return redirect()->route('kelurahan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_kelurahan = Kelurahan::find($id);
        $data_kelurahan->delete(); 
        
        return redirect()->route('kelurahan.index');
    }
}
