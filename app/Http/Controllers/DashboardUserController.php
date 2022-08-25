<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboardUser.index', [
            'mobils' => Car::Where('status', '=', 'idle')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPemesanan($id)
    {
        // return $id;
        return view('dashboardUser.createPemesanan', [
            'mobils' => Car::Where('id', '=', $id)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePemesanan(Request $request)
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

        return redirect('/dashboardUser')->with('SuccessInput', 'Data Pemesanan Berhasil diinputkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pemesanan()
    {
        return view('dashboardUser.pemesanan', [
            'pemesanans' => Pemesanan::Where('user_id', '=', auth()->user()->id)->get(),
        ]);
    }

    public function editPemesanan($id)
    {
        // return Pemesanan::Where('id', '=', $id)->first();
        return view('dashboardUser.editPemesanan', [
            'pemesanans' => Pemesanan::Where('id', '=', $id)->first(),
        ]);
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

        Pemesanan::Where('id', $id)->update($validated);

        return redirect('/dashboardUser/pemesanan')->with('SuccessInput', 'Data Pemesanan Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pemesanan::destroy($id);
        return redirect('/dashboardUser/pemesanan')->with('SuccessInput', 'Data Pemesanan Berhasil Dihapus');
    }
}
