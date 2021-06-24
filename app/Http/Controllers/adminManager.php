<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Cart;
use App\Exports\Export;
use Excel;
use App\Models\invoice;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\App;
use PDF;

session_start();

class adminManager extends Controller
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
    // admin managerment
    // inventory
    // category
    public function all_category()
    {
        $this->checkLogin();
        $all_category = DB::table('category')->get();
        $manager_category = view('adminManager.inventoryManager.show.all_category')->with('all_cate', $all_category);

        return view('adminLayout')->with('adminManager.inventoryManager.show.all_category', $manager_category);
    }
    public function add_category()
    {
        $this->checkLogin();
        return view('adminManager.inventoryManager.add.add_category');
    }
    public function save_category(Request $request)
    {
        $this->checkLogin();
        $data = array();
        $data['cate_name'] = $request->cate_name;
        $data['cate_desc'] = $request->cate_desc;

        DB::table('category')->insert($data);

        Session::put('message', 'Thêm danh mục sách thành công!');

        return Redirect::to('/admin-add-category');
    }
    public function edit_category($cate_id)
    {
        $this->checkLogin();
        $edit_category = DB::table('category')->where('cate_id', $cate_id)->get();
        $manager_category = view('adminManager.inventoryManager.edit.edit_category')->with('edit_category', $edit_category);

        return view('adminLayout')->with('adminManager.inventoryManager.edit.edit_category', $manager_category);
    }
    public function update_category(Request $request, $cate_id)
    {
        $this->checkLogin();
        $data = array();
        $data['cate_name'] = $request->cate_name;
        $data['cate_desc'] = $request->cate_desc;

        DB::table('category')->where('cate_id', $cate_id)->update($data);

        Session::put('message', 'Cập nhật danh mục sách thành công!');
        return Redirect::to('/admin-all-category');
    }
    public function delete_category($cate_id)
    {
        $this->checkLogin();
        DB::table('category')->where('cate_id', $cate_id)->delete();

        Session::put('message', 'Xóa danh mục sách thành công!');
        return Redirect::to('/admin-all-category');
    }
    // end category
    // ----------------------------------------------------------------------------------------------------
    // type
    public function all_type()
    {
        $this->checkLogin();
        $all_type = DB::table('type')->get();
        $manager_type = view('adminManager.inventoryManager.show.all_type')->with('all_type', $all_type);

        return view('adminLayout')->with('adminManager.inventoryManager.show.all_category', $manager_type);
    }
    public function add_type()
    {
        $this->checkLogin();
        $category = DB::table('category')->get();
        $manager_type = view('adminManager.inventoryManager.add.add_type')->with('category', $category);

        return view('adminLayout')->with('adminManager.inventoryManager.add.add_type', $manager_type);
    }
    public function save_type(Request $request)
    {
        $this->checkLogin();
        $data = array();
        $data['type_name'] = $request->type_name;
        $data['type_desc'] = $request->type_desc;
        $data['cate_id'] = $request->cate_id;

        DB::table('type')->insert($data);

        Session::put('message', 'Thêm loại sách thành công!');

        return Redirect::to('/admin-add-type');
    }
    public function edit_type($type_id)
    {
        $this->checkLogin();
        $edit_type = DB::table('type')->where('type_id', $type_id)->get();
        $category = DB::table('category')->get();
        $manager_type = view('adminManager.inventoryManager.edit.edit_type')->with('edit_type', $edit_type)->with('category', $category);

        return view('adminLayout')->with('adminManager.inventoryManager.edit.edit_type', $manager_type);
    }
    public function update_type(Request $request, $type_id)
    {
        $this->checkLogin();
        $data = array();
        $data['type_name'] = $request->type_name;
        $data['type_desc'] = $request->type_desc;
        $data['cate_id'] = $request->cate_id;

        DB::table('type')->where('type_id', $type_id)->update($data);

        Session::put('message', 'Cập nhật loại sách thành công!');
        return Redirect::to('/admin-all-type');
    }
    public function delete_type($type_id)
    {
        $this->checkLogin();
        DB::table('type')->where('type_id', $type_id)->delete();

        Session::put('message', 'Xóa loại sách thành công!');
        return Redirect::to('/admin-all-type');
    }
    // end type
    // ------------------------------------------------------------------------------------------------
    // status
    public function all_status()
    {
        $this->checkLogin();
        $all_status = DB::table('product_status')->get();
        $manager_status = view('adminManager.inventoryManager.show.all_status')->with('all_status', $all_status);

        return view('adminLayout')->with('adminManager.inventoryManager.show.all_status', $manager_status);
    }
    public function add_status()
    {
        $this->checkLogin();
        return view('adminManager.inventoryManager.add.add_status');
    }
    public function save_status(Request $request)
    {
        $this->checkLogin();
        $data = array();
        $data['status_name'] = $request->status_name;
        $data['status_desc'] = $request->status_desc;

        DB::table('product_status')->insert($data);

        Session::put('message', 'Thêm tình trạng sách thành công!');

        return Redirect::to('/admin-add-status');
    }
    public function edit_status($status_id)
    {
        $this->checkLogin();
        $edit_status = DB::table('product_status')->where('status_id', $status_id)->get();
        $manager_status = view('adminManager.inventoryManager.edit.edit_status')->with('edit_status', $edit_status);

        return view('adminLayout')->with('adminManager.inventoryManager.edit.edit_status', $manager_status);
    }
    public function update_status(Request $request, $status_id)
    {
        $this->checkLogin();
        $data = array();
        $data['status_name'] = $request->status_name;
        $data['status_desc'] = $request->status_desc;

        DB::table('product_status')->where('status_id', $status_id)->update($data);

        Session::put('message', 'Cập nhật tình trạng sách thành công!');
        return Redirect::to('/admin-all-status');
    }
    public function delete_status($status_id)
    {
        $this->checkLogin();
        DB::table('product_status')->where('status_id', $status_id)->delete();

        Session::put('message', 'Xóa tình trạng sách thành công!');
        return Redirect::to('/admin-all-status');
    }
    // end status
    // -------------------------------------------------------------------------------------------------
    // author
    public function all_author()
    {
        $this->checkLogin();
        $all_author = DB::table('author')->get();
        $manager_author = view('adminManager.inventoryManager.show.all_author')->with('all_author', $all_author);

        return view('adminLayout')->with('adminManager.inventoryManager.show.all_author', $manager_author);
    }
    public function add_author()
    {
        $this->checkLogin();
        return view('adminManager.inventoryManager.add.add_author');
    }
    public function save_author(Request $request)
    {
        $this->checkLogin();
        $data = array();
        $data['author_name'] = $request->author_name;
        $data['author_introduce'] = $request->author_desc;

        DB::table('author')->insert($data);

        Session::put('message', 'Thêm tác giả thành công!');

        return Redirect::to('/admin-add-author');
    }
    public function edit_author($author_id)
    {
        $this->checkLogin();
        $edit_author = DB::table('author')->where('author_id', $author_id)->get();
        $manager_author = view('adminManager.inventoryManager.edit.edit_author')->with('edit_author', $edit_author);

        return view('adminLayout')->with('adminManager.inventoryManager.edit.edit_author', $manager_author);
    }
    public function update_author(Request $request, $author_id)
    {
        $this->checkLogin();
        $data = array();
        $data['author_name'] = $request->author_name;
        $data['author_introduce'] = $request->author_desc;

        DB::table('author')->where('author_id', $author_id)->update($data);

        Session::put('message', 'Cập nhật tác giả thành công!');
        return Redirect::to('/admin-all-author');
    }
    public function delete_author($author_id)
    {
        $this->checkLogin();
        DB::table('author')->where('author_id', $author_id)->delete();

        Session::put('message', 'Xóa tác giả thành công!');
        return Redirect::to('/admin-all-author');
    }
    // end author
    // -----------------------------------------------------------------------------------------------
    // supplier
    public function all_supplier()
    {
        $this->checkLogin();
        $all_supplier = DB::table('supplier')->get();
        $manager_supplier = view('adminManager.inventoryManager.show.all_supplier')->with('all_supplier', $all_supplier);

        return view('adminLayout')->with('adminManager.inventoryManager.show.all_supplier', $manager_supplier);
    }
    public function add_supplier()
    {
        $this->checkLogin();
        return view('adminManager.inventoryManager.add.add_supplier');
    }
    public function save_supplier(Request $request)
    {
        $this->checkLogin();
        $data = array();
        $data['supplier_name'] = $request->supplier_name;
        $data['supplier_contact'] = $request->supplier_contact;
        $data['supplier_addr'] = $request->supplier_address;

        DB::table('supplier')->insert($data);

        Session::put('message', 'Thêm nhà xuất bản thành công!');

        return Redirect::to('/admin-add-supplier');
    }
    public function edit_supplier($supplier_id)
    {
        $this->checkLogin();
        $edit_supplier = DB::table('supplier')->where('supplier_id', $supplier_id)->get();
        $manager_supplier = view('adminManager.inventoryManager.edit.edit_supplier')->with('edit_supplier', $edit_supplier);

        return view('adminLayout')->with('adminManager.inventoryManager.edit.edit_supplier', $manager_supplier);
    }
    public function update_supplier(Request $request, $supplier_id)
    {
        $this->checkLogin();
        $data = array();
        $data['supplier_name'] = $request->supplier_name;
        $data['supplier_contact'] = $request->supplier_contact;
        $data['supplier_addr'] = $request->supplier_address;

        DB::table('supplier')->where('supplier_id', $supplier_id)->update($data);

        Session::put('message', 'Cập nhật nhà xuất bản thành công!');
        return Redirect::to('/admin-all-supplier');
    }
    public function delete_supplier($supplier_id)
    {
        $this->checkLogin();
        DB::table('supplier')->where('supplier_id', $supplier_id)->delete();

        Session::put('message', 'Xóa nhà xuất bản thành công!');
        return Redirect::to('/admin-all-supplier');
    }
    // end supplier
    // --------------------------------------------------------------------------------------------------
    // product
    public function all_product()
    {
        $this->checkLogin();
        $all_product = DB::table('product')->get();
        $manager_product = view('adminManager.inventoryManager.show.all_product')->with('all_product', $all_product);

        return view('adminLayout')->with('adminManager.inventoryManager.show.all_product', $manager_product);
    }
    public function add_product()
    {
        $this->checkLogin();
        $type = DB::table('type')->get();
        $supplier = DB::table('supplier')->get();
        $author = DB::table('author')->get();
        $status = DB::table('product_status')->get();
        $manager_product = view('adminManager.inventoryManager.add.add_product')->with('type', $type)->with('supplier', $supplier)->with('author', $author)->with('status', $status);

        return view('adminLayout')->with('adminManager.inventoryManager.add.add_product', $manager_product);
    }
    public function save_product(Request $request)
    {
        $this->checkLogin();
        $data = array();
        $data['prod_name'] = $request->product_name;
        $data['prod_desc'] = $request->product_desc;
        $data['prod_numofpages'] = $request->product_numofpages;
        $data['prod_size'] = $request->product_size;
        $data['prod_datepublished'] = $request->product_datepublished;
        $data['prod_price'] = $request->product_price;
        $data['prod_quantity'] = $request->product_quantity;
        $data['status_id'] = $request->status_id;
        $data['author_id'] = $request->author_id;
        $data['supplier_id'] = $request->supplier_id;
        $data['type_id'] = $request->type_id;
        $get_image = $request->file('product_thumbnail');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/Upload/product', $new_image);
            $data['thumbnail'] = $new_image;

            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';

            DB::table('product')->insert($data);
            Session::put('message', 'Thêm sách thành công!');

            return Redirect::to('/admin-add-product');
        } else {
            $data['thumbnail'] = 'null';

            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';

            DB::table('product')->insert($data);
            Session::put('message', 'Thêm sách thành công!');

            return Redirect::to('/admin-add-product');
        }
    }
    public function edit_product($product_id)
    {
        $this->checkLogin();
        $edit_product = DB::table('product')->where('prod_id', $product_id)->get();
        $type = DB::table('type')->get();
        $supplier = DB::table('supplier')->get();
        $author = DB::table('author')->get();
        $status = DB::table('product_status')->get();
        $manager_product = view('adminManager.inventoryManager.edit.edit_product')->with('edit_product', $edit_product)->with('type', $type)->with('supplier', $supplier)->with('author', $author)->with('status', $status);

        return view('adminLayout')->with('adminManager.inventoryManager.edit.edit_product', $manager_product);
    }
    public function update_product(Request $request, $product_id)
    {
        $this->checkLogin();
        $data = array();
        $data['prod_name'] = $request->product_name;
        $data['prod_desc'] = $request->product_desc;
        $data['prod_numofpages'] = $request->product_numofpages;
        $data['prod_size'] = $request->product_size;
        $data['prod_datepublished'] = $request->product_datepublished;
        $data['prod_price'] = $request->product_price;
        $data['prod_quantity'] = $request->product_quantity;
        $data['status_id'] = $request->status_id;
        $data['author_id'] = $request->author_id;
        $data['supplier_id'] = $request->supplier_id;
        // $data['thumbnail'] = $request->product_thumbnail;
        $data['type_id'] = $request->type_id;

        // DB::table('product')->where('prod_id', $product_id)->update($data);

        // Session::put('message', 'Cập nhật sách thành công!');
        // return Redirect::to('/admin-all-product');

        $get_image = $request->file('inpthumbnail');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/Upload/product', $new_image);
            $data['thumbnail'] = $new_image;

            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';

            DB::table('product')->where('prod_id', $product_id)->update($data);

            Session::put('message', 'Cập nhật sách thành công!');
            return Redirect::to('/admin-all-product');
        } else {
            $data['thumbnail'] = $request->product_thumbnail;

            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';

            DB::table('product')->where('prod_id', $product_id)->update($data);

            Session::put('message', 'Cập nhật sách thành công!');
            return Redirect::to('/admin-all-product');
        }
    }
    public function delete_product($product_id)
    {
        $this->checkLogin();
        DB::table('product')->where('prod_id', $product_id)->delete();

        Session::put('message', 'Xóa sách thành công!');
        return Redirect::to('/admin-all-product');
    }

    // end inventory
    // ----------------------------------------------------------------------------------------
    // account
    public function all_account()
    {
        $this->checkLogin();
        $all_account = DB::table('account')->get();
        $manager_account = view('adminManager.accountManager.show.all_account')->with('all_account', $all_account);

        return view('adminLayout')->with('adminManager.accountManager.show.all_account', $manager_account);
    }
    public function add_account()
    {
        $this->checkLogin();
        $perm = DB::table('set_permission')->get();
        $manager_account = view('adminManager.accountManager.add.add_account')->with('perm', $perm);

        return view('adminLayout')->with('adminManager.accountManager.add.add_account', $manager_account);
    }
    public function save_account(Request $request)
    {
        $this->checkLogin();
        $data = array();
        $data['username'] = $request->user_name;
        $data['password'] = md5($request->password);
        $data['acc_name'] = $request->acc_name;
        $data['acc_email'] = $request->acc_email;
        $data['acc_contact'] = $request->acc_contact;
        $data['perm_id'] = $request->perm_id;
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

            DB::table('account')->insert($data);
            Session::put('message', 'Thêm tài khoản thành công!');

            return Redirect::to('/admin-add-account');
        } else {
            $data['acc_img'] = 'avt-default.jpg';

            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';

            DB::table('account')->insert($data);
            Session::put('message', 'Thêm tài khoản thành công!');

            return Redirect::to('/admin-add-account');
        }
    }
    public function edit_account($acc_id)
    {
        $this->checkLogin();
        $edit_account = DB::table('account')->where('acc_id', $acc_id)->get();
        $perm = DB::table('set_permission')->get();
        $manager_account = view('adminManager.accountManager.edit.edit_account')->with('edit_account', $edit_account)->with('perm', $perm);
        return view('adminLayout')->with('adminManager.accountManager.edit.edit_account', $manager_account);
    }
    public function update_account(Request $request, $acc_id)
    {
        $this->checkLogin();
        $data = array();
        $data['username'] = $request->user_name;
        $data['password'] = md5($request->password);
        $data['acc_name'] = $request->acc_name;
        $data['acc_email'] = $request->acc_email;
        $data['acc_contact'] = $request->acc_contact;
        $data['perm_id'] = $request->perm_id;
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

            DB::table('account')->where('acc_id', $acc_id)->update($data);

            Session::put('message', 'Cập nhật tài khoản thành công!');
            return Redirect::to('/admin-all-account');
        } else {
            $data['acc_img'] = $request->account_thumbnail;

            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            DB::table('account')->where('acc_id', $acc_id)->update($data);

            Session::put('message', 'Cập nhật tài khoản thành công!');
            return Redirect::to('/admin-all-account');
        }
    }
    public function delete_account($acc_id)
    {
        $this->checkLogin();
        DB::table('account')->where('acc_id', $acc_id)->delete();

        Session::put('message', 'Xóa tài khoản thành công!');
        return Redirect::to('/admin-all-account');
    }

    // end account
    // ----------------------------------------------------------------------------------------
    // invoice
    public function all_invoice()
    {
        $this->checkLogin();
        $all_invoice = DB::table('invoice')->join('account', 'invoice.acc_id', '=', 'account.acc_id')->select('invoice.*', 'account.acc_name')->orderBy('invoice.invoice_id', 'desc')->get();
        $manager_invoice = view('adminManager.invoiceManager.show.all_invoice')->with('all_invoice', $all_invoice);

        return view('adminLayout')->with('adminManager.invoiceManager.show.all_invoice', $manager_invoice);
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
            ->join('shipper', 'shipper.invoice_id', '=', 'invoice.invoice_id')
            ->join('account', 'shipper.acc_id', '=', 'account.acc_id')
            ->select('invoice_status.*', 'invoice_status_detail.*', 'shipper.acc_id', 'account.acc_name')
            ->where('invoice.invoice_id', $invoice_id)->get();

        $invoice_by_ID = DB::table('invoice')
            ->join('delivery', 'invoice.deli_id', '=', 'delivery.deli_id')
            ->join('account', 'delivery.acc_id', '=', 'account.acc_id')
            ->join('invoice_detail', 'invoice.invoice_id', '=', 'invoice_detail.invoice_id')
            ->select('delivery.*', 'invoice.*', 'invoice_detail.*', 'account.*')
            ->orderBy('invoice.invoice_id', 'desc')->where('invoice.invoice_id', $invoice_id)->get();

        $status_detail = DB::table('invoice_status_detail')
            ->orderBy('invoice_status_detail.status_detail_id', 'asc')->get();

        $manager_invoice = view('adminManager.invoiceManager.edit.edit_invoice')
            ->with('invoice_by_id', $invoice_by_ID)
            ->with('info_account', $info_account)
            ->with('invoice_status', $status)
            ->with('status_detail', $status_detail)
            ->with('inv', $invoice_id);
        // echo '<pre>';
        // print_r($invoice_by_ID);
        // echo '</pre>';
        return view('adminLayout')->with('adminManager.invoiceManager.edit.edit_invoice', $manager_invoice);
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

        Session::put('message', 'Cập nhật tình trạng đơn hàng thành công!');

        return Redirect::to('/admin-edit-invoice/' . $invoice_id);
    }

    // export excel
    public function export_invoice()
    {
        return Excel::download(new Export, 'all-invoice.xlsx');
    }
    // prinnt-invoice
    public function print_invoice($invoice_id)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_invoice_convert($invoice_id));
        return $pdf->stream();
    }
    public function print_invoice_convert($invoice_id)
    {
        $this->checkLogin();

        $info_account =  DB::table('invoice')
            ->join('delivery', 'invoice.deli_id', '=', 'delivery.deli_id')
            ->join('account', 'delivery.acc_id', '=', 'account.acc_id')
            ->where('invoice.invoice_id', $invoice_id)->first();

        $invoice_by_ID = DB::table('invoice')
            ->join('invoice_detail', 'invoice.invoice_id', '=', 'invoice_detail.invoice_id')
            ->select('invoice.*', 'invoice_detail.*')
            ->orderBy('invoice.invoice_id', 'desc')->where('invoice.invoice_id', $invoice_id)->get();

        $output = '';

        $output .= '
            <style>
            *{
                margin: 0;
                padding: 0;
            }
                body{
                    font-family: DejaVu Sans;
                }
                p{
                    font-size: 12px;
                }
                .div-container{
                    width: 100%;
                    margin-left: -350px;
                }
                .div-left{
                    display: inline-block;
                    text-align: center;
                    padding-top: 50px;
                }
                .div-right{
                    display: inline-block;
                    text-align: center;
                    padding-top: 50px;
                    margin-left: 100px;
                }
                .content{
                    margin-left: 60px;
                }
                .table-style{
                    font-size: 14px;
                    margin-left: 50px;
                    margin-right: 50px;
                    width: 100%;
                    border-collapse: collapse;
                }
                table, td, th {
                    border: 1px solid black;
                }
                td{
                    padding-left: 10px;
                }
            </style>
            <div class="div-container">
              <div class="div-left">
                <h4>
                  Cửa hàng
                </h4>
                <h2>
                    ZORBA SHOP
                </h2>
                <h6>ĐC: Văn Trung - Đông Văn - Đông Sơn - Thanh Hóa</h6>
                <p>SĐT: 0359280808</p>
                <p>Email: manba211198@gmail.com</p>
                <p>Website: www.zorbashop.com</p>
              </div>
              <div class="div-right">
                <h3>HÓA ĐƠN BÁN HÀNG</h3>
                <p>----------*----------</p>
                <p>Mã đơn hàng: ' . $invoice_id . '</p>
                <p>Ngày lập: ' . date("d/m/Y", strtotime($info_account->invoice_date_time)) . '</p>
                <br>
              </div>
            </div>
            <div class="content">
                <div>
                    <h5 style="display: inline-block">Tên khách hàng:<p style="display: inline-block; margin-left: 10px; font-size: 16px">' . $info_account->deli_name . '</p></h5>
                    <p style="display: inline-block; margin-right: 70px; float: right; font-size: 16px"><span style="font-weight: bold; font-size: 14px">SĐT:</span>&ensp;' . $info_account->deli_phone . '</p>
                </div>
                <div>
                <h5 style="display: inline-block">Địa chỉ:<p style="display: inline-block; margin-left: 10px; font-size: 16px">' . $info_account->deli_address . '</p></h5>
                </div>
            </div>
            <br>
            <table class="table-style">
                <tr>
                    <th>STT</th>
                    <th>Tên sách</th> 
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
        ';
        $count = 1;
        $total1 = 0;
        foreach ($invoice_by_ID as $key => $value) {
            $subtotal = $value->sell_quantity * $value->prod_price;
            $total1 += $subtotal;
            $output .= '
                <tr>
                    <td style="text-align: center; padding: 0;">' . $count . '</td>
                    <td>' . $value->prod_name . '</td>
                    <td style="text-align: center; padding: 0;">' . $value->sell_quantity . '</td>
                    <td>' . number_format($value->prod_price) . ' VNĐ</td>
                    <td>' . number_format($subtotal) . ' VNĐ</td>
                </tr>
        ';
            $count = $count + 1;
        }
        $output .= '
                <tr>
                    <td></td>
                    <td><b>Cộng</b></td>
                    <td></td>
                    <td></td>
                    <td>' . number_format($total1) . ' VNĐ</td>
                </tr>
                <tr>
                    <td></td>
                    <td><b>Tổng (đã tính VAT)</b></td>
                    <td></td>
                    <td></td>
                    <td>' . number_format($info_account->invoice_total) . ' VNĐ</td>
                </tr>
            </table>
            <br>
        <div>
            <div style="float: left; display: inline-block; margin-left: 70px">
                <h5 style="margin-left: 15px">Khách hàng</h5>
                <p>(Kí và ghi rõ họ tên)</p>
            </div>
            <div style="float: right; display: inline-block; margin-right: 70px">
                <h5 style="">Người bán hàng</h5>
                <p>(Kí và ghi rõ họ tên)</p>
            </div>
        </div>
        ';
        return $output;
    }

    // end invoice
    // -------------------------------------------------------------------------------------------
    // delivery
    public function admin_delivery_all_invoice()
    {
        $this->checkLogin();
        $delivery_all_invoice = DB::table('invoice')
            ->join('account', 'invoice.acc_id', '=', 'account.acc_id')
            ->join('delivery', 'invoice.deli_id', '=', 'delivery.deli_id')
            ->where('invoice.current_status', '=', 'Đơn hàng đã xuất kho')
            ->select('invoice.*', 'account.acc_name', 'delivery.deli_address',)
            ->orderBy('invoice.invoice_id', 'desc')->get();
        $manager_delivery = view('adminManager.deliveryManager.show.admin_all_invoice')->with('all_invoice', $delivery_all_invoice);

        // echo '<pre>';
        // print_r($delivery_all_invoice);
        // echo '</pre>';

        return view('adminLayout')->with('adminManager.deliveryManager.show.admin_all_invoice', $manager_delivery);
    }
    public function admin_delivery_detail_invoice($invoice_id)
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

        $manager_invoice = view('adminManager.deliveryManager.detail.admin_detail_invoice')->with('invoice_by_id', $invoice_by_ID)->with('info_account', $info_account)->with('invoice_status', $status)->with('status_detail', $status);

        // echo '<pre>';
        // print_r($invoice_by_ID);
        // echo '</pre>';
        return view('adminLayout')->with('adminManager.deliveryManager.detail.admin_detail_invoice', $manager_invoice);
    }

    // ----------------------------------------------------------------------------
    // ship
    public function admin_delivery_add_ship(Request $request, $invoice_id)
    {
        $this->checkLogin();
        // table shipper
        $data = array();
        $data['invoice_id'] = $invoice_id;
        $data['acc_id'] = Session::get('acc_id');;
        $data['ship_date'] = Carbon::now();

        DB::table('shipper')->insert($data);

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

        return Redirect::to('/admin-delivery-all-invoice');
    }

    public function admin_delivery_delete_ship(Request $request, $invoice_id)
    {
        $this->checkLogin();

        // $acc_id = Session::get('acc_id');
        // table shipper
        DB::table('shipper')->where('shipper.invoice_id', $invoice_id)->delete();

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

        return Redirect::to('/admin-delivery-invoice-received');
    }

    // --------------------------------------------------------------------------------------------
    // received
    public function admin_delivery_invoice_received()
    {
        $this->checkLogin();
        $ship_id = Session::get('acc_id');
        $delivery_all_invoice = DB::table('invoice')
            ->join('account', 'invoice.acc_id', '=', 'account.acc_id')
            ->join('delivery', 'invoice.deli_id', '=', 'delivery.deli_id')
            ->join('shipper', 'invoice.invoice_id', '=', 'shipper.invoice_id')
            ->where('shipper.acc_id', $ship_id)->where('invoice.current_status', '=', 'Đang giao hàng')
            ->select('invoice.*', 'account.acc_name', 'delivery.deli_address',)
            ->orderBy('invoice.invoice_id', 'desc')->get();
        $manager_delivery = view('adminManager.deliveryManager.order.shipper')->with('all_invoice', $delivery_all_invoice);

        // echo '<pre>';
        // print_r($delivery_all_invoice);
        // echo '</pre>';

        return view('adminLayout')->with('adminManager.deliveryManager.order.shipper', $manager_delivery);
    }
    public function admin_delivery_detail_invoice_received($invoice_id)
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

        $manager_invoice = view('adminManager.deliveryManager.detail.admin_detail_invoice_received')->with('invoice_by_id', $invoice_by_ID)->with('info_account', $info_account)->with('invoice_status', $status)->with('status_detail', $status);

        // echo '<pre>';
        // print_r($invoice_by_ID);
        // echo '</pre>';
        return view('adminLayout')->with('adminManager.deliveryManager.detail.admin_detail_invoice_received', $manager_invoice);
    }

    public function admin_delivery_update_status_invoice_received(Request $request, $invoice_id)
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

            Session::put('message', 'Giao đơn hàng thành công!');
        } else if ($request->invoice_status == 7) {

            // // update status table invoice_status
            // $invoice['current_status'] = 'Giao hàng thất bại';

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

            Session::put('message', 'Giao đơn hàng thất bại!');
        }

        // echo '<pre>';
        // print_r($product);
        // print_r($test);
        // echo '</pre>';

        return Redirect::to('/admin-delivery-invoice-received');
    }

    // ----------------------------------------------------------------
    // delivered
    public function admin_delivery_invoice_delivered()
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
        $manager_delivery = view('adminManager.deliveryManager.order.delivered')->with('all_invoice', $delivery_all_invoice);

        // echo '<pre>';
        // print_r($delivery_all_invoice);
        // echo '</pre>';

        return view('adminLayout')->with('adminManager.deliveryManager.order.delivered', $manager_delivery);
    }

    public function admin_delivery_detail_invoice_delivered($invoice_id)
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

        $manager_invoice = view('adminManager.deliveryManager.detail.admin_detail_invoice_delivered')->with('invoice_by_id', $invoice_by_ID)->with('info_account', $info_account)->with('invoice_status', $status)->with('status_detail', $status);

        // echo '<pre>';
        // print_r($invoice_by_ID);
        // echo '</pre>';
        return view('adminLayout')->with('adminManager.deliveryManager.detail.admin_detail_invoice_deliverved', $manager_invoice);
    }

    // -----------------------------------------------------------------------
}
