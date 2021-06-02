<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\Paginator;

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

        // SEO
        // $meta_desc = "Mang đến cho bạn những cuốn sách hay của những nhà văn kiệt xuất trên thế giới"; 
        // $meta_keywords = "sach, van hoc, tho ca, tieu thuyet, khoa hoc, luu but, zorba, zorbashop";
        // $meta_title = "Zorba Shop";
        // $url_canonical = $request->url();


        $cate_product = DB::table('category')->orderBy('cate_id', 'asc')->get();
        // $type_by_cateid = DB::table('type')->join('category','type.cate_id','=','category.cate_id')->get();
        $status_product = DB::table('product_status')->orderBy('status_id', 'asc')->get();
        $allproduct = DB::table('product')->orderBy('prod_id', 'asc')->paginate(9);
        $type_product = DB::table('type')->orderBy('type_id', 'asc')->get();

        return view('pages.home')->with('category', $cate_product)->with('status_prod', $status_product)->with('prod_type', $type_product)->with('all_product', $allproduct);
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

        Session::put('count_product',$count_product);
        Session::put('count_author',$count_author);
        Session::put('keywords',$keywords);

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
}
