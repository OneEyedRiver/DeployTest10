<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
              @vite('resources/css/app.css')
             @vite('resources/js/app.js')

</head>
<body class=" bg-gray-100">

<div class="w-full h-[90px] bg-white pt-4  flex justify-around">
<h1 class="font-bold text-[20px] sm:text-[30px] mt-1">RIVER STORE</h1>


 @auth
<!--Navigation -->
<div class="flex justify-around gap-x-12"> 

<a href="{{ route('show.menu') }} " class="group inline-block">
    <img src="{{ asset('images/home-icon.png') }}" alt="Clickable Image" class="group-hover:hidden w-12 h-12 transition">
    <img src="{{ asset('images/home-icon-hover.png') }}" alt="Clickable Image" class="hidden group-hover:inline w-13 h-13 transition">

</a>

<a href="{{ route('user.sellView') }} " class="group inline-block">
    <img src="{{ asset('images/add-icon.png') }}" alt="Clickable Image" class="group-hover:hidden w-12 h-12 transition">
    <img src="{{ asset('images/add-icon-hover.png') }}" alt="Clickable Image" class="hidden group-hover:inline w-13 h-13 transition">

</a>
</div>
<!--Navigation -->
  @endauth


   @guest
     
<!--Navigation -->
<div class="flex justify-around gap-x-12"> 

<a href="{{ route('show.menu') }} " class="group inline-block">
    <img src="{{ asset('images/home-icon.png') }}" alt="Clickable Image" class="group-hover:hidden w-12 h-12 transition">
    <img src="{{ asset('images/home-icon-hover.png') }}" alt="Clickable Image" class="hidden group-hover:inline w-13 h-13 transition">

</a>

</div>
<!--Navigation -->
  @endguest


<div class="  mt-2 ">


@php
    $isGuest = auth()->guest();
    $isAuth = auth()->check();
@endphp

<button id="dropdownInformationButton"
        data-dropdown-toggle="dropdownInformation"
        class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
        type="button">

    @if ($isGuest)
        Account
    @elseif ($isAuth)
        {{ Auth::user()->username }}
    @endif

    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
    </svg>
</button>


  
<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
</svg>
</button>

@guest
  <!-- Dropdown menu for guest-->
<div id="dropdownInformation" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-30 ">
 
    
  
  <form  action="{{route('show.login')}}" method="GET" class=" ">
    @csrf
        <button type="submit"  class="block px-4 py-2 hover:bg-gray-200"><p>Log-in/Register</button>
</form>


   


</div>

<script>
  document.getElementById("dropdownInformationButton").addEventListener("click", function () {
    document.getElementById("dropdownInformation").classList.toggle("hidden");
  });
</script>
@endguest


@auth
  <!-- Dropdown menu for authenticated users-->
<div id="dropdownInformation" class="absolute  z-50 mt-2 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-40">
  <div class="px-4 py-3 text-sm text-gray-900 ">
    <div>{{Auth::user()->username}}</div>
    <div class="font-medium truncate">{{Auth::user()->email}}</div>
  </div>
  <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownInformationButton">
    <li><a href="#" class="block px-4 py-2 hover:bg-gray-200 ">Dashboard</a></li>
    <li><a href="#" class="block px-4 py-2 hover:bg-gray-200 ">Settings</a></li>
    <li><a href="#" class="block px-4 py-2 hover:bg-gray-200 ">Earnings</a></li>
  </ul>
  <form action="{{route('logout')}}" method="POST" >
    @csrf
    <div  class="py-2">
    <button type="submit"  class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100  ">Sign out</button>
    </div>
  </form>
</div>

<script>
  document.getElementById("dropdownInformationButton").addEventListener("click", function () {
    document.getElementById("dropdownInformation").classList.toggle("hidden");
  });
</script>
  
@endauth
</div>



</div>



{{$slot}}
    
</body>
</html>