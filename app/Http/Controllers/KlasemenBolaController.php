<?php

namespace App\Http\Controllers;

use App\Http\Requests\TambahKlubRequest;
use App\Models\Klub;
use Exception;
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

    public function tambahKlubAction(TambahKlubRequest $request)
    {
        try {
            $this->klub->create($request->toArray());
            return redirect()->back()->with('success', 'Berhasil menambah klub baru');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function tambahPertandingan()
    {
        return view('tambah-pertandingan', [
            'menu' => 'Tambah Pertandingan'
        ]);
    }
}
