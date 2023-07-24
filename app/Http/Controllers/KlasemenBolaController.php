<?php

namespace App\Http\Controllers;

use App\Models\Klub;
use Illuminate\Http\Request;

class KlasemenBolaController extends Controller
{
    private $klub;

    public function __construct()
    {
        $this->klub = new Klub();
    }

    public function klasemenBola()
    {
        // Sesuai aturan bola, diurutkan berdasarkan
        // 1. Point
        // 2. Selisih Goal
        // 3. Nama (sesuai awal musim)
        $klub = $this->klub
            ->orderBy('point', 'DESC')
            ->orderByRaw('(goal_menang - goal_kalah) DESC')
            ->orderBy('nama', 'ASC')
            ->get();

        return view('klasemen-bola', [
            'menu' => 'Klasemen Bola',
            'klub' => $klub
        ]);
    }

    public function tambahKlub()
    {
        return view('tambah-klub', [
            'menu' => 'Tambah Klub'
        ]);
    }

    public function tambahPertandingan()
    {
        return view('tambah-pertandingan', [
            'menu' => 'Tambah Pertandingan'
        ]);
    }
}
