<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function dashboard() {
        $jumlahBarang = Barang::count();
        $totalHargaBarang = Barang::sum('harga_barang');
        $jumlahUsers = User::count();

            return view('layout.config.admin.user.dashboard', compact('jumlahBarang', 'totalHargaBarang', 'jumlahUsers'));
    }

}
