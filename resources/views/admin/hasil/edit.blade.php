<!-- Create modal -->
<div id="editmodal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Data
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editmodal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form action="{{ route('update.hasil' ) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="idhasil" id="idhasil" >
                    <div class="w-full">
                        <label for="responden_id" class="block mb-2 text-sm font-medium text-gray-900">Pilih Responden</label>
                        <select id="responden_id" name="responden_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option>-- Pilih Responden --</option>
                            @foreach ($responden as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full mt-3">
                        <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="w-full mt-3">
                        <label for="pertanyaan_id" class="block mb-2 text-sm font-medium text-gray-900">Pilih Pertanyaan</label>
                        <select id="pertanyaan_id" name="pertanyaan_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option>-- Pilih Pertanyaan --</option>
                            @foreach ($pertanyaan as $kat)
                            <option value="{{ $kat->id }}">{{ $kat->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full mt-3">
                        <label for="bobot_persepsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Bobot Persepsi</label>
                        <select id="bobot_persepsi" name="bobot_persepsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option>-- Pilih Bobot Persepsi --</option>
                            <option value="5">Sangat Penting</option>
                            <option value="4">Penting</option>
                            <option value="3">Cukup Penting</option>
                            <option value="2">Tidak Penting</option>
                            <option value="1">Sangat Tidak Penting</option>
                        </select>
                    </div>
                    <div class="w-full mt-3">
                        <label for="bobot_harapan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Bobot Harapan</label>
                        <select id="bobot_harapan" name="bobot_harapan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option>-- Pilih Bobot Harapan --</option>
                            <option value="5">Sangat Puas</option>
                            <option value="4">Puas</option>
                            <option value="3">Cukup Puas</option>
                            <option value="2">Tidak Puas</option>
                            <option value="1">Sangat Tidak Puas</option>
                        </select>
                    </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        <button data-modal-hide="createmodal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                    </div>
                </form>
        </div>
    </div>
</div>