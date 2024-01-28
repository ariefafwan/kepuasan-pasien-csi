<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Hasil;
use App\Models\Responden;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    public function index()
    {
        if (session('success_message')) {
            // dd(session('success_message'));
            Alert::success('Success', session('success_message'));
        }

        $pertanyaan = Pertanyaan::orderby('kategori_indikator_id', 'desc')->orderBy('kode_pertanyaan', 'desc')->get();
        return view('form', compact('pertanyaan'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pertanyaan_id.*' => ['required', 'numeric'],
            'name' => 'required|string|max:255',
            'nama_wali' => 'required|string',
            'usia' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'no_bpjs' => 'required',
            'alamat' => 'required|string',
            'pekerjaan' => 'required|required',
            'bobot_harapan.*' => ['required', 'numeric'],
            'bobot_persepsi.*' => ['required', 'numeric'],
            'tanggal' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('form.index')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::beginTransaction();
            $cek = Responden::where('no_bpjs', $request->no_bpjs)->first();

            if (isset($cek)) {
                $date = new Carbon($request->tanggal);
                $year = $date->year;
                $cekhasil = Hasil::where('responden_id', $cek->id)->where('tahun', $year)->first();
                if (isset($cekhasil)) {
                    // dd('true');
                    return redirect()->route('form.index')->withErrors(['Anda Sudah Pernah Mengisi Kuisioner Ini, Anda Dapat Mengisi Kembali Di Tahun Berikutnya'])->withInput();
                } else {
                    for ($i = 0; $i < count($request->pertanyaan_id); $i++) {
                        $hasil = new Hasil();
                        $hasil->pertanyaan_id = $request->pertanyaan_id[$i];
                        $hasil->tanggal = $request->tanggal;
                        $hasil->tahun = $year;
                        $hasil->responden_id = $cek->id;
                        $hasil->bobot_harapan = $request->bobot_harapan[$i];
                        $hasil->bobot_persepsi = $request->bobot_persepsi[$i];
                        $hasil->save();
                    }
                }
            } else {
                $responden = new Responden();
                $responden->name = $request->name;
                $responden->nama_wali = $request->nama_wali;
                $responden->usia = $request->usia;
                $responden->alamat = $request->alamat;
                $responden->no_bpjs = $request->no_bpjs;
                $responden->jenis_kelamin = $request->jenis_kelamin;
                $responden->pekerjaan = $request->pekerjaan;
                $responden->save();

                $date = new Carbon($request->tanggal);
                $year = $date->year;
                for ($i = 0; $i < count($request->pertanyaan_id); $i++) {
                    $hasil = new Hasil();
                    $hasil->pertanyaan_id = $request->pertanyaan_id[$i];
                    $hasil->tanggal = $request->tanggal;
                    $hasil->tahun = $year;
                    $hasil->responden_id = $responden->id;
                    $hasil->bobot_harapan = $request->bobot_harapan[$i];
                    $hasil->bobot_persepsi = $request->bobot_persepsi[$i];
                    $hasil->save();
                }
            }
            DB::commit();

            // Alert::success('Success', 'Terima Kasih Atas Penilaian Anda');
            return redirect()->route('form.index')->withSuccessMessage('Terima Kasih Atas Penilaian Anda');
        } catch (\Exception $e) {
            DB::rollBack();

            // Alert::error('Gagal', $e->getMessage());
            return redirect()->route('form.index')->withErrors($e->getMessage());
        }
    }
}
