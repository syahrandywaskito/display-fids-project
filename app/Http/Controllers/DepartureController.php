<?php

namespace App\Http\Controllers;

use App\Models\Departure;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartureController extends Controller
{
    public function index() : View
    {
        $carbon = Carbon::now();
        $format = $carbon->format('l, j F Y');

        $departures = DB::table('departures')->orderBy('waktu', 'asc')->get();

        return view('departure.index', ['date' => $format, 'departures' => $departures]);
    }

    public function data() : View
    {
        $departures = Departure::orderBy('waktu', 'asc')->get();

        return view('departure.data', ['departures' => $departures]);
    }

    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'nama_maskapai' => 'required',
            'id_penerbangan' => 'required',
            'tujuan' => 'required',
            'waktu' => 'required',
        ]);

        Departure::create([
            'nama_maskapai' => $request->nama_maskapai,
            'id_penerbangan' => $request->id_penerbangan,
            'tujuan' => $request->tujuan,
            'waktu' => $request->waktu,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan !');
    }

    public function edit(Departure $departure)
    {
        return view('departure.edit', [
            'departure' => $departure,
        ]);   
        // return response()->json([
        //     'data' => $id,
        // ]);
    }

    public function update(Request $request, Departure $departure){

        $request->validate([
            'nama_maskapai' => 'required',
            'id_penerbangan' => 'required',
            'tujuan' => 'required',
            'waktu' => 'required',
        ]);

        $departure->update([
            'nama_maskapai' => $request->nama_maskapai,
            'id_penerbangan' => $request->id_penerbangan,
            'tujuan' => $request->tujuan,
            'waktu' => $request->waktu,
        ]);

        // return response()->json([
        //     'success' => true,
        //     'message' => "Data berhasil diupdate",
        //     'data' => $departure
        // ]);

        return redirect()->route('departure.data')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Departure $departure) : RedirectResponse
    {
        $departure->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus !');
    }
}
