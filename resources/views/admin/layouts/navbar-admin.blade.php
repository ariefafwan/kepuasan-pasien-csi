<nav class="border-gray-900 bg-gray-900 dark:bg-gray-900 dark:border-gray-900 mb-5">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <nav>
    <!-- breadcrumb -->
    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
        <li class="text-sm leading-normal">
        <a class="opacity-50 text-blue-50" href="{{ route('dashboard') }}">Home</a>
        </li>
        <li class="text-sm pl-2 capitalize leading-normal text-blue-50 before:float-left before:pr-2 before:text-blue-50" aria-current="page">/&nbsp;{{ $page }}</li>
    </ol>
    <h6 class="mb-0 text-blue-50 font-bold capitalize">{{ $page }}</h6>
    </nav>
    <div class="flex items-center md:order-2">
    <button
        type="button"
        data-dropdown-toggle="language-dropdown-menu"
        class="inline-flex items-center font-medium justify-center px-4 py-2 text-sm text-blue-50 dark:text-white rounded-lg cursor-pointer hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-700 dark:hover:text-white"
    >
        &nbsp;{{ Auth::user()->name }}&nbsp;
        <i class="fa fa-arrow-down" aria-hidden="true"></i>
    </button>
    <!-- Dropdown -->
    <div class="z-50 hidden my-4 text-base list-none bg-gray-900 divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700" id="language-dropdown-menu">
        <ul class="py-2 font-medium" role="none">
        <li>
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-blue-50 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
            <div class="inline-flex items-center">
                <i class="fa fa-cog" aria-hidden="true"></i>
                &nbsp;Profile
            </div>
            </a>
        </li>
        <hr>
        <li>
            <a href="javascript:void(0)" class="block px-4 py-2 text-sm text-blue-50 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem" onclick="event.preventDefault();
            document.getElementById('logoutform').submit();">
                <div class="inline-flex items-center">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    &nbsp;Logout
                </div>
            </a>
            <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
        </ul>
    </div>
    </div>          
</nav>