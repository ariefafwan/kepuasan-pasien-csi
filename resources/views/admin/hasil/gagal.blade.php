@extends('admin.layouts.app')

@section('body')

    <div class="p-4 bg-white rounded-lg">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h2 class="text-2xl font-bold mb-4">Hasil Perhitungan CSI</h2>
            <div class="relative shadow-md sm:rounded-lg">
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium">Data Kamu Belum Cukup!</span> Tambahkan Hasil Kuisioner Untuk Mendapatkan Perhitungan CSI
                </div>
            </div>
        </div>
    </div>
  
@endsection