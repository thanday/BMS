<div class="fixed mt-6 z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline" wire:ignore.self>

            <!-- component -->
            <div class="flex bg-gray-200 items-center justify-center  mt-6 mb-6">
                <div class="grid bg-white rounded-lg shadow-xl w-full">
                    <div class="flex justify-center">
                        <div class="flex">
                            <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Assign Technician to Live</h1>
                        </div>
                    </div>

                    <div wire:ignore class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Select
                            Technican</label>
                        <select wire:model="techl_id" autocomplete="off" name="techl_id"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                            id="select2-dropdown">
                            <option value="">Select Technician</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    @error('techl_id')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    {{-- @push('scripts')
                    <script>
                        $(document).ready(function() {
                            $('#select2-dropdown').select2();
                            $('#select2-dropdown').on('change', function(e) {
                                var data = $('#select2-dropdown').select2("val");
                                @this.set('techName', data);
                            });
                        });
                    </script>
                @endpush
                <script>
                    new TomSelect('#select2-dropdown', {
                      maxItems: 2,
                    });
                  </script> --}}

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Attending
                            Date (For LIVE)</label>
                        <input
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                            type="date" placeholder="" wire:model="live_attend_date" name="live_attend_date" />
                        @error('live_attend_date')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Attending
                            Time (For LIVE)</label>
                        <input
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                            type="time" placeholder="" wire:model="live_attend_time" name="live_attend_time" />
                        @error('live_attend_time')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                        <button wire:click="closeModal()"
                            class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button>
                        <button wire:click.prevent="LiveTechStore()"
                            class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Submit</button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
</div>
