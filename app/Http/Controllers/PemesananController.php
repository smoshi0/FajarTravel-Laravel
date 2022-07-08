<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboardAdmin.pemesanan.index', [
            'pemesanans' => Pemesanan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboardAdmin.pemesanan.create', [
            'mobils' => Car::Where('status', '=', 'idle')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required',
            'user_id' => 'required',
            'nama' => 'required',
            'no_tlp' => 'required',
            'alamat' => 'required',
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',
            'total_hari' => 'required',
            'total_pembayaran' => 'required',
        ]);

        Pemesanan::create($validated);

        return redirect('/dashboardAdmin/pemesanan')->with('SuccessInput', 'Data Pemesanan Berhasil diinputkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemesanan $pemesanan)
    {
        return view('dashboardAdmin.pemesanan.edit', [
            'pemesanans' => $pemesanan,
            'mobils' => Car::Where('status', '=', 'idle')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        $rules = [
            'car_id' => 'required',
            'nama' => 'required',
            'no_tlp' => 'required',
            'alamat' => 'required',
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',
            'total_hari' => 'required',
            'total_pembayaran' => 'required',
        ];

        $validated = $request->validate($rules);

        Pemesanan::Where('id', $pemesanan->id)->update($validated);

        return redirect('/dashboardAdmin/pemesanan')->with('SuccessInput', 'Data Pemesanan Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemesanan $pemesanan)
    {
        Pemesanan::destroy($pemesanan->id);
        return redirect('/dashboardAdmin/pemesanan')->with('SuccessInput', 'Data Pemesanan Berhasil Dihapus');
    }
}
