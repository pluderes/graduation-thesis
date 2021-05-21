<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Symfony\Component\HttpFoundation\Response;

session_start();

class AdminController extends Controller
{
    public function adminLogin()
    {
        return view('adminLogin');
    }
    public function adminLayout()
    {
        return view('adminLayout');
    }
    public function dashboard()
    {
        return view('pages.admin.dashboard');
    }
    public function delivery()
    {
        return view('pages.admin.delivery');
    }
    public function inventory()
    {
        return view('pages.admin.inventory');
    }
    public function order()
    {
        return view('pages.admin.order');
    }

    // ------------------------------------------------------

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
            // echo '<pre>';
            // print_r($accPermID);
            // echo '</pre>';
        } else {
            Session::put('message', 'Bạn cần đăng nhập trước!');
            return Redirect::to('/adminLogin')->send();
        }
    }

    public function login(Request $request)
    {
        $admin_username = $request->username;
        $admin_password = md5($request->password);

        $result = DB::table('account')->where('username', $admin_username)->where('password', $admin_password)->first();

        if ($result) {
            Session::put('adminname', $result->acc_name);
            Session::put('permId', $result->perm_id);
            Session::put('accImg', $result->acc_img);
            Session::put('accEmail', $result->acc_email);
            Session::put('accContact', $result->acc_contact);
            Session::put('acc_id', $result->acc_id);

            if ($result->perm_id === 1) {
                return Redirect::to('/dashboard');
            } else if ($result->perm_id === 2) {
                return Redirect::to('/order');
            } else if ($result->perm_id === 3) {
                return Redirect::to('/inventory');
            } else if ($result->perm_id === 4) {
                return Redirect::to('/delivery');
            } else {
                return Redirect::to('/trang-chu');
            }
        } else {
            Session::put('message', 'Tên đăng nhập hoặc mật khẩu không chính xác!');
            return Redirect::to('/adminLogin');
        }
    }
    public function adminLogout()
    {
        $this->checkLogin();
        Session::put('adminname', null);
        Session::put('permId', null);
        Session::put('accImg', null);
        Session::put('acc_id', null);
        Session::put('deli_id', null);

        Cart::destroy();

        return Redirect::TO('/adminLogin');
    }
}
