<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Rental;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ApproveController extends Controller
{

    public function list()
    {
        $data = User::where('role', '=', 'approval')->get();
        return view('admin.list', compact('data'));
    }
    public function setStatus($id)
    {
        $dtUser = Auth::user()->name;
        $pesan = Rental::findOrFail($id);
        if ($pesan->approved == 0) {
            $pesan->approved = 1;
            $activity = 'approve rental';
        } else {
            $pesan->approved = 0;
            $activity = 'close rental';
        }
        $pesan->save();
        History::create([
            'username' => $dtUser,
            'activity_name' => $activity
        ]);

        return redirect()->route('manage.index');
    }
}
