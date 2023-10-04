<?php

namespace App\Http\Controllers;

use App\Models\vehicle;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class vehicleController extends Controller
{
    public function index()
    {
        $data = Vehicle::all();
        return view('admin.crud.vehicle', compact('data'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'merk' => 'required',
            'nopol' => 'required'
        ]);
        Vehicle::create($validatedData);
        LogActivity::create([
            'username' => Auth::user()->username,
            'activity' => 'menambahkan vehicle'
        ]);
        return redirect(route('vehicle.index'));
    }

    

    public function destroy($id)
    {
            // Cari data yang akan dihapus berdasarkan $id
            $data = Vehicle::find($id);

            // Periksa apakah data ditemukan
            if (!$data) {
                return redirect()->route('vehicle.index')->with('error', 'Data tidak ditemukan.');
            }

            // Hapus data
            $data->delete();

            return redirect()->route('vehicle.index')->with('success', 'Data berhasil dihapus.');
    }


}
