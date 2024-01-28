<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulir Kepuasan CSI</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 w-full py-8">
    <div class="flex items-center justify-center">
        <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
            <div class="container max-w-screen-lg mx-auto">
                @if($errors->any())
                    <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-gray-100 border-2 border-red-800" role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ml-3 text-sm font-medium">
                            @foreach($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-gray-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-2" aria-label="Close">
                          <span class="sr-only">Close</span>
                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                          </svg>
                        </button>
                    </div>
                @endif
                <form action="{{ route('form.store' ) }}" method="post" enctype="multipart/form-data">
                @csrf
                <h2 class="font-semibold mb-6 text-xl text-gray-600">Formulir Kepuasan Pasien Terhadap Pelayanan Pasien BPJS RS PIM</h2>
                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                  <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                    <div class="text-gray-600">
                      <p class="font-medium text-lg">Silahkan Isi Data Diri Anda Terlebih Dahulu</p>
                      <p>Mohon isi dengan lengkap dan sebenar-benarnya.</p>
                    </div>
                    <div class="lg:col-span-2">
                      <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                        <div class="md:col-span-5">
                          <label for="full_name">Nama Lengkap</label>
                          <input type="text" required name="name" id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                        </div>
      
                        <div class="md:col-span-3">
                          <label for="test">Pekerjaan</label>
                          <input type="text" required name="pekerjaan" id="pekerjaan" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                        </div>
      
                        <div class="md:col-span-2">
                          <label for="test">No BPJS</label>
                          <input type="text" required name="no_bpjs" id="no_bpjs" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                        </div>
      
                        <div class="md:col-span-4">
                          <label for="alamat">Alamat</label>
                          <input type="text" required name="alamat" id="alamat" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                        </div>
      
                        <div class="md:col-span-1">
                          <label for="usia">Usia</label>
                          <input type="number" required name="usia" id="usia" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                        </div>
      
                        <div class="md:col-span-3">
                          <label for="nama_wali">Nama Wali</label>
                          <input type="text" required name="nama_wali" id="nama_wali" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                        </div>
      
                        <div class="md:col-span-2">
                          <label for="jenis_kelamin">Jenis Kelamin</label>
                          <select id="jenis_kelamin" required name="jenis_kelamin" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50">
                            <option value="Laki - Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
      
                  <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 mt-8">
                    <div class="text-gray-600 text-center">
                      <p class="font-medium text-lg">Berikan Penilaian Anda Berdasarkan Pertanyaan-Pertanyaan Berikut</p>
                      <p>Mohon isi dengan lengkap dan sebenar-benarnya.</p>
                    </div>
      
                    <div class="lg:col-span-2">
                        <div class="md:col-span-5">
                            <label for="tanggal">Anda Mengisi Formulir Ini Pada Tanggal</label>
                            <input type="date" required name="tanggal" id="tanggal" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                        </div>
                    </div>
                    @foreach ($pertanyaan as $index => $tanya)
                    <div class="lg:col-span-2">
                        <div class="mb-3 mt-6">
                            <h4 class="block mb-2 text-sm font-medium text-gray-900">{{ $tanya->title }}. Berapa Nilai Yang Anda Berikan?</h4>
                            <input type="hidden" name="pertanyaan_id[]" value="{{ $tanya->id }}" />
                            <div class="grid gap-8 gap-y-2 text-sm grid-cols-2 mt-8 px-4">
                                <div>
                                    <h3 class="mb-4 font-semibold text-gray-900">Nilai Persepsi</h3>
                                    <ul class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg">
                                        <li class="w-full border-b border-gray-200 rounded-t-lg">
                                        <div class="flex items-center pl-3">
                                            <input
                                            id="list-radio-license"
                                            required
                                            type="radio"
                                            value="1"
                                            name="bobot_harapan[{{ $index }}]"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                            />
                                            <label for="list-radio-license" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Sangat Tidak Penting </label>
                                        </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg">
                                        <div class="flex items-center pl-3">
                                            <input
                                            id="list-radio-id"
                                            required
                                            type="radio"
                                            value="2"
                                            name="bobot_harapan[{{ $index }}]"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                            />
                                            <label for="list-radio-id" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Tidak Penting</label>
                                        </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg">
                                        <div class="flex items-center pl-3">
                                            <input
                                            id="list-radio-millitary"
                                            required
                                            type="radio"
                                            value="3"
                                            name="bobot_harapan[{{ $index }}]"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                            />
                                            <label for="list-radio-millitary" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Cukup Penting</label>
                                        </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg">
                                        <div class="flex items-center pl-3">
                                            <input
                                            id="list-radio-passport"
                                            required
                                            type="radio"
                                            value="4"
                                            name="bobot_harapan[{{ $index }}]"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                            />
                                            <label for="list-radio-passport" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Penting</label>
                                        </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg">
                                        <div class="flex items-center pl-3">
                                            <input
                                            id="list-radio-passport"
                                            required
                                            type="radio"
                                            value="5"
                                            name="bobot_harapan[{{ $index }}]"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                            />
                                            <label for="list-radio-passport" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Sangat Penting</label>
                                        </div>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <h3 class="mb-4 font-semibold text-gray-900">Nilai Harapan</h3>
                                    <ul class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg">
                                        <li class="w-full border-b border-gray-200 rounded-t-lg">
                                        <div class="flex items-center pl-3">
                                            <input
                                            id="list-radio-license"
                                            required
                                            type="radio"
                                            value="1"
                                            name="bobot_persepsi[{{ $index }}]"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                            />
                                            <label for="list-radio-license" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Sangat Tidak Puas </label>
                                        </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg">
                                        <div class="flex items-center pl-3">
                                            <input
                                            id="list-radio-id"
                                            required
                                            type="radio"
                                            value="2"
                                            name="bobot_persepsi[{{ $index }}]"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-50 focus:ring-2"
                                            />
                                            <label for="list-radio-id" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Tidak Puas</label>
                                        </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg">
                                        <div class="flex items-center pl-3">
                                            <input
                                            id="list-radio-millitary"
                                            required
                                            type="radio"
                                            value="3"
                                            name="bobot_persepsi[{{ $index }}]"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                            />
                                            <label for="list-radio-millitary" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Cukup Puas</label>
                                        </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg">
                                        <div class="flex items-center pl-3">
                                            <input
                                            id="list-radio-passport"
                                            required
                                            type="radio"
                                            value="4"
                                            name="bobot_persepsi[{{ $index }}]"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                            />
                                            <label for="list-radio-passport" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Puas</label>
                                        </div>
                                        </li>
                                        <li class="w-full border-b border-gray-200 rounded-t-lg">
                                        <div class="flex items-center pl-3">
                                            <input
                                            id="list-radio-passport"
                                            required
                                            type="radio"
                                            value="5"
                                            name="bobot_persepsi[{{ $index }}]"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                            />
                                            <label for="list-radio-passport" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Sangat Puas</label>
                                        </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="md:col-span-1 text-right">
                        <div class="inline-flex items-end">
                          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                        </div>
                      </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
    </div>
    @include('sweetalert::alert')
  </body>
</html>