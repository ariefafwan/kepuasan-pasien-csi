<button
    data-drawer-target="logo-sidebar"
    data-drawer-toggle="logo-sidebar"
    aria-controls="logo-sidebar"
    type="button"
    class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
>
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path
        clip-rule="evenodd"
        fill-rule="evenodd"
        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
    ></path>
    </svg>
</button>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-5 py-6 overflow-y-auto bg-gray-900 dark:bg-gray-900">
    <a href="#" class="flex items-center pl-2.5 mb-5">
        <span class="text-xl font-semibold transition-all duration-200 ease-nav-brand text-blue-50">Dashboard</span>
    </a>
    <ul class="pt-4 mt-2 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
        <li>
        <a href="{{ route('dashboard') }}" class="@if (Route::is('dashboard')) flex items-center p-2 rounded-lg bg-white px-4 transition-colors text-gray-900 rounded-lg hover:bg-gray-100 hover:text-gray-900 group @else flex items-center p-2 text-blue-50 rounded-lg hover:bg-gray-100 hover:text-gray-900 group @endif">
            <span class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z" />
                </svg>                  
            </span>
            <span class="ml-3">Dashboard</span>
        </a>
        </li>
    </ul>
    <div class="w-full mt-4">
        <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase text-blue-50">Menu</h6>
    </div>
    <ul class="pt-4 mt-2 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
        <li>
        <a href="{{ route('responden.index') }}" class="@if (Route::is('responden.index')) flex items-center p-2 rounded-lg bg-white px-4 transition-colors text-gray-900 rounded-lg hover:bg-gray-100 hover:text-gray-900 group @else flex items-center p-2 text-blue-50 rounded-lg hover:bg-gray-100 hover:text-gray-900 group @endif">
            <span class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                </svg>                                  
            </span>
            <span class="ml-3">Data Responden</span>
        </a>
        </li>
        <li>
        <a href="{{ route('indikator.index') }}" class="@if (Route::is('indikator.index')) flex items-center p-2 rounded-lg bg-white px-4 transition-colors text-gray-900 rounded-lg hover:bg-gray-100 hover:text-gray-900 group @else flex items-center p-2 text-blue-50 rounded-lg hover:bg-gray-100 hover:text-gray-900 group @endif">
            <span class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                </svg>                                    
            </span>
            <span class="ml-3">Kategori Indikator</span>
        </a>
        </li>
        <li>
        <a href="{{ route('pertanyaan.index') }}" class="@if (Route::is('pertanyaan.index')) flex items-center p-2 rounded-lg bg-white px-4 transition-colors text-gray-900 rounded-lg hover:bg-gray-100 hover:text-gray-900 group @else flex items-center p-2 text-blue-50 rounded-lg hover:bg-gray-100 hover:text-gray-900 group @endif">
            <span class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                </svg>                                   
            </span>
            <span class="ml-3">List Pertanyaan</span>
        </a>
        </li>
    </ul>
    <div class="w-full mt-4">
        <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase text-blue-50">Account pages</h6>
    </div>
    <ul class="pt-4 mt-2 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
        <li>
        <a href="{{ route('hasil.index') }}" class="@if (Route::is('hasil.index')) flex items-center p-2 rounded-lg bg-white px-4 transition-colors text-gray-900 rounded-lg hover:bg-gray-100 hover:text-gray-900 group @else flex items-center p-2 text-blue-50 rounded-lg hover:bg-gray-100 hover:text-gray-900 group @endif">
            <span class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                </svg>                                   
            </span>
            <span class="ml-3">Hasil Kuisioner</span>
        </a>
        </li>
    </ul>
    <ul class="pt-4 mt-2 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
        <li>
        <a href="{{ route('csi.perhitungan') }}" class="@if (Route::is('csi.perhitungan')) flex items-center p-2 rounded-lg bg-white px-4 transition-colors text-gray-900 rounded-lg hover:bg-gray-100 hover:text-gray-900 group @else flex items-center p-2 text-blue-50 rounded-lg hover:bg-gray-100 hover:text-gray-900 group @endif">
            <span class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                </svg>                                                   
            </span>
            <span class="ml-3">Perhitungan CSI</span>
        </a>
        </li>
    </ul>
    <div class="w-full mt-4">
        <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase text-blue-50">Account pages</h6>
    </div>
    <ul class="pt-4 mt-2 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
        <li>
        <a href="{{ route('profile.edit') }}" class="@if (Route::is('profile.edit')) flex items-center p-2 rounded-lg bg-white px-4 transition-colors text-gray-900 rounded-lg hover:bg-gray-100 hover:text-gray-900 group @else flex items-center p-2 text-blue-50 rounded-lg hover:bg-gray-100 hover:text-gray-900 group @endif">
            <span class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>                  
            </span>
            <span class="ml-3">Profile</span>
        </a>
        </li>
    </ul>
    </div>
</aside>