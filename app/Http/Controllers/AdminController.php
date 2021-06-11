<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Social; //sử dụng model Social
use Socialite; //sử dụng Socialite
use App\Models\account; //sử dụng model Login

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
        $data  = $request->all();
        $acc_email = $data['acc_email'];
        $acc_password = md5($data['password']);

        $login = account::where('acc_email', $acc_email)->where('password', $acc_password)->first();
        $login2 = account::where('username', $acc_email)->where('password', $acc_password)->first();
        if ($login) {
            Session::put('adminname', $login->acc_name);
            Session::put('permId', $login->perm_id);
            Session::put('accImg', $login->acc_img);
            Session::put('accEmail', $login->acc_email);
            Session::put('accContact', $login->acc_contact);
            Session::put('acc_id', $login->acc_id);

            if ($login->perm_id === 1) {
                return Redirect::to('/dashboard');
            } else if ($login->perm_id === 2) {
                return Redirect::to('/order');
            } else if ($login->perm_id === 3) {
                return Redirect::to('/inventory');
            } else if ($login->perm_id === 4) {
                return Redirect::to('/delivery');
            } else {
                return Redirect::to('/trang-chu');
            }
        } else if($login2){
            Session::put('adminname', $login2->acc_name);
            Session::put('permId', $login2->perm_id);
            Session::put('accImg', $login2->acc_img);
            Session::put('accEmail', $login2->acc_email);
            Session::put('accContact', $login2->acc_contact);
            Session::put('acc_id', $login2->acc_id);

            if ($login2->perm_id === 1) {
                return Redirect::to('/dashboard');
            } else if ($login2->perm_id === 2) {
                return Redirect::to('/order');
            } else if ($login2->perm_id === 3) {
                return Redirect::to('/inventory');
            } else if ($login2->perm_id === 4) {
                return Redirect::to('/delivery');
            } else {
                return Redirect::to('/trang-chu');
            }
        } 
        else {
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

    // login fb
    public function login_facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook()
    {
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider', 'facebook')->where('provider_user_id', $provider->getId())->first();
        if ($account) {
            //login in khach
            $account_name = account::where('acc_id', $account->user)->first();

            Session::put('adminname', $account_name->acc_name);
            Session::put('permId', $account_name->perm_id);
            Session::put('accImg', 'avt-default.jpg');
            Session::put('accEmail', $provider->email);
            Session::put('accContact', 'Chưa có số điện thoại');
            Session::put('acc_id', $account_name->acc_id);

            return redirect('/');

            // echo '<pre>';
            // print_r($provider);
            // echo '</pre>';

        } else {

            $tduc = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = account::where('acc_email', $provider->getEmail())->first();

            if (!$orang) {
                $orang = account::create([
                    'acc_name' => $provider->getName(),
                    'acc_email' => $provider->getEmail(),
                    'password' => md5('123'),
                    'username' => $provider->getEmail(),
                    'acc_contact' => 'Chưa có số điện thoại',
                    'acc_img' => 'avt-default.jpg',
                    'perm_id' => 5

                ]);
            }
            $tduc->login()->associate($orang);
            $tduc->save();

            return redirect('/confirm-facebook#_=_');

            // echo '<pre>';
            // print_r($account);
            // echo '</pre>';

        }
    }
    public function confirm_facebook()
    {
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider', 'facebook')->where('provider_user_id', $provider->getId())->first();
        $account_name = account::where('acc_id', $account->user)->get();

        Session::put('acc_name', $account_name->acc_name);
        Session::put('acc_id', $account_name->acc_id);

        return redirect('/');
    }
}
