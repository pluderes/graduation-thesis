<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;

session_start();

class CartController extends Controller
{
    // check login
    public function checkLogin()
    {
        $accPermID = Session::get('permId');
        if ($accPermID) {
            if ($accPermID === 1) {
                return Redirect::to('/dashboard');
            } else if ($accPermID === 2) {
                return Redirect::to('/order');
            } else if ($accPermID === 3) {
                return Redirect::to('/inventory');
            } else if ($accPermID === 4) {
                return Redirect::to('/delivery');
            } else {
                return Redirect::to('/trang-chu');
            }
        } else {
            Session::put('message', 'Bạn cần đăng nhập trước!');
            return Redirect::to('/adminLogin')->send();
        }
    }
    // ---------------------------------------------------
    public function save_cart(Request $request)
    {
        $prod_id = $request->prod_id_hidden;
        $prod_quantity = $request->prod_quantity;
        $prod_info = DB::table('product')->where('product.prod_id', $prod_id)->first();

        // Cart::destroy();

        $data['id'] = $prod_id;
        $data['name'] = $prod_info->prod_name;
        $data['qty'] = $prod_quantity;
        if ($prod_info->status_id == 3) {
            $data['price'] = $prod_info->prod_price - $prod_info->prod_price * 5 / 100;
        } else {
            $data['price'] = $prod_info->prod_price;
        }
        $data['weight'] = $prod_info->prod_quantity;
        $data['options']['image'] = $prod_info->thumbnail;

        Cart::add($data);

        $prod = DB::table('product')->where('product.prod_id', $prod_id)->get();

        // echo '<pre>';
        // print_r($prod);
        // echo '</pre>';
        return Redirect::to('/show-cart');
    }

    public function show_cart()
    {
        $cate_product = DB::table('category')->orderBy('cate_id', 'asc')->get();
        $status_product = DB::table('product_status')->orderBy('status_id', 'asc')->get();
        $type_product = DB::table('type')->orderBy('type_id', 'asc')->get();


        // $prod = DB::table('product')

        return view('pages.cart.show_cart')->with('category', $cate_product)->with('status_prod', $status_product)->with('prod_type', $type_product);
    }

    public function delete_to_cart($rowId)
    {
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }

    public function update_quantity(Request $request)
    {
        $max_quantity = DB::table('product')->where('product.prod_id', $request->prod_id)->get();

        $rowId = $request->rowId_cart;
        if ($request->cart_quantity > $max_quantity[0]->prod_quantity) {
            $quantity = $max_quantity[0]->prod_quantity;
        } else {
            $quantity = $request->cart_quantity;
        }
        Cart::update($rowId, $quantity);

        // echo '<pre>';
        // print_r(Cart::content());
        // print_r($max_quantity);
        // echo '</pre>';
        return Redirect::to('/show-cart');
    }
}
