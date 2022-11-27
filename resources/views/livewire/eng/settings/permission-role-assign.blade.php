<div class="fixed mt-6 z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline" wire:ignore.self>
            <form>
                <!-- component -->
                <div class="flex bg-gray-200 items-center justify-center  mt-6">
                    <div class="grid bg-white rounded-lg shadow-xl w-full">
                        <div class="flex justify-center">
                            <div class="flex">
                                <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Role Permissions</h1>
                            </div>  
                        </div>
                        <div class="flex justify-center">
                            <div class="flex">
                                <h1 class="text-gray-600 font-bold md:text-lg text-lg">Permission for <span class="text-blue-600">{{ $role_data->name }}</span> Role </h1>
                            </div>  
                        </div>
 
    
{{-- <div class="grid w-full mt-4 mb-4  text-gray-100 bg-gray-900 place-content-center">

    <h2 class="text-white text-lg">Assigned Permission to role <span>{{ $role->name }}</span>:</h2>
        <div class="grid grid-cols-3 gap-1">
            @if ($role->permissions)
            @foreach ($role->permissions as $role_permission)
                <button 
                    class="px-4 mt-2 mb-2 py-2 text-sm text-gray-100 transition bg-blue-600 rounded-md h-14 w-44 hover:bg-blue-700">{{ $role_permission->name }}</button>
            @endforeach
            @endif
        </div>
   
    </div> --}}

                        <div wire:ignore class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Select
                                Permission</label><!-- multiple -->
                            <select wire:model="permission" autocomplete="off" name="permission"
                                class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                id="select2-dropdown">
                                <option>Select Permission</option>
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->name }}">{{ $permission->id }} {{ $permission->name }}</option>
                                @endforeach
                            </select>
    
                        </div>
                        @error('permission')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror

                        

                        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                            <button wire:click="closeProleModal()"
                                class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button>
                            <button wire:click.prevent="givePermission()"
                                class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Assign</button>
                        </div>

                    </div>
                </div>

            </form>

        </div>

    </div>
</div>
</div>
