<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KlasemenBolaController extends Controller
{
    public function klasemenBola()
    {
        return view('klasemen-bola', [
            'menu' => 'Klasemen Bola'
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
