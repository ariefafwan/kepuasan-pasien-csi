@extends('admin.layouts.app')

@section('body')

    <div class="p-4 bg-white rounded-lg">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h2 class="text-2xl font-bold mb-4">Hasil Perhitungan CSI</h2>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Kode Pertanyaan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                MSI
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
                    <tbody>
                        @foreach ($pertanyaan as $value)
                        @foreach ($hasil as $data)
                            @if ($data['pertanyaan_id'] == $value->id)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $value->kode_pertanyaan }}
                                </th>
                                <td class="px-6 py-4">{{ $data['msi'] }}</td>
                                <td class="px-6 py-4">{{ $data['mss'] }}</td>
                                <td class="px-6 py-4">{{ $data['wf'] }}</td>
                                <td class="px-6 py-4">{{ $data['ws'] }}</td>
                            </tr>
                            @endif
                        @endforeach
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="font-semibold text-gray-900 dark:text-white">
                            <th scope="row" class="px-6 py-3 text-base">Total</th>
                            <td class="px-6 py-3">{{ $meanmis }}</td>
                            <td class="px-6 py-3">{{ $meanmss }}</td>
                            <td align="center" colspan="2" class="px-6 py-3">WT = {{ $wt }}</td>
                        </tr>
                        <tr class="bg-yellow-300 font-semibold text-white">
                            <th scope="row" colspan="3" class="px-6 py-3 text-base">CSI</th>
                            <td align="center" colspan="2" class="px-6 py-3">{{ $wt / 5 }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
  
@endsection

{{-- @push('js')
  <script>
    $(document).ready(function() {
        $('#example').DataTable({
            // Add any customization options here
        });
    });
    $('.edit').on("click",function() {
            let editid = $(this).attr('data-id');
            $.ajax({
                url: '/hasil/'+editid+'/edit',
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('#idindikator').val(data.id);
                    $('#edittitle').val(data.title);
                }
            });
    });
  </script>
@endpush --}}