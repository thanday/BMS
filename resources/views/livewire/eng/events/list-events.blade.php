<div>
    <div class="bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-blue-800 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2">Events</h3>
        </div>
    </div>


    <div class="py-10">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            @can('add event')
                <div class="w-full mt-4 flex justify-start items-center">
                    <button wire:click="create()"
                        class="bg-blue-800 font-semibold text-white p-2 w-32 rounded-full hover:bg-blue-600 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2">
                        <a href="{{ route('eng.createevents') }}">Add New Event</a>
                    </button>
                </div>
            @endcan
            <!-- component -->
            <div class="py-8">
                <div class="my-2 flex sm:flex-row flex-col">
                    {{-- <div class="flex flex-row mb-1 sm:mb-0">
                        <div class="relative">
                            <select
                                class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option>5</option>
                                <option>10</option>
                                <option>20</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                        <div class="relative">
                            <select
                                class="appearance-none h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                                <option>All</option>
                                <option>Live</option>
                                <option>Recording</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div> --}}
                    <div class="block relative">
                        <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                            <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                                <path
                                    d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                                </path>
                            </svg>
                        </span>
                        <input placeholder="Search" wire:model="searchTerm"
                            class="form-control appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                    </div>
                </div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    
                                    <th
                                        class="px-5 py-3 border-b-2 border-blue-200 bg-blue-300 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider">
                                        Ref #
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-blue-200 bg-blue-300 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider">
                                        Event Name
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-blue-200 bg-blue-300 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider">
                                        Requested for
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-blue-200 bg-blue-300 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider">
                                        Service Quoted
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-blue-200 bg-blue-300 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider">
                                        Location
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-blue-200 bg-blue-300 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider">
                                        Schedule Date & Time
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-blue-200 bg-blue-300 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-blue-200 bg-blue-300 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ $event->refnum }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $event->event_name }}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            @if ($event->type === 'Live')
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold text-white leading-tight">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-green-700 opacity-80 rounded-full"></span>
                                                    <span class="relative">{{ $event->type }}</span>
                                                </span>
                                            @elseif($event->type === 'Recording')
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold text-white leading-tight">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-red-600 opacity-80 rounded-full"></span>
                                                    <span class="relative">{{ $event->type }}</span>
                                                </span>
                                            @elseif($event->type === 'Live Link only')
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold text-white leading-tight">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-yellow-400 opacity-80 rounded-full"></span>
                                                    <span class="relative">{{ $event->type }}</span>
                                                </span>
                                            @endif

                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            @if ($event->qouted_type === 'Free Of Charge (FOC)')
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold text-blue-900 leading-tight">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-blue-200 opacity-50 rounded-full"></span>
                                                    <span class="relative">{{ $event->qouted_type }}</span>
                                                </span>
                                            @else
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold text-green-500 leading-tight">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                    <span class="relative">{{ $event->qouted_type }}</span>
                                                </span>
                                            @endif

                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $event->venue }}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $event->event_date }} -
                                                {{ $event->event_stime }}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            @if (is_null($event->live_end_time))
                                            <p class="text-gray-900 whitespace-no-wrap"><span class="bg-red-500 text-white py-1 px-3 rounded-full text-xs">Pending</span></p>

                                            @else
                                            <p class="text-gray-900 whitespace-no-wrap"><span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Completed</span></p>


                                            @endif
                                        </td>
                                        <td class="py-5 px-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex item-center justify-center">
                                                @can('view event')
                                                    <a href="{{ route('eng.detailevents', [$event->id]) }}">

                                                        <div
                                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                            </svg>
                                                        </div>
                                                    </a>
                                                @endcan
                                                @can('edit event')
                                                    <a href="{{ route('eng.edit', [$event->id]) }}">
                                                        <div
                                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                            </svg>
                                                        </div>
                                                    </a>
                                                @endcan
                                                @can('delete event')
                                                    <button type="button"
                                                        wire:click.prevent="confirmEventRemoval({{ $event->id }})">
                                                        <div
                                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </div>
                                                    </button>
                                                @endcan
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <div class="mt-2 item">
                            {{ $events->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
