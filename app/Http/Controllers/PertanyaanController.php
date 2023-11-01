<?php

namespace App\Http\Controllers;

use App\Models\KategoriIndikator;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page  = "List Pertanyaan";
        $pertanyaan = Pertanyaan::all();
        $kategori = KategoriIndikator::all();
        return view("admin.pertanyaan.index", compact("pertanyaan", 'kategori', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'kode_pertanyaan' => 'required|string',
            'kategori_indikator_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->route('pertanyaan.index')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->idpertanyaan) {
            $pertanyaan =  Pertanyaan::findOrFail($request->idpertanyaan);
        } else {
            $pertanyaan = new Pertanyaan();
        }

        $pertanyaan->title = $request->title;
        $pertanyaan->kode_pertanyaan = $request->kode_pertanyaan;
        $pertanyaan->kategori_indikator_id = $request->kategori_indikator_id;
        $pertanyaan->save();

        Alert::success('Success', 'Berhasil');
        return redirect()->route('pertanyaan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);
        return json_encode($pertanyaan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $validator = Validator::make($request->all(), [
        //     'title' => 'required|string|max:255',
        //     'kode_pertanyaan' => 'required|string',
        //     'kategori_indikator_id' => 'required|numeric',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['error' => $validator->errors()], 400);
        // }

        // $pertanyaan =  Pertanyaan::finfOrFail($request->idpertanyaan);
        // $pertanyaan->title = $request->title;
        // $pertanyaan->kode_pertanyaan = $request->kode_pertanyaan;
        // $pertanyaan->kategori_indikator_id = $request->kategori_indikator_id;
        // $pertanyaan->save();

        // Alert::success('Success', 'Berhasil Mengupdate Data');
        // return redirect()->route('pertanyaan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);
        $pertanyaan->delete();

        Alert::success('Success', 'Berhasil');
        return redirect()->route('pertanyaan.index');
    }
}
