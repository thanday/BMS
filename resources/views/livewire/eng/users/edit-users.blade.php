<div class="fixed mt-6 z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline" wire:ignore.self>
            <form>
                <!-- component -->
                <div class="flex bg-gray-200 items-center justify-center  mt-6 mb-6">
                    <div class="grid bg-white rounded-lg shadow-xl w-full">
                        <div class="flex justify-center">
                            <div class="flex">
                                <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Update User</h1>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Name</label>
                            <input
                                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                type="text" placeholder="Full Name" wire:model="state.name" />
                                @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Email</label>
                                <input
                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    type="text" placeholder="Email" wire:model="state.email" />
                                    @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Password</label>
                                <input
                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    type="password" placeholder="Password" wire:model="state.password" />
                                    @error('password') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Role</label>
                            <select wire:model.defer="state.role"
                                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                                <option selected>Choose...</option>
                                @foreach ($roles as $role)
                                <option>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

   

                        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                            <button wire:click="closeEditModal()"
                                class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button>
                            <button wire:click.prevent="edit()"
                                class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Update</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
