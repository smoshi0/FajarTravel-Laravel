<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboardAdmin.pembayaran.index', [
            'pembayarans' => Pembayaran::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboardAdmin.pembayaran.create', [
            'pembayarans' => Pembayaran::all(),
            'pemesanans' => Pemesanan::all(),
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
            'pemesanan_id' => 'required',
            'tgl_bayar' => 'required',
            'bukti_transfer' => 'required|image|file|max:2048',
        ]);

        if ($request->file('bukti_transfer')) {
            $validated['bukti_transfer'] = $request->file('bukti_transfer')->store('bukti-pembayaran');
        }

        Pembayaran::create($validated);
        return redirect('/dashboardAdmin/pembayaran')->with('SuccessInput', 'Data Pembayaran Berhasil diinputkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        return view('dashboardAdmin.pembayaran.edit', [
            'pembayarans' => $pembayaran,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $rules = [
            'pemesanan_id' => 'required',
            'tgl_bayar' => 'required',
            'bukti_transfer' => 'image|file|max:2048',
            'accept' => 'required',
        ];

        $validated = $request->validate($rules);

        if ($request->file('bukti_transfer')) {
            if ($request->oldImg) {
                Storage::delete($request->oldImg);
            }
            $validated['bukti_transfer'] = $request->file('bukti_transfer')->store('bukti-pembayaran');
        }

        Pembayaran::Where('id', $pembayaran->id)->update($validated);

        return redirect('/dashboardAdmin/pembayaran')->with('SuccessInput', 'Data Pembayaran Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        if ($pembayaran->bukti_transfer) {
            Storage::delete($pembayaran->bukti_transfer);
        }

        Pembayaran::destroy($pembayaran->id);
        return redirect('/dashboardAdmin/pembayaran')->with('SuccessInput', 'Data Pembayaran Berhasil Diedit');
    }
}
