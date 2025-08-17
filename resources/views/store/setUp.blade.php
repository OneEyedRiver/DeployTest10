<x-userLayout>



<div class=" flex justify-center items-center  sm:m-a">
<form action="{{route('store.saveStore')}}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="grid gap-0 grid-cols-1 w-full max-w-2xl my-3 p-5 m-auto border border-gray-300 rounded-lg shadow-lg  flex justify-center  items-center ">
<div class=" grid gap-0 sm:gap-6 grid-cols-1 sm:grid-cols-2 ">

<div>
    <label class="m-1"for="store_name">Store Name:</label>
 
  <input 
    type="text"
    name="store_name"
     id="store_name"
    required
    value="{{old('store_name')}}"

        class="w-[330px] sm:w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Store Name"

  >
        @error('store_name')
              <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
           

  </div>


 
   <div class="w-[330px] sm:w-[300px] ">
       <label class="m-1"for="store_phoneNumber">Store Phone number:</label>
    <div class="relative ">
        <div class="absolute inset-y-2 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z"/>
            </svg>
        </div>
        <input type="text" name="store_phoneNumber" value="{{old('store_phoneNumber')}}" id="store_phoneNumber" aria-describedby="helper-text-explanation" class=" w-[330px] sm:w-[300px]  mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  ps-10 p-2.5  " pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required />
        @error('store_phoneNumber')
              <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
    </div>
</div>

  



  <!-- second row -->
   <div>
    <label id="store_email" class="m-1"for="store_email">Store Email:</label>
   <input 
    type="email"
    name="store_email"
    required
    value="{{old('store_email')}}"

        class="w-[330px] sm:w-[300px]  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Email"

  >
        @error('store_email')
              <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
  </div>

  <div>
     <label class="m-1"for="store_address">Store Address:</label>
  <input 
 
    type="text" 
    

    name="store_address"
      id="store_address"
    required
    value="{{old('store_address')}}"

        class="w-[330px] sm:w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Address"

  >

  </input>

  </div>

  <!-- third row -->

   <div>
     <label class="m-1"for="store_postalCode">Postal Code:</label>
  <input 
    type="text" 
 
    name="store_postalCode"
      id="store_postalCode"
    required
    value="{{old('store_postalCode')}}"

        class="w-[330px] sm:w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Postal Code"

  >

          @error('store_postalCode')
              <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
  </div>




<div>
     <label class="m-1"for="store_city">City:</label>
  <input 

    type="text" 

    name="store_city"
      id="store_city"
    required
    value="{{old('store_city')}}"

        class="w-[330px] sm:w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="City"


        
  >


    @error('store_city')
              <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror

  </div>

     <div>
    <label class="m-1"for="store_state">State:</label>
  <input 
    type="text" 

    name="store_state"
      id="store_state"
    required
    value="{{old('store_state')}}"

        class="form-control w-[330px] sm:w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="State"

  >

          @error('store_state')
              <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror


  </div>
  

       <div>
    <label class="m-1" for="store_image">Store Profile Picture:</label>
  <input 
    type="file" 

    name="store_image"
      id="store_image"
      accept="image/*"
    
    value="{{old('store_image')}}"

        class="form-control w-[330px] sm:w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Image"

  >

          @error('store_image')
              <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror

  </div>  


</div>

<div class="grid gap-0 grid-cols-1  sm:grid-cols-3 w-full flex justify-center items-center sm:pl-6 ">




<button type="submit" class="w-[330px] sm:w-[150px] text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-bold rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
  Store Items
</button>
</form>


<button name="reset" id="reset" class="w-[330px] sm:w-[150px] text-white bg-gradient-to-r from-amber-400 via-amber-500 to-amber-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-amber-300 dark:focus:ring-amber-800 font-bold rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
  Reset Items
</button>


<a href="{{route('show.menu')}}" class="w-[330px] sm:w-[150px] text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-bold rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">

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