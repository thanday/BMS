<div>

    <div class="bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-blue-800 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2"><span class="text-gray-300 hover:text-gray-50"><a
                        href="{{ route('eng.events') }}">Events</a> </span> | Create New Event</h3>
        </div>
    </div>

    <!-- component -->
    <form method="POST" enctype="multipart/form-data">
        <div class="flex items-center justify-center mt-6">
            <div class="grid w-11/12">


                <div class=" py-1 bg-blueGray-50">

                    <div class="relative flex flex-col px-4 min-w-0 break-words w-full mb-6">
                        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Event Information
                        </h2>


                        <div class="grid grid-cols-2 gap-6 mt-4 mb-4 sm:grid-cols-3">
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="event_name">Event Name</label>
                                <input id="event_name" type="text" wire:model="event_name"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                @error('event_name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="location">Ref #</label>
                                <input id="refnum" type="text" wire:model="refnum"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                @error('refnum')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="location">Venue</label>
                                <input id="venue" type="text" wire:model="venue"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                @error('venue')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="type">Event Type</label>
                                <select id="type" wire:model="type" name="type"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring appearance-none">
                                    <option>Choose option...</option>
                                    <option>Live</option>
                                    <option>Recording</option>
                                    <option>Live Link only</option>
                                </select>
                                @error('type')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="type">Service Qouted
                                    Under</label>
                                <select id="qouted_type" wire:model="qouted_type" name="type"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring appearance-none">
                                    <option>Choose option...</option>
                                    <option>Free Of Charge (FOC)</option>
                                    <option>Commercial</option>

                                </select>
                                @error('qouted_type')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="client">Client</label>
                                <input id="client" type="text" wire:model="client" name="client"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                @error('client')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="focalname">Focal Point Name</label>
                                <input id="focalname" type="text" wire:model="focalname" name="focalname"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                @error('client')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="focalnum">Focal Point
                                    Contact</label>
                                <input id="focalnum" type="num" wire:model="focalnum" name="focalnum"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                @error('focalnum')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="requestdate">Requested Date</label>
                                <input id="requestdate" type="date" wire:model="requestdate" name="requestdate"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                @error('requestdate')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>


                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="event_date">Live Schedule
                                    Date</label>
                                <input id="event_date" type="date" wire:model="event_date" name="event_date"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                @error('event_date')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="event_stime">Live Start Time
                                </label>
                                <input id="event_stime" type="time" wire:model="event_stime" name="event_stime"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                @error('event_stime')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="event_etime">Live End Time</label>
                                <input id="event_etime" type="time" wire:model="event_etime" name="event_etime"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                @error('event_etime')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <h2 class="text-lg font-semibold mt-4 text-gray-700 capitalize dark:text-white">Channels
                            Information
                        </h2>
                        <hr>
                        <div class="grid grid-cols-2 gap-6 mt-4 sm:grid-cols-2">
                            <div>
                                <label class="text-gray-700 dark:text-gray-200">PSM Channels</label>
                                <select wire:model.defer="channels_id" name="channels_id[]"
                                    class="form-multiselect block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                                    multiple>
                                    @foreach ($channelspsm as $psm)
                                        <option value="{{ $psm->id }}">{{ $psm->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="localchannel">Local
                                    Channels</label>
                                <select wire:model="localchannel_id" name="localchannel_id[]"
                                    class=" block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                                    multiple>
                                    @foreach ($channelslocal as $local)
                                        <option value="{{ $local->id }}">{{ $local->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="type">Local Channels Feed
                                    Qouted Under</label>
                                <select wire:model="local_qtype" name="local_qtype"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring appearance-none">
                                    <option>Choose an option...</option>
                                    <option>Commercial (Clean Feed)</option>
                                    <option>FOC with WaterMarks</option>
                                    <option>FOC (Clean Feed)</option>
                                    <option>Feed not given</option>

                                </select>
                            </div>
                        </div>

                        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                            <button
                                class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'><a
                                    href="{{ route('eng.events') }}">Cancel</a></button>
                            <button wire:click.prevent="EventStore()"
                                class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Submit</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </form>

</div>
