<div class="bg-gray-800 shadow-xl h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48">

    <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
        <ul class=" mt-4 list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
            <li class="mr-3 flex-1">
                <a href="{{ route('eng.dashboard') }}"
                    class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500 {{ request()->is('eng/dashboard') ? 'border-blue-600' : '' }}">
                    <i
                        class="fas fa-tasks pr-0 md:pr-3 {{ request()->is('eng/dashboard') ? 'text-blue-600' : '' }}"></i><span
                        class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Dashboard</span>
                </a>
            </li>
            @can('view events nav')
                <li class="mr-3 flex-1">
                    <a href="{{ route('eng.events') }}"
                        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500 {{ request()->is('eng/events') ? 'border-blue-600' : '' }}">
                        <i
                            class="fas fa-calendar pr-0 md:pr-3 {{ request()->is('eng/events') ? 'text-blue-600' : '' }}"></i><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Events</span>
                    </a>
                </li>
            @endcan
            @can('view channels nav')
                <li class="mr-3 flex-1">
                    <a href="{{ route('eng.channels') }}"
                        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500 {{ request()->is('eng/channels') ? 'border-blue-600' : '' }}">
                        <i
                            class="fas fa-tv pr-0 md:pr-3 {{ request()->is('eng/channels') ? 'text-blue-600' : '' }}"></i><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Channels</span>
                    </a>
                </li>
            @endcan
            @can('view reports nav')
                <li class="mr-3 flex-1">
                    <a href="{{ route('eng.show') }}"
                        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500 {{ request()->is('eng/reports') ? 'border-blue-600' : '' }}">
                        <i class="fa fa-file pr-0 md:pr-3 {{ request()->is('eng/show') ? 'text-blue-600' : '' }}"></i><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Reports</span>
                    </a>
                </li>
            @endcan
            @can('view users nav')
                <li class="mr-3  flex-1">
                    <a href="{{ route('eng.users') }}"
                        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500 {{ request()->is('eng/users') ? 'border-blue-600' : '' }}">
                        <i
                            class="fas fa-users pr-0 md:pr-3 {{ request()->is('eng/users') ? 'text-blue-600' : '' }}"></i><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Users</span>
                    </a>
                </li>
            @endcan
            @can('view roles nav')
                <li class="mr-3  flex-1">
                    <a href="{{ route('eng.role') }}"
                        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500 {{ request()->is('eng/role') ? 'border-blue-600' : '' }}">
                        <i
                            class="fas fa-users pr-0 md:pr-3 {{ request()->is('eng/role') ? 'text-blue-600' : '' }}"></i><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Roles</span>
                    </a>
                </li>
            @endcan
            @can('view permission nav')
                <li class="mr-3  flex-1">
                    <a href="{{ route('eng.permissions') }}"
                        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500 {{ request()->is('eng/permission') ? 'border-blue-600' : '' }}">
                        <i
                            class="fas fa-users pr-0 md:pr-3 {{ request()->is('eng/permission') ? 'text-blue-600' : '' }}"></i><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Permissions</span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>

</div>
