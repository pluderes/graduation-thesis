<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\category;

session_start();


class CategoryProduct extends Controller
{
    public function getProvince($value)
    {
        return strtoupper($value);
    }

    // FE: show category product
    public function show_category($cate_id)
    {
        $cate_product = DB::table('category')->orderBy('cate_id', 'asc')->get();
        $status_product = DB::table('product_status')->orderBy('status_id', 'asc')->get();
        $category_name = DB::table('category')->where('category.cate_id', $cate_id)->limit(1)->get();
        $type_product = DB::table('type')->orderBy('type_id', 'asc')->get();

        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
            if ($sort == "desc") {
                $cate_by_id = DB::table('product')
                    ->join('type', 'product.type_id', '=', 'type.type_id')
                    ->join('category', 'type.cate_id', '=', 'category.cate_id')
                    ->join('product_status', 'product.status_id', '=', 'product_status.status_id')
                    ->where('category.cate_id', $cate_id)
                    ->orderBy('prod_price', 'desc')
                    ->paginate(9)->appends(request()->query());
            } else if ($sort == "asc") {
                $cate_by_id = DB::table('product')
                    ->join('type', 'product.type_id', '=', 'type.type_id')
                    ->join('category', 'type.cate_id', '=', 'category.cate_id')
                    ->join('product_status', 'product.status_id', '=', 'product_status.status_id')
                    ->where('category.cate_id', $cate_id)
                    ->orderBy('prod_price', 'asc')
                    ->paginate(9)->appends(request()->query());
            }
        } else {
            $cate_by_id = DB::table('product')
                ->join('type', 'product.type_id', '=', 'type.type_id')
                ->join('category', 'type.cate_id', '=', 'category.cate_id')
                ->join('product_status', 'product.status_id', '=', 'product_status.status_id')
                ->where('category.cate_id', $cate_id)->paginate(9);
        }

        return view('pages.category.show_category')
            ->with('category', $cate_product)
            ->with('status_prod', $status_product)
            ->with('prod_type', $type_product)
            ->with('cate_by_id', $cate_by_id)
            ->with('category_name', $category_name);
    }

    public function show_status($status_id)
    {
        $cate_product = DB::table('category')->orderBy('cate_id', 'asc')->get();
        $status_product = DB::table('product_status')->orderBy('status_id', 'asc')->get();
        $status_name = DB::table('product_status')->where('product_status.status_id', $status_id)->limit(1)->get();
        $type_product = DB::table('type')->orderBy('type_id', 'asc')->get();

        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
            if ($sort == "desc") {
                $status_by_id = DB::table('product')
                    ->join('product_status', 'product.status_id', '=', 'product_status.status_id')
                    ->where('product_status.status_id', $status_id)
                    ->orderBy('prod_price', 'desc')
                    ->paginate(9)->appends(request()->query());
            } else if ($sort == "asc") {
                $status_by_id = DB::table('product')
                    ->join('product_status', 'product.status_id', '=', 'product_status.status_id')
                    ->where('product_status.status_id', $status_id)
                    ->orderBy('prod_price', 'asc')
                    ->paginate(9)->appends(request()->query());
            }
        } else {
            $status_by_id = DB::table('product')
                ->join('product_status', 'product.status_id', '=', 'product_status.status_id')
                ->where('product_status.status_id', $status_id)->paginate(9);
        }

        return view('pages.category.show_status')
            ->with('category', $cate_product)
            ->with('status_prod', $status_product)
            ->with('prod_type', $type_product)
            ->with('status_by_id', $status_by_id)
            ->with('status_name', $status_name);
    }

    public function show_type($type_id)
    {
        $cate_product = DB::table('category')->orderBy('cate_id', 'asc')->get();
        $status_product = DB::table('product_status')->orderBy('status_id', 'asc')->get();
        $type_name = DB::table('type')->where('type.type_id', $type_id)->limit(1)->get();
        $type_product = DB::table('type')->orderBy('type_id', 'asc')->get();

        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
            if ($sort == "desc") {
                $type_by_id = DB::table('product')
                    ->join('type', 'product.type_id', '=', 'type.type_id')
                    ->join('product_status', 'product.status_id', '=', 'product_status.status_id')
                    ->where('type.type_id', $type_id)
                    ->orderBy('prod_price', 'desc')
                    ->paginate(9)->appends(request()->query());
            } else if ($sort == "asc") {
                $type_by_id = DB::table('product')
                    ->join('type', 'product.type_id', '=', 'type.type_id')
                    ->join('product_status', 'product.status_id', '=', 'product_status.status_id')
                    ->where('type.type_id', $type_id)
                    ->orderBy('prod_price', 'asc')
                    ->paginate(9)->appends(request()->query());
            }
        } else {
            $type_by_id = DB::table('product')
                ->join('type', 'product.type_id', '=', 'type.type_id')
                ->join('product_status', 'product.status_id', '=', 'product_status.status_id')
                ->where('type.type_id', $type_id)->paginate(9);
        }

        return view('pages.category.show_type')
            ->with('category', $cate_product)
            ->with('status_prod', $status_product)
            ->with('prod_type', $type_product)
            ->with('type_by_id', $type_by_id)
            ->with('type_name', $type_name);
    }
    // ---------------------------------------------------------------------------------------------------
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
            Session::put('message', 'B???n c???n ????ng nh???p tr?????c!');
            return Redirect::to('/adminLogin')->send();
        }
    }
    // --------------------------------------------------------------------------------------------------
    // inventory managerment
    // category
    public function all_category()
    {
        $this->checkLogin();
        // $all_category = DB::table('category')->get();
        $all_category = category::all();
        $manager_category = view('inventory.show.all_category')->with('all_cate', $all_category);

        return view('inventoryLayout')->with('inventory.show.all_category', $manager_category);
    }
    public function add_category()
    {
        $this->checkLogin();
        return view('inventory.add.add_category');
    }
    public function save_category(Request $request)
    {
        $this->checkLogin();

        $data = $request->all();
        $cate = new category();
        $cate->cate_name = $data['cate_name'];
        $cate->cate_desc = $data['cate_desc'];
        $cate->save();

        // $data = array();
        // $data['cate_name'] = $request->cate_name;
        // $data['cate_desc'] = $request->cate_desc;
        // DB::table('category')->insert($data);

        Session::put('message', 'Th??m danh m???c s??ch th??nh c??ng!');

        return Redirect::to('/add-category');
    }
    public function edit_category($cate_id)
    {
        $this->checkLogin();
        // $edit_category = DB::table('category')->where('cate_id', $cate_id)->get();

        // $edit_category = category::where('cate_id', $cate_id)->get();
        $edit_category = category::find($cate_id);
        $manager_category = view('inventory.edit.edit_category')->with('edit_category', $edit_category);

        return view('inventoryLayout')->with('inventory.edit.edit_category', $manager_category);
    }
    public function update_category(Request $request, $cate_id)
    {
        $this->checkLogin();
        // $data = array();
        // $data['cate_name'] = $request->cate_name;
        // $data['cate_desc'] = $request->cate_desc;
        // DB::table('category')->where('cate_id', $cate_id)->update($data);

        $data = $request->all();
        $cate = category::find($cate_id);
        $cate->cate_name = $data['cate_name'];
        $cate->cate_desc = $data['cate_desc'];
        $cate->save();

        Session::put('message', 'C???p nh???t danh m???c s??ch th??nh c??ng!');
        return Redirect::to('/all-category');
    }
    public function delete_category($cate_id)
    {
        $this->checkLogin();
        category::where('cate_id', $cate_id)->delete();

        Session::put('message', 'X??a danh m???c s??ch th??nh c??ng!');
        return Redirect::to('/all-category');
    }
    // end category
    // ----------------------------------------------------------------------------------------------------
    // type
    public function all_type()
    {
        $this->checkLogin();
        $all_type = DB::table('type')->join('category', 'category.cate_id', '=', 'type.cate_id')->get();
        $manager_type = view('inventory.show.all_type')->with('all_type', $all_type);

        return view('inventoryLayout')->with('inventory.show.all_category', $manager_type);
    }
    public function add_type()
    {
        $this->checkLogin();
        $category = DB::table('category')->get();
        $manager_type = view('inventory.add.add_type')->with('category', $category);

        return view('inventoryLayout')->with('inventory.add.add_type', $manager_type);
    }
    public function save_type(Request $request)
    {
        $this->checkLogin();
        $data = array();
        $data['type_name'] = $request->type_name;
        $data['type_desc'] = $request->type_desc;
        $data['cate_id'] = $request->cate_id;

        DB::table('type')->insert($data);

        Session::put('message', 'Th??m lo???i s??ch th??nh c??ng!');

        return Redirect::to('/add-type');
    }
    public function edit_type($type_id)
    {
        $this->checkLogin();
        $edit_type = DB::table('type')->where('type_id', $type_id)->get();
        $category = DB::table('category')->get();
        $manager_type = view('inventory.edit.edit_type')->with('edit_type', $edit_type)->with('category', $category);

        return view('inventoryLayout')->with('inventory.edit.edit_type', $manager_type);
    }
    public function update_type(Request $request, $type_id)
    {
        $this->checkLogin();
        $data = array();
        $data['type_name'] = $request->type_name;
        $data['type_desc'] = $request->type_desc;
        $data['cate_id'] = $request->cate_id;

        DB::table('type')->where('type_id', $type_id)->update($data);

        Session::put('message', 'C???p nh???t lo???i s??ch th??nh c??ng!');
        return Redirect::to('/all-type');
    }
    public function delete_type($type_id)
    {
        $this->checkLogin();
        DB::table('type')->where('type_id', $type_id)->delete();

        Session::put('message', 'X??a lo???i s??ch th??nh c??ng!');
        return Redirect::to('/all-type');
    }
    // end type
    // ------------------------------------------------------------------------------------------------
    // status
    public function all_status()
    {
        $this->checkLogin();
        $all_status = DB::table('product_status')->get();
        $manager_status = view('inventory.show.all_status')->with('all_status', $all_status);

        return view('inventoryLayout')->with('inventory.show.all_status', $manager_status);
    }
    public function add_status()
    {
        $this->checkLogin();
        return view('inventory.add.add_status');
    }
    public function save_status(Request $request)
    {
        $this->checkLogin();
        $data = array();
        $data['status_name'] = $request->status_name;
        $data['status_desc'] = $request->status_desc;

        DB::table('product_status')->insert($data);

        Session::put('message', 'Th??m t??nh tr???ng s??ch th??nh c??ng!');

        return Redirect::to('/add-status');
    }
    public function edit_status($status_id)
    {
        $this->checkLogin();
        $edit_status = DB::table('product_status')->where('status_id', $status_id)->get();
        $manager_status = view('inventory.edit.edit_status')->with('edit_status', $edit_status);

        return view('inventoryLayout')->with('inventory.edit.edit_status', $manager_status);
    }
    public function update_status(Request $request, $status_id)
    {
        $this->checkLogin();
        $data = array();
        $data['status_name'] = $request->status_name;
        $data['status_desc'] = $request->status_desc;

        DB::table('product_status')->where('status_id', $status_id)->update($data);

        Session::put('message', 'C???p nh???t t??nh tr???ng s??ch th??nh c??ng!');
        return Redirect::to('/all-status');
    }
    public function delete_status($status_id)
    {
        $this->checkLogin();
        DB::table('product_status')->where('status_id', $status_id)->delete();

        Session::put('message', 'X??a t??nh tr???ng s??ch th??nh c??ng!');
        return Redirect::to('/all-status');
    }
    // end status
    // -------------------------------------------------------------------------------------------------
    // author
    public function all_author()
    {
        $this->checkLogin();
        $all_author = DB::table('author')->get();
        $manager_author = view('inventory.show.all_author')->with('all_author', $all_author);

        return view('inventoryLayout')->with('inventory.show.all_author', $manager_author);
    }
    public function add_author()
    {
        $this->checkLogin();
        return view('inventory.add.add_author');
    }
    public function save_author(Request $request)
    {
        $this->checkLogin();
        $data = array();
        $data['author_name'] = $request->author_name;
        $data['author_introduce'] = $request->author_desc;

        DB::table('author')->insert($data);

        Session::put('message', 'Th??m t??c gi??? th??nh c??ng!');

        return Redirect::to('/add-author');
    }
    public function edit_author($author_id)
    {
        $this->checkLogin();
        $edit_author = DB::table('author')->where('author_id', $author_id)->get();
        $manager_author = view('inventory.edit.edit_author')->with('edit_author', $edit_author);

        return view('inventoryLayout')->with('inventory.edit.edit_author', $manager_author);
    }
    public function update_author(Request $request, $author_id)
    {
        $this->checkLogin();
        $data = array();
        $data['author_name'] = $request->author_name;
        $data['author_introduce'] = $request->author_desc;

        DB::table('author')->where('author_id', $author_id)->update($data);

        Session::put('message', 'C???p nh???t t??c gi??? th??nh c??ng!');
        return Redirect::to('/all-author');
    }
    public function delete_author($author_id)
    {
        $this->checkLogin();
        DB::table('author')->where('author_id', $author_id)->delete();

        Session::put('message', 'X??a t??c gi??? th??nh c??ng!');
        return Redirect::to('/all-author');
    }
    // end author
    // -----------------------------------------------------------------------------------------------
    // supplier
    public function all_supplier()
    {
        $this->checkLogin();
        $all_supplier = DB::table('supplier')->get();
        $manager_supplier = view('inventory.show.all_supplier')->with('all_supplier', $all_supplier);

        return view('inventoryLayout')->with('inventory.show.all_supplier', $manager_supplier);
    }
    public function add_supplier()
    {
        $this->checkLogin();
        return view('inventory.add.add_supplier');
    }
    public function save_supplier(Request $request)
    {
        $this->checkLogin();
        $data = array();
        $data['supplier_name'] = $request->supplier_name;
        $data['supplier_contact'] = $request->supplier_contact;
        $data['supplier_addr'] = $request->supplier_address;

        DB::table('supplier')->insert($data);

        Session::put('message', 'Th??m t??c gi??? th??nh c??ng!');

        return Redirect::to('/add-supplier');
    }
    public function edit_supplier($supplier_id)
    {
        $this->checkLogin();
        $edit_supplier = DB::table('supplier')->where('supplier_id', $supplier_id)->get();
        $manager_supplier = view('inventory.edit.edit_supplier')->with('edit_supplier', $edit_supplier);

        return view('inventoryLayout')->with('inventory.edit.edit_supplier', $manager_supplier);
    }
    public function update_supplier(Request $request, $supplier_id)
    {
        $this->checkLogin();
        $data = array();
        $data['supplier_name'] = $request->supplier_name;
        $data['supplier_contact'] = $request->supplier_contact;
        $data['supplier_addr'] = $request->supplier_address;

        DB::table('supplier')->where('supplier_id', $supplier_id)->update($data);

        Session::put('message', 'C???p nh???t nh?? xu???t b???n th??nh c??ng!');
        return Redirect::to('/all-supplier');
    }
    public function delete_supplier($supplier_id)
    {
        $this->checkLogin();
        DB::table('supplier')->where('supplier_id', $supplier_id)->delete();

        Session::put('message', 'X??a nh?? xu???t b???n th??nh c??ng!');
        return Redirect::to('/all-supplier');
    }
    // end supplier
    // --------------------------------------------------------------------------------------------------
    // product
    public function all_product()
    {
        $this->checkLogin();
        $all_product = DB::table('product')
            ->join('type', 'type.type_id', '=', 'product.type_id')
            ->join('category', 'category.cate_id', '=', 'type.cate_id')
            ->join('author', 'author.author_id', '=', 'product.author_id')
            ->join('product_status', 'product_status.status_id', '=', 'product.status_id')
            ->join('supplier', 'supplier.supplier_id', '=', 'product.supplier_id')
            ->orderBy('prod_name', 'asc')
            ->get();
        $manager_product = view('inventory.show.all_product')->with('all_product', $all_product);

        return view('inventoryLayout')->with('inventory.show.all_product', $manager_product);
    }
    public function add_product()
    {
        $this->checkLogin();
        $type = DB::table('type')->get();
        $supplier = DB::table('supplier')->get();
        $author = DB::table('author')->get();
        $status = DB::table('product_status')->get();
        $manager_product = view('inventory.add.add_product')->with('type', $type)->with('supplier', $supplier)->with('author', $author)->with('status', $status);

        return view('inventoryLayout')->with('inventory.add.add_product', $manager_product);
    }
    public function save_product(Request $request)
    {

        $request->validate([
            'product_numofpages' => 'regex:/^([0-9]+)$/',
            'product_price' => 'regex:/^([0-9]+)$/',
            'product_quantity' => 'regex:/^([0-9]+)$/',
        ]);

        $this->checkLogin();
        $data = array();
        $data['prod_name'] = strtoupper($request->product_name);
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
        $get_image = $request->file('inpthumbnail');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/Backend/images', $new_image);
            $data['acc_img'] = $new_image;
        } else {
            $data['thumbnail'] = "default.jpg";
        }
        DB::table('product')->insert($data);

        Session::put('message', 'Th??m s??ch th??nh c??ng!');

        return Redirect::to('/add-product');
    }
    public function edit_product($product_id)
    {
        $this->checkLogin();
        $edit_product = DB::table('product')->where('prod_id', $product_id)->get();
        $type = DB::table('type')->get();
        $supplier = DB::table('supplier')->get();
        $author = DB::table('author')->get();
        $status = DB::table('product_status')->get();
        $manager_product = view('inventory.edit.edit_product')->with('edit_product', $edit_product)->with('type', $type)->with('supplier', $supplier)->with('author', $author)->with('status', $status);

        return view('inventoryLayout')->with('inventory.edit.edit_product', $manager_product);
    }

    public function update_product(Request $request, $product_id)
    {

        $request->validate([
            'product_numofpages' => 'regex:/^([0-9]+)$/',
            'product_price' => 'regex:/^([0-9]+)$/',
            'product_quantity' => 'regex:/^([0-9]+)$/',
        ]);

        $this->checkLogin();
        $data = array();
        $data['prod_name'] = strtoupper($request->product_name);
        $data['prod_desc'] = $request->product_desc;
        $data['prod_numofpages'] = $request->product_numofpages;
        $data['prod_size'] = $request->product_size;
        $data['prod_datepublished'] = $request->product_datepublished;
        $data['prod_price'] = $request->product_price;
        $data['prod_quantity'] = $request->product_quantity;
        $data['status_id'] = $request->status_id;
        $data['author_id'] = $request->author_id;
        $data['supplier_id'] = $request->supplier_id;
        $data['thumbnail'] = $request->product_thumbnail;
        $data['type_id'] = $request->type_id;

        DB::table('product')->where('prod_id', $product_id)->update($data);

        Session::put('message', 'C???p nh???t s??ch th??nh c??ng!');
        return Redirect::to('/all-product');
    }
    public function delete_product($product_id)
    {
        $this->checkLogin();
        DB::table('product')->where('prod_id', $product_id)->delete();

        Session::put('message', 'X??a s??ch th??nh c??ng!');
        return Redirect::to('/all-product');
    }
}
