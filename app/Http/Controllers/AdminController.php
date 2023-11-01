<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    {
        $page = 'Dashboard Admin';
        return view('admin.dashboard', compact('page'));
    }

    public function updatehasil(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'pertanyaan_id' => ['required', 'numeric'],
            'responden_id' => ['required', 'numeric'],
            'bobot_harapan' => ['required', 'numeric'],
            'bobot_persepsi' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('hasil.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $hasil = Hasil::findOrFail($request->idhasil);
            $hasil->pertanyaan_id = $request->pertanyaan_id;
            $hasil->responden_id = $request->responden_id;
            $hasil->bobot_harapan = $request->bobot_harapan;
            $hasil->bobot_persepsi = $request->bobot_persepsi;
            $hasil->save();
        }

        Alert::success('Success', 'Berhasil');
        return redirect()->route('hasil.index');
    }

    public function perhitungan()
    {
        $page = 'Perhitungan CSI';
        $pertanyaan = Pertanyaan::select('id', 'kode_pertanyaan')->get();
        $mean = Hasil::select('pertanyaan_id')
            ->selectRaw("SUM(bobot_harapan) / COUNT(bobot_harapan) as msi")
            ->selectRaw("SUM(bobot_persepsi) / COUNT(bobot_persepsi) as mss")
            ->groupBy('pertanyaan_id')->get();


        if (count($mean) <= 1) {
            return view('admin.hasil.gagal', compact('page'));
        }
        $meanmis = 0;
        $meanmss = 0;

        foreach ($mean as $key => $m) {
            $meanmis += $m->msi;
            $meanmss += $m->mss;
        }

        $wf = [];
        foreach ($mean as $key => $value) {
            $wf[] = [
                'pertanyaan_id' => $value->pertanyaan_id,
                'wf' => $value->msi / $meanmis * 100,
            ];
        }

        $hasil = [];
        foreach ($wf as $key => $nwf) {
            foreach ($mean as $key2 => $value2) {
                if ($value2->pertanyaan_id == $nwf['pertanyaan_id']) {
                    $hasil[] = [
                        'pertanyaan_id' => $nwf['pertanyaan_id'],
                        'msi' => $value2->msi,
                        'mss' => $value2->mss,
                        'wf' => $nwf['wf'],
                        'ws' => $nwf['wf'] * $value2->mss,
                    ];
                    // dd($nwf['pertanyaan_id']);
                };
            };
        }

        $wt = 0;
        foreach ($hasil as $key => $value) {
            $wt += $value['ws'];
        }

        // return response()->json($hasil, 200);
        return view('admin.hasil.perhitungan', compact('page', 'wt', 'hasil', 'pertanyaan', 'meanmis', 'meanmss'));
    }
}
