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

class orderManager extends Controller
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
    // invoice
    public function all_invoice()
    {
        $this->checkLogin();
        $all_invoice = DB::table('invoice')->join('account', 'invoice.acc_id', '=', 'account.acc_id')->select('invoice.*', 'account.acc_name')->orderBy('invoice.invoice_id', 'desc')->get();
        $manager_invoice = view('invoice.show.order_all_invoice')->with('all_invoice', $all_invoice);

        return view('orderLayout')->with('invoice.show.order_all_invoice', $manager_invoice);
    }
    public function edit_invoice($invoice_id)
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

        $status_detail = DB::table('invoice_status_detail')
            ->orderBy('invoice_status_detail.status_detail_id', 'asc')->get();

        $manager_invoice = view('invoice.edit.order_edit_invoice')
        ->with('invoice_by_id', $invoice_by_ID)
        ->with('info_account', $info_account)
        ->with('invoice_status', $status)
        ->with('status_detail', $status_detail)
        ->with('inv', $invoice_id);

        // echo '<pre>';
        // print_r($invoice_by_ID);
        // echo '</pre>';
        return view('orderLayout')->with('invoice.edit.edit_invoice', $manager_invoice);
    }

    public function update_status_invoice(Request $request, $invoice_id)
    {
        $this->checkLogin();
        // update table invoice_status
        $data = array();
        $data['invoice_id'] = $invoice_id;
        $data['status_detail_id'] = $request->invoice_status;
        $data['status_date'] = Carbon::now();
        DB::table('invoice_status')->insert($data);

        // update table invoice
        $info_account =  DB::table('invoice')->where('invoice.invoice_id', $invoice_id)->get();

        $invoice = array();
        $invoice['acc_id'] = $info_account[0]->acc_id;
        $invoice['deli_id'] = $info_account[0]->deli_id;
        $invoice['payment_id'] = $info_account[0]->payment_id;
        $invoice['invoice_total'] = $info_account[0]->invoice_total;
        $invoice['invoice_date_time'] = $info_account[0]->invoice_date_time;
        if ($request->invoice_status == '2') {
            $invoice['current_status'] = 'Người gửi đang chuẩn bị hàng';
        } else if ($request->invoice_status == '3') {
            $invoice['current_status'] = 'Lấy hàng thành công';
        } else if ($request->invoice_status == '4') {
            $invoice['current_status'] = 'Đơn hàng đã xuất kho';
        } else if ($request->invoice_status == '5') {
            $invoice['current_status'] = 'Đang giao hàng';
        } else if ($request->invoice_status == '6') {
            $invoice['current_status'] = 'Giao hàng thành công';
        } else if ($request->invoice_status == '7') {
            $invoice['current_status'] = 'Giao hàng thất bại';
        }
        DB::table('invoice')->where('invoice.invoice_id', $invoice_id)->update($invoice);

        Session::put('message1', 'Cập nhật tình trạng đơn hàng thành công!');

        return Redirect::to('/order-edit-invoice/' . $invoice_id);
    }
    // end invoice
    // -------------------------------------------------------------------------------------------
}
