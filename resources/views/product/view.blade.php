<x-userLayout>


<h4>You are viewing a product</h4>


<div class="     grid gap-3 sm:grid-cols-1 sm:grid-cols-3 m-4"><!-- controls every outdiv -->
<div class= " sm:col-span-2 w-full max-2xl-w border border-gray-700 "><!-- first outdiv -->

<div class="w-full flex justify-center ">
    <div class="w-full max-w-md h-[250px] border border-gray-600 m-5">
      <img src="{{ asset('storage/' . $products->product_image) }}" alt="Product Image" class="w-full h-full object-cover">

    </div>

       

</div>

<div class="w-full flex justify-center ">
   <div class="w-full max-w-3xl   m-5">
<p>{{$products->product_description}}</p>
        </div>

</div>



</div>

<div class= "w-full max-2xl-w  p-5"><!-- first outdiv -->

<h4 class="font-bold text-[40px] ">{{$products->product_name}}</h4>

@if($products->product_unit === "pcs")
<h4 class="font-md text-[25px]">Price per piece: ₱{{$products->product_price}} </h4>
@else
<h4 class="font-md text-[25px]">Price per kilogram:</h4>
@endif
<h4 class="font-md text-[25px]">Freshness Status: {{$products->product_freshness}}</h4>

<div class="grid gap-2 grid-cols-2">
<button type="button" class="w-full focus:outline-none text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-300 font-semibold rounded-lg text-xl px-5 py-2.5 me-2 mb-2 hover:cursor-pointer ">Buy Now</button>
<button type="button" class="w-full focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-semibold rounded-lg text-xl  px-5 py-2.5 me-2 mb-2  hover:cursor-pointer">Add to Cart</button>

</div>

</div>


</div>

</x-userLayout>