<div>
    <div class="bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-blue-800 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2"><span class="text-gray-300 hover:text-gray-50"><a
                        href="{{ route('eng.show') }}">Reports</a></h3>
        </div>
    </div>
    <!-- component -->
    <div class="m-4 py-2 rounded-tl">
        <table class="border-collapse w-full">
            <thead class="">
                <tr>
                    <th
                        class="p-3 font-bold uppercase bg-blue-600 text-white border border-gray-300 hidden lg:table-cell">
                        Report Name</th>
                    
                    <th
                        class="p-3 font-bold uppercase bg-blue-600 text-white border border-gray-300 hidden lg:table-cell">
                        Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span
                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Name</span>
                        All Events
                    </td>
              
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span
                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                        <button wire:click="" data-modal-toggle="example"
                            class="rounded-md bg-blue-500 py-2 px-2 text-white transition-all duration-150 ease-in-out hover:bg-blue-600">
                            <a href="{{ route('eng.allevents') }}">View</a>
                        </button>

                    </td>
                </tr>
                <tr
                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span
                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Name</span>
                        All Events by PSM Channel
                    </td>
                    
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span
                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                            <button wire:click="" data-modal-toggle="example"
                            class="rounded-md bg-blue-500 py-2 px-2 text-white transition-all duration-150 ease-in-out hover:bg-blue-600">
                            View
                        </button>
                    </td>
                </tr>
                <tr
                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span
                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Name</span>
                        All Events by Local Channel
                    </td>
                    
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span
                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                            <button wire:click="" data-modal-toggle="example"
                            class="rounded-md bg-blue-500 py-2 px-2 text-white transition-all duration-150 ease-in-out hover:bg-blue-600">
                            View
                        </button>
                    </td>
                </tr>
                <tr
                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span
                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Name</span>
                        Total Event by Technician
                    </td>
                    
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span
                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                            <button wire:click="" data-modal-toggle="example"
                            class="rounded-md bg-blue-500 py-2 px-2 text-white transition-all duration-150 ease-in-out hover:bg-blue-600">
                            <a href="{{ route('eng.eventtechcount') }}">View</a>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>



</div>
