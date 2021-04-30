<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;

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
        ->where('invoice.invoice_id',$invoice_id)->get();
        $invoice_by_ID = DB::table('invoice')
        ->join('delivery', 'invoice.deli_id', '=', 'delivery.deli_id')
        ->join('account', 'delivery.acc_id', '=', 'account.acc_id')
        ->join('invoice_detail', 'invoice.invoice_id', '=', 'invoice_detail.invoice_id')
        ->select('delivery.*','invoice.*','invoice_detail.*','account.*')
        ->orderBy('invoice.invoice_id', 'desc')->where('invoice.invoice_id',$invoice_id)->get();
        $manager_invoice = view('adminManager.invoiceManager.edit.edit_invoice')->with('invoice_by_id', $invoice_by_ID)->with('info_account',$info_account);

        // echo '<pre>';
        // print_r($info_account);
        // echo '</pre>';
        return view('adminLayout')->with('adminManager.invoiceManager.edit.edit_invoice', $manager_invoice);
    }
}
