<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth; // Optional if you prefer Auth::id()
class ProductController extends Controller
{
  
     public function addItems()
     {

        return view("product.addItems");
        
     }

     public function storeItems(Request $request){

   $request->validate([
     'product_name'=>'required|max:175|min:2',
     'product_price' => 'required|numeric|gt:0|max:9999999999',
     'product_qty' => 'required|numeric|gt:0|max:999999', // Accepts decimals > 0
     'product_freshness'=>'required|max:20|min:2',
     'product_description'=>'max:2005',
     'product_image'=> 'required|image|mimes:jpg,jpeg,png,gif|max:2048', // max 2MB

 ]);

  if ($request->hasFile('product_image')) {
        // Get file with extension
        $file = $request->file('product_image');
        
        // Create a unique file name: product-name_timestamp.extension
        $filename = str_replace(' ', '-', strtolower($request->product_name)) . '_' . time() . '.' . $file->getClientOriginalExtension();

        // Store file in storage/app/public/product_images
        $filePath = $file->storeAs('product_images', $filename, 'public');
    }

  
     $product= Product::create([
     'product_name'=>$request->product_name,
     'product_category'=>$request->product_category,
     'product_price'=>$request->product_price,
      
     'product_unit'=>$request->product_unit,
     'product_freshness'=>$request->product_freshness,
    'product_qty'=>$request->product_qty,
     'product_image' => $filePath ?? null,
 
     'harvest_date'=>$request->harvest_date,
      'product_description'=>$request->product_description,
     'deliver_availability'=>(int) $request->deliver_availability,
     'pick_up_availability'=>(int) $request->pick_up_availability,
     'seller_id' =>Auth::id(),


       

          
          
     
     ]);

if($product){
     return redirect()->route('user.sellView') ->with('success', "The product {$product->product_name}  was added successfully.");;}

else {
        return back()->withInput()->with('error', 'Failed to store the product.');
    }

     }
     
     public function destroyItems($id)
     {
           $productChosen=Product::find($id);
    if ($productChosen) {
          if (
            $productChosen->product_image &&
            Storage::disk('public')->exists($productChosen->product_image)
        ) {
            Storage::disk('public')->delete($productChosen->product_image);
        }

        $productChosen->delete();
       return redirect()->route('user.sellView')
            ->with('success', "The Product was deleted successfully.");
    }

    return redirect()->route('user.sellView')->with('error', 'Failed to Delete.');
     }

     public function editItems($id)
     {
             $productChosen=Product::find($id);
             


             
    if ($productChosen) {
  

     return view('product.editItems', [
    'products' => $productChosen,
    ]);


    }}
    public function UpdateItems(Request $request, $id)
    {
      $request->validate([
     'product_name'=>'required|max:175|min:2',
     'product_price' => 'required|numeric|gt:0|max:9999999999',
     'product_qty' => 'required|numeric|gt:0|max:999999', // Accepts decimals > 0
     'product_freshness'=>'required|max:20|min:2',
     'product_description'=>'max:2005',
   //  'product_image'=> 'required|image|mimes:jpg,jpeg,png,gif|max:2048', // max 2MB

 ]);
 $product=Product::find($id);

 if($product){

 

    $product->update([
    'product_name'=>$request->product_name,
     'product_category'=>$request->product_category,
     'product_price'=>$request->product_price,
      
     'product_unit'=>$request->product_unit,
     'product_freshness'=>$request->product_freshness,
      'product_qty'=>$request->product_qty,
     //'product_image' => $filePath ?? null,
 
     'harvest_date'=>$request->harvest_date,
      'product_description'=>$request->product_description,

     'deliver_availability'=>(int) $request->deliver_availability,
     'pick_up_availability'=>(int) $request->pick_up_availability,
     'is_available'=>(int) $request->product_availability,

     
    

    ]);
     return redirect()->route('user.sellView') ->with('success', "The product {$product->product_name}  was updated successfully.");


 }
    return back()->withInput()->with('error', 'Failed to update the product.');  
    }


    public function UpdateItemsImage(Request $request, $id)
    {

          $request->validate([
        'product_image' => 'required|image|max:2048', // max 2MB
    ]);


    $product = Product::findOrFail($id);


    if ($product->product_image && Storage::disk('public')->exists($product->product_image)) {
        Storage::disk('public')->delete($product->product_image);
    }

 
    $path = $request->file('product_image')->store('product_images', 'public');

    
    $product->product_image = $path;
    $product->save();

    return back()->with('success', 'Product image updated successfully!');
      
    }

   public function view($id)
     {
             $productChosen=Product::find($id);
             
             
    if ($productChosen) {

     return view('product.view', [
    'products' => $productChosen,
    ]);

  }}

}
