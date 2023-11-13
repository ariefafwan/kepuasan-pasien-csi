@extends('admin.layouts.app')

@section('body')
    
    <div class="p-4 bg-gray-900 rounded-lg dark:border-gray-900">
      <div class="flex justify-end w-full gap-4 mb-4">
        <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row w-full hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">Total Responden</h5>
                <p class="mb-3 text-2xl font-normal text-gray-700 dark:text-gray-400">{{ $responden }}</p>
            </div>
        </div>
      </div>
      <div class="grid w-full gap-4 mb-4">
        <div class="max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
              {!! $chart->container() !!}
        </div>
      </div>
    </div>
  
@endsection

@push('js')
  <script src="{{ $chart->cdn() }}"></script>
  {{ $chart->script() }}
@endpush