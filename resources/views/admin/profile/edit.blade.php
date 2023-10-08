@extends('admin.layouts.app')

@section('body')
    
    <div class="p-4 bg-gray-900 rounded-lg dark:border-gray-900">
        <div class="p-4 sm:p-8 mb-3">
            <div class="max-w-xl">
                @include('admin.profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 mb-3">
            <div class="max-w-xl">
                @include('admin.profile.partials.update-password-form')
            </div>
        </div>
  </div>
  
@endsection