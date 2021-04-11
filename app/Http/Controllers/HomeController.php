<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(){
        $cate_product = DB::table('category')->orderBy('cate_id','asc')->get();
        $status_product = DB::table('product_status')->orderBy('status_id','asc')->get();
        $allproduct = DB::table('product')->where('prod_quantity','>','0')->orderBy('prod_id','asc')->get();
        $new_prod = DB::table('product')->where('status_id','=','4')->orderBy('prod_id','asc')->get();
        $preferential_products = DB::table('product')->where('status_id','=','3')->orderBy('prod_id','asc')->get();
        $special_products = DB::table('product')->where('status_id','=','2')->orderBy('prod_id','asc')->get();

        return view('pages.home')->with('category',$cate_product)->with('status_prod',$status_product)->with('new_product',$new_prod);
    }
}
