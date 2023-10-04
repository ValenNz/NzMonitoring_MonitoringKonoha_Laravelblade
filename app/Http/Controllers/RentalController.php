<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use App\Models\History;
use App\Models\vehicle;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class RentalController extends Controller
{
    public function index()
    {

        $activities = DB::table('rental_history')
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as time'), DB::raw('count(*) as total_activity'))
            ->groupBy('time')
            ->orderBy('time')
            ->get();

        foreach ($activities as $activity) {
            DB::table('report')
                ->updateOrInsert(
                    ['time' => $activity->time],
                    ['total_activity' => $activity->total_activity]
                );
        }

        $history = History::all();
        $data = Rental::all();
        $checkApproval = User::where('id', Auth::user()->id)->first();
        return view('admin.crud.index', compact(['data', 'checkApproval', 'history']));
    }
    public function create()
    {
        $data = User::where('role', '=', 'approval')->get();
        $vehicle = vehicle::all();
        return view('admin.crud.create', compact(['data', 'vehicle']));
    }
    public function store(Request $request)
    {
        try {
            $confirmed =  Rental::create(
                [
                    'vehicle' => $request['vehicle'],
                    'driver' => $request['driver'],
                    'approval_id' => $request['approval_id']
                ]
            );
            if ($confirmed) {
                return redirect(route('manage.index'));
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
    public function destroy($id)
    {
        $pesan = History::findOrFail($id);
        $pesan->delete();

        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new LaporanExport, 'laporan.xlsx');
    }
}
