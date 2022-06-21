<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuTamu;
use Illuminate\Support\Facades\DB;

class BukuTamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bukuTamu = BukuTamu::all();
        return view('buku-tamu', ['bukuTamu' => $bukuTamu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'komentar' => 'required',
        ]);

        if ($validate) {
            $bukuTamu = new BukuTamu;
            $bukuTamu->nama = $request->nama;
            $bukuTamu->email = $request->email;
            $bukuTamu->komentar = $request->komentar;
            $bukuTamu->save();
            return redirect()->back()->with('success', 'Komentar anda telah terkirim');
        } else {
            return redirect()->back()->withErrors($validate);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // update data buku tamu
        $bukuTamu = BukuTamu::find($request->id);
        $bukuTamu->nama = $request->nama;
        $bukuTamu->email = $request->email;
        $bukuTamu->komentar = $request->komentar;
        $bukuTamu->save();

        return redirect()->back()->with('success', 'Tamu berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::table('buku_tamus')->where('id', $request->id)->delete();
        return redirect()->back()->with('success', 'Tamu berhasil dihapus');
    }
}
