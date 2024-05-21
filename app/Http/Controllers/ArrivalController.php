<?php

namespace App\Http\Controllers;

use App\Models\Arrival;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ArrivalController extends Controller
{
    public function index() : View
    {
        $carbon = Carbon::now();
        $format = $carbon->format('l, j F Y');

        $arrivals = Arrival::orderBy('waktu', 'asc')->get();

        return view('arrival.index', ['date' => $format, 'arrivals' => $arrivals]);
    }

    public function data() : View
    {

        $arrivals = Arrival::orderBy('waktu', 'asc')->get();

        return view('arrival.data', ['arrivals' => $arrivals]);
    }

    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'nama_maskapai' => 'required',
            'id_penerbangan' => 'required',
            'dari' => 'required',
            'waktu' => 'required',
        ]);

        Arrival::create([
            'nama_maskapai' => $request->nama_maskapai,
            'id_penerbangan' => $request->id_penerbangan,
            'dari' => $request->dari,
            'waktu' => $request->waktu,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan !');
    }

    public function edit(Arrival $arrival) {

        return view('arrival.edit', [
            'arrival' => $arrival,
        ]);

        // return response()->json([
        //     'data' => $id
        // ]);
    }

    public function update(Request $request, Arrival $arrival)
    {
        $request->validate([
            'nama_maskapai' => 'required',
            'id_penerbangan' => 'required',
            'dari' => 'required',
            'waktu' => 'required',
        ]);

        $arrival->update([
            'nama_maskapai' => $request->nama_maskapai,
            'id_penerbangan' => $request->id_penerbangan,
            'dari' => $request->dari,
            'waktu' => $request->waktu,
        ]);

        return redirect()->route('arrival.data')->with('success', 'Data Berhasil Diubah');

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Data Berhasil Diupdate',
        //     'data' => $arrival
        // ]);
        
    }

    public function destroy(Arrival $arrival) : RedirectResponse
    {
        $arrival->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus !');
    }

}
