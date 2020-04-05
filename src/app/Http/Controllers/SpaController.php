<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Cart_item;
use App\Customer;

use App\Http\Resources\Products as ProductResources;
use App\Http\Resources\Carts as CartResources;
use App\Http\Resources\Cart_items as CartItemResources;
use App\Http\Resources\Customers as CustomerResources;


class SpaController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function getAllProducts(){
        $products  = Product::all();
        return ProductResources::collection($products)->toJson(JSON_PRETTY_PRINT);
    }

    public function getProductDetails(Request $request){
        $id = $request['id'];
        $productDetails = Product::get()->find($id);
        //return ProductResources::collection($productDetails)->toJson(JSON_PRETTY_PRINT);
        return $productDetails;
    }

    public function getAllProductsByCategory(Request $request){
        $category_id = $request['category_id'];
        $products = Product::all()->where('category_id', $category_id);
        return ProductResources::collection($products)->toJson(JSON_PRETTY_PRINT);

    }

    public function getAllProductsByFilter(Request $request){
        $id = $request['list'];
        $gender = $request['filter'];

        $products = Product::all()->where('category_id', $id)->where('gender', $gender);
        return ProductResources::collection($products)->toJson(JSON_PRETTY_PRINT);
    }

    public function editProduct(Request $request){
        $id = $request['id'];
        $photo = $request['photo'];
        $brand = $request['brand'];
        $description = $request['description'];
        $price = $request['price'];
        $category_id = $request['category_id'];
        $stock = $request['stock'];
        $gender = $request['gender'];
        $status = $request['status'];

        $product = Product::find($id);

        $product->photo = $photo;
        $product->brand = $brand;
        $product->description = $description;
        $product->price = $price;
        $product->category_id = $category_id;
        $product->stock = $stock;
        $product->gender = $gender;
        $product->status = $status;

        $product->save();

    }




    public function addProduct(Request $request){
        $photo = $request['photo'];
        $brand = $request['brand'];
        $description = $request['description'];
        $price = $request['price'];
        $category_id = $request['category_id'];
        $stock = $request['stock'];
        $gender = $request['gender'];
        $status = $request['status'];

        $product = new Product;

        $product->photo = $photo;
        $product->brand = $brand;
        $product->description = $description;
        $product->price = $price;
        $product->category_id = $category_id;
        $product->stock = $stock;
        $product->gender = $gender;
        $product->status = $status;

        $product->save();

        return $product;
    }


    public function deleteProduct(Request $request){
        $id = $request['id'];

        $product = Product::find($id);
        $product->delete();
    }

    public function paymentCart(Request $request){
        // Customer
        $name = $request['name'];
        $surname = $request['surname'];
        $status = $request['status'];
        $email = $request['email'];
        $mobile = $request['mobile'];

        $customer = new Customer;
        $customer->name = $name;
        $customer->surname = $surname;
        $customer->email = $email;
        $customer->mobile = $mobile;
        $customer->status = $status;

        $customer->save();

        // Cart
        $totalAmount = $request['totalAmount'];
        $status = $request['status'];
        $address = $request['address'];

        $cart = new Cart;
        $cart->total_amount = $totalAmount;
        $cart->status = $status;
        $cart->address = $address;
        $cart->customer_id = $customer->id;

        $cart->save();

        // Cart Items
        $cart_id = $cart->id;
        $cart_items  = $request['cart'];
        foreach($cart_items as $item){
            print_r($item);
            $price = $item['product']['price'];
            $product_id = $item['product']['id'];

            $cart_item = new Cart_item;
            $cart_item->cart_id = $cart_id;
            $cart_item->price = $price;
            $cart_item->product_id = $product_id;

            $cart_item->save();
        }



        return $request;
    }

    public function getAllOrders(){
        $orders  = Cart::all();
        return CartResources::collection($orders)->toJson(JSON_PRETTY_PRINT);
    }


    public function getOrderDetails(Request $request){
        $id = $request['id'];
        $products = Cart_item::all()->where('cart_id',$id);
        //return CartItemResources::collection($orderDetails)->toJson(JSON_PRETTY_PRINT);
        $allProducts = [];
        foreach($products as $product ){
            array_push($allProducts,$product->product);
        }

        return $allProducts;
    }

    public function getAllCustomers(){
        $customers = Customer::all();
        return CustomerResources::collection($customers)->toJson(JSON_PRETTY_PRINT);
    }

}
