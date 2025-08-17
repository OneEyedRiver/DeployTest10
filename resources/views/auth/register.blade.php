<x-userLayout>
<div class="flex justify-center items-center  sm:m-a">
<form action="{{route('register')}}" method="POST" >
  @csrf

  <div class=" w-full max-w-2xl my-3 p-5 m-auto border border-gray-300 rounded-lg shadow-lg  ">
<div class="grid gap-0 sm:gap-6 grid-cols-1 sm:grid-cols-2 ">
  <div>
  <input 
    type="text"
    name="f_name"
    required
    value="{{old('f_name')}}"

        class="w-[200px] sm:w-[150px] md:w-[250px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="First Name"

  >
             @error('f_name')
              <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
  </div>
<div>
   <input 
    type="text"
    name="l_name"
    required
    value="{{old('l_name')}}"

        class="w-[200px] sm:w-[150px] md:w-[250px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Last Name"
        
  >
       @error('l_name')
              <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
   </div>
  </div>

<div class="flex flex-col sm:items-center mb-3">
  <input 
    type="text"
    name="username"
        class="w-[200px] sm:w-[300px] md:w-[400px]   bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block   p-2.5 " placeholder="Username"
    required
    value="{{old('username')}}"
 
  >
      @error('username')
              <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
  </div>

  <div class="grid gap-0 sm:gap-2 grid-cols-1 sm:grid-cols-2 ">
    <div>
  <input 
    type="text"
    name="email"
    required
    value="{{old('email')}}"

        class="w-[200px] sm:w-[150px] md:w-[250px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Email"

  >
     @error('email')
              <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
  </div>

  
<div class="w-[200px] sm:w-[150px] md:w-[250px] ">
    <div class="relative ">
        <div class="absolute inset-y-2 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z"/>
            </svg>
        </div>
        <input type="text" name="phone_number" value="{{old('phone_number')}}" id="phone-input" aria-describedby="helper-text-explanation" class=" w-[200px] sm:w-[150px] md:w-[250px]  mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  ps-10 p-2.5  " pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required />
        @error('phone_number')
              <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
    </div>
</div>

  
 
<div>
  <input 
    type="password"
    name="password"
        class="w-[200px] sm:w-[150px] md:w-[250px]   bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block   p-2.5 mb-3" placeholder="Password"
    required
 
  >
     @error('password')
              <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
  </div>
<div>
    <input 
    type="password"
    name="password_confirmation"
        class="w-[200px] sm:w-[150px] md:w-[250px]   bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block   p-2.5 mb-3" placeholder="Confirm Password"
    required
 
  >
      @error('password_confrimation')
              <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
   </div>
</div>
<div class="flex justify-center">


<div  class="flex justify-center mt-5">
  @csrf
<button type="submit"class="w-[200px] sm:w-[250px] md:w-[350px] text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800  font-bold rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Register</button>
</div>

</div>

</form>
</div>
  <!-- validation errors -->
  


</x-layout>