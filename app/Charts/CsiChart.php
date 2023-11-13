<?php

namespace App\Charts;

use App\Models\Hasil;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class CsiChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $dtahun = Hasil::select('tahun')->distinct()->get();
        $tahun = [];
        foreach ($dtahun as $key => $dta) {
            $tahun[$key] = $dta->tahun;
        }
        $mean = Hasil::select('pertanyaan_id', 'tahun')
            ->selectRaw("SUM(bobot_harapan) / COUNT(bobot_harapan) as mis")
            ->selectRaw("SUM(bobot_persepsi) / COUNT(bobot_persepsi) as mss")
            ->groupBy('pertanyaan_id', 'tahun')->get();

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
                'tahun' => $value->tahun,
                'wf' => $value->mis / $summis * 100,
            ];
        }

        $hasil = [];
        foreach ($wf as $key => $nwf) {
            foreach ($mean as $key2 => $value2) {
                if ($value2->pertanyaan_id == $nwf['pertanyaan_id'] && $value2->tahun == $nwf['tahun']) {
                    $hasil[] = [
                        'pertanyaan_id' => $nwf['pertanyaan_id'],
                        'tahun' => $value2->tahun,
                        'mis' => $value2->mis,
                        'mss' => $value2->mss,
                        'ws' => $nwf['wf'] * $value2->mss,
                    ];
                    // dd($nwf['pertanyaan_id']);
                };
            };
        }

        $wt = array_reduce($hasil, function ($carry, $item) {
            if (!isset($carry[$item['tahun']])) {
                $carry[$item['tahun']] = ['tahun' => $item['tahun'], 'ws' => $item['ws']];
            } else {
                $carry[$item['tahun']]['ws'] += $item['ws'];
            }
            return $carry;
        });

        $csi = [];
        foreach ($wt as $key => $value) {
            foreach ($dtahun as $index => $hun) {
                if ($hun->tahun == $value['tahun']) {
                    $csi[] = $value['ws'] / 5;
                }
            }
        };

        return $this->chart->barChart()
            ->setTitle('Total CSI Pertahun.')
            ->addData('Total CSI', $csi)
            ->setXAxis($tahun);
    }
}
