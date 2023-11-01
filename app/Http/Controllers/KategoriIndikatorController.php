<?php

namespace App\Http\Controllers;

use App\Models\KategoriIndikator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriIndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page  = "Kategori Indikator";
        $kategori = KategoriIndikator::all();
        return view("admin.indikator.index", compact("kategori", 'page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
        ]);

        if ($validator->fails()) {
            return redirect()->route('indikator.index')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->idindikator) {
            $kategori = KategoriIndikator::find($request->idindikator);
        } else {
            $kategori = new KategoriIndikator();
        }

        $kategori->title = $request->title;
        $kategori->save();

        Alert::success('Success', 'Berhasil');
        return redirect()->route('indikator.index');
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
        $kategori = KategoriIndikator::find($id);
        return json_encode($kategori);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'title' => 'required|string|max:255',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['error' => $validator->errors()], 400);
        // }
        // $kategori->title = $request->title;
        // $kategori->save();

        // Alert::success('Success', 'Berhasil Mengupdate Data');
        // return redirect()->route('indikator.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = KategoriIndikator::find($id);
        $kategori->delete();

        Alert::success('Success', 'Berhasil Menghapus Data');
        return redirect()->route('indikator.index');
    }
}
