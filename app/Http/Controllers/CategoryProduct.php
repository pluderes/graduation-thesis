<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class CategoryProduct extends Controller
{
    // FE: show category product
    public function show_category($cate_id){
        $cate_product = DB::table('category')->orderBy('cate_id','asc')->get();
        $status_product = DB::table('product_status')->orderBy('status_id','asc')->get();
        $cate_by_id = DB::table('product')->join('type','product.type_id','=','type.type_id')->join('category','type.cate_id','=','category.cate_id')->where('category.cate_id',$cate_id)->get();
        $category_name = DB::table('category')->where('category.cate_id',$cate_id)->limit(1)->get();

        return view('pages.category.show_category')->with('category',$cate_product)->with('status_prod',$status_product)->with('cate_by_id',$cate_by_id)->with('category_name',$category_name);
    }

    public function show_status($status_id){
        $cate_product = DB::table('category')->orderBy('cate_id','asc')->get();
        $status_product = DB::table('product_status')->orderBy('status_id','asc')->get();
        $status_by_id = DB::table('product')->join('product_status','product.status_id','=','product_status.status_id')->where('product_status.status_id',$status_id)->get();
        $status_name = DB::table('product_status')->where('product_status.status_id',$status_id)->limit(1)->get();

        return view('pages.category.show_status')->with('category',$cate_product)->with('status_prod',$status_product)->with('status_by_id',$status_by_id)->with('status_name',$status_name);
    }
}
