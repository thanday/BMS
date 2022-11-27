<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <!-- Scripts -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
    <!--Totally optional :) -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet" />


    <link rel="stylesheet" href="{{ mix('css/app.css') }}">


    @livewireStyles
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>


<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">

    @include('layouts.partials.navbar')

    <div class="flex flex-col md:flex-row">

        @include('layouts.partials.aside')

        <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

            {{ $slot }}

        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        /*Toggle dropdown list*/
        function toggleDD(myDropMenu) {
            document.getElementById(myDropMenu).classList.toggle("invisible");
        }
        /*Filter dropdown options*/
        function filterDD(myDropMenu, myDropMenuSearch) {
            var input, filter, ul, li, a, i;
            input = document.getElementById(myDropMenuSearch);
            filter = input.value.toUpperCase();
            div = document.getElementById(myDropMenu);
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
                var dropdowns = document.getElementsByClassName("dropdownlist");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('invisible')) {
                        openDropdown.classList.add('invisible');
                    }
                }
            }
        }
    </script>
    <script>
        // Delete Alert script
        window.addEventListener('show-delete-confirmation', event => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                width: 460,
                showCancelButton: true,
                confirmButtonColor: '#1D4ED8',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteConfirmed')
                }
            })
        })

        window.addEventListener('deleted', event => {
            Swal.fire(
                'Deleted!',
                'Data has been deleted.',
                'success'
            )
        })

        // Add Alert Script 
        window.addEventListener('added', event => {
            Swal.fire(
                'Added!',
                'Data has been Added.',
                'success'
            )
        })

        // Updated Alert Script 
        window.addEventListener('Updated', event => {
            Swal.fire(
                'Updated!',
                'Data has been Updated.',
                'success'
            )
        })

        // Permission Add Alert Script 
        window.addEventListener('PermissionAdded', event => {
            Swal.fire(
                'Great!',
                'Permission Assigned!',
                'success'
            )
        })

        // Permission Add Alert Script 
        window.addEventListener('AssignRole', event => {
            Swal.fire(
                'Great!',
                'Role has been Assigned to the User!',
                'success'
            )
        })

        // Permission Add Alert Script 
        window.addEventListener('GiveDirectPermission', event => {
            Swal.fire(
                'Great!',
                'Permission has been Assigned to the User!',
                'success'
            )
        })
  
    </script>

    

    <script>
        $(function() {
            $('.select2').select2();
        })
    </script>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</body>

</html>
