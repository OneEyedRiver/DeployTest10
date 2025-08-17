<x-userLayout>





    

<div class="grid gap-3 flex justify-center items-center  sm:m-a">

  <form action="{{route('product.UpdateItemsImage', $products->id)}}"  method="POST" enctype="multipart/form-data" class="w-full max-w-2xl  mt-3 flex justify-center items-center">
    @csrf
    @method('PUT')


          <label for="product_image_upload" class="relative w-[35%] h-[120px] sm:w-[30%] sm:h-[200px] border border-gray-500 rounded-full flex justify-center items-center">

          
                  <img src="{{ asset('storage/' . $products->product_image) }}" alt="Clickable Image" class=" w-full h-full rounded-full  transition duration-300 ease-in-out hover:mask-b-from-20% hover-mask-b-to-80%">

                  <p class="absolute">Edit Image</p>

                    <input type="file" name="product_image" id="product_image_upload" class="hidden" accept="image/*" onchange="this.form.submit()">

                 
 

          </label>

  @error('product_image')
              <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
  </form>
<form action="{{route('product.UpdateItems', $products->id)}}" method="POST" enctype="multipart/form-data">
     @csrf
     @method('PUT')
  <div class="grid gap-0 grid-cols-1 w-full max-w-2xl my-3 p-5 m-auto border border-gray-300 rounded-lg shadow-lg  flex justify-center  items-center ">
<div class=" grid gap-0 sm:gap-6 grid-cols-1 sm:grid-cols-2 ">

<div>
    <label class="m-1"for="product_name">Product Name:</label>
 
  <input 
    type="text"
    name="product_name"
     id="product_name"
    required
    value="{{ $products->product_name }}"

        class="w-[330px] sm:w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Product Name"

  >
        @error('product_name')
              <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
           

  </div>

  <div>
    <label class="m-1"for="product_category">Product Category:</label>
    <select 
    <?php
    $products_category = ["Vegetable", "Fruit", "Fish", "Meat"];
    ?>

    name="product_category"
    id="product_category"
    required
     value="{{ $products->product_category }}"


        class="w-[330px] sm:w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="First Name"

  >
        @foreach ($products_category as $product_cat)
            <option value="{{ $product_cat }}"
                {{ $product_cat === $products->product_category ? 'selected' : '' }}>
                {{ $product_cat }}
            </option>
        @endforeach
</select>


  </div>



  <!-- second row -->
   <div>
    <label id="product_price_chosen" class="m-1"for="product_price">Price per Kilogram:</label>
  <input 
    type="number" 
      min="1"
    step="0.01"
    name="product_price"
      id="product_price"
    required
    value="{{$products->product_price}}"

        class="w-[330px] sm:w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Price"

  >
        @error('product_price')
              <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
  </div>
  <div>
     <label class="m-1"for="product_unit">Unit:</label>
  <select 
 <?php
$products_unit=["kg", "pcs"];
 ?>
    type="number" 
      min="1"

    name="product_unit"
      id="product_unit"
    required
    value="{{old('product_unit')}}"

        class="w-[330px] sm:w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Unit"

  >
  @foreach ($products_unit as $unit)
            <option value="{{ $unit }}"
                {{ $unit === $products->product_unit ? 'selected' : '' }}>
                {{ $unit }}
            </option>
        @endforeach

  </select>

  </div>

  <!-- third row -->

   <div>
     <label class="m-1"for="product_qty">Available:</label>
  <input 
    type="number" 
      min="1"
      step="1.0"

    name="product_qty"
      id="product_qty"
    required
     value="{{$products->product_qty}}"

        class="w-[330px] sm:w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Quantity like 1, 2, 3, 4, 5'"

  >

          @error('product_qty')
              <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
  </div>

  <!-- for altering between qty or weight -->
   <script>
   const unit_selected= document.getElementById("product_unit");
   const availability= document.getElementById("product_qty");
      const priceChosen= document.getElementById("product_price_chosen");
   unit_selected.addEventListener('change',()=>{

   if(unit_selected.value === 'kg'  ){
    availability.placeholder = 'Quantity like 1, 2, 3, 4, 5';
      availability.step="1.0";
      priceChosen.innerText="Price per kilograms"
   }else{

  availability.placeholder = 'Weight(kg) like 1.25, 2.50, 3.75, 4, 5';
  availability.step=".25";
      priceChosen.innerText="Price per piece"
   }

   });
function updateUnitUI() {
        if (unit_selected.value === 'kg') {
            availability.placeholder = 'Weight(kg) like 1.25, 2.50, 3.75, 4, 5';
            availability.step = "1.0";
            priceChosen.innerText = "Price per kilograms";
        } else {
            availability.placeholder = 'Quantity like 1, 2, 3, 4, 5 ';
            availability.step = ".25";
            priceChosen.innerText = "Price per piece";
        }
    }

    // Run it once when the page loads
    document.addEventListener('DOMContentLoaded', updateUnitUI);
   
   </script>


<div>
     <label class="m-1"for="product_freshness">Freshness:</label>
  <select 
 <?php
$products_freshness=["fresh", "frozen", "day-old"];
 ?>
    type="number" 
      min="1"

    name="product_freshness"
      id="product_freshness"
    required
    value="{{old('product_freshness')}}"

        class="w-[330px] sm:w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Freshness"

  >
   @foreach ($products_freshness as $fresh)
            <option value="{{ $fresh }}"
                {{ $fresh === $products->product_freshness ? 'selected' : '' }}>
                {{ $fresh }}
            </option>
        @endforeach
  </select>

  </div>

     <div>
    <label class="m-1"for="harvest_date">Harvest Date:</label>
  <input 
    type="text" 

    name="harvest_date"
      id="harvest_date"
    required
    value="{{$products->harvest_date}}"

        class="form-control w-[330px] sm:w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Harvest Date"

  >

<!-- Include Flatpickr CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- Initialize Flatpickr -->
<script>
  flatpickr("#harvest_date", {
    dateFormat: "Y-m-d", // Same format as used in Laravel (e.g., 2025-07-21)
    maxDate: "today" // Optional: prevent future dates
  });
</script>
  </div>
  

      <div>
     <label class="m-1"for="product_available">Available:</label>
  <select 
    name="product_availability"
      id="product_availability"
    required
    

        class="w-[330px] sm:w-[300px]  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Unit"

  >
    <option value="1" {{ $products->is_available == 1 ? 'selected' : '' }}>True</option>
    <option value="0" {{ $products->is_available == 0 ? 'selected' : '' }}>False</option>
  </select>

  </div>


  
  <div>
     <label class="m-1"for="deliver_availability">Deliver Availability:</label>
  <select 
 <?php

 ?>
    type="number" 
    

    name="deliver_availability"
      id="deliver_availability"
    required
    value="{{old('deliver_availability')}}"

        class="w-[330px] sm:w-[300px]  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Unit"

  >
     <option value="1" {{ $products->deliver_availability == 1 ? 'selected' : '' }}>True</option>
    <option value="0" {{ $products->deliver_availability == 0 ? 'selected' : '' }}>False</option>
  </select>

  </div>

    <div>
     <label class="m-1"for="pick_up_availability">Pick-up Availability::</label>
  <select 
 <?php

 ?>
    type="number" 
      min="1"

    name="pick_up_availability"
      id="pick_up_availability"
    required
    value="{{old('pick_up_availability')}}"

        class="w-[330px] sm:w-[300px] md:w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Unit"

  >
     <option value="1" {{ $products->pick_up_availability == 1 ? 'selected' : '' }}>True</option>
    <option value="0" {{ $products->pick_up_availability == 0 ? 'selected' : '' }}>False</option>
  </select>

  </div>

</div>
<div class="m-4">

<label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">Product Description(optional):</label>
<textarea id="message" name="product_description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Add Product Description"    >{{$products->product_description}}</textarea>
          @error('product_description')
              <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror

</div>


<div class="grid gap-0 grid-cols-1  sm:grid-cols-3 w-full flex justify-center items-center sm:pl-6 ">




<button type="submit" class="w-[330px] sm:w-[150px] text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-bold rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
  Edit Items
</button>
</form>


<button type="button" name="reset" id="reset" class="w-[330px] sm:w-[150px] text-white bg-gradient-to-r from-amber-400 via-amber-500 to-amber-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-amber-300 dark:focus:ring-amber-800 font-bold rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
  Reset Items
</button>


<a href="{{route('user.sellView')}}" class="w-[330px] sm:w-[150px] text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-bold rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">

  Back
</a>



</div>
</div>

</div>





<script>

const resetButton=document.getElementById("reset");

const resetName=document.getElementById("product_name");
const resetPrice=document.getElementById("product_price");
const resetQty=document.getElementById("product_qty");
const resetDate=document.getElementById("harvest_date");
const resetImage=document.getElementById("product_image");
  resetButton.addEventListener('click',()=>{
   
  
resetName.value="";
resetPrice.value="";
resetQty.value="";
resetDate.value="";
resetImage.value="";

  });

</script>



</x-userLayout>