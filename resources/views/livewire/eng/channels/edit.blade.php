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
                            <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Edit Channel</h1>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Name</label>
                        <input
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                            type="text" placeholder="Channel Name" wire:model="state.name"
                            value="{{ $channel->name }}" />
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Channel
                            Belongs To...</label>
                        <select wire:model.defer="state.title" value="{{ $channel->title }}"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option selected>Choose...</option>
                            <option>PSM Channel</option>
                            <option>Local Channel</option>

                        </select>
                        @error('title')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload
                            Channel Logo</label>


                        <div class="flex items-center justify-cente mb-2">
                            <div wire:loading wire:target="image">Uploading...</div>
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" class="w-14 max-w-xs">
                            @else
                                <div class="ml-2"> <img src="{{ asset('storage/') }}/{{ $channel->image }}"
                                        class="w-14 max-w-xs">
                                </div>
                            @endif
                        </div>

                        <div class='flex items-center justify-center w-full'>

                            <label
                                class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-blue-300 group'>
                                <div class='flex flex-col items-center justify-center pt-7'>
                                    <svg class="w-10 h-10 text-blue-400 group-hover:text-blue-600" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <p
                                        class='lowercase text-sm text-gray-400 group-hover:text-blue-600 pt-1 tracking-wider'>
                                        Select Channel Logo
                                    </p>
                                </div>
                                <input wire:model.defer="image" id="image" type='file' class="hidden" />
                            </label>

                        </div>
                    </div>

                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                        <button wire:click="closeEditModal()"
                            class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button>
                        <button wire:click.prevent="update()"
                            class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Update</button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
</div>
