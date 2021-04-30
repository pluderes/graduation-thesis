<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class ProductController extends Controller
{
    //Front-end
    // detail product
    public function details_product($prod_id)
    {
        $cate_product = DB::table('category')->orderBy('cate_id', 'asc')->get();
        $status_product = DB::table('product_status')->orderBy('status_id', 'asc')->get();
        $author_product = DB::table('product')->join('author','product.author_id','=','author.author_id')->where('product.prod_id',$prod_id)->get();
        $supplier_product = DB::table('product')->join('supplier','product.supplier_id','=','supplier.supplier_id')->where('product.prod_id',$prod_id)->get();
        $detais_product = DB::table('product')->join('type','product.type_id','=','type.type_id')->join('category','type.cate_id','=','category.cate_id')->where('product.prod_id',$prod_id)->get();
       
        foreach($detais_product as $key => $values){
            $status_id = $values->status_id;
            $cate_id = $values->cate_id;
        }
        
        $prod_by_status = DB::table('product')->join('product_status','product.status_id','=','product_status.status_id')->where('product_status.status_id',$status_id)->whereNotIn('product.prod_id',[$prod_id])->limit(3)->get();
        $prod_by_cate = DB::table('product')->join('type','product.type_id','=','type.type_id')->join('category','type.cate_id','=','category.cate_id')->where('category.cate_id',$cate_id)->whereNotIn('product.prod_id',[$prod_id])->limit(4)->get();

        return view('pages.product.show_details')->with('category', $cate_product)->with('status_prod', $status_product)->with('detais_product',$detais_product)->with('author_product',$author_product)->with('supplier_product',$supplier_product)->with('prod_cate',$prod_by_cate)->with('prod_status',$prod_by_status);
    }
}
