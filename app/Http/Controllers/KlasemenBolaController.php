<?php

namespace App\Http\Controllers;

use App\Http\Requests\TambahKlubRequest;
use App\Http\Requests\TambahPertandinganRequest;
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
        $klub = $this->klub->all();

        return view('tambah-pertandingan', [
            'menu' => 'Tambah Pertandingan',
            'klub' => $klub
        ]);
    }

    public function tambahPertandinganAction(TambahPertandinganRequest $request)
    {
        if ($request->jenis == 'Single') {
            $this->pertandingan($request->klub_kandang, $request->klub_tandang, $request->goal_kandang, $request->goal_tandang);
        } else if ($request->jenis == 'Multiple') {
            for ($i=0; $i<count($request->klub_kandang); $i++) {
                $this->pertandingan($request->klub_kandang[$i], $request->klub_tandang[$i], $request->goal_kandang[$i], $request->goal_tandang[$i]);
            };
        }

        return redirect()->route('klasemen-bola')->with('success', 'Berhasil Menambah Pertandingan');
    }

    private function pertandingan($klubKandang, $klubTandang, $goalKandang, $goalTandang)
    {
        $kandang = $this->klub->where('nama', $klubKandang)->first();
        $tandang = $this->klub->where('nama', $klubTandang)->first();

        if ($goalKandang > $goalTandang) {
            $kandang->main += 1;
            $kandang->menang += 1;
            $kandang->goal_menang += $goalKandang;
            $kandang->goal_kalah += $goalTandang;
            $kandang->point += 3;

            $tandang->main += 1;
            $tandang->kalah += 1;
            $tandang->goal_menang += $goalTandang;
            $tandang->goal_kalah += $goalKandang;
            $tandang->point += 0;
        } else if ($goalKandang < $goalTandang) {
            $kandang->main += 1;
            $kandang->kalah += 1;
            $kandang->goal_menang += $goalKandang;
            $kandang->goal_kalah += $goalTandang;
            $kandang->point += 0;

            $tandang->main += 1;
            $tandang->menang += 1;
            $tandang->goal_menang += $goalTandang;
            $tandang->goal_kalah += $goalKandang;
            $tandang->point += 3;
        } else {
            $kandang->main += 1;
            $kandang->seri += 1;
            $kandang->goal_menang += $goalKandang;
            $kandang->goal_kalah += $goalTandang;
            $kandang->point += 1;

            $tandang->main += 1;
            $tandang->seri += 1;
            $tandang->goal_menang += $goalTandang;
            $tandang->goal_kalah += $goalKandang;
            $tandang->point += 1;
        }

        $kandang->save();
        $tandang->save();
    }
}
