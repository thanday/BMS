 <!--Nav-->
 <nav class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">

     <div class="flex flex-wrap items-center">
         <div class="ml-6 mt-2 flex flex-shrink md:w-1/3 justify-center md:justify-start">
             <a href="/">
                 <img src="{{ asset('images/logo.png') }}" alt="" style="width: 85px;" />
             </a>
            
         </div>
         
         {{-- Search --}}
         <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2">
             <div class="flex relative w-full justify-center">
                <a class="text-2xl font-bold text-blue-500 dark:text-white lg:text-2xl hover:text-blue-700 dark:hover:text-gray-300" href="/">Broadcast Management System</a>
            </div> 
             
         </div>
         {{-- drop down --}}
         <div class="flex w-full ml-2 pt-2 content-center justify-end md:w-1/3 md:justify-end">
             <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">

                 <li class="flex-1 md:flex-none md:mr-3">
                     <div class="relative inline-block">
                         <button onclick="toggleDD('myDropdown')" class="drop-button text-white focus:outline-none">
                             <span class="pr-2"><i class="em em-robot_face"></i></span>
                             Hi,
                             <?php
                             date_default_timezone_set('Asia/Calcutta');
                             $Hour = date('G');
                             if ($Hour >= 5 && $Hour <= 11) {
                                 echo 'Good Morning';
                             } elseif ($Hour >= 12 && $Hour <= 17) {
                                 echo 'Good Afternoon';
                             } elseif ($Hour >= 18 || $Hour <= 4) {
                                 echo 'Good Evening';
                             }
                             ?> , {{ auth()->user()->name }}

                             <svg class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20">
                                 <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                             </svg>
                         </button>
                         <div id="myDropdown"
                             class="dropdownlist mr-4 absolute bg-gray-800 text-white right-0 mt-3 p-3 overflow-auto z-30 invisible">
                            
                             <a href="{{ route('profile.show') }}"
                                 class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i
                                     class="fa fa-user fa-fw"></i> Profile</a>
                           

                             <div class="border border-gray-800"></div>
                             <form method="POST" action="{{ route('logout') }}">
                                 @csrf
                                 <a href="{{ route('logout') }}"
                                     onclick="event.preventDefault(); this.closest('form').submit();"
                                     class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block">
                                     <i class="fas fa-sign-out-alt fa-fw"></i>
                                     Logout
                                 </a>
                             </form>
                         </div>
                     </div>
                 </li>
             </ul>
         </div>
         
     </div>

 </nav>
