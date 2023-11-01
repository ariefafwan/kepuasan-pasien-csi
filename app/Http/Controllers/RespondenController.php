<?php

namespace App\Http\Controllers;

use App\Models\Responden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class RespondenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page  = "List Responden";
        $responden = Responden::all();
        return view("admin.responden.index", compact("responden", 'page'));
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
            'name' => 'required|string|max:255',
            'nama_wali' => 'required|string',
            'usia' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string',
            'pekerjaan' => 'required|required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('responden.index')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->idresponden) {
            $responden =  Responden::findOrFail($request->idresponden);
        } else {
            $responden = new Responden();
        }

        $responden->name = $request->name;
        $responden->nama_wali = $request->nama_wali;
        $responden->usia = $request->usia;
        $responden->alamat = $request->alamat;
        $responden->jenis_kelamin = $request->jenis_kelamin;
        $responden->pekerjaan = $request->pekerjaan;
        $responden->save();

        Alert::success('Success', 'Berhasil');
        return redirect()->route('responden.index');
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
        $responden =  Responden::findOrFail($id);
        return json_encode($responden);
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
        $responden =  Responden::findOrFail($id);
        $responden->delete();

        Alert::success('Success', 'Berhasil Menghapus Data');
        return redirect()->route('responden.index');
    }
}
