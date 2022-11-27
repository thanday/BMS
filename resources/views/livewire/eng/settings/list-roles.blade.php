<div>
    <div class="bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-blue-800 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2">Roles</h3>
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
                        class="bg-blue-800 font-semibold text-white p-2 w-32 rounded-full hover:bg-blue-600 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2">
                        Add New Role
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
                    @include('livewire.eng.settings.create-role')
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
                                    Permissions
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
                            @foreach ($allroles as $role)
                                <tr
                                    class="bg-gray-200 border border-grey-500 rounded md:border-none block md:table-row">

                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                            class="inline-block w-1/3 md:hidden font-bold">ID</span>{{ $role->id }}
                                    </td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                            class="inline-block w-1/3 md:hidden font-bold">Name</span>{{ $role->name }}
                                    </td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                            class="inline-block w-1/3 md:hidden font-bold">Permissions</span>
                                        <div
                                            class="grid lg:grid-cols-6 md:grid-cols-4 sm:grid-cols-4 grid-cols-4 gap-2 px-2">
                                            {{-- <div class="flex space-x-2 mt-4 p-2 w-auto"> --}}
                                            @if ($role->permissions)
                                                @foreach ($role->permissions as $role_permission)
                                                    <form class="" method="POST"
                                                        action="{{ route('eng.role.permission.revoke', [$role->id, $role_permission->id]) }}"
                                                        onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button 
                                                            class="transition duration-200 ease-in-out bg-green-500 py-1 px-1 text-xs text-white border-green-500 rounded hover:bg-red-600"
                                                            alt="{{ $role_permission->name }} " type="submit">
                                                            {{ $role_permission->id }}
                                                        </button>
                                                    </form>
                                                @endforeach
                                            @endif
                                            {{-- </div>  --}}
                                        </div>
                                    </td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                            class="inline-block w-1/3 md:hidden font-bold">Created
                                            At</span>{{ $role->created_at }}
                                    </td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        <span class="inline-block w-1/3 md:hidden font-bold">Actions</span>
                                        <button wire:click="assignPermission({{ $role->id }})"
                                            class="text-white font-bold py-1 px-3 rounded text-xs bg-green-600 hover:bg-green-900">Assign
                                            Permission</button>
                                        <button wire:click.prevent="editModel({{ $role->id }})"
                                            class="text-white font-bold py-1 px-3 rounded text-xs bg-blue-600 hover:bg-blue-900">Edit</button>
                                        <button wire:click.prevent="confirmRoleRemoval({{ $role->id }})"
                                            class="text-white font-bold py-1 px-3 rounded text-xs bg-red-600 hover:bg-red-900">Delete</button>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($isOpenEdit)
                        @include('livewire.eng.settings.edit-role')
                    @endif
                    @if ($isOpenPRole)
                        @include('livewire.eng.settings.permission-role-assign')
                    @endif
                    <div class="mt-2">
                        {{ $allroles->links() }}
                    </div>
                </div>
                <!-- This is a permission list component -->
                <div class="max-w-full mx-auto p-2 mt-4">
                    <details
                        class="open:bg-white dark:open:bg-slate-900 open:ring-1 open:ring-black/5 dark:open:ring-white/10 open:shadow-lg p-6 rounded-lg"
                        open>
                        <summary class="text-sm leading-6 text-slate-900 dark:text-white font-semibold select-none">
                            Show Permissions with the ID
                        </summary>
                        <div class="mt-3 text-sm leading-6 text-slate-600 dark:text-slate-400">
                            <!-- component -->
                            <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-1 px-1">

                                @foreach ($allpermissions as $permission)
                                    <div class="place-items-center bg-neutral-100">
                                        <div class="rounded-lg bg-white shadow-lg">

                                            <div
                                                class="flex w-full rounded-lg border-2 border-black bg-blue-200 shadow">
                                                <label
                                                    class="flex flex-col justify-between bg-blue-700 rounded-l p-4 text-2xl font-bold text-white">{{ $permission->id }}</label>
                                                <label
                                                    class="p-4 font-mono text-lg font-medium">{{ $permission->name }}</label>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </details>
                </div>
            </div>

        </div>
    </div>
</div>
