<div>
    <div class="bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-blue-800 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2"><span class="text-gray-300 hover:text-gray-50"><a
                        href="{{ route('eng.users') }}">Users</a> </span> | View -><span
                    class="text-blue-300 italic font-bold ml-2">{{ $user->name }} </span> </h3>
        </div>
    </div>
    <!-- component -->
    <div class="flex items-center justify-center bg-gradient-to-bl from-violet-900 to-teal-400 mt-12 mb-4">
        <div
            class="p-2 w-96 cursor-pointer rounded-3xl bg-blue-800 transition duration-300 ease-in-out hover:scale-105 hover:drop-shadow-2xl">
            <div class="-mb-20 -translate-y-1/2 transform" x-show="! photoPreview">
                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" title="{{ $user->name }}"
                    class="mx-auto h-36" />
            </div>
            <div class="text-center m-2">
                <h3 class="text-center text-4xl font-bold text-white">{{ $user->name }}</h3>
            </div>
            <div class="text-center mt-2">
                <h3 class="text-center text-lg font-bold text-white">Email: {{ $user->email }}</h3>
            </div>

        </div>
    </div>
    <!-- component -->
    <div class=" bg-gray-100 min-h-screen">
        <div class="container p-10 mx-auto">
            <h1 class="text-4xl font-bold text-gray-700 mb-6">User Information</h1>
            <div>
                <h3 class="text-lg font-semibold">Assigned Roles:</h3>
                <div class="flex space-x-2 mt-4 p-2 mb-4">
                    @if ($user->roles)
                        @foreach ($user->roles as $user_role)
                            <form class="" method="POST"
                                action="{{ route('eng.user.role.delete', [$user_role->id, $user->id]) }}"
                                onsubmit="return confirm('Are you sure? You want remove current role?');">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="transition duration-200 ease-in-out bg-green-500 py-1 px-1 text-lg text-white border-green-500 rounded hover:bg-red-600"
                                    type="submit">{{ $user_role->name }}</button>
                            </form>
                        @endforeach
                    @endif
                </div>

                <h3 class="text-lg font-semibold">Directly Assigned Permissions:</h3>
                <div class="flex space-x-2 mt-4 p-2 mb-4">
                    @if ($user->permissions)
                        @foreach ($user->permissions as $user_permission)
                            <form class="" method="POST"
                                action="{{ route('eng.user.permission.revoke', [$user_permission->id, $user->id]) }}"
                                onsubmit="return confirm('Are you sure? You want remove permission?');">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="transition duration-200 ease-in-out bg-green-500 py-1 px-1 text-lg text-white border-green-500 rounded hover:bg-red-600"
                                    type="submit">{{ $user_permission->name }}</button>
                            </form>
                        @endforeach
                        
                    @endif
                </div>
                <div class="grid grid-cols-2 bg-white mb-6 border-2 p-6 rounded-md">
                    <div class="flex flex-col items-center">
                        <p class="text-lg font-semibold md:text-sm">TOTAL ATTENDED LIVE:</p>
                        <p class="text-5xl font-semibold text-green-500">{{ $user->events_live_tech->count() }} </p>
                    </div>
                    <div class="flex flex-col items-center">
                        <p class="text-lg font-semibold md:text-sm">TOTAL ATTENDED LIVE SETTING:</p>
                        <p class="text-5xl font-semibold text-red-500">{{ $user->events_set_tech->count() }}</p>
                    </div>
                </div>

                {{-- Assign  Role --}}

                @can('assign_role_to_user')
                    <div>
                        <h2 class="text-xl font-semibold text-gray-700 mb-2">Assign New Role</h2>
                        <div class="border-2 p-10 bg-white rounded-md">
                            <div class="flex justify-between w-full">
                                <select wire:model="role" autocomplete="off" name="role"
                                    class="py-2 px-3 w-full rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                    id="select2-dropdown">
                                    <option>Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-4 p-2 space-x-2">
                                <button wire:click.prevent="giveRole()"
                                    class="text-md bg-green-500 px-8 py-2 rounded-md text-white">Assign</button>
                            </div>
                        </div>
                    </div>
                @endcan

                {{-- Assign Direct Permission --}}
                @can('assign direct permision to user')
                    <div class="mt-4">
                        <h2 class="text-xl font-semibold text-gray-700 mb-2">Assign Direct Permission</h2>
                        <div class="border-2 p-10 bg-white rounded-md">
                            <div class="flex justify-between w-full">
                                <select wire:model="permission" autocomplete="off" name="permission"
                                    class="py-2 px-3 w-full rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                    id="select2-dropdown">
                                    <option>Select Permission</option>
                                    @foreach ($allpermissions as $permission)
                                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-4 p-2 space-x-2">
                                <button wire:click.prevent="giveDirectPermission()"
                                    class="text-md bg-green-500 px-8 py-2 rounded-md text-white">Assign</button>
                            </div>
                        </div>
                    </div>
                @endcan

            </div>
        </div>
