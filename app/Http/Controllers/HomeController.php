<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\Paginator;
use Mail;
use App\Models\account;
use PharIo\Manifest\Email;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Random;

session_start();

class HomeController extends Controller
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
    // -----------------------------------------------------------------------------------------
    public function index()
    {
        $cate_product = DB::table('category')->orderBy('cate_id', 'asc')->get();
        // $type_by_cateid = DB::table('type')->join('category','type.cate_id','=','category.cate_id')->get();
        $status_product = DB::table('product_status')->orderBy('status_id', 'asc')->get();
        $type_product = DB::table('type')->orderBy('type_id', 'asc')->get();

        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
            if ($sort == "AZ") {
                $allproduct = DB::table('product')->orderBy('prod_name', 'asc')
                    ->paginate(9)->appends(request()->query());
            } else if ($sort == "ZA") {
                $allproduct = DB::table('product')->orderBy('prod_name', 'desc')
                    ->paginate(9)->appends(request()->query());
            } else if ($sort == "desc") {
                $allproduct = DB::table('product')->orderBy('prod_price', 'desc')
                    ->paginate(9)->appends(request()->query());
            } else if ($sort == "asc") {
                $allproduct = DB::table('product')->orderBy('prod_price', 'asc')
                    ->paginate(9)->appends(request()->query());
            }
        } else {
            $allproduct = DB::table('product')->orderBy('prod_id', 'asc')->paginate(9);
        }

        return view('pages.home')->with('category', $cate_product)->with('status_prod', $status_product)
            ->with('prod_type', $type_product)
            ->with('all_product', $allproduct);
    }

    public function search(Request $request)
    {
        $cate_product = DB::table('category')->orderBy('cate_id', 'asc')->get();
        $status_product = DB::table('product_status')->orderBy('status_id', 'asc')->get();
        $type_product = DB::table('type')->orderBy('type_id', 'asc')->get();

        $keywords = $request->keywords_submit;
        if ($keywords != "") {
            $search_product = DB::table('product')->where('prod_name', 'like', '%' . $keywords . '%')->paginate(9);
            $search_product->appends($request->all());
            $count_product = DB::table('product')->where('prod_name', 'like', '%' . $keywords . '%')->count();

            $search_author = DB::table('author')->join('product', 'product.author_id', '=', 'author.author_id')->where('author_name', 'like', '%' . $keywords . '%')->paginate(9);
            $search_author->appends($request->all());
            $count_author = DB::table('author')->join('product', 'product.author_id', '=', 'author.author_id')->where('author_name', 'like', '%' . $keywords . '%')->count();

            // $data_search = DB::table('product')->crossJoin('author')->paginate(9);

            if ($count_product == 0 && $count_author == 0) {
                Session::put('search_error', 'Oops.. Không tìm được sách bạn cần rồi!');
            }
        } else {
            // $allproduct = DB::table('product')->orderBy('prod_id', 'asc')->paginate(9);
            $search_product = DB::table('product')->orderBy('prod_id', 'asc')->paginate(9);
            $search_author = DB::table('product')->orderBy('prod_id', 'asc')->paginate(9);
            $count_product = 0;
            $count_author = 0;
        }

        Session::put('count_product', $count_product);
        Session::put('count_author', $count_author);
        Session::put('keywords', $keywords);

        return view('pages.product.search')->with('status_prod', $status_product)->with('category', $cate_product)->with('prod_type', $type_product)->with('search_product', $search_product)->with('search_author', $search_author);
        // echo '<pre>';
        // print_r($search_author);
        // // print_r($count_author);
        // print_r($search_product);
        // // print_r($count_product);
        // echo '</pre>';
    }

    public function aboutus()
    {
        return view('pages.admin.userprofile');
    }

    public function send_email(Request $request)
    {
        $to_name = $request->sendmail;
        $to_email = "kingofpoppro@gmail.com"; //send to this email

        $data = array("name" => $to_name, "body" => "Khách hàng đăng kí nhận thông báo khi có khuyến mại mới"); //body of mail.blade.php

        Mail::send('pages.send_email', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email)->subject('Đăng kí nhận thông báo'); //send this mail with subject
            $message->from($to_email, $to_name); //send from this mail
        });

        return Redirect::to('/trang-chu')->with('message', 'Cảm ơn bạn đã đăng kí. Bạn sẽ nhận được thông báo qua email khi có khuyến mại mới');
    }

    public function forgot_password()
    {
        $cate_product = DB::table('category')->orderBy('cate_id', 'asc')->get();
        // $type_by_cateid = DB::table('type')->join('category','type.cate_id','=','category.cate_id')->get();
        $status_product = DB::table('product_status')->orderBy('status_id', 'asc')->get();
        $allproduct = DB::table('product')->orderBy('prod_id', 'asc')->paginate(9);
        $type_product = DB::table('type')->orderBy('type_id', 'asc')->get();

        return view('pages.checkout.forgot_password')->with('category', $cate_product)->with('status_prod', $status_product)->with('prod_type', $type_product)->with('all_product', $allproduct);
    }

    public function password_retrieval(Request $request)
    {
        $data = $request->all();
        $title = "Lấy lại mật khẩu";
        $customer = account::where('acc_email', '=', $data['email_account'])->get();

        foreach ($customer as $key => $value) {
            $customer_id = $value->acc_id;
        }
        if ($customer) {
            $count = $customer->count();
            if ($count == 0) {
                return redirect()->back()->with('error', 'Email này chưa được đăng kí tài khoản');
            } else {
                $token_random = Str::random(10);

                $customer = account::find($customer_id);
                $customer->customer_token = $token_random;
                $customer->save();

                $to_email = $data['email_account'];
                $link_reset = URL('/update-pass?email=' . $to_email . '&token=' . $token_random);

                $data = array("name" => "", "body" => $link_reset, 'email' => $data['email_account']);
                Mail::send('pages.checkout.forget_pass_notify', ['data' => $data], function ($message) use ($title, $data) {
                    $message->to($data['email'])->subject($title);
                    $message->from($data['email'], $title);
                });

                return redirect()->back()->with('success', 'Đã gửi email đặt lại mật khẩu. Kiểm tra email của bạn');
            }
        }
    }

    public function update_pass(Request $request)
    {
        $cate_product = DB::table('category')->orderBy('cate_id', 'asc')->get();
        // $type_by_cateid = DB::table('type')->join('category','type.cate_id','=','category.cate_id')->get();
        $status_product = DB::table('product_status')->orderBy('status_id', 'asc')->get();
        $allproduct = DB::table('product')->orderBy('prod_id', 'asc')->paginate(9);
        $type_product = DB::table('type')->orderBy('type_id', 'asc')->get();

        return view('pages.checkout.update_pass')->with('category', $cate_product)->with('status_prod', $status_product)->with('prod_type', $type_product)->with('all_product', $allproduct);
    }

    public function reset_password(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'new_password' => 'required|min:6',
            're_password' => 'required|same:new_password',
        ]);

        $token_random = Str::random(10);
        $customer = account::where('acc_email', '=', $data['email'])->where('customer_token', '=', $data['token'])->get();

        $count = $customer->count();
        if ($count > 0) {
            foreach ($customer as $key => $value) {
                $customer_id = $value->acc_id;
            }
            $reset = account::find($customer_id);
            $reset->password = md5($data['new_password']);
            $reset->customer_token = $token_random;
            $reset->save();
            return redirect('adminLogin')->with('message', 'Cập nhật mật khẩu thành công');
        } else {
            return redirect('forgot')->with('error', 'Nhập lại email để đặt lại mật khẩu');
        }
    }
}
