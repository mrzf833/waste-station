    <!-- navbar -->
    <div class="flex justify-between px-8 py-4 shadow-gray-200 shadow absolute z-20 w-full bg-white">
        <div class="flex items-center">
            <img src="{{ asset('assets-user/logo.png') }}" alt="" class="w-[130px] mx-4">
        </div>
        <div class="flex">
            <div class="flex items-center">
                <img src="{{ asset('assets-user/profile.png') }}" class="w-[40px] rounded-full" alt="">
                <button type="button" id="dropdownDefaultButton" data-dropdown-toggle="dropdown"  class="flex items-center">
                    <span class="text-base mx-4">{{ Auth::user()->name }}</span>
                    <img src="{{ asset('assets-user/bawah-icon.png') }}" alt="">
                </button>
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <form action="{{ route('landing.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>