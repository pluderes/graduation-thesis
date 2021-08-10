<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Models\account;
use App\Models\City;
use App\Models\District;
use App\Models\Wards;

session_start();

class CheckoutController extends Controller
{
    public function login_checkout()
    {
        // // check quantity product
        // $max_quantity = DB::table('product')->where('product.prod_id', $request->prod_id)->get();

        // $rowId = $request->rowId_cart;
        // if ($request->cart_quantity > $max_quantity[0]->prod_quantity) {
        //     $quantity = $max_quantity[0]->prod_quantity;
        // } else {
        //     $quantity = $request->cart_quantity;
        // }
        // Cart::update($rowId, $quantity);

        return view('pages.checkout.login_checkout');
    }

    public function add_customer(Request $request)
    {
        $count_user = DB::table('account')->where('account.username', '=', $request->username)->count();
        $count_email = DB::table('account')->where('account.acc_email', '=', $request->email)->count();

        $request->validate([
            'acc_contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($count_user < 1 && $count_email < 1) {
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
            } else {
                $data['acc_img'] = 'avt-default.jpg';
            }

            $acc_customer_id =  DB::table('account')->insertGetId($data);
            Session::put('message', 'Tạo tài khoản thành công!');
            Session::put('acc_customer_id', $acc_customer_id);

            return Redirect::to('/adminLogin');
        } else {
            Session::put('message', 'Tên đăng nhập hoặc email đã tồn tại!');
            return Redirect::to('/login-checkout');
        }
    }

    public function select_address(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "city") {
                $select_district = District::where('matp', $data['ma_id'])->orderby('maqh', 'ASC')->get();
                $output .= '<option>--- Chọn quận - huyện ---</option>';
                foreach ($select_district as $key => $district) {
                    $output .= '<option value="' . $district->maqh . '">' . $district->district_name . '</option>';
                }
            } else {

                $select_wards = Wards::where('maqh', $data['ma_id'])->orderby('xaid', 'ASC')->get();
                $output .= '<option>--- Chọn xã - phường ---</option>';
                foreach ($select_wards as $key => $ward) {
                    $output .= '<option value="' . $ward->xaid . '">' . $ward->wards_name . '</option>';
                }
            }
            echo $output;
        }
    }

    public function checkout(Request $request, $acc_id)
    {

        $city = City::orderby('matp', 'asc')->get();

        $cate_product = DB::table('category')->orderBy('cate_id', 'asc')->get();
        $status_product = DB::table('product_status')->orderBy('status_id', 'asc')->get();
        $type_product = DB::table('type')->orderBy('type_id', 'asc')->get();

        // check quantity product
        $max_quantity = DB::table('product')->where('product.prod_id', $request->prod_id)->get();

        // -------------
        $count_info = DB::table('delivery')->where('acc_id', $acc_id)->count();
        $deli_info = DB::table('delivery')->where('acc_id', $acc_id)->limit(1)->get();

        $count = Cart::count();

        if ($count > 0) {
            $rowId = $request->rowId_cart;
            if ($request->cart_quantity > $max_quantity[0]->prod_quantity) {
                $quantity = $max_quantity[0]->prod_quantity;
            } else {
                $quantity = $request->cart_quantity;
            }
            Cart::update($rowId, $quantity);

            if ($count_info !== 0) {
                return view('pages.checkout.checkout')
                    ->with('category', $cate_product)
                    ->with('status_prod', $status_product)
                    ->with('prod_type', $type_product)
                    ->with('deli_info', $deli_info)
                    ->with(compact('city'));
            } else if ($count_info === 0) {
                return view('pages.checkout.new_checkout')
                    ->with('category', $cate_product)
                    ->with('status_prod', $status_product)
                    ->with('prod_type', $type_product)
                    ->with(compact('city'));
            }
        } else {
            Session::put('warning', 'Bạn chưa có sách nào trong giỏ hàng');
            return Redirect::to('/show-cart');
        }
    }

    public function save_checkout_customer(Request $request)
    {
        $acc_customer_id = Session::get('acc_id');

        $request->validate([
            'deli_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'deli_email' => 'required|email',
        ]);

        $data = array();
        $data['acc_id'] = $acc_customer_id;
        $data['deli_date'] = Carbon::now();
        $data['deli_name'] = $request->deli_name;

        // -------------- address --------------------
        $cityID = $request->city;
        $districtID = $request->district;
        $wardID = $request->wards;

        $city = DB::table('province_city')->where('matp', $cityID)->get();
        $district = DB::table('district')->where('maqh', $districtID)->get();
        $ward = DB::table('wards')->where('xaid', $wardID)->get();

        $address = $ward[0]->wards_name . ', ' . $district[0]->district_name . ', ' . $city[0]->province_name;
        $data['deli_address'] = $request->deli_address . ", " . $address;
        // ------------- end address --------------

        $data['deli_email'] = $request->deli_email;
        $data['deli_phone'] = $request->deli_phone;
        if ($request->deli_note == null) {
            $data['deli_note'] = null;
        } else {
            $data['deli_note'] = $request->deli_note;
        }
        $delivery_id = DB::table('delivery')->insertGetId($data);

        // echo '<pre>';
        // print_r($request->deli_address . ", " . $address);
        // echo '</pre>';

        Session::put('deli_id', $delivery_id);

        return Redirect::to('/payment');
    }
    // ---------------- update pass client -----------------------------
    public function update_password_client($acc_id)
    {
        $edit_password_client = account::find($acc_id);
        return view('pages.info_account.update_password_client')->with('edit_account', $edit_password_client);
    }
    public function save_password_client(Request $request, $acc_id)
    {
        $acc = account::find($acc_id);

        $request->validate([
            'password' => 'bail|required|min:6',
            're_password' => 'bail|required|same:password',
        ]);

        $data = array();
        $data['username'] = $acc->username;
        $data['password'] = md5($request->password);
        $data['acc_name'] = $acc->acc_name;
        $data['acc_email'] = $acc->acc_email;
        $data['acc_contact'] = $acc->acc_contact;
        $data['perm_id'] = $acc->perm_id;
        $data['acc_img'] = $acc->acc_img;

        Session::put('message', 'Cập nhật mật khẩu thành công!');

        DB::table('account')->where('acc_id', $acc_id)->update($data);
        return Redirect::to('/info/' . $acc_id);
    }


    // ------------------------------------------------------------
    public function payment()
    {
        $cate_product = DB::table('category')->orderBy('cate_id', 'asc')->get();
        $status_product = DB::table('product_status')->orderBy('status_id', 'asc')->get();
        $type_product = DB::table('type')->orderBy('type_id', 'asc')->get();

        $count = Cart::count();
        if ($count > 0) {
            return view('pages.checkout.payment')->with('category', $cate_product)->with('status_prod', $status_product)->with('prod_type', $type_product);
        } else {
            Session::put('warning', 'Bạn chưa có sách nào trong giỏ hàng');
            return Redirect::to('/show-cart');
        }
    }

    public function order_place(Request $request)
    {
        $content = Cart::content();
        $quantity = 0;
        $data = array();
        $data['payment_method'] = $request->payment_option;
        foreach ($content as $v_content) {
            $prod_detail = DB::table('product')->where('product.prod_id', $v_content->id)->get();
            $quantity = $prod_detail[0]->prod_quantity - $v_content->qty;
        }

        if ($quantity >= 0) {
            if ($data['payment_method'] === "1") {
                $cate_product = DB::table('category')->orderBy('cate_id', 'asc')->get();
                $status_product = DB::table('product_status')->orderBy('status_id', 'asc')->get();
                $type_product = DB::table('type')->orderBy('type_id', 'asc')->get();

                // insert payment
                $data['payment_status'] = 'Thanh toán qua thẻ ngân hàng';
                $data['payment_date_time'] = Carbon::now();
                $payment_id = DB::table('payment')->insertGetId($data);

                return view('pages.checkout.ATM')->with('category', $cate_product)->with('status_prod', $status_product)->with('prod_type', $type_product);
            } else if ($data['payment_method'] === "2") {

                // insert payment
                $data['payment_status'] = 'Thanh toán khi nhận hàng';
                $data['payment_date_time'] = Carbon::now();
                $payment_id = DB::table('payment')->insertGetId($data);

                // insert invoice
                $invoice_data = array();
                $invoice_data['acc_id'] = Session::get('acc_id');
                $invoice_data['deli_id'] = Session::get('deli_id');
                $invoice_data['payment_id'] = $payment_id;
                $invoice_data['invoice_total'] = (int)str_replace(',', '', Cart::total());
                $invoice_data['current_status'] = 'Chờ xử lý';
                $invoice_data['invoice_date_time'] = Carbon::now();
                $invoice_id = DB::table('invoice')->insertGetId($invoice_data);

                // insert invoice_detail
                foreach ($content as $v_content) {
                    $invoide_detail_data = array();
                    $invoide_detail_data['invoice_id'] = $invoice_id;
                    $invoide_detail_data['prod_id'] = $v_content->id;
                    $invoide_detail_data['prod_name'] = $v_content->name;
                    $invoide_detail_data['sell_quantity'] = $v_content->qty;
                    $invoide_detail_data['prod_price'] = $v_content->price;
                    DB::table('invoice_detail')->insertGetId($invoide_detail_data);
                }

                // update table product: quantity product

                foreach ($content as $v_content) {

                    // update quantity product
                    $prod_detail = DB::table('product')->where('product.prod_id', $v_content->id)->get();

                    $product = array();
                    $product['prod_name'] = $v_content->name;
                    $product['prod_desc'] = $prod_detail[0]->prod_desc;
                    $product['prod_numofpages'] = $prod_detail[0]->prod_numofpages;
                    $product['prod_size'] = $prod_detail[0]->prod_size;
                    $product['prod_datepublished'] = $prod_detail[0]->prod_datepublished;
                    $product['prod_price'] = $prod_detail[0]->prod_price;
                    $product['status_id'] = $prod_detail[0]->status_id;
                    $product['author_id'] = $prod_detail[0]->author_id;
                    $product['supplier_id'] = $prod_detail[0]->supplier_id;
                    $product['thumbnail'] = $prod_detail[0]->thumbnail;
                    $product['type_id'] = $prod_detail[0]->type_id;
                    $product['prod_quantity'] = $prod_detail[0]->prod_quantity - $v_content->qty;

                    DB::table('product')->where('product.prod_id', $prod_detail[0]->prod_id)->update($product);
                }

                // insert invoice_status
                $invoice_status = array();
                $invoice_status['invoice_id'] = $invoice_id;
                $invoice_status['status_detail_id'] = '1';
                $invoice_status['status_date'] = Carbon::now();
                DB::table('invoice_status')->insert($invoice_status);

                Cart::destroy();
                $cate_product = DB::table('category')->orderBy('cate_id', 'asc')->get();
                $status_product = DB::table('product_status')->orderBy('status_id', 'asc')->get();
                $type_product = DB::table('type')->orderBy('type_id', 'asc')->get();

                $acc_id = Session::get('acc_id');
                return view('pages.checkout.handcash')->with('category', $cate_product)->with('status_prod', $status_product)->with('prod_type', $type_product)->with('acc_id', $acc_id);
            }
        } else {
            Session::put('error', 'Số lượng đặt hàng vượt quá số lượng trong kho');
            return view('/show-cart');
        }
    }
}
