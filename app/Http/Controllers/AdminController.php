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
use App\Models\invoice;
use Carbon\Carbon;

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
        // invoice
        $total_price_invoice = DB::table('invoice')->where('invoice.current_status', '=', 'Giao hàng thành công')->sum('invoice_total');
        $total_prod_invoice = DB::table('invoice')
            ->join('invoice_detail', 'invoice_detail.invoice_id', '=', 'invoice.invoice_id')
            ->where('invoice.current_status', '=', 'Giao hàng thành công')->sum('sell_quantity');
        $total_order = DB::table('invoice')->count('invoice_id');

        // invoice month
        $total_quantity_prod = DB::table('product')->sum('prod_quantity');
        $total_month = DB::table('invoice')->whereMonth('invoice_date_time', Carbon::now()->month)->sum('invoice_total');
        $online_revenue = DB::table('invoice')->join('payment', 'payment.payment_id', '=', 'invoice.payment_id')->whereMonth('invoice_date_time', Carbon::now()->month)->where('payment_method', '=', 1)->count('invoice_id');
        $offline_revenue = DB::table('invoice')->join('payment', 'payment.payment_id', '=', 'invoice.payment_id')->whereMonth('invoice_date_time', Carbon::now()->month)->where('payment_method', '=', 2)->count('invoice_id');
        // ------------------------------------------

        // delivery
        $acc_id = Session::get('acc_id');
        $total_order = DB::table('invoice')->count('invoice_id');
        $invoice = DB::table('invoice')->join('shipper', 'shipper.invoice_id', '=', 'invoice.invoice_id')->get();
        $invoice_delivered = $invoice->count();
        $invoice_success = $invoice->where('current_status', '=', 'Giao hàng thành công')->count();
        $invoice_fail = $invoice->where('current_status', '=', 'Giao hàng thất bại')->count();

        // month
        $total_order_month = DB::table('shipper')->whereMonth('ship_date', Carbon::now()->month)->count('invoice_id');
        $total_success_month =  DB::table('invoice')->join('shipper', 'shipper.invoice_id', '=', 'invoice.invoice_id')
            ->whereMonth('ship_date', Carbon::now()->month)->where('current_status', '=', 'Giao hàng thành công')->count();
        $total_fail_month =  DB::table('invoice')->join('shipper', 'shipper.invoice_id', '=', 'invoice.invoice_id')
            ->whereMonth('ship_date', Carbon::now()->month)->where('current_status', '=', 'Giao hàng thất bại')->count();
        // ------------------------------

        // book
        $total_prod = DB::table('product')->sum('prod_quantity');
        $total_author = DB::table('author')->count('author_id');
        $total_cate = DB::table('category')->count('cate_id');
        $total_type = DB::table('type')->count('type_id');

        // sell by cate
        $VN = DB::table('invoice')->join('invoice_detail', 'invoice.invoice_id', '=', 'invoice_detail.invoice_id')
            ->join('product', 'invoice_detail.prod_id', '=', 'product.prod_id')
            ->join('type', 'product.type_id', '=', 'type.type_id')
            ->join('category', 'type.cate_id', '=', 'category.cate_id')
            ->select('invoice.invoice_id', 'invoice_detail.sell_quantity', 'product.prod_id', 'type.type_id', 'category.cate_id')
            ->where('current_status', '=', 'Giao hàng thành công')
            ->where('category.cate_id', '=', '1')->sum('invoice_detail.sell_quantity');

        $foreign = DB::table('invoice')->join('invoice_detail', 'invoice.invoice_id', '=', 'invoice_detail.invoice_id')
            ->join('product', 'invoice_detail.prod_id', '=', 'product.prod_id')
            ->join('type', 'product.type_id', '=', 'type.type_id')
            ->join('category', 'type.cate_id', '=', 'category.cate_id')
            ->select('invoice.invoice_id', 'invoice_detail.sell_quantity', 'product.prod_id', 'type.type_id', 'category.cate_id')
            ->where('current_status', '=', 'Giao hàng thành công')
            ->where('category.cate_id', '=', '2')->sum('invoice_detail.sell_quantity');

        $children = DB::table('invoice')->join('invoice_detail', 'invoice.invoice_id', '=', 'invoice_detail.invoice_id')
            ->join('product', 'invoice_detail.prod_id', '=', 'product.prod_id')
            ->join('type', 'product.type_id', '=', 'type.type_id')
            ->join('category', 'type.cate_id', '=', 'category.cate_id')
            ->select('invoice.invoice_id', 'invoice_detail.sell_quantity', 'product.prod_id', 'type.type_id', 'category.cate_id')
            ->where('current_status', '=', 'Giao hàng thành công')
            ->where('category.cate_id', '=', '3')->sum('invoice_detail.sell_quantity');

        $politics = DB::table('invoice')->join('invoice_detail', 'invoice.invoice_id', '=', 'invoice_detail.invoice_id')
            ->join('product', 'invoice_detail.prod_id', '=', 'product.prod_id')
            ->join('type', 'product.type_id', '=', 'type.type_id')
            ->join('category', 'type.cate_id', '=', 'category.cate_id')
            ->select('invoice.invoice_id', 'invoice_detail.sell_quantity', 'product.prod_id', 'type.type_id', 'category.cate_id')
            ->where('current_status', '=', 'Giao hàng thành công')
            ->where('category.cate_id', '=', '4')->sum('invoice_detail.sell_quantity');

        $natural_sciences = DB::table('invoice')->join('invoice_detail', 'invoice.invoice_id', '=', 'invoice_detail.invoice_id')
            ->join('product', 'invoice_detail.prod_id', '=', 'product.prod_id')
            ->join('type', 'product.type_id', '=', 'type.type_id')
            ->join('category', 'type.cate_id', '=', 'category.cate_id')
            ->select('invoice.invoice_id', 'invoice_detail.sell_quantity', 'product.prod_id', 'type.type_id', 'category.cate_id')
            ->where('current_status', '=', 'Giao hàng thành công')
            ->where('category.cate_id', '=', '5')->sum('invoice_detail.sell_quantity');

        $reference = DB::table('invoice')->join('invoice_detail', 'invoice.invoice_id', '=', 'invoice_detail.invoice_id')
            ->join('product', 'invoice_detail.prod_id', '=', 'product.prod_id')
            ->join('type', 'product.type_id', '=', 'type.type_id')
            ->join('category', 'type.cate_id', '=', 'category.cate_id')
            ->select('invoice.invoice_id', 'invoice_detail.sell_quantity', 'product.prod_id', 'type.type_id', 'category.cate_id')
            ->where('current_status', '=', 'Giao hàng thành công')
            ->where('category.cate_id', '=', '6')->sum('invoice_detail.sell_quantity');

        $reprint = DB::table('invoice')->join('invoice_detail', 'invoice.invoice_id', '=', 'invoice_detail.invoice_id')
            ->join('product', 'invoice_detail.prod_id', '=', 'product.prod_id')
            ->join('type', 'product.type_id', '=', 'type.type_id')
            ->join('category', 'type.cate_id', '=', 'category.cate_id')
            ->select('invoice.invoice_id', 'invoice_detail.sell_quantity', 'product.prod_id', 'type.type_id', 'category.cate_id')
            ->where('current_status', '=', 'Giao hàng thành công')
            ->where('category.cate_id', '=', '7')->sum('invoice_detail.sell_quantity');

        // sell this month
        $total_sell_month = DB::table('invoice')->join('invoice_detail', 'invoice_detail.invoice_id', '=', 'invoice.invoice_id')
            ->join('shipper', 'invoice.invoice_id', '=', 'shipper.invoice_id')
            ->where('invoice.current_status', '=', 'Giao hàng thành công')
            ->whereMonth('ship_date', Carbon::now()->month)->sum('sell_quantity');

        // echo '<pre>';
        // print_r(invoice::all());
        // echo '</pre>';

        return view('pages/admin/dashboard')->with('total_price_invoice', $total_price_invoice)
            ->with('total_prod_invoice', $total_prod_invoice)
            ->with('total_order', $total_order)
            ->with('total_quantity_prod', $total_quantity_prod)
            ->with('total_month', $total_month)
            ->with('online_revenue', $online_revenue)
            ->with('offline_revenue', $offline_revenue)
            ->with('total_order', $total_order)
            ->with('invoice_delivered', $invoice_delivered)
            ->with('invoice_success', $invoice_success)
            ->with('invoice_fail', $invoice_fail)
            ->with('total_order_month', $total_order_month)
            ->with('total_success_month', $total_success_month)
            ->with('total_fail_month', $total_fail_month)
            ->with('total_prod', $total_prod)
            ->with('total_author', $total_author)
            ->with('total_cate', $total_cate)
            ->with('total_type', $total_type)
            ->with('total_type', $total_type)
            ->with('VN', $VN)
            ->with('foreign', $foreign)
            ->with('children', $children)
            ->with('politics', $politics)
            ->with('natural_sciences', $natural_sciences)
            ->with('reference', $reference)
            ->with('reprint', $reprint)
            ->with('total_sell_month', $total_sell_month);
    }
    public function delivery()
    {
        $acc_id = Session::get('acc_id');
        $total_order = DB::table('invoice')->count('invoice_id');
        $invoice = DB::table('invoice')->join('shipper', 'shipper.invoice_id', '=', 'invoice.invoice_id')
            ->where('shipper.acc_id', '=', $acc_id)->get();
        $invoice_delivered = $invoice->count();
        $invoice_success = $invoice->where('current_status', '=', 'Giao hàng thành công')->count();
        $invoice_fail = $invoice->where('current_status', '=', 'Giao hàng thất bại')->count();

        // month
        $total_order_month = DB::table('shipper')->whereMonth('ship_date', Carbon::now()->month)->count('invoice_id');
        $total_success_month =  DB::table('invoice')->join('shipper', 'shipper.invoice_id', '=', 'invoice.invoice_id')
            ->where('shipper.acc_id', '=', $acc_id)->whereMonth('ship_date', Carbon::now()->month)->where('current_status', '=', 'Giao hàng thành công')->count();
        $total_fail_month =  DB::table('invoice')->join('shipper', 'shipper.invoice_id', '=', 'invoice.invoice_id')
            ->where('shipper.acc_id', '=', $acc_id)->whereMonth('ship_date', Carbon::now()->month)->where('current_status', '=', 'Giao hàng thất bại')->count();

        return view('pages.admin.delivery')->with('total_order', $total_order)
            ->with('invoice_delivered', $invoice_delivered)
            ->with('invoice_success', $invoice_success)
            ->with('invoice_fail', $invoice_fail)
            ->with('total_order_month', $total_order_month)
            ->with('total_success_month', $total_success_month)
            ->with('total_fail_month', $total_fail_month);
    }
    public function inventory()
    {
        $total_prod = DB::table('product')->sum('prod_quantity');
        $total_author = DB::table('author')->count('author_id');
        $total_cate = DB::table('category')->count('cate_id');
        $total_type = DB::table('type')->count('type_id');

        // sell by cate
        $VN = DB::table('invoice')->join('invoice_detail', 'invoice.invoice_id', '=', 'invoice_detail.invoice_id')
            ->join('product', 'invoice_detail.prod_id', '=', 'product.prod_id')
            ->join('type', 'product.type_id', '=', 'type.type_id')
            ->join('category', 'type.cate_id', '=', 'category.cate_id')
            ->select('invoice.invoice_id', 'invoice_detail.sell_quantity', 'product.prod_id', 'type.type_id', 'category.cate_id')
            ->where('current_status', '=', 'Giao hàng thành công')
            ->where('category.cate_id', '=', '1')->sum('invoice_detail.sell_quantity');

        $foreign = DB::table('invoice')->join('invoice_detail', 'invoice.invoice_id', '=', 'invoice_detail.invoice_id')
            ->join('product', 'invoice_detail.prod_id', '=', 'product.prod_id')
            ->join('type', 'product.type_id', '=', 'type.type_id')
            ->join('category', 'type.cate_id', '=', 'category.cate_id')
            ->select('invoice.invoice_id', 'invoice_detail.sell_quantity', 'product.prod_id', 'type.type_id', 'category.cate_id')
            ->where('current_status', '=', 'Giao hàng thành công')
            ->where('category.cate_id', '=', '2')->sum('invoice_detail.sell_quantity');

        $children = DB::table('invoice')->join('invoice_detail', 'invoice.invoice_id', '=', 'invoice_detail.invoice_id')
            ->join('product', 'invoice_detail.prod_id', '=', 'product.prod_id')
            ->join('type', 'product.type_id', '=', 'type.type_id')
            ->join('category', 'type.cate_id', '=', 'category.cate_id')
            ->select('invoice.invoice_id', 'invoice_detail.sell_quantity', 'product.prod_id', 'type.type_id', 'category.cate_id')
            ->where('current_status', '=', 'Giao hàng thành công')
            ->where('category.cate_id', '=', '3')->sum('invoice_detail.sell_quantity');

        $politics = DB::table('invoice')->join('invoice_detail', 'invoice.invoice_id', '=', 'invoice_detail.invoice_id')
            ->join('product', 'invoice_detail.prod_id', '=', 'product.prod_id')
            ->join('type', 'product.type_id', '=', 'type.type_id')
            ->join('category', 'type.cate_id', '=', 'category.cate_id')
            ->select('invoice.invoice_id', 'invoice_detail.sell_quantity', 'product.prod_id', 'type.type_id', 'category.cate_id')
            ->where('current_status', '=', 'Giao hàng thành công')
            ->where('category.cate_id', '=', '4')->sum('invoice_detail.sell_quantity');

        $natural_sciences = DB::table('invoice')->join('invoice_detail', 'invoice.invoice_id', '=', 'invoice_detail.invoice_id')
            ->join('product', 'invoice_detail.prod_id', '=', 'product.prod_id')
            ->join('type', 'product.type_id', '=', 'type.type_id')
            ->join('category', 'type.cate_id', '=', 'category.cate_id')
            ->select('invoice.invoice_id', 'invoice_detail.sell_quantity', 'product.prod_id', 'type.type_id', 'category.cate_id')
            ->where('current_status', '=', 'Giao hàng thành công')
            ->where('category.cate_id', '=', '5')->sum('invoice_detail.sell_quantity');

        $reference = DB::table('invoice')->join('invoice_detail', 'invoice.invoice_id', '=', 'invoice_detail.invoice_id')
            ->join('product', 'invoice_detail.prod_id', '=', 'product.prod_id')
            ->join('type', 'product.type_id', '=', 'type.type_id')
            ->join('category', 'type.cate_id', '=', 'category.cate_id')
            ->select('invoice.invoice_id', 'invoice_detail.sell_quantity', 'product.prod_id', 'type.type_id', 'category.cate_id')
            ->where('current_status', '=', 'Giao hàng thành công')
            ->where('category.cate_id', '=', '6')->sum('invoice_detail.sell_quantity');

        $reprint = DB::table('invoice')->join('invoice_detail', 'invoice.invoice_id', '=', 'invoice_detail.invoice_id')
            ->join('product', 'invoice_detail.prod_id', '=', 'product.prod_id')
            ->join('type', 'product.type_id', '=', 'type.type_id')
            ->join('category', 'type.cate_id', '=', 'category.cate_id')
            ->select('invoice.invoice_id', 'invoice_detail.sell_quantity', 'product.prod_id', 'type.type_id', 'category.cate_id')
            ->where('current_status', '=', 'Giao hàng thành công')
            ->where('category.cate_id', '=', '7')->sum('invoice_detail.sell_quantity');

        // sell this month
        $total_sell_month = DB::table('invoice')->join('invoice_detail', 'invoice_detail.invoice_id', '=', 'invoice.invoice_id')
            ->join('shipper', 'invoice.invoice_id', '=', 'shipper.invoice_id')
            ->where('invoice.current_status', '=', 'Giao hàng thành công')
            ->whereMonth('ship_date', Carbon::now()->month)->sum('sell_quantity');

        return view('pages.admin.inventory')->with('total_prod', $total_prod)
            ->with('total_author', $total_author)
            ->with('total_cate', $total_cate)
            ->with('total_type', $total_type)
            ->with('total_type', $total_type)
            ->with('VN', $VN)
            ->with('foreign', $foreign)
            ->with('children', $children)
            ->with('politics', $politics)
            ->with('natural_sciences', $natural_sciences)
            ->with('reference', $reference)
            ->with('reprint', $reprint)
            ->with('total_sell_month', $total_sell_month);
    }
    public function order()
    {
        $total_price_invoice = DB::table('invoice')->where('invoice.current_status', '=', 'Giao hàng thành công')->sum('invoice_total');
        $total_prod_invoice = DB::table('invoice')
            ->join('invoice_detail', 'invoice_detail.invoice_id', '=', 'invoice.invoice_id')
            ->where('invoice.current_status', '=', 'Giao hàng thành công')->sum('sell_quantity');
        $total_order = DB::table('invoice')->count('invoice_id');

        $total_quantity_prod = DB::table('product')->sum('prod_quantity');
        $total_month = DB::table('invoice')->whereMonth('invoice_date_time', Carbon::now()->month)->sum('invoice_total');
        $online_revenue = DB::table('invoice')->join('payment', 'payment.payment_id', '=', 'invoice.payment_id')->whereMonth('invoice_date_time', Carbon::now()->month)->where('payment_method', '=', 1)->count('invoice_id');
        $offline_revenue = DB::table('invoice')->join('payment', 'payment.payment_id', '=', 'invoice.payment_id')->whereMonth('invoice_date_time', Carbon::now()->month)->where('payment_method', '=', 2)->count('invoice_id');

        return view('pages.admin.order')->with('total_price_invoice', $total_price_invoice)
            ->with('total_prod_invoice', $total_prod_invoice)
            ->with('total_order', $total_order)
            ->with('total_quantity_prod', $total_quantity_prod)
            ->with('total_month', $total_month)
            ->with('online_revenue', $online_revenue)
            ->with('offline_revenue', $offline_revenue);
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
        } else if ($login2) {
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

    // info_admin
    public function info_admin($acc_id)
    {
        $per = DB::table('account')->join('set_permission', 'account.perm_id', '=', 'set_permission.perm_id')->where('account.acc_id', $acc_id)->first();

        Session::put('adminname', $per->acc_name);
        Session::put('permId', $per->perm_id);
        Session::put('accImg', $per->acc_img);
        Session::put('accEmail', $per->acc_email);
        Session::put('accContact', $per->acc_contact);
        Session::put('acc_id', $per->acc_id);

        return view('pages.admin.info_admin')->with('per', $per);
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
