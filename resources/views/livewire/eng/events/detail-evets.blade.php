<div>
    <div class="bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-blue-800 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2"><span class="text-gray-300 hover:text-gray-50"><a
                        href="{{ route('eng.events') }}">Events</a> </span> | Event Detail</h3>
        </div>
    </div>

    <!-----Component----->
    <div class="bg-gray-100 pt-2">
        <section>
            <section class="text-gray-600 body-font">
                <!-- Event Detail -->
                <div class="container px-5 py-5 mx-auto">
                    <div
                        class="p-5 bg-white flex items-center mx-auto border-b  border-gray-200 rounded-lg sm:flex-row flex-col">

                        <div class="flex-grow sm:text-left text-center mt-6 sm:mt-2">
                            <div class="flex flex-wrap items-center">
                                <div class="mt-2 flex justify-start md:justify-start">
                                    <h1 class="text-black text-2xl title-font font-bold ">{{ $events->event_name }}
                                    </h1>

                                </div>

                                <!-- Event info -->
                            </div>
                            <p class="text-lg font-medium">Ref #: <span
                                    class="text-base font-light">{{ $events->refnum }}</span>
                            </p>

                            <div class=" inline-block mr-2 mt-4">
                                <div class="flex items-center flex-shrink-0">
                                    <p class="text-lg font-medium">Requested for:
                                        @if ($events->type === 'Live')
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-white leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-green-700 opacity-80 rounded-full"></span>
                                                <span class="relative">{{ $events->type }}</span>
                                            </span>
                                        @elseif($events->type === 'Recording')
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-white leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 text-xs bg-red-600 opacity-80 rounded-full"></span>
                                                <span class="relative">{{ $events->type }}</span>
                                            </span>
                                        @elseif($events->type === 'Live Link only')
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-white leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-yellow-400 opacity-80 rounded-full"></span>
                                                <span class="relative">{{ $events->type }}</span>
                                            </span>
                                        @endif
                                    </p>
                                    <p class="ml-4 text-lg font-medium">Service Quoted: <span
                                            class="text-base font-light">{{ $events->qouted_type }}</span></p>
                                </div>

                            </div>
                            <div class="py-4 mt-4 mb-4">
                                <div class=" inline-block mr-2">
                                    <div class="flex  pr-2 h-full items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="blue" width="24"
                                            height="24" viewBox="0 0 24 24">
                                            <path
                                                d="M17 1c0-.552-.447-1-1-1s-1 .448-1 1v2c0 .552.447 1 1 1s1-.448 1-1v-2zm-12 2c0 .552-.447 1-1 1s-1-.448-1-1v-2c0-.552.447-1 1-1s1 .448 1 1v2zm13 5v10h-16v-10h16zm2-6h-2v1c0 1.103-.897 2-2 2s-2-.897-2-2v-1h-8v1c0 1.103-.897 2-2 2s-2-.897-2-2v-1h-2v18h20v-18zm4 3v19h-22v-2h20v-17h2zm-17 7h-2v-2h2v2zm4 0h-2v-2h2v2zm4 0h-2v-2h2v2zm-8 4h-2v-2h2v2zm4 0h-2v-2h2v2zm4 0h-2v-2h2v2z" />
                                        </svg>
                                        <p class="title-font font-medium ml-2">{{ $events->event_date }}</p>
                                    </div>
                                </div>
                                <div class="inline-block mr-3">
                                    <div class="flex  pr-2 h-full items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="blue" width="24"
                                            height="24" viewBox="0 0 24 24">
                                            <path
                                                d="M13 12l-.688-4h-.609l-.703 4c-.596.347-1 .984-1 1.723 0 1.104.896 2 2 2s2-.896 2-2c0-.739-.404-1.376-1-1.723zm-1-8c-5.522 0-10 4.477-10 10s4.478 10 10 10 10-4.477 10-10-4.478-10-10-10zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8zm-2-19.819v-2.181h4v2.181c-1.438-.243-2.592-.238-4 0zm9.179 2.226l1.407-1.407 1.414 1.414-1.321 1.321c-.462-.484-.964-.926-1.5-1.328zm-12.679 9.593c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5zm12 0c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5zm-6 6c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5zm-4-2c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5zm8 0c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5zm-8-9c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5zm8 0c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5z" />
                                        </svg>
                                        <p class="title-font font-medium"><span
                                                class="ml-2 mr-2">{{ $events->event_stime }}</span>to<span
                                                class="ml-2">{{ $events->event_etime }}</span></p>
                                    </div>
                                </div>
                                <div class=" inline-block mr-3">
                                    <div class="flex  pr-2 h-full items-center">
                                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"
                                            fill="red" fill-rule="evenodd" clip-rule="evenodd">
                                            <path
                                                d="M12 10c-1.104 0-2-.896-2-2s.896-2 2-2 2 .896 2 2-.896 2-2 2m0-5c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3m-7 2.602c0-3.517 3.271-6.602 7-6.602s7 3.085 7 6.602c0 3.455-2.563 7.543-7 14.527-4.489-7.073-7-11.072-7-14.527m7-7.602c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602" />
                                        </svg>
                                        <p class="title-font font-medium">{{ $events->venue }}</p>
                                    </div>
                                </div>

                            </div>
                            <div class="md:flex font-bold text-gray-800">
                                <div class="w-full md:w-1/2 flex space-x-3">
                                    <div class="w-1/2">
                                        <h2 class="text-gray-500">Client</h2>
                                        <p>{{ $events->client }}</p>
                                    </div>
                                    <div class="w-1/2">
                                        <h2 class="text-gray-500">Focal Point</h2>
                                        <p>{{ $events->focalname }}</p>
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2 flex space-x-3">
                                    <div class="w-1/2">
                                        <h2 class="text-gray-500">Focal Point Number</h2>
                                        <p>{{ $events->focalnum }}</p>
                                    </div>
                                    <div class="w-1/2">
                                        <h2 class="text-gray-500">Requested Date</h2>
                                        <p>{{ $events->requestdate }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- Live Feed (PSM Channel) -->
                <div class="container px-5 mx-auto">
                    <div
                        class="p-5 bg-white flex items-center mx-auto border-b border-gray-200 rounded-lg sm:flex-row flex-col">

                        <div class="flex-grow sm:text-left text-center mt-4 sm:mt-0">
                            <h1 class="text-black text-lg title-font font-bold mb-2">Channels to Broadcast (PSM)</h1>

                            <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-2 px-4">


                                @foreach ($events->psmtvchannel as $psm)
                                    <!-- SMALL CARD ROUNDED -->
                                    <a href="{{ route('eng.channelevents', [$psm->id]) }}">
                                        <div
                                            class="bg-gray-100 border-blue-600 dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | hover:bg-blue-400 dark:hover:bg-indigo-600 hover:border-transparent | transition-colors duration-500">
                                            <img class="w-16 h-16 object-cover ml-2"
                                                src="{{ asset('storage/') }}/{{ $psm->image }}" alt="" />
                                            <div class="flex flex-col justify-center ml-3">
                                                <p class="text-gray-900 dark:text-gray-300 font-semibold">
                                                    {{ $psm->name }}</p>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- END SMALL CARD ROUNDED -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Live Feed (Local Channel) -->
                <div class="container px-5 mx-auto">
                    <div
                        class="p-5 bg-white flex items-center mx-auto border-b  mb-4 border-gray-200 rounded-lg sm:flex-row flex-col">

                        <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                            <h1 class="text-black text-lg title-font font-bold mb-2">Live Feed / Recording to (Local
                                Channels) </h1>
                            <div class=" inline-block mr-2 mt-2 mb-2">
                                <div class="flex items-center flex-shrink-0">
                                    <p class="text-lg font-medium">Feed Type: <span
                                            class="text-base font-light">{{ $events->local_qtype }}</span></p>
                                </div>
                            </div>
                            <div class="mt-2 grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-2 px-4">


                                @foreach ($events->tvchannel as $local)
                                    <!-- SMALL CARD ROUNDED -->
                                    <a href="{{ route('eng.channelevents', [$local->id]) }}">
                                        <div
                                            class="bg-gray-100 border-blue-600 dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | hover:bg-blue-400 dark:hover:bg-indigo-600 hover:border-transparent | transition-colors duration-500">
                                            <img class="w-16 h-16 object-cover ml-2"
                                                src="{{ asset('storage/') }}/{{ $local->image }}"
                                                alt="{{ $local->id }}" />
                                            <div class="flex flex-col justify-center ml-3">
                                                <p class="text-gray-900 dark:text-gray-300 font-semibold">
                                                    {{ $local->name }}</p>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- END SMALL CARD ROUNDED -->
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Live  Setting and Live -->
                @can('view_tech_info_on_channel_detailview')
                    <div class="container px-5 mx-auto">
                        <div
                            class="p-5 bg-white flex items-center mx-auto border-b  mb-10 border-gray-200 rounded-lg sm:flex-row flex-col">

                            <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                                <h1 class="text-black text-lg title-font font-bold mb-2">Technician for Live Setting & Live
                                </h1>

                                @can('assign_tech_to_event')
                                    <div class="flex mt-2 mb-2 ml-2 w-full justify-start md:justify-start">
                                        <!-- Technician Add Button -->
                                        <button wire:click="createliveset({{ $events->id }})" data-modal-toggle="example"
                                            data-modal-action="open"
                                            class="flex rounded-md bg-blue-500 py-2 px-2 text-white transition-all duration-150 ease-in-out hover:bg-blue-600">
                                            <svg class=" fill-current" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24"
                                                height="24" viewBox="0 0 24 24">
                                                <path d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
                                            </svg>
                                            Technician | LIVE SET
                                        </button>
                                        <button wire:click="create({{ $events->id }})" data-modal-toggle="example"
                                            data-modal-action="open"
                                            class="flex ml-2 rounded-md bg-blue-500 py-2 px-2 text-white transition-all duration-150 ease-in-out hover:bg-blue-600">
                                            <svg class=" fill-current" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24"
                                                height="24" viewBox="0 0 24 24">
                                                <path d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
                                            </svg>
                                            Technician | LIVE
                                        </button>
                                    </div>
                                @endcan

                                <div class=" inline-block  mr-2 mt-2 mb-2">
                                    <div class="flex items-center flex-shrink-0">

                                        <p class="text-lg font-medium">Technican for Live setting:
                                            @if (is_null($events->techs_id))
                                                <span class="text-base font-light">No Technician Assign</span>
                                            @elseif($events->users->name)
                                                <span class="text-base font-light">{{ $events->users->name }}</span>
                                            @endif
                                        </p>


                                    </div>
                                </div>

                                <div class=" inline-block ml-8 mt-2 mb-2">
                                    <div class="flex items-center flex-shrink-0">
                                        <p class="text-lg font-medium">Link Medium: <span
                                                class="text-base font-light">{{ $events->link_medium }}</span>
                                        </p>
                                    </div>

                                </div>

                                <div class=" inline-block ml-16 mt-2 mb-2">
                                    <div class="flex items-center flex-shrink-0">
                                        <p class="text-lg font-medium">Technican for Live:
                                            @if (is_null($events->techl_id))
                                                <span class="text-base font-light">No Technician Assign</span>
                                            @elseif($events->users_live->name)
                                                <span class="text-base font-light">{{ $events->users_live->name }}</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-4 md:flex font-bold text-gray-800">
                                    <div class="w-full md:w-1/2 flex space-x-3">
                                        <div class="w-1/2">
                                            <h2 class="text-gray-500">Live Setting Date</h2>
                                            <p>{{ $events->live_set_date }}</p>
                                        </div>
                                        <div class="w-1/2">
                                            <h2 class="text-gray-500">Live Setting Time</h2>
                                            <p>{{ $events->live_set_time }}</p>
                                        </div>

                                    </div>
                                    <div class="w-full md:w-1/2 flex space-x-3">
                                        <div class="w-1/2">
                                            <h2 class="text-gray-500">Attending Date (For Live)</h2>
                                            <p>{{ $events->live_attend_date }}</p>
                                        </div>
                                        <div class="w-1/2">
                                            <h2 class="text-gray-500">Attending Time (For Live)</h2>
                                            <p>{{ $events->live_attend_time }}</p>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endcan
                <!-- Link Detail -->
                @can('add_link_log')


                    <div class="container px-5 mx-auto">
                        <div
                            class="p-5 bg-white flex items-center mx-auto border-b  mb-10 border-gray-200 rounded-lg sm:flex-row flex-col">

                            <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                                <h1 class="text-black text-lg title-font font-bold mb-2">Link / Live Detail Report (After
                                    LIVE)</h1>
                                <!-- Technician Add Button -->
                                <div class="flex mt-2 mb-2 ml-2 w-full justify-start md:justify-start">
                                    <button wire:click="addlivedetail({{ $events->id }})"
                                        class="mt-3 mb-4 flex text-center rounded-md bg-blue-500 py-2 px-2 text-white transition-all duration-150 ease-in-out hover:bg-blue-600 sm:mt-0">
                                        <svg class=" fill-current" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24"
                                            height="24" viewBox="0 0 24 24">
                                            <path d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
                                        </svg>
                                        Add Live Detail
                                    </button>
                                </div>


                                <div class="mt-4 md:flex font-bold text-gray-800">
                                    <div class="w-full md:w-1/2 flex space-x-3">
                                        <div class="w-1/2">
                                            <h2 class="text-gray-500">Live Start Time</h2>
                                            <p>{{ $events->live_start_time }}</p>
                                        </div>
                                        <div class="w-1/2">
                                            <h2 class="text-gray-500">Live End Time</h2>
                                            <p>{{ $events->live_end_time }}</p>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 flex space-x-3">
                                        <div class="w-1/2">
                                            <h2 class="text-gray-500">Station Incharge</h2>
                                            @if (is_null($events->sincharge_id))
                                                <span class="text-base font-light">No Incharge</span>
                                            @elseif($events->users_incharge->name)
                                                <span>{{ $events->users_incharge->name }}</span>
                                            @endif
                                        </div>
                                        <div class="w-1/2">
                                            <h2 class="text-gray-500">Feed Tested By</h2>
                                            @if (is_null($events->sincharge_id))
                                                <span class="text-base font-light">No Technician Assign</span>
                                            @elseif($events->users_feedtest->name)
                                                <span>{{ $events->users_feedtest->name }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endcan
            </section>
        </section>
    </div>
    @if ($isOpen)
        @include('livewire.eng.events.assigntechtolive')
    @endif
    @if ($modelisOpen)
        @include('livewire.eng.events.assigntechset')
    @endif
    @if ($modelLiveisOpen)
        @include('livewire.eng.events.add-live-detail')
    @endif
</div>
