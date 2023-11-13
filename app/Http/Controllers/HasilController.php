<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\KategoriIndikator;
use App\Models\Pertanyaan;
use App\Models\Responden;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = "Data Rekap Hasil Responden";
        $hasil = Hasil::all();
        $responden = Responden::select('id', 'name')->get();
        $pertanyaan = Pertanyaan::select('id', 'title')->get();
        return view("admin.hasil.index", compact("page", 'hasil', 'responden', 'pertanyaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = "Tambah Hasil Kuisioner";
        $responden = Responden::all();
        $kategori = KategoriIndikator::all();
        return view("admin.hasil.create", compact("page", 'responden', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'pertanyaan_id.*' => ['required', 'numeric'],
            'responden_id' => ['required', 'numeric'],
            'bobot_harapan.*' => ['required', 'numeric'],
            'bobot_persepsi.*' => ['required', 'numeric'],
            'tanggal' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect('hasil.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $date = new Carbon($request->tanggal);
            $year = $date->year;
            for ($i = 0; $i < count($request->pertanyaan_id); $i++) {
                $hasil = new Hasil();
                $hasil->pertanyaan_id = $request->pertanyaan_id[$i];
                $hasil->tanggal = $request->tanggal;
                $hasil->tahun = $year;
                $hasil->responden_id = $request->responden_id;
                $hasil->bobot_harapan = $request->bobot_harapan[$i];
                $hasil->bobot_persepsi = $request->bobot_persepsi[$i];
                $hasil->save();
            }
        }

        Alert::success('Success', 'Berhasil');
        return redirect()->route('hasil.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pertanyaan = Pertanyaan::where('kategori_indikator_id', $id)->orderBy('created_at', 'desc')->get();
        return json_encode($pertanyaan);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hasil =  Hasil::findOrFail($id);
        return json_encode($hasil);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hasil =  Hasil::findOrFail($id);
        $hasil->delete();

        Alert::success('Success', 'Berhasil');
        return redirect()->route('hasil.index');
    }
}
