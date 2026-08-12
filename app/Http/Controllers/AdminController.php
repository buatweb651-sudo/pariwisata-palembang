<?php

namespace App\Http\Controllers;
use App\Models\Destinasi;
use App\Models\Atraksi;
use App\Models\User;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
{
    $data = [
        'totalDestinasi' => Destinasi::count(),
        'totalAtraksi' => Atraksi::count(),
        'totalUser' => User::count(),
        'totalUlasan' => Ulasan::count(),
    ];
 
    return view('admin.dashboard', $data);
}

}
