<div>
    <div class="bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-blue-800 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2">Permissions</h3>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="bg-blue-600 border-t-4 border-teal-500 rounded-b text-white px-4 py-3 shadow-md my-3 m-2"
            role="alert">
            <div class="flex">
                <div class="alert alert-success">
                    <p class="ext-5xl">{{ session('message') }}</p>
                </div>
            </div>
        </div>
    @endif
    <div class="py-10 m-2">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <div class="w-full mt-4 flex justify-start items-center">
                    <button wire:click="create()" data-modal-toggle="example" data-modal-action="open"
                        class="bg-blue-800 font-semibold text-white p-2 w-62 rounded-full hover:bg-blue-600 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2">
                        Add New Permission
                    </button>
                </div>
                <div class="flex flex-1 md:w-1/3 justify-center md:justify-end text-gray-800 px-2">
                    <span class="relative w-full">
                        <input type="search" placeholder="Search" wire:model="searchTerm"
                            class="w-full bg-white text-gray-800 transition border border-blue-600 focus:outline-none focus:border-gray-400 rounded py-3 px-2 pl-10 appearance-none leading-normal">
                        <div class="absolute search-icon" style="top: 1rem; left: .8rem;">
                            <svg class="fill-current pointer-events-none text-gray-800 w-4 h-4"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z">
                                </path>
                            </svg>
                        </div>
                    </span>
                </div>

                @if ($isOpen)
                    @include('livewire.eng.settings.create-permission')
                @endif
           
                <div class="mt-2 py-3 m-2  rounded-lg shadow-xl p-5">
                    <!-- component -->
                    <table class="min-w-full max-w-5xl mx-auto table-auto border-collapse block md:table">
                        <thead class="block md:table-header-group">
                            <tr
                                class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative rounded-lg">
                                <th
                                    class="bg-blue-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    id
                                </th>
                                <th
                                    class="bg-blue-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    Name
                                </th>
                                <th
                                    class="bg-blue-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    Guard Name
                                </th>
                                <th
                                    class="bg-blue-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    Created At
                                </th>
                                <th
                                    class="bg-blue-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="block md:table-row-group">
                            @foreach ($permissions as $permission)
                                <tr class="bg-gray-200 border mb-2 border-grey-500 rounded md:border-none block md:table-row">

                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                            class="inline-block w-1/3 md:hidden font-bold">ID</span>{{ $permission->id }}
                                    </td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                            class="inline-block w-1/3 md:hidden font-bold">Name</span>{{ $permission->name }}
                                    </td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                        class="inline-block w-1/3 md:hidden font-bold">Name</span>{{ $permission->guard_name }}
                                </td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                            class="inline-block w-1/3 md:hidden font-bold">Created
                                            At</span>{{ $permission->created_at }}
                                    </td>

                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        <span class="inline-block w-1/3 md:hidden font-bold">Actions</span>
                                        <button wire:click.prevent="editModel({{ $permission->id }})"
                                            class="text-white font-bold py-1 px-3 rounded text-xs bg-blue-600 hover:bg-blue-900">Edit</button>
                                        <button wire:click.prevent="confirmPermissionRemoval({{ $permission->id }})"
                                            class="text-white font-bold py-1 px-3 rounded text-xs bg-red-600 hover:bg-red-900">Delete</button>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($isOpenEdit)
                    @include('livewire.eng.settings.edit-permission')
                @endif
                    <div class="mt-2">
                        {{ $permissions->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
