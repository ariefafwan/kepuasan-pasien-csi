@extends('admin.layouts.app')

@section('body')

    <div class="p-4 bg-white rounded-lg">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h2 class="text-2xl font-bold mb-4">Hasil Perhitungan CSI</h2>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <form class="max-w-sm mt-3">
                    <label for="tahun" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Tahun</label>
                    <select id="tahun" name="tahun" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>-- Pilih Tahun --</option>
                        @foreach ($dtahun as $tahun)
                            <option value="{{ $tahun->tahun }}">{{ $tahun->tahun }}</option>
                        @endforeach
                    </select>
                </form>
                <table class="w-full mt-3 text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Kode Pertanyaan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                MIS
                            </th>
                            <th scope="col" class="px-6 py-3">
                                MSS
                            </th>
                            <th scope="col" class="px-6 py-3">
                                WF
                            </th>
                            <th scope="col" class="px-6 py-3">
                                WS
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        {{-- @foreach ($pertanyaan as $value)
                            @foreach ($hasil as $data)
                                @if ($data['pertanyaan_id'] == $value->id)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $value->kode_pertanyaan }}
                                    </th>
                                    <td class="px-6 py-4">{{ $data['mis'] }}</td>
                                    <td class="px-6 py-4">{{ $data['mss'] }}</td>
                                    <td class="px-6 py-4">{{ $data['wf'] }}</td>
                                    <td class="px-6 py-4">{{ $data['ws'] }}</td>
                                </tr>
                                @endif
                            @endforeach
                        @endforeach --}}
                    </tbody>
                    <tfoot>
                        <tr class="font-semibold text-gray-900 dark:text-white">
                            <th scope="row" class="px-6 py-3 text-base">Total</th>
                            <td class="px-6 py-3" id="summis"></td>
                            <td class="px-6 py-3" id="summss"></td>
                            <td align="center" colspan="2" class="px-6 py-3" id="wt">WT =</td>
                        </tr>
                        <tr class="bg-yellow-300 font-semibold text-white">
                            <th scope="row" colspan="3" class="px-6 py-3 text-base">CSI</th>
                            <td align="center" colspan="2" class="px-6 py-3" id="csi"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
  
@endsection

@push('js')
<script>
    $('#tahun').on("change",function() {
        let tahun = $('#tahun').val();
        $('#tbody').empty();
        $('#summis').empty();
        $('#summss').empty();
        $('#wt').empty();
        $('#csi').empty();
        // console.log(uuid_matapelajaran);
        $.ajax({
            url: `/csi/${tahun}`,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                let tab = data.hasil.map((el) => {
                            return `<tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                ${el.kode_pertanyaan}
                                            </th>
                                            <td class="px-6 py-4">${el.mis}</td>
                                            <td class="px-6 py-4">${el.mss}</td>
                                            <td class="px-6 py-4">${el.wf}</td>
                                            <td class="px-6 py-4">${el.ws}</td>
                                        </tr>`
                        })
                $('#tbody').append(tab)
                $('#summis').append(data.summis)
                $('#summss').append(data.summss)
                $('#wt').append(`WT = ${data.wt}`)
                $('#csi').append(data.wt / 5)
            }
        });
    });
</script>
@endpush