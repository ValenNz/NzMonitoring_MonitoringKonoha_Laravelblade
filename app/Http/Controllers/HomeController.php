<?php

namespace App\Http\Controllers;

use App\Models\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dtvehicle = DB::table('rental')
            ->select('vehicle', DB::raw('count(*) as total'))
            ->groupBy('vehicle')
            ->get();
        $status = DB::table('rental')
            ->select('approved', DB::raw('count(*) as tstatus'))
            ->groupBy('approved')
            ->get();
        return view('admin.dashboard', compact(
            ['dtvehicle', 'status']
        ));
    }
}
