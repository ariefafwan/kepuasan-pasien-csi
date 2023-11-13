<?php

namespace App\Http\Controllers;

use App\Charts\CsiChart;
use App\Models\Hasil;
use App\Models\Pertanyaan;
use App\Models\Responden;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     PendudukPerempuanChart $chartperempuan, PendudukLakiChart $chartlaki
    // }

    public function index(CsiChart $csiChart)
    {
        $page = 'Dashboard Admin';
        $dtahun = Hasil::select('tahun')->distinct()->get();
        $responden = Responden::all()->count();
        $chart = $csiChart->build();
        return view('admin.dashboard', compact('page', 'chart', 'responden'));
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

    public function perhitungan(Request $request)
    {
        $page = 'Perhitungan CSI';
        $dtahun = Hasil::select('tahun')->distinct()->get();
        $mean = Hasil::select('pertanyaan_id')
            ->selectRaw("SUM(bobot_harapan) / COUNT(bobot_harapan) as mis")
            ->selectRaw("SUM(bobot_persepsi) / COUNT(bobot_persepsi) as mss")
            ->groupBy('pertanyaan_id')->get();

        if (count($mean) <= 1) {
            return view('admin.hasil.gagal', compact('page'));
        }

        return view('admin.hasil.perhitungan', compact('page', 'dtahun'));
    }

    public function csi($tahun)
    {
        $pertanyaan = Pertanyaan::select('id', 'kode_pertanyaan')->get();
        $mean = Hasil::select('pertanyaan_id')
            ->where('tahun', $tahun)
            ->selectRaw("SUM(bobot_harapan) / COUNT(bobot_harapan) as mis")
            ->selectRaw("SUM(bobot_persepsi) / COUNT(bobot_persepsi) as mss")
            ->groupBy('pertanyaan_id')->get();

        $summis = 0;
        $summss = 0;

        foreach ($mean as $key => $m) {
            $summis += $m->mis;
            $summss += $m->mss;
        }

        $wf = [];
        foreach ($mean as $key => $value) {
            $wf[] = [
                'pertanyaan_id' => $value->pertanyaan_id,
                'wf' => $value->mis / $summis * 100,
            ];
        }

        $hasil = [];
        foreach ($wf as $key => $nwf) {
            foreach ($mean as $key2 => $value2) {
                if ($value2->pertanyaan_id == $nwf['pertanyaan_id']) {
                    $hasil[] = [
                        'pertanyaan_id' => $nwf['pertanyaan_id'],
                        'kode_pertanyaan' => $value2->pertanyaan->kode_pertanyaan,
                        'mis' => $value2->mis,
                        'mss' => $value2->mss,
                        'wf' => $nwf['wf'],
                        'ws' => $nwf['wf'] * $value2->mss,
                    ];
                    // dd($nwf['pertanyaan_id']);
                };
            };
        }

        // dd($hasil);
        $wt = 0;
        foreach ($hasil as $key => $value) {
            $wt += $value['ws'];
        }

        return response()->json(compact('hasil', 'wt', 'pertanyaan', 'summis', 'summss'));
    }
}
