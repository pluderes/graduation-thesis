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

class deliveryManager extends Controller
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

    // delivery
    public function delivery_all_invoice()
    {
        $this->checkLogin();
        $delivery_all_invoice = DB::table('invoice')
            ->join('account', 'invoice.acc_id', '=', 'account.acc_id')
            ->join('delivery', 'invoice.deli_id', '=', 'delivery.deli_id')
            ->where('invoice.current_status', '=', 'Đơn hàng đã xuất kho')
            ->select('invoice.*', 'account.acc_name', 'delivery.deli_address',)
            ->orderBy('invoice.invoice_id', 'desc')->get();
        $manager_delivery = view('delivery.show.delivery_all_invoice')->with('all_invoice', $delivery_all_invoice);

        // echo '<pre>';
        // print_r($delivery_all_invoice);
        // echo '</pre>';

        return view('deliveryLayout')->with('delivery.show.delivery_all_invoice', $manager_delivery);
    }
    public function delivery_detail_invoice($invoice_id)
    {
        $this->checkLogin();

        $info_account =  DB::table('invoice')
            ->join('delivery', 'invoice.deli_id', '=', 'delivery.deli_id')
            ->join('account', 'delivery.acc_id', '=', 'account.acc_id')
            ->where('invoice.invoice_id', $invoice_id)->get();

        $status = DB::table('invoice')
            ->join('invoice_status', 'invoice.invoice_id', '=', 'invoice_status.invoice_id')
            ->join('invoice_status_detail', 'invoice_status.status_detail_id', '=', 'invoice_status_detail.status_detail_id')
            ->select('invoice_status.*', 'invoice_status_detail.*')
            ->where('invoice.invoice_id', $invoice_id)->get();

        $invoice_by_ID = DB::table('invoice')
            ->join('delivery', 'invoice.deli_id', '=', 'delivery.deli_id')
            ->join('account', 'delivery.acc_id', '=', 'account.acc_id')
            ->join('invoice_detail', 'invoice.invoice_id', '=', 'invoice_detail.invoice_id')
            ->select('delivery.*', 'invoice.*', 'invoice_detail.*', 'account.*')
            ->orderBy('invoice.invoice_id', 'desc')->where('invoice.invoice_id', $invoice_id)->get();

        $manager_invoice = view('delivery.detail.delivery_detail_invoice')->with('invoice_by_id', $invoice_by_ID)->with('info_account', $info_account)->with('invoice_status', $status)->with('status_detail', $status);

        // echo '<pre>';
        // print_r($invoice_by_ID);
        // echo '</pre>';
        return view('deliveryLayout')->with('delivery.detail.detail_invoice', $manager_invoice);
    }

    // ----------------------------------------------------------------------------
    // ship
    public function delivery_add_ship(Request $request, $invoice_id)
    {
        $this->checkLogin();
        // table shipper

        $ship = DB::table('shipper')->where('shipper.invoice_id', '=', $invoice_id, 'and', 'shipper.acc_id', '=', Session::get('acc_id'))->count();

        // echo '<pre>';
        // print_r($ship);
        // echo '</pre>';
        if ($ship < 1) {
            $data = array();
            $data['invoice_id'] = $invoice_id;
            $data['acc_id'] = Session::get('acc_id');
            $data['ship_date'] = Carbon::now();

            DB::table('shipper')->insert($data);
        } else {
        }
        // table invoice_status
        $data_invoice_status = array();
        $data_invoice_status['invoice_id'] = $invoice_id;
        $data_invoice_status['status_detail_id'] = '5';
        $data_invoice_status['status_date'] = Carbon::now();

        DB::table('invoice_status')->insert($data_invoice_status);

        // table invoice
        // update table invoice
        $info_account =  DB::table('invoice')->where('invoice.invoice_id', $invoice_id)->get();

        $invoice = array();
        $invoice['acc_id'] = $info_account[0]->acc_id;
        $invoice['deli_id'] = $info_account[0]->deli_id;
        $invoice['payment_id'] = $info_account[0]->payment_id;
        $invoice['invoice_total'] = $info_account[0]->invoice_total;
        $invoice['invoice_date_time'] = $info_account[0]->invoice_date_time;
        $invoice['current_status'] = 'Đang giao hàng';

        DB::table('invoice')->where('invoice.invoice_id', $invoice_id)->update($invoice);

        Session::put('message', 'Đã nhận giao đơn hàng!');

        // echo '<pre>';
        // print_r($data_invoice_status);
        // echo '</pre>';
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';

        return Redirect::to('/delivery-all-invoice');
    }

    public function delivery_delete_ship(Request $request, $invoice_id)
    {
        $this->checkLogin();
        // table shipper
        DB::table('shipper')->where('shipper.invoice_id',$invoice_id)->delete();

        // table invoice_status
        $data_invoice_status = array();
        $data_invoice_status['invoice_id'] = $invoice_id;
        $data_invoice_status['status_detail_id'] = '4';
        $data_invoice_status['status_date'] = Carbon::now();

        DB::table('invoice_status')->insert($data_invoice_status);

        // table invoice
        // update table invoice
        $info_account =  DB::table('invoice')->where('invoice.invoice_id', $invoice_id)->get();

        $invoice = array();
        $invoice['acc_id'] = $info_account[0]->acc_id;
        $invoice['deli_id'] = $info_account[0]->deli_id;
        $invoice['payment_id'] = $info_account[0]->payment_id;
        $invoice['invoice_total'] = $info_account[0]->invoice_total;
        $invoice['invoice_date_time'] = $info_account[0]->invoice_date_time;
        $invoice['current_status'] = 'Đơn hàng đã xuất kho';

        DB::table('invoice')->where('invoice.invoice_id', $invoice_id)->update($invoice);

        Session::put('message', 'Đã hủy giao đơn hàng!');

        // echo '<pre>';
        // print_r($data_invoice_status);
        // echo '</pre>';
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';

        return Redirect::to('/delivery-invoice-received');
    }

    // --------------------------------------------------------------------------------------------
    // received
    public function delivery_invoice_received()
    {
        $this->checkLogin();
        $ship_id = Session::get('acc_id');
        $delivery_all_invoice = DB::table('invoice')
            ->join('account', 'invoice.acc_id', '=', 'account.acc_id')
            ->join('delivery', 'invoice.deli_id', '=', 'delivery.deli_id')
            ->join('shipper', 'invoice.invoice_id', '=', 'shipper.invoice_id')
            ->where('shipper.acc_id', $ship_id)
            ->select('invoice.*', 'account.acc_name', 'delivery.deli_address',)
            ->orderBy('invoice.invoice_id', 'desc')->get();
        $manager_delivery = view('delivery.order.delivery_shipper')->with('all_invoice', $delivery_all_invoice);

        // echo '<pre>';
        // print_r($delivery_all_invoice);
        // echo '</pre>';

        return view('deliveryLayout')->with('delivery.order.delivery_shipper', $manager_delivery);
    }
    public function delivery_detail_invoice_received($invoice_id)
    {
        $this->checkLogin();

        $info_account =  DB::table('invoice')
            ->join('delivery', 'invoice.deli_id', '=', 'delivery.deli_id')
            ->join('account', 'delivery.acc_id', '=', 'account.acc_id')
            ->where('invoice.invoice_id', $invoice_id)->get();

        $status = DB::table('invoice')
            ->join('invoice_status', 'invoice.invoice_id', '=', 'invoice_status.invoice_id')
            ->join('invoice_status_detail', 'invoice_status.status_detail_id', '=', 'invoice_status_detail.status_detail_id')
            ->select('invoice_status.*', 'invoice_status_detail.*')
            ->where('invoice.invoice_id', $invoice_id)->get();

        $invoice_by_ID = DB::table('invoice')
            ->join('delivery', 'invoice.deli_id', '=', 'delivery.deli_id')
            ->join('account', 'delivery.acc_id', '=', 'account.acc_id')
            ->join('invoice_detail', 'invoice.invoice_id', '=', 'invoice_detail.invoice_id')
            ->select('delivery.*', 'invoice.*', 'invoice_detail.*', 'account.*')
            ->orderBy('invoice.invoice_id', 'desc')->where('invoice.invoice_id', $invoice_id)->get();

        $manager_invoice = view('delivery.detail.delivery_detail_invoice_received')->with('invoice_by_id', $invoice_by_ID)->with('info_account', $info_account)->with('invoice_status', $status)->with('status_detail', $status);

        // echo '<pre>';
        // print_r($invoice_by_ID);
        // echo '</pre>';
        return view('deliveryLayout')->with('delivery.detail.delivery_detail_invoice_received', $manager_invoice);
    }

    public function delivery_update_status_invoice_received(Request $request, $invoice_id)
    {
        $this->checkLogin();

        // update table invoice
        $info_invocie =  DB::table('invoice')->where('invoice.invoice_id', $invoice_id)->get();
        // update quantity product
        $prod_detail = DB::table('product')
            ->join('invoice_detail', 'product.prod_id', '=', 'invoice_detail.prod_id')
            ->join('invoice', 'invoice.invoice_id', '=', 'invoice_detail.invoice_id')
            ->where('invoice.invoice_id', $invoice_id)->get();

        // check quantity

        if ($request->invoice_status == 6) {

            // insert table invoice_status
            $data = array();
            $data['invoice_id'] = $invoice_id;
            $data['status_detail_id'] = '6';
            $data['status_date'] = Carbon::now();

            DB::table('invoice_status')->where('invoice_status.invoice_id', $invoice_id)->insert($data);

            // update status table invoice: status
            $invoice = array();
            $invoice['acc_id'] = $info_invocie[0]->acc_id;
            $invoice['deli_id'] = $info_invocie[0]->deli_id;
            $invoice['payment_id'] = $info_invocie[0]->payment_id;
            $invoice['invoice_total'] = $info_invocie[0]->invoice_total;
            $invoice['current_status'] = 'Giao hàng thành công';
            $invoice['invoice_date_time'] = $info_invocie[0]->invoice_date_time;

            DB::table('invoice')->where('invoice.invoice_id', $invoice_id)->update($invoice);

            Session::put('message', 'Cập nhật đơn hàng thành công!');
        } else if ($request->invoice_status == 7) {

            // update status table invoice_status
            $invoice['current_status'] = 'Giao hàng thất bại';

            // insert table invoice_status
            $data = array();
            $data['invoice_id'] = $invoice_id;
            $data['status_detail_id'] = '7';
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
            $invoice['current_status'] = 'Giao hàng thất bại';
            $invoice['invoice_date_time'] = $info_invocie[0]->invoice_date_time;

            DB::table('invoice')->where('invoice.invoice_id', $invoice_id)->update($invoice);

            Session::put('message', 'Cập nhật đơn hàng thành công!');
        }

        // echo '<pre>';
        // print_r($product);
        // print_r($test);
        // echo '</pre>';

        return Redirect::to('/delivery-invoice-received');
    }

    // ----------------------------------------------------------------
    // delivered
    public function delivery_invoice_delivered()
    {
        $this->checkLogin();
        $delivery_all_invoice = DB::table('invoice')
            ->join('account', 'invoice.acc_id', '=', 'account.acc_id')
            ->join('delivery', 'invoice.deli_id', '=', 'delivery.deli_id')
            ->join('shipper', 'invoice.invoice_id', '=', 'shipper.invoice_id')
            ->join('invoice_status', 'invoice.invoice_id', '=', 'invoice_status.invoice_id')
            ->where('invoice_status.status_detail_id', '>', '5')
            ->select('invoice.*', 'account.acc_name', 'delivery.deli_address')
            ->orderBy('invoice.invoice_id', 'desc')->get();
        $manager_delivery = view('delivery.order.delivery_delivered')->with('all_invoice', $delivery_all_invoice);

        // echo '<pre>';
        // print_r($delivery_all_invoice);
        // echo '</pre>';

        return view('deliveryLayout')->with('delivery.order.delivery_delivered', $manager_delivery);
    }

    public function delivery_detail_invoice_delivered($invoice_id)
    {
        $this->checkLogin();

        $info_account =  DB::table('invoice')
            ->join('delivery', 'invoice.deli_id', '=', 'delivery.deli_id')
            ->join('account', 'delivery.acc_id', '=', 'account.acc_id')
            ->where('invoice.invoice_id', $invoice_id)->get();

        $status = DB::table('invoice')
            ->join('invoice_status', 'invoice.invoice_id', '=', 'invoice_status.invoice_id')
            ->join('invoice_status_detail', 'invoice_status.status_detail_id', '=', 'invoice_status_detail.status_detail_id')
            ->select('invoice_status.*', 'invoice_status_detail.*')
            ->where('invoice.invoice_id', $invoice_id)->get();

        $invoice_by_ID = DB::table('invoice')
            ->join('delivery', 'invoice.deli_id', '=', 'delivery.deli_id')
            ->join('account', 'delivery.acc_id', '=', 'account.acc_id')
            ->join('invoice_detail', 'invoice.invoice_id', '=', 'invoice_detail.invoice_id')
            ->select('delivery.*', 'invoice.*', 'invoice_detail.*', 'account.*')
            ->orderBy('invoice.invoice_id', 'desc')->where('invoice.invoice_id', $invoice_id)->get();

        $manager_invoice = view('delivery.detail.delivery_detail_invoice_delivered')->with('invoice_by_id', $invoice_by_ID)->with('info_account', $info_account)->with('invoice_status', $status)->with('status_detail', $status);

        // echo '<pre>';
        // print_r($invoice_by_ID);
        // echo '</pre>';
        return view('deliveryLayout')->with('delivery.detail.delivery_detail_invoice_deliverved', $manager_invoice);
    }

    // -----------------------------------------------------------------------
}
