<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_provinsi = Provinsi::get();
        return view('admin.provinsi.index', compact('data_provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.provinsi.create');
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
            'nama_provinsi' => 'required',
            'status' => 'required'
        ],[
            'kode.required' => 'Kode tidak boleh dikosongkan!',
            'nama_provinsi.required' => 'Nama Provinsi tidak boleh dikosongkan!',
            'status.required' => 'Status tidak boleh dikosongkan!'
        ]);

        Provinsi::create([
            'kode' => $request->get('kode'),
            'nama_provinsi' => $request->get('nama_provinsi'),
            'status' => $request->get('status')
        ]);

        return redirect()->route('provinsi.index')->with('message','Provinsi berhasil ditambahkan!');
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
        $data_provinsi = Provinsi::find($id);
        return view('admin.provinsi.edit', compact('data_provinsi'));

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
            'nama_provinsi' => 'required',
            'status' => 'required'
        ],[
            'kode.required' => 'Kode tidak boleh dikosongkan!',
            'nama_provinsi.required' => 'Nama Provinsi tidak boleh dikosongkan!',
            'status.required' => 'Status tidak boleh dikosongkan!'
        ]);
        $data_provinsi = Provinsi::find($id);
        $data_provinsi->update([
            'kode' => $request->get('kode'),
            'nama_provinsi' => $request->get('nama_provinsi'),
            'status' => $request->get('status')
        ]);

        return redirect()->route('provinsi.index')->with('message','Provinsi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_provinsi = Provinsi::find($id);
        $data_provinsi->delete();

        return redirect()->route('provinsi.index')->with('message','Provinsi berhasil dihapus!');
    }
}
