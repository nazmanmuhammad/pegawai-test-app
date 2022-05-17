<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_kecamatan = Kecamatan::get();
        return view('admin.kecamatan.index',compact('data_kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kecamatan.create');
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
            'nama_kecamatan' => 'required',
            'status' => 'required'
        ],[
            'kode.required' => 'Kode tidak boleh dikosongkan!',
            'nama_kecataman.required' => 'Nama Kecamatan tidak boleh dikosongkan!',
            'status.required' => 'Status tidak boleh dikosongkan!'
        ]);

        Kecamatan::create([
            'kode' => $request->get('kode'),
            'nama_kecamatan' => $request->get('nama_kecamatan'),
            'status' => $request->get('status')
        ]);

        return redirect()->route('kecamatan.index')->with('message','Kecamatan berhasil ditambahkan!');
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
        $data_kecamatan = Kecamatan::find($id);
        return view('admin.kecamatan.edit',compact('data_kecamatan'));
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
            'nama_kecamatan' => 'required',
            'status' => 'required'
        ],[
            'kode.required' => 'Kode tidak boleh dikosongkan!',
            'nama_kecataman.required' => 'Nama Kecamatan tidak boleh dikosongkan!',
            'status.required' => 'Status tidak boleh dikosongkan!'
        ]);
        $data_kecamatan = Kecamatan::find($id);
        $data_kecamatan->update([
            'kode' => $request->get('kode'),
            'nama_kecamatan' => $request->get('nama_kecamatan'),
            'status' => $request->get('status')
        ]);

        return redirect()->route('kecamatan.index')->with('message','Kecamatan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_kecamatan = Kecamatan::find($id);
        $data_kecamatan->delete();

        return redirect()->route('kecamatan.index')->with('message','Kecamatan berhasil dihapus!');
    }
}
