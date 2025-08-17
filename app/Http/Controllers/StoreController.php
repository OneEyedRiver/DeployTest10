<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\User as ModelsUser;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function setUp()
    {
           return view("store.setUp");
    }


   public function saveStore(Request $request)
{
    $request->validate([
        'store_name' => 'required|string|max:255',
        'store_phoneNumber' => 'nullable|string|min:10|max:20|regex:/^[\d\s\+\-]+$/',
        'store_address' => 'required|string|max:255',
        'store_postalCode' => 'required|string|max:20',
        'store_city' => 'required|string|max:100',
        'store_state' => 'required|string|max:100',
        'store_email' => 'required|email|unique:stores,email',
        //'store_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);



        $store= Store::create([
     'store_name'=>$request->store_name,
     'seller_id' =>Auth::id(),
     'phone_number'=>$request->store_phoneNumber,
     'email'=>$request->store_email,
      
     'store_address'=>$request->store_address,
     'postal_code'=>$request->store_postalCode,
    'city'=>$request->store_city,
     'state' => $request->store_state,
 

     ]);


     $user= ModelsUser::find(Auth::id());

     if($user){   
         $user->update(['is_seller'=> 1,
        ]);
        }
 


    if($store && $user){
     return redirect()->route('user.sellView') ->with('success', "Your store is created");}

else {
        return back()->withInput()->with('error', 'Failed to create store');
    }
}

}
