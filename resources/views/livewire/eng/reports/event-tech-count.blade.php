<div>
    <div class="bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-blue-800 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2"><span class="text-gray-300 hover:text-gray-50"><a
                        href="{{ route('eng.show') }}">Reports</a></span> | Total EVENT by Technician</h3>
        </div>
    </div>
    <div class="py-2 m-4">
           <!-- SEARCH -->
        <div class="my-2 flex sm:flex-row flex-col">
            <div class="block relative">
                <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                    <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                        <path
                            d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                        </path>
                    </svg>
                </span>
                <input placeholder="Search" wire:model="searchTerm"
                    class="form-control appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
            </div>

            <div class="block relative ml-2">
                <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                    <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                        <path
                            d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                        </path>
                    </svg>
                </span>
                <input type="date" placeholder="Search" wire:model="searchTerm"
                    class="form-control appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
            </div>

        </div>

           <!-- SEARCH END  -->

        <div class="flex justify-end space-x-8">
          
            <span
                class=" rounded-2xl border bg-neutral-100 px-3 py-1 text-base font-semibold transform shadow-sm hover:border-2 hover:text-blue-500 hover:scale-110">
                <a href="{{ 'download-pdf' }}">Export to PDF</a>
            </span>
          
        </div>

        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-blue-200 bg-blue-300 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider">
                                Technician Name
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-blue-200 bg-blue-300 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider">
                                Total Event
                            </th>
               
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tech_lives as $user)
                            <tr>

                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">

                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $user->name }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                               
                                    
                        
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $user->events_live_tech_count }}</p>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                 <div class="mt-2 item">
                    {{ $tech_lives->links() }}
                </div> 
            </div>
        </div>
    </div>
</div>
