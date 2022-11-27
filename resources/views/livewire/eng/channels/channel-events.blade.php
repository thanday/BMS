<div>
    <div class="bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-blue-800 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2"><span class="text-gray-300 hover:text-gray-50"><a
                        href="{{ route('eng.channels') }}">Channels</a> </span> | {{ $channels->name }}  </h3>
        </div>
    </div>
    <!-- component -->
    <div class="flex items-center justify-center bg-gradient-to-bl from-violet-900 to-teal-400 mt-12 mb-4">
        <div
            class="p-2 w-96 cursor-pointer rounded-3xl bg-gray-100 transition duration-300 ease-in-out hover:scale-105 hover:drop-shadow-2xl">
            <div class="-mb-20 -translate-y-1/2 transform">
                <img src="{{ asset('storage/') }}/{{ $channels->image }}" alt="{{ $channels->name }}"
                    title="{{ $channels->name }}" class="mx-auto h-36" />
            </div>
            <div class="text-center mt-2">
                <h3 class="text-center text-4xl font-bold">{{ $channels->name }}</h3>
                <span class="text-sm">{{ $channels->title }}</span>
            </div>
            <div class="text-center mt-2">
                <h3 class="text-center text-lg font-bold">Total: {{ $channels->event->count() }} Events</h3>
            </div>

        </div>
    </div>
    <!-- component -->
    <div class='flex items-start justify-center min-h-screen'>
        <div class="mt-1 w-9/12">
            <!-- This is an example component -->
            @foreach ($channels->event as $event)
                <a href="{{ route('eng.detailevents', [$event->id]) }}">
                    <div
                        class="rounded-xl border p-5 shadow-md cursor-pointer bg-white mb-2 transition duration-300 ease-in-out hover:scale-105 hover:drop-shadow-2xl">
                        <div class="flex w-full items-center justify-between border-b pb-3">
                            <div class="flex items-center space-x-3">
                                <div class="text-lg font-bold text-slate-700">{{ $event->refnum }}</div>
                            </div>
                            <div class="flex items-center space-x-8">
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
                                            class="absolute inset-0 text-xs bg-red-600 opacity-80 rounded-full"></span>
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
                                <span
                                    class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">{{ $event->qouted_type }}
                                </span>
                                <div class="text-xs text-neutral-500">
                                    Duration:
                                    {{ intval(strtotime(date($event->live_end_time)) - strtotime($event->live_start_time)) / 60 }}
                                    Minutes

                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-6">
                            <div class="mb-3 text-xl font-bold">{{ $event->event_name }}</div>
                            <div>
                                <h3 class="mb-3 font-bold">Technician (LIVE):
                                    @if (is_null($event->techl_id))
                                        <span class="text-xl font-light">No Technician Assign</span>
                                    @elseif($event->users_live->name)
                                        <span class="text-xl font-light">{{ $event->users_live->name }}</span>
                                    @endif
                                </h3>
                                <div class="flex items-center space-x-8">
                                    <h2 class="font-bold">Schedule Time: <span
                                            class="text-sm font-semibold">{{ $event->event_stime }} -
                                            {{ $event->event_etime }}</span></h2>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center justify-between text-slate-500">
                                <div class="flex space-x-4 md:space-x-8">
                                    <div class="flex cursor-pointer items-center transition hover:text-slate-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="blue" width="24"
                                            height="24" viewBox="0 0 24 24">
                                            <path
                                                d="M17 1c0-.552-.447-1-1-1s-1 .448-1 1v2c0 .552.447 1 1 1s1-.448 1-1v-2zm-12 2c0 .552-.447 1-1 1s-1-.448-1-1v-2c0-.552.447-1 1-1s1 .448 1 1v2zm13 5v10h-16v-10h16zm2-6h-2v1c0 1.103-.897 2-2 2s-2-.897-2-2v-1h-8v1c0 1.103-.897 2-2 2s-2-.897-2-2v-1h-2v18h20v-18zm4 3v19h-22v-2h20v-17h2zm-17 7h-2v-2h2v2zm4 0h-2v-2h2v2zm4 0h-2v-2h2v2zm-8 4h-2v-2h2v2zm4 0h-2v-2h2v2zm4 0h-2v-2h2v2z" />
                                        </svg>
                                        <span class="ml-2">{{ $event->event_date }}</span>
                                    </div>
                                    <div class="flex cursor-pointer items-center transition hover:text-slate-600">
                                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"
                                            fill="red" fill-rule="evenodd" clip-rule="evenodd">
                                            <path
                                                d="M12 10c-1.104 0-2-.896-2-2s.896-2 2-2 2 .896 2 2-.896 2-2 2m0-5c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3m-7 2.602c0-3.517 3.271-6.602 7-6.602s7 3.085 7 6.602c0 3.455-2.563 7.543-7 14.527-4.489-7.073-7-11.072-7-14.527m7-7.602c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602" />
                                        </svg>
                                        <span class="ml-2">{{ $event->venue }}</span>
                                    </div>
                                    <div class="flex cursor-pointer items-center transition hover:text-slate-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-12.832 20c-1.197 0-2.168-.969-2.168-2.165s.971-2.165 2.168-2.165 2.167.969 2.167 2.165-.97 2.165-2.167 2.165zm5.18 0c-.041-4.029-3.314-7.298-7.348-7.339v-3.207c5.814.041 10.518 4.739 10.561 10.546h-3.213zm5.441 0c-.021-7.063-5.736-12.761-12.789-12.792v-3.208c8.83.031 15.98 7.179 16 16h-3.211z" />
                                        </svg>
                                        <span class="ml-2">{{ $event->local_qtype }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
            <!-- End Of component -->
             {{-- <div class="mt-2 item">
                {{ $event->links() }}
            </div>  --}}
        </div>

    </div>
</div>
