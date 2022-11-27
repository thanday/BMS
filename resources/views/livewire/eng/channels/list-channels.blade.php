<div>
    <div class="bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-blue-800 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2">Channels</h3>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mt-2" role="alert">
            <strong class="font-bold">Good Job!</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-4 w-4 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
    @endif
    @can('add channel')
        <div class="w-full mt-4 flex justify-start items-center">
            <button wire:click="create()" data-modal-toggle="example" data-modal-action="open"
                class="bg-blue-800 font-semibold  text-white p-2 md:w-auto rounded-full hover:bg-blue-600 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2">
                <i class="fas fa-plus ml-2 mr-2"></i><span class="m-2">Add New Channel</span>
            </button>
        </div>
    @endcan
    @if ($isOpen)
        @include('livewire.eng.channels.create')
    @endif
    @if ($isOpenEdit)
        @include('livewire.eng.channels.edit')
    @endif
    <!-- component -->
    <div class="py-6 flex flex-col justify-center sm:py-12">
        <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4 px-4">
            @foreach ($channels as $channel)
                <!-- SMALL CARD ROUNDED -->
                <a href="{{ route('eng.channelevents', [$channel->id]) }}">
                    <div
                        class="bg-gray-100 border-blue-600 dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | hover:bg-blue-400 dark:hover:bg-indigo-600 hover:border-transparent | transition-colors duration-500">

                        <img class="w-16 h-16 object-cover ml-2" src="{{ asset('storage/') }}/{{ $channel->image }}"
                            alt="" />
                        <div class="flex flex-col justify-center ml-3">
                            <p class="text-gray-900 dark:text-gray-300 font-semibold">{{ $channel->name }}</p>
                            <p class="text-gray-600 dark:text-gray-100 text-sm text-justify font-semibold">
                                {{ $channel->title }}</p>

                        </div>
                        <div class="flex items-baseline align-text-bottom mt-8 md:justify-end">
                            @can('edit channel')
                                <button type="button" wire:click.prevent="editChannel({{ $channel->id }})"
                                    class=" text-green-500 rounded-md px-1 py-1 m-2 transition duration-500 ease select-none hover:text-white hover:bg-green-600 focus:outline-none ">
                                    <i class="far fa-edit"></i>
                                </button>
                            @endcan
                            @can('delete channel')
                                <button type="button" wire:click.prevent="confirmChannelRemoval({{ $channel->id }})"
                                    class="text-red-500 rounded-md px-1 py-1 m-2 transition duration-500 ease select-none hover:text-white hover:bg-red-600 focus:outline-none">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            @endcan
                        </div>
                    </div>
                </a>
                <!-- END SMALL CARD ROUNDED -->
            @endforeach
        </div>
        <div class="mt-2">
            {{ $channels->links() }}
        </div>
    </div>

</div>
