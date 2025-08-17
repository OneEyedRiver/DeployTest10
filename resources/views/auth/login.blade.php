<x-userLayout>
<div class="flex justify-center items-center h-screen sm:m-a">
<form action="{{route('login')}}" method="POST" >
  @csrf

  <div class="w-full max-w-md my-3 p-5 m-auto border border-gray-300 rounded-lg shadow-lg ">
<div>
  <input 
    type="email"
    name="email"
    class="w-[300px] sm:w-[300px] md:w-[400px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Email address"
    required
    value="{{old('email')}}"
  >
     @error('email')
              <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
  </div>
<div>
  <input 
    type="password"
    name="password"
        class="w-[300px] sm:w-[300px] md:w-[400px]  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block   p-2.5 mb-3" placeholder="Password"
    required
 
  >
       @error('password')
              <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
  </div>
<div class="flex justify-center">
<button type="submit" class="w-[200px] sm:w-[250px] md:w-[350px] text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-bold rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Log-in</button>
</div>

  
</form>
<div class="flex justify-center">

</div>

<form action="{{route('show.register')}}" method="GET" class="flex justify-center mt-5">
  @csrf
<button type="submit"class="w-[200px] sm:w-[250px] md:w-[350px] text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800  font-bold rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Register</button>



</form>
<div class="flex justify-center mt-5">
@if ($errors->has('login'))
    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
        {{ $errors->first('login') }}
    </p>
@endif
</div>
</div>

</div>





</x-layout>