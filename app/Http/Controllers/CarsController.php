<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Car::all();
        return view('dashboardAdmin.car.index', [
            'cars' => Car::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboardAdmin.car.create');
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
            'no_plat' => 'required|unique:cars',
            'nama_mobil' => 'required',
            'jenis_bbm' => 'required',
            'harga_sewa' => 'required',
        ]);

        Car::create($validated);

        return redirect('/dashboardAdmin/car')->with('SuccessInput', 'Data Mobil Berhasil diinputkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('dashboardAdmin.car.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('dashboardAdmin.car.edit', [
            'cars' => $car,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $rules = ([
            'nama_mobil' => 'required',
            'jenis_bbm' => 'required',
            'harga_sewa' => 'required',
            'status' => 'required',
        ]);

        if ($request->no_plat != $car->no_plat) {
            $rules['no_plat'] = 'required|unique:cars';
        }

        $validated = $request->validate($rules);

        Car::Where('id', $car->id)->update($validated);

        return redirect('/dashboardAdmin/car')->with('SuccessInput', 'Data Mobil Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $mobil_id = Pemesanan::Where('car_id', '=', $car->id)->first();
        if ($mobil_id) {
            return redirect('/dashboardAdmin/car')->with('gagalHapus', 'Data Mobil Tidak Bisa Dihapus');
        } else {
            Car::destroy($car->id);
            return redirect('/dashboardAdmin/car')->with('succesDelete', 'Data Mobil Berhasil Dihapus');
        }
    }
}
