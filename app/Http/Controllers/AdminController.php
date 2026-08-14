<?php

namespace App\Http\Controllers;
use App\Models\Destinasi;
use App\Models\Atraksi;
use App\Models\User;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $ulasanTerbaru = Ulasan::with(['user', 'destinasi'])
            ->latest()
            ->take(3)
            ->get();

        $destinasiPerluPerhatian = Destinasi::where(function ($query) {
                $query->whereNull('gambar')
                      ->orWhere('gambar', '')
                      ->orWhereNull('harga_tiket')
                      ->orWhere('harga_tiket', 0);
            })->get();

        $userGrowthLabels = [];
        $userGrowthData = [];

        for ($i = 6; $i >= 0; $i--) {
            $tanggal = Carbon::now()->subDays($i);
            $userGrowthLabels[] = $tanggal->translatedFormat('d M');
            $userGrowthData[] = User::whereDate('created_at', $tanggal->format('Y-m-d'))->count();
        }

        $data = [
            'totalDestinasi' => Destinasi::count(),
            'totalAtraksi' => Atraksi::count(),
            'totalUser' => User::count(),
            'totalUlasan' => Ulasan::count(),
            'ulasanTerbaru' => $ulasanTerbaru,
            'destinasiPerluPerhatian' => $destinasiPerluPerhatian,
            'userGrowthLabels' => $userGrowthLabels,
            'userGrowthData' => $userGrowthData,
        ];

        return view('admin.dashboard', $data);
    }

}
