<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Illuminate\Contracts\Session\Session as SessionSession;

session_start();

class infoController extends Controller
{
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

    public function info_account($acc_id)
    {
        $this->checkLogin();
        $info_account = DB::table('account')->where('account.acc_id', $acc_id)->get();
        $all_invoice = DB::table('invoice')->join('account', 'invoice.acc_id', '=', 'account.acc_id')->where('invoice.acc_id', $acc_id)->orderBy('invoice.invoice_id', 'desc')->get();
        $manager_invoice = view('pages.info_account.all_invoice')->with('all_invoice', $all_invoice)->with('info', $info_account);

        return view('information')->with('pages.info_account.all_invoice', $manager_invoice);
    }

    public function customer_detail_invoice($invoice_id)
    {
        $this->checkLogin();

        $info_account =  DB::table('invoice')
            ->join('delivery', 'invoice.deli_id', '=', 'delivery.deli_id')
            ->join('account', 'delivery.acc_id', '=', 'account.acc_id')
            ->where('invoice.invoice_id', $invoice_id)->get();

        $status = DB::table('invoice')
            ->join('invoice_status', 'invoice.invoice_id', '=', 'invoice_status.invoice_id')
            ->join('invoice_status_detail', 'invoice_status.status_detail_id', '=', 'invoice_status_detail.status_detail_id')
            ->join('shipper', 'shipper.invoice_id', '=', 'invoice.invoice_id')
            ->join('account', 'account.acc_id', '=', 'shipper.acc_id')
            ->select('invoice_status.*', 'invoice_status_detail.*', 'account.*')
            ->where('invoice.invoice_id', $invoice_id)->get();

        $invoice_by_ID = DB::table('invoice')
            ->join('delivery', 'invoice.deli_id', '=', 'delivery.deli_id')
            ->join('account', 'delivery.acc_id', '=', 'account.acc_id')
            ->join('invoice_detail', 'invoice.invoice_id', '=', 'invoice_detail.invoice_id')
            ->select('delivery.*', 'invoice.*', 'invoice_detail.*', 'account.*')
            ->orderBy('invoice.invoice_id', 'desc')->where('invoice.invoice_id', $invoice_id)->get();

        $status_detail = DB::table('invoice_status_detail')
            ->orderBy('invoice_status_detail.status_detail_id', 'asc')->get();

        $manager_invoice = view('pages.info_account.customer_detail_invoice')->with('invoice_by_id', $invoice_by_ID)->with('info_account', $info_account)->with('invoice_status', $status)->with('status_detail', $status_detail);

        // echo '<pre>';
        // print_r($invoice_by_ID);
        // echo '</pre>';
        return view('information')->with('pages.info_account.customer_detail_invoice', $manager_invoice);
    }

    public function customer_cancel_invoice($invoice_id)
    {
        $this->checkLogin();

        // update table invoice
        $info_invocie =  DB::table('invoice')->where('invoice.invoice_id', $invoice_id)->get();
        // update quantity product
        $prod_detail = DB::table('product')
            ->join('invoice_detail', 'product.prod_id', '=', 'invoice_detail.prod_id')
            ->join('invoice', 'invoice.invoice_id', '=', 'invoice_detail.invoice_id')
            ->where('invoice.invoice_id', $invoice_id)->get();

        // // update status table invoice_status
        // $invoice['current_status'] = 'Đã hủy đơn hàng';

        // insert table invoice_status
        $data = array();
        $data['invoice_id'] = $invoice_id;
        $data['status_detail_id'] = '8';
        $data['status_date'] = Carbon::now();

        DB::table('invoice_status')->insert($data);

        // update table product prod_quantity
        $product = array();
        $product['prod_name'] = $prod_detail[0]->prod_name;
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
        $product['prod_quantity'] = $prod_detail[0]->prod_quantity + $prod_detail[0]->sell_quantity;

        DB::table('product')->where('product.prod_id', $prod_detail[0]->prod_id)->update($product);

        // update status table invoice: status
        $invoice = array();
        $invoice['acc_id'] = $info_invocie[0]->acc_id;
        $invoice['deli_id'] = $info_invocie[0]->deli_id;
        $invoice['payment_id'] = $info_invocie[0]->payment_id;
        $invoice['invoice_total'] = $info_invocie[0]->invoice_total;
        $invoice['current_status'] = 'Đã hủy đơn hàng';
        $invoice['invoice_date_time'] = $info_invocie[0]->invoice_date_time;

        DB::table('invoice')->where('invoice.invoice_id', $invoice_id)->update($invoice);

        Session::put('message', 'Hủy đơn hàng thành công!');


        // echo '<pre>';
        // print_r($product);
        // print_r($test);
        // echo '</pre>';
        $acc_id = Session::get('acc_id');

        return Redirect::to('/info/' . $acc_id);
    }

    public function add_wishlist($prod_id)
    {
        $product = DB::table('product')->where('product.prod_id', $prod_id)->get();
        $wishlist = array();
        $wishlist['prod_id'] = $prod_id;
        $wishlist['prod_name'] = $product[0]->prod_name;
        $wishlist['acc_id'] = Session::get('acc_id');

        $count_list = DB::table('wishlist')->count();
        $list = DB::table('wishlist')->orderBy('list_id', 'asc')->get();
        if ($count_list > 0) {
            $prod_by_id = DB::table('wishlist')->where('wishlist.prod_id', $prod_id)->count();
            if ($prod_by_id>0) {
                return redirect()->back()->with('message', 'Đã có sách này trong danh sách ưu thích!');
            } else {
                DB::table('wishlist')->insert($wishlist);
                return redirect()->back()->with('message', 'Đã thêm sách này vào danh sách ưu thích!');
            }
        } else {
            DB::table('wishlist')->insert($wishlist);
            return redirect()->back()->with('message', 'Đã thêm sách này vào danh sách ưu thích!');
        }

        // echo '<pre>';
        // print_r($list);
        // echo '</pre>';
    }

    public function show_wishlist($acc_id)
    {
        $cate_product = DB::table('category')->orderBy('cate_id', 'asc')->get();
        $status_product = DB::table('product_status')->orderBy('status_id', 'asc')->get();
        $type_product = DB::table('type')->orderBy('type_id', 'asc')->get();
        $wishlist = DB::table('wishlist')->join('product', 'product.prod_id', '=', 'wishlist.prod_id')->where('wishlist.acc_id', $acc_id)->get();

        // echo '<pre>';
        // print_r($wishlist);
        // echo '</pre>';
        return view('pages.info_account.wishlist')->with('category', $cate_product)->with('status_prod', $status_product)->with('prod_type', $type_product)->with('wishlist', $wishlist);
    }

    public function delete_prod_wishlist($prod_id)
    {
        $acc_id = Session::get('acc_id');
        DB::table('wishlist')->where('wishlist.prod_id', $prod_id)->delete();
        return Redirect::to('/wishlist/' . $acc_id)->with('message', 'Đã xóa sách này trong danh sách ưu thích!');
    }
}
