<x-userLayout>





<!-- outerdiv -->


<div class="max-w-md mx-auto my-2">
@if (session('success'))
    <div 
        x-data="{ show: true }" 
        x-init="setTimeout(() => show = false, 3000)" 
        x-show="show"
        x-transition
        class="p-4 mb-4 text-sm text-green-800 bg-green-100 rounded-lg"
        role="alert"
    >
        {{ session('success') }}
    </div>
@endif


@if (session('error'))
    <div 
        x-data="{ show: true }" 
        x-init="setTimeout(() => show = false, 3000)" 
        x-show="show"
        x-transition
        class="p-4 mb-4 text-sm text-red-800 bg-red-100 rounded-lg"
        role="alert"
    >
        {{ session('error') }}
    </div>
@endif

</div>

<!-- search -->
<form action="{{ route('user.sellView') }}" method="GET" class="max-w-md mx-auto my-2">   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only  ">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="text" name="search" id="search"   value="{{ request('search') }}"  class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Search Task Title"  />
        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 transition duration-300 ease-in-out hover:cursor-pointer">Search</button>
    </div>
</form>

<!-- search -->
<div class="w-full  flex justify-center max-w-md my-1 p-5 m-auto  ">
<a href="{{route('product.addItems')}}">

<button class="w-[200px] sm:w-[250px] md:w-[350px] text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-bold rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2  transition duration-300 ease-in-out cursor-pointer" >Add Items</button>
</a>
</div>


<!-- Categories -->


<div class="w-full  flex justify-center items-center sm:m-a  mb-5  "> 

<div class="w-[90%] grid  gap-0 grid-cols-3 sm:w-[70%]  sm:gap-10 sm:grid-cols-9 flex items-center sm:m-a   sm:pl-12 "> 
        <form action="{{route('user.sellView')}}" method="GET">
        @csrf
<button type="submit" class=" w-[100px] text-white bg-gradient-to-r from-purple-400 via-purple-500 to-purple-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-semibold rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 cursor-pointer">All</button>


<input type="hidden" name="all" value="all">

</form>

    @foreach ($categories as $category )

    <form action="{{route('user.sellView')}}" method="GET">
        @csrf
<button type="submit" class=" w-[100px] text-white  transition duration-300 ease-in-out bg-gradient-to-r from-purple-400 via-purple-500 to-purple-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-semibold rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2  cursor-pointer">{{$category->product_category}}</button>


<input type="hidden" name="cat_name" value="{{ $category->product_category }}">

</form>
@endforeach

</div>
</div>

<!-- Categories -->





    <div class="w-full  flex justify-center items-center sm:m-a  "> 

 
<div class="w-[90%] grid  gap-3 grid-cols-2 sm:w-[70%]  sm:gap-4 sm:grid-cols-3 flex items-center sm:m-a   sm:pl-12  "> 
  @foreach ($products as $product)
   

<div class="w-full  max-w-3xs h-[275px] border border-gray-700 p-3  rounded-md shadow-lg  hover:shadow/2xl  transition duration-300 ease-in-out hover:-translate-y-2 relative cursor-pointer ">
    

        <img src="{{ asset('storage/' . $product->product_image) }}" alt="Clickable Image" class="w-full h-[60%]  ">
        <div class="grid gap-0 grid-cols-1 mt-1">

        <div class="flex ">
            <h1 class="font-semibold" name="p_name">{{$product->product_name}}</h1> 

            @if($product->is_available)
            <div class="ml-2 border border-green-200 rounded-md bg-green-200">
             <p class="text-gray-900 font-medium">Available</p>
            </div>
            @else
            <div class="ml-2 border border-red-200 rounded-md bg-red-200">
             <p class="text-gray-900 font-medium">Not Available</p>
            </div>
            @endif



            </div>
            <h1 class="font-medium" name="p_prize">₱{{$product->product_price}}</h1> 
            <h1 class="font-medium" name="p_qty">{{$product->product_qty}}</h1> 

            <div class="flex justify-around">
           <a href="{{route('product.editItems', $product->id)}}">
            <button class=" w-[65px] sm:w-[100px] border border-blue-200 bg-blue-200  rounded-md cursor-pointer hover:shadow/2xl  transition duration-300 ease-in-out hover:-translate-y-1    relative ">edit</button>
             </a>
    <form action="{{ route('product.destroyItems', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?')">
    @csrf
    @method('DELETE')
    <button class="w-[65px] sm:w-[100px] border border-red-300 bg-red-300 rounded-md cursor-pointer hover:shadow-2xl transition duration-300 ease-in-out hover:-translate-y-1 relative">
        Delete
    </button>
</form>

            </div>
        </div>

</div>
@endforeach







</div>

</div>
<div class="max-w-md mx-auto my-2 mt-5">
    
{{$products->links()}}


</div>
</x-userLayout>