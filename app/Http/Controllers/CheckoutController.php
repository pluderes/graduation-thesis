<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Cart;

session_start();

class CheckoutController extends Controller
{
    public function login_checkout()
    {
        return view('pages.checkout.login_checkout');
    }

    public function add_customer(Request $request)
    {
        $data = array();
        $data['username'] = $request->username;
        if ($request->password === $request->re_password) {
            $data['password'] = md5($request->password);
        } else {
            Session::put('message', 'Nhập lại mật khẩu không chính xác!');
            return Redirect::to('/login-checkout');
        }
        $data['acc_name'] = $request->acc_name;
        $data['acc_email'] = $request->email;
        $data['acc_contact'] = $request->acc_contact;
        $data['perm_id'] = '5';
        $get_image = $request->file('inpthumbnail');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/Backend/images', $new_image);
            $data['acc_img'] = $new_image;

            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';

            $acc_customer_id =  DB::table('account')->insertGetId($data);
            Session::put('message', 'Thêm tài khoản thành công!');
            Session::put('acc_customer_id', $acc_customer_id);

            return Redirect::to('/admin-add-account');
        } else {
            $data['acc_img'] = 'avt-default.jpg';

            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';

            $acc_customer_id =  DB::table('account')->insertGetId($data);
            Session::put('message', 'Thêm tài khoản thành công!');
            Session::put('acc_customer_id', $acc_customer_id);

            return Redirect::to('/admin-add-account');
        }
    }


    public function checkout($acc_id)
    {
        $cate_product = DB::table('category')->orderBy('cate_id', 'asc')->get();
        $status_product = DB::table('product_status')->orderBy('status_id', 'asc')->get();

        $info = DB::table('delivery')->where('acc_id', $acc_id)->get();
        $deli_info = DB::table('delivery')->where('acc_id', $acc_id)->limit(1)->get();

        if (count($info) !== 0) {
            return view('pages.checkout.checkout')->with('category', $cate_product)->with('status_prod', $status_product)->with('deli_info', $deli_info);
        } else if (count($info) === 0) {
            return view('pages.checkout.new_checkout')->with('category', $cate_product)->with('status_prod', $status_product);
        }
    }

    public function save_checkout_customer(Request $request)
    {
        $acc_customer_id = Session::get('acc_id');
        $data = array();
        $data['acc_id'] = $acc_customer_id;
        $data['deli_date'] = Carbon::now();
        $data['deli_name'] = $request->deli_name;
        $data['deli_address'] = $request->deli_address;
        $data['deli_email'] = $request->deli_email;
        $data['deli_phone'] = $request->deli_phone;
        $data['deli_note'] = $request->deli_note;
        $delivery_id = DB::table('delivery')->insertGetId($data);

        Session::put('deli_id', $delivery_id);

        return Redirect::to('/payment');
    }

    public function payment()
    {
        $cate_product = DB::table('category')->orderBy('cate_id', 'asc')->get();
        $status_product = DB::table('product_status')->orderBy('status_id', 'asc')->get();
        return view('pages.checkout.payment')->with('category', $cate_product)->with('status_prod', $status_product);
    }

    public function order_place(Request $request)
    {
        // insert payment
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Chờ xử lý';
        $data['payment_date_time'] = Carbon::now();
        $payment_id = DB::table('payment')->insertGetId($data);

        // insert invoice
        $invoice_data = array();
        $invoice_data['acc_id'] = Session::get('acc_id');
        $invoice_data['deli_id'] = Session::get('deli_id');
        $invoice_data['payment_id'] = $payment_id;
        $invoice_data['invoice_total'] = Cart::total();
        $invoice_data['invoice_status'] = 'Chờ xử lý';
        $invoice_data['invoice_date_time'] = Carbon::now();
        $invoice_id = DB::table('invoice')->insertGetId($invoice_data);

        // insert invoice_detail
        $content = Cart::content();
        foreach ($content as $v_content) {
            $invoide_detail_data = array();
            $invoide_detail_data['invoice_id'] = $invoice_id;
            $invoide_detail_data['prod_id'] = $v_content->id;
            $invoide_detail_data['prod_name'] = $v_content->name;
            $invoide_detail_data['sell_quantity'] = $v_content->qty;
            $invoide_detail_data['prod_price'] = $v_content->price;
            DB::table('invoice_detail')->insertGetId($invoide_detail_data);
        }
        if ($data['payment_method'] === "1") {
            echo 'ATM';
        } else if($data['payment_method'] === "2"){
            Cart::destroy();
            $cate_product = DB::table('category')->orderBy('cate_id', 'asc')->get();
            $status_product = DB::table('product_status')->orderBy('status_id', 'asc')->get();
            return view('pages.checkout.handcash')->with('category', $cate_product)->with('status_prod', $status_product);
        }
        // $content = Cart::content();
        // echo $content;
    }
}
