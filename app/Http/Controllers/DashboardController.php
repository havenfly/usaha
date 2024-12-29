<?php

namespace App\Http\Controllers;
use App\Models\HeroModel;
use App\Models\RoleHeroModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // app/Http/Controllers/HomeController.php
    public function index()
    {
        $jumlahhero = RoleHeroModel::count();
        $jumlahrolehero = RoleHeroModel::count();
        $totallakilaki = HeroModel::where('jenis_kelamin','laki-laki')->count();
        $totalperempuan = HeroModel::where('jenis_kelamin','perempuan')->count();
        $totalS = HeroModel::where('tier','S')->count();
        $totalSS = HeroModel::where('tier','S++')->count();
        $totalhero = HeroModel::count();
        return view('dashboard', compact('jumlahhero', 'jumlahrolehero', 'totallakilaki', 'totalperempuan', 'totalS', 'totalSS', 'totalhero'));
    }

}