<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Pagination\Paginator;

use Session;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    
    
    
    function getData(Request $req , $lang = 'en')
    {
        //return DB::select("select * from products");
        App::setLocale($lang);
        $products =  Product::paginate(2);
        return view("products",["request"=>session(),"products"=>$products]);
    }


    function AddNewProduct(Request $req)
    {
        $product = new Product;
        $product->name = $req->name;
        $product->price = $req->price;
        $product->category = $req->category;
        $product->description = $req->description;
        $product->gallery = $req->gallery;
        $product->seller_id = $req->session()->get('user')->id;
        $product->created_at = date("Y/m/d");
        $product->updated_at = date("Y/m/d");
        $product->save();

        return redirect('/products');
    }

    function viewProduct($product_id)
    {
        $product= Product::where(['id'=>$product_id])->first();
        $owner = User::where(['id' => $product->seller_id])->first();
        return view("productprofile",["owner"=>$owner,"product"=>$product,'request'=>session()]);
    }
}
