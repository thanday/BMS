<x-admin-layout>
    <div>
        <div class="bg-gray-800 pt-3">
            <div class="rounded-tl-3xl bg-gradient-to-r from-blue-700 to-gray-800 p-4 shadow text-2xl text-white">
                <h3 class="font-bold pl-2">Dashboard</h3>
            </div>
        </div>
        @if (session()->has('message'))
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mt-2" role="alert">
            <strong class="font-bold">Good Job!</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-4 w-4 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
    @endif
    <div>
        <div class="flex flex-row flex-wrap flex-grow">

            <div
                class="bg-gray-100 rounded-lg h-auto w-full py-2 flex flex-row justify-between divide-x divide-solid divide-gray-400">
                <div class="relative flex-1 flex flex-col gap-1 px-4">
                    <label class="text-gray-800 text-base font-semibold tracking-wider">Events</label>
                    <label class="text-blue-800 text-4xl font-bold">{{ $events_counts }}</label>
                </div>
                <div class="relative flex-1 flex flex-col gap-1 px-4">
                    <label class="text-gray-800 text-base font-semibold tracking-wider">Live</label>
                    <label class="text-green-600 text-4xl font-bold">{{ $events_live }}</label>
                </div>
                <div class="relative flex-1 flex flex-col gap-1 px-4">
                    <label class="text-gray-800 text-base font-semibold tracking-wider">Recording</label>
                    <label class="text-red-600 text-4xl font-bold">{{ $events_rec }}</label>
                </div>
                <div class="relative flex-1 flex flex-col gap-1 px-4">
                    <label class="text-gray-800 text-base font-semibold tracking-wider">Link Only</label>
                    <label class="text-yellow-400 text-4xl font-bold">{{ $events_link }}</label>
                </div>

            </div>
        </div>
        <div class="flex flex-row flex-wrap flex-grow">
            <div
                class="bg-gray-100 rounded-lg w-full h-auto py-4 flex flex-row justify-between divide-x divide-solid divide-gray-400">
                <div class="relative flex-1 flex flex-col gap-1 px-4">
                    <label class="text-gray-800 text-base font-semibold tracking-wider">Channels</label>
                    <label class="text-green-800 text-4xl font-bold">{{ $channels_counts }}</label>
                </div>
                <div class="relative flex-1 flex flex-col gap-1 px-4">
                    <label class="text-gray-800 text-base font-semibold tracking-wider">PSM Channels</label>
                    <label class="text-green-800 text-4xl font-bold">{{ $psm_channel }}</label>
                </div>
                <div class="relative flex-1 flex flex-col gap-1 px-4">
                    <label class="text-gray-800 text-base font-semibold tracking-wider">Local Channels</label>
                    <label class="text-green-800 text-4xl font-bold">{{ $local_channel }}</label>
                </div>
                <div class="relative flex-1 flex flex-col gap-1 px-4">
                    <label class="text-gray-800 text-base font-semibold tracking-wider">Total Technician</label>
                    <label class="text-green-800 text-4xl font-bold">{{ $users }}</label>
                </div>
            </div>
        </div>
        <!-- component -->
        @can('view upcomming event nav')
            
        
        <div class="flex flex-row flex-wrap flex-grow">
            @foreach (auth()->user()->unreadnotifications as $notification)
                <div class="bg-white/60 mb-2 backdrop-blur-xl z-20 max-w-md ml-2 rounded-lg p-6 shadow">
                    <h1 class="text-xl text-slate-700 font-medium">You have been assigned to <span
                            class="text-red-500">LIVE</span>, by {{ $notification->data['name'] }} 👋</h1>
                    <div class="flex justify-between items-center">
                        <a href="#"
                            class="text-slate-500 hover:text-slate-700 text-sm inline-flex space-x-1 items-center">
                            <span>Go to Event</span>
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                        <button type="button"
                            class="inline-block mt-4 px-6 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded-full hover:text-white hover:bg-red-700 hover:bg-opacity-70 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"><a
                                href="{{ route('markasread', $notification->id) }}">Mark as Read</a></button>
                    </div>
                </div>
            @endforeach
        </div>
        <h5 class="font-bold uppercase px-4 mt-6 text-gray-600 text-bold"> Live Events Assign to <span
                class="text-blue-700">{{ auth()->user()->name }}</span> </h5>

        {{-- Event assign to auth user --}}
        <div class="flex flex-row flex-wrap flex-grow mt-2">
            @forelse ($events_authusers as $event)
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Event Card-->
                    <a href="{{ route('eng.detailevents', [$event->id]) }}">
                        <div class="bg-white border-transparent rounded-lg shadow-xl">
                            <div
                                class="bg-gradient-to-b from-red-300 to-red-400 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                                @if ($event->type === 'Live')
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-white leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-red-800 opacity-60 rounded-full"></span>
                                        <span class="relative">{{ $event->type }}</span>
                                    </span>
                                @elseif($event->type === 'Recording')
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-white leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 text-xs bg-red-500 opacity-60 rounded-full"></span>
                                        <span class="relative">{{ $event->type }}</span>
                                    </span>
                                @elseif($event->type === 'Live Link only')
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-white leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-yellow-500 opacity-60 rounded-full"></span>
                                        <span class="relative">{{ $event->type }}</span>
                                    </span>
                                @endif
                            </div>
                            <div class="p-3">
                                <div class="mt-1">
                                    <p class="text-xl font-semibold my-2">{{ $event->event_name }} </p>
                                    <div class="flex space-x-2 text-gray-600 font-semibold text-sm">
                                        <!-- svg  -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <p>{{ $event->venue }}</p>
                                    </div>
                                    <div class="flex space-x-2 text-gray-600 font-semibold text-sm my-3">
                                        <!-- svg  -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <p>{{ $event->event_date }}</p>
                                    </div>
                                    <div class="flex space-x-2 text-gray-600 font-semibold text-sm my-3">
                                        <!-- svg  -->
                                        <i class="far fa-clock text-gray-600 h-5 w-5"></i>
                                        <p>Start: {{ $event->event_stime }}</p>
                                        <p>End: {{ $event->event_etime }}</p>
                                    </div>
                                    <div class="border-t-2"></div>

                                    <div class="flex justify-between">
                                        <div class="my-2">
                                            <p class="font-semibold text-base mb-2">Technician For Live Setting</p>
                                            <div class="flex space-x-2">
                                                <p class="text-lg font-medium">
                                                    @if (is_null($event->techs_id))
                                                        <span class="text-base font-light">No Technician Assign</span>
                                                    @elseif($event->users->name)
                                                        <span
                                                            class="text-base font-light">{{ $event->users->name }}</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="border-t-2"></div>
                                    <div class="flex justify-between">
                                        <div class="my-2">
                                            <p class="font-semibold text-base mb-2">Technician For Live</p>
                                            <div class="flex space-x-2">
                                                <p class="text-lg font-medium">
                                                    @if (is_null($event->techl_id))
                                                        <span class="text-base font-light">No Technician Assign</span>
                                                    @elseif($event->users_live->name)
                                                        <span
                                                            class="text-base font-light">{{ $event->users_live->name }}</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>

                </div>

                <!--/if for eachloop empty show below message-->
            @empty
                <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700 ml-6 mt-3" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <span class="font-medium">No LIVE Event for you, Thank you!</span>
                    </div>
                </div>
            @endforelse
        </div>
        @endcan
        <h5 class="font-bold uppercase px-4 mt-6 text-gray-600 text-bold">Upcomming Events</h5>
      
        {{-- Event Upcomming --}}
        <div class="flex flex-row flex-wrap flex-grow mt-2">
            @forelse ($events as $event)
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Event Card-->
                    <a href="{{ route('eng.detailevents', [$event->id]) }}">
                        <div class="bg-white border-transparent rounded-lg shadow-xl">
                            <div
                                class="bg-gradient-to-b from-blue-100 to-blue-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                                @if ($event->type === 'Live')
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-white leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-green-500 opacity-60 rounded-full"></span>
                                        <span class="relative">{{ $event->type }}</span>
                                    </span>
                                @elseif($event->type === 'Recording')
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-white leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 text-xs bg-red-500 opacity-60 rounded-full"></span>
                                        <span class="relative">{{ $event->type }}</span>
                                    </span>
                                @elseif($event->type === 'Live Link only')
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-white leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-yellow-500 opacity-60 rounded-full"></span>
                                        <span class="relative">{{ $event->type }}</span>
                                    </span>
                                @endif
                            </div>
                            <div class="p-3">
                                <div class="mt-1">
                                    <p class="text-xl font-semibold my-2">{{ $event->event_name }} </p>
                                    <div class="flex space-x-2 text-gray-600 font-semibold text-sm">
                                        <!-- svg  -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <p>{{ $event->venue }}</p>
                                    </div>
                                    <div class="flex space-x-2 text-gray-600 font-semibold text-sm my-3">
                                        <!-- svg  -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <p>{{ $event->event_date }}</p>
                                    </div>
                                    <div class="flex space-x-2 text-gray-600 font-semibold text-sm my-3">
                                        <!-- svg  -->
                                        <i class="far fa-clock text-gray-600 h-5 w-5"></i>
                                        <p>Start: {{ $event->event_stime }}</p>
                                        <p>End: {{ $event->event_etime }}</p>
                                    </div>
                                    <div class="border-t-2"></div>

                                    <div class="flex justify-between">
                                        <div class="my-2">
                                            <p class="font-semibold text-base mb-2">Technician For Live Setting</p>
                                            <div class="flex space-x-2">
                                                <p class="text-lg font-medium">
                                                    @if (is_null($event->techs_id))
                                                        <span class="text-base font-light">No Technician Assign</span>
                                                    @elseif($event->users->name)
                                                        <span
                                                            class="text-base font-light">{{ $event->users->name }}</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="border-t-2"></div>
                                    <div class="flex justify-between">
                                        <div class="my-2">
                                            <p class="font-semibold text-base mb-2">Technician For Live</p>
                                            <div class="flex space-x-2">
                                                <p class="text-lg font-medium">
                                                    @if (is_null($event->techl_id))
                                                        <span class="text-base font-light">No Technician Assign</span>
                                                    @elseif($event->users_live->name)
                                                        <span
                                                            class="text-base font-light">{{ $event->users_live->name }}</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>

                </div>

                <!--/if for eachloop empty show below message-->
            @empty
                <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700 ml-6 mt-3" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <span class="font-medium">No Upcomming Event!</span>
                    </div>
                </div>
            @endforelse
        </div>

    </div>
    </div>
</x-admin-layout>
