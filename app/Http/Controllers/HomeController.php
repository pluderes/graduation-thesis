<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    // check login
    public function checkLogin()
    {
        $accPermID = Session::get('permId');
        if($accPermID){
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
    public function index(){

        // SEO
        // $meta_desc = "Mang đến cho bạn những cuốn sách hay của những nhà văn kiệt xuất trên thế giới"; 
        // $meta_keywords = "sach, van hoc, tho ca, tieu thuyet, khoa hoc, luu but, zorba, zorbashop";
        // $meta_title = "Zorba Shop";
        // $url_canonical = $request->url();


        $cate_product = DB::table('category')->orderBy('cate_id','asc')->get();
        // $type_by_cateid = DB::table('type')->join('category','type.cate_id','=','category.cate_id')->get();
        $status_product = DB::table('product_status')->orderBy('status_id','asc')->get();
        $allproduct = DB::table('product')->where('prod_quantity','>','0')->orderBy('prod_id','asc')->get();
        $new_prod = DB::table('product')->where('status_id','=','4')->orderBy('prod_id','asc')->get();
        $preferential_products = DB::table('product')->where('status_id','=','3')->orderBy('prod_id','asc')->get();
        $special_products = DB::table('product')->where('status_id','=','2')->orderBy('prod_id','asc')->get();

        return view('pages.home')->with('category',$cate_product)->with('status_prod',$status_product)->with('new_product',$new_prod)->with('cate_prod',$cate_product);
    // return view('pages.home')->with('category',$cate_product)->with('status_prod',$status_product)->with('new_product',$new_prod)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }

    public function search(Request $request){

        $keywords = $request->keywords_submit;

        $product = DB::table('product')->where('prod_quantity','>','0')->orderBy('prod_id','desc')->get();
        $cate_product = DB::table('category')->orderBy('cate_id','asc')->get();
        $status_product = DB::table('product_status')->orderBy('status_id','asc')->get();
        
        $search_product = DB::table('product')->where('prod_name','like','%'.$keywords.'%')->get();

    	return view('pages.product.search')->with('product',$product)->with('status_prod',$status_product)->with('category',$cate_product)->with('search_product',$search_product);

    }

    public function user_profile($acc_id)
    {
        
    }
}
