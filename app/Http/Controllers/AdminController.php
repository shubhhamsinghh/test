<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sub_Category;
use App\Models\Product;
use App\Models\Cat_Description;
use App\Models\Cat_Des_Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $a1 = DB::table('products')->count();
        $a2 = DB::table('contact')->count();
        return view('admin_pages.dashboard', compact('a1', 'a2'));
    }

    public function change_password()
    {
        return view('admin_pages.change-password');
    }
    public function update_password(Request $request)
    {
        $password = $request->password;
        $con_password = $request->confirm_password;
        if ($password !== $con_password) {
            $request->session()->flash('response_msg', 'Password does not match !!');
            $request->session()->flash('response_type', 'error');
            return redirect()->back();
        } else {
            $newPassword = Hash::make($password);
            DB::table('users')->where('id', 1)->update(['password' => $newPassword]);
            $request->session()->flash('response_msg', 'Password updated successfully !!');
            $request->session()->flash('response_type', 'success');
            return redirect()->back();
        }
    }

    /* Category */
    public function category()
    {
        $categories = DB::table('category')->orderByDesc('id')->get();
        return view('admin_pages.category', compact('categories'));
    }

    public function category_add(Request $request)
    {
        if(Category::where('cat_name',$request->cat_name)->exists()){
        $request->session()->flash('response_msg', 'Category already added !!'); //success,info,error,warning
        $request->session()->flash('response_type', 'error');
        return redirect()->back(); 
        }else{
        $filename = '';
        $filename1 = '';
        $destinationpath = 'images/category/';
        if (request()->file('cat_image') != '' || request()->file('cat_image') != null) {
            if (request()->file('cat_image')->isValid()) {
                $file = request()->file('cat_image')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $filename = strtolower($filename);
                $filename = preg_replace("/[^a-z0-9_\s-]/", "", $filename);
                $filename = preg_replace("/[\s-]+/", " ", $filename);
                $filename = preg_replace("/[\s_]/", "-", $filename);
                $extension1 = request()->file('cat_image')->getClientOriginalExtension();
                $filename1 = $filename . '_' . rand(11111, 99999) . '.' . $extension1;
                request()->file('cat_image')->move($destinationpath, $filename1);
            }
        }

        $str_url = strtolower($request->cat_name);
        $str_url = preg_replace("/[^a-z0-9\s-]/", "", $str_url);
        $str_url = preg_replace("/[\s-]+/", "-", $str_url);
        $str_url = preg_replace("/[\s_]/", "-", $str_url);

        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->cat_url = $str_url;
        $category->cat_image = $filename1;
        $category->cat_description = $request->cat_description;
        $category->cat_meta = $request->cat_meta;
        $category->save();
        $request->session()->flash('response_msg', 'Category added successfully !!'); //success,info,error,warning
        $request->session()->flash('response_type', 'success');
        return redirect()->back(); 
        }
    }

    public function category_delete(Request $request, $id)
    {
        $data = DB::table('category')->where(['id' => $id])->select('cat_image')->first();
        $image_path = 'images/category/' . $data->cat_image;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        DB::table('category')->where(['id' => $id])->delete();
        $request->session()->flash('response_msg', 'Category deleted successfully !!'); //success,info,error,warning
        $request->session()->flash('response_type', 'success');
        return redirect()->back();
    }

    public function category_update(Request $request)
    {
        $id = $request->input('cat_id');
        $str_url = strtolower($request->cat_name);
        $str_url = preg_replace("/[^a-z0-9\s-]/", "", $str_url);
        $str_url = preg_replace("/[\s-]+/", "-", $str_url);
        $str_url = preg_replace("/[\s_]/", "-", $str_url);

        DB::table('category')->where('id', $id)->update([
            'cat_name' => $request->input('cat_name'),
            'cat_url' => $str_url,
            'cat_description' => $request->input('cat_description'),
            'cat_meta' => $request->input('cat_meta'),
        ]);

        $filename = '';
        $filename1 = '';;
        $destinationpath = 'images/category/';

        if ($request->hasFile('cat_image')) {
            if ($request->file('cat_image')->isValid()) {
                $file = $request->file('cat_image')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $filename = strtolower($filename);
                $filename = preg_replace("/[^a-z0-9_\s-]/", "", $filename);
                $filename = preg_replace("/[\s-]+/", " ", $filename);
                $filename = preg_replace("/[\s_]/", "-", $filename);
                $extension1 = $request->file('cat_image')->getClientOriginalExtension();
                $filename1 = $filename . '_' . rand(11111, 99999) . '.' . $extension1;
                $request->file('cat_image')->move($destinationpath, $filename1);

                $data = DB::table('category')->where(['id' => $id])->select('cat_image')->first();
                $image_path = asset('images/category/' . $data->cat_image);
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                File::delete($image_path);

                DB::table('category')->where('id', $id)->update(['cat_image' => $filename1]);
            }
        }

        $request->session()->flash('response_msg', 'Category updated successfully !!'); //success,info,error,warning
        $request->session()->flash('response_type', 'success');
        return redirect()->back();
    }

    public function category_detail($url)
    {
        $cat = DB::table('category')->where('cat_url',$url)->first();
        $data = Cat_Description::with('category','cat_images')->where('category_id',$cat->id)->orderByDesc('id')->get();
        return view('admin_pages.category-detail', compact('data'));
    }
    public function category_detail_add(Request $request)
    {
      
        $str_url = strtolower($request->cat_dec_heading);
        $str_url = preg_replace("/[^a-z0-9\s-]/", "", $str_url);
        $str_url = preg_replace("/[\s-]+/", "-", $str_url); 
        $str_url = preg_replace("/[\s_]/", "-", $str_url);

        $filename = '';
        $filename1 = '';
        $destinationpath = 'images/category/';
        if (request()->file('cat_des_image') != '' || request()->file('cat_des_image') != null) {
            if (request()->file('cat_des_image')->isValid()) {
                $file = request()->file('cat_des_image')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $filename = strtolower($filename);
                $filename = preg_replace("/[^a-z0-9_\s-]/", "", $filename);
                $filename = preg_replace("/[\s-]+/", " ", $filename);
                $filename = preg_replace("/[\s_]/", "-", $filename);
                $extension1 = request()->file('cat_des_image')->getClientOriginalExtension();
                $filename1 = $filename . '_' . rand(11111, 99999) . '.' . $extension1;
                request()->file('cat_des_image')->move($destinationpath, $filename1);
            }
        }

        $data = new Cat_Description();
        $data->category_id = $request->category_id;
        $data->cat_dec_heading = $request->cat_dec_heading;
        $data->cat_dec_url = $str_url;
        $data->cat_des_image = $filename1;
        $data->cat_dec_description = $request->cat_dec_description;
        $data->cat_dec_meta = $request->cat_dec_meta;
        $data->save();

        $filename_1 = '';
        $filename_11 = '';
        $destinationpath_1 = 'images/category-detail/';
        if (request()->file('cat_des_cimg') != '' || request()->file('cat_des_cimg') != null) {
            // if (request()->file('cat_des_cimg')->isValid()) {
                foreach ($request->file('cat_des_cimg') as $fl) {
                    $file = $fl->getClientOriginalName();
                    $filename_1 = pathinfo($file, PATHINFO_FILENAME);
                    $filename_1 = strtolower($filename_1);
                    $filename_1 = preg_replace("/[^a-z0-9_\s-]/", "", $filename_1);
                    $filename_1 = preg_replace("/[\s-]+/", " ", $filename_1);
                    $filename_1 = preg_replace("/[\s_]/", "-", $filename_1);
                    $extension1 = $fl->getClientOriginalExtension();
                    $filename_11 = $filename_1 . '_' . rand(11111, 99999) . '.' . $extension1;
                    $fl->move($destinationpath_1, $filename_11);
                    DB::table('cat_des_images')->insert(['category_id' => $request->category_id, 'cat_des_id' => $data->id, 'cat_des_cimg' => $filename_11]);
                }
            // }
        }

        dd($data);

        $request->session()->flash('response_msg', 'Category Detail added successfully !!'); //success,info,error,warning
        $request->session()->flash('response_type', 'success');
        return redirect()->back();
    }

    /* Sub-Category */
    public function sub_category()
    {
        $sub_categories = Sub_Category::with('category')->orderByDesc('id')->get();
        $cat_data = DB::table('category')->get();
        return view('admin_pages.sub_category', compact('sub_categories', 'cat_data'));
    }

    public function sub_category_add(Request $request)
    {
        if(Sub_Category::where('cat_id',$request->prod_cat)->where('sub_cat_name',$request->sub_cat_name)->exists()){
        $request->session()->flash('response_msg', 'Sub Category already added !!'); //success,info,error,warning
        $request->session()->flash('response_type', 'error');
        return redirect()->back(); 
        }else{
        $filename = '';
        $filename1 = '';
        $destinationpath = 'images/sub_category/';
        if (request()->file('sub_cat_image') != '' || request()->file('sub_cat_image') != null) {
            if (request()->file('sub_cat_image')->isValid()) {
                $file = request()->file('sub_cat_image')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $filename = strtolower($filename);
                $filename = preg_replace("/[^a-z0-9_\s-]/", "", $filename);
                $filename = preg_replace("/[\s-]+/", " ", $filename);
                $filename = preg_replace("/[\s_]/", "-", $filename);
                $extension1 = request()->file('sub_cat_image')->getClientOriginalExtension();
                $filename1 = $filename . '_' . rand(11111, 99999) . '.' . $extension1;
                request()->file('sub_cat_image')->move($destinationpath, $filename1);
            }
        }

        $str_url = strtolower($request->sub_cat_name);
        $str_url = preg_replace("/[^a-z0-9\s-]/", "", $str_url);
        $str_url = preg_replace("/[\s-]+/", "-", $str_url);
        $str_url = preg_replace("/[\s_]/", "-", $str_url);

        $sub_category = new Sub_Category();
        $sub_category->cat_id = $request->prod_cat;
        $sub_category->sub_cat_name = $request->sub_cat_name;
        $sub_category->sub_cat_url = $str_url;
        $sub_category->sub_cat_image = $filename1;
        $sub_category->image_alt = $request->image_alt;
        $sub_category->save();
        $request->session()->flash('response_msg', 'Sub-Category added successfully !!'); //success,info,error,warning
        $request->session()->flash('response_type', 'success');
        return redirect()->back();
        }
    }

    public function sub_category_delete(Request $request, $id)
    {
        $data = DB::table('sub_category')->where(['id' => $id])->select('sub_cat_image')->first();
        $image_path = 'images/sub_category/' . $data->sub_cat_image;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        DB::table('sub_category')->where(['id' => $id])->delete();
        $request->session()->flash('response_msg', 'Sub-Category deleted successfully !!'); //success,info,error,warning
        $request->session()->flash('response_type', 'success');
        return redirect()->back();
    }

    public function sub_category_update(Request $request)
    {
        $id = $request->input('sub_cat_id');

        $str_url = strtolower($request->sub_cat_name);
        $str_url = preg_replace("/[^a-z0-9\s-]/", "", $str_url);
        $str_url = preg_replace("/[\s-]+/", "-", $str_url);
        $str_url = preg_replace("/[\s_]/", "-", $str_url);

        DB::table('sub_category')->where('id', $id)->update([
            'cat_id' => $request->input('prod_cat'),
            'sub_cat_name' => $request->input('sub_cat_name'),
            'sub_cat_url' => $str_url,
            'image_alt' => $request->input('image_alt'),
        ]);

        $filename = '';
        $filename1 = '';;
        $destinationpath = 'images/sub_category/';

        if ($request->hasFile('sub_cat_image')) {
            if ($request->file('sub_cat_image')->isValid()) {
                $file = $request->file('sub_cat_image')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $filename = strtolower($filename);
                $filename = preg_replace("/[^a-z0-9_\s-]/", "", $filename);
                $filename = preg_replace("/[\s-]+/", " ", $filename);
                $filename = preg_replace("/[\s_]/", "-", $filename);
                $extension1 = $request->file('sub_cat_image')->getClientOriginalExtension();
                $filename1 = $filename . '_' . rand(11111, 99999) . '.' . $extension1;
                $request->file('sub_cat_image')->move($destinationpath, $filename1);

                $data = DB::table('sub_category')->where(['id' => $id])->select('sub_cat_image')->first();
                $image_path = 'images/sub_category/' . $data->sub_cat_image;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                DB::table('sub_category')->where('id', $id)->update(['sub_cat_image' => $filename1]);
            }
        }

        $request->session()->flash('response_msg', 'Category updated successfully !!'); //success,info,error,warning
        $request->session()->flash('response_type', 'success');
        return redirect()->back();
    }
    
    
    public function serial_no(Request $request)
    {
        $id = $request->id;
        $sr_no = $request->sr_no;
        if($id != null && $sr_no != null){
        $data = DB::table('sub_category')->where('id', $id)->first();
          if($data != null){
                DB::table('sub_category')->where('id', $id)->update(['sr_no' => $sr_no]);
                return response(['success' => true]);
          }
        }else{
            return response(['success' => false]);
        }
    }

    

    /* Products */
    public function product()
    {
        $products = Product::with('category', 'sub_category')->orderByDesc('id')->get();
        $cat_data = DB::table('category')->get();
        // $sub_cat_data = DB::table('sub_category')->get();
        return view('admin_pages.product', compact('products', 'cat_data')); //,'sub_cat_data'
    }

    public function product_add(Request $request)
    {
        $filename = '';
        $filename1 = '';
        $destinationpath = 'images/products/';
        if (request()->file('prod_image') != '' || request()->file('prod_image') != null) {
            if (request()->file('prod_image')->isValid()) {
                $file = request()->file('prod_image')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $filename = strtolower($filename);
                $filename = preg_replace("/[^a-z0-9_\s-]/", "", $filename);
                $filename = preg_replace("/[\s-]+/", " ", $filename);
                $filename = preg_replace("/[\s_]/", "-", $filename);
                $extension1 = request()->file('prod_image')->getClientOriginalExtension();
                $filename1 = $filename . '_' . rand(11111, 99999) . '.' . $extension1;
                request()->file('prod_image')->move($destinationpath, $filename1);
            }
        }

        $str_url = strtolower($request->prod_name);
        $str_url = preg_replace("/[^a-z0-9\s-]/", "", $str_url);
        $str_url = preg_replace("/[\s-]+/", "-", $str_url);
        $str_url = preg_replace("/[\s_]/", "-", $str_url);

        $product = new Product();
        $product->prod_name = $request->prod_name;
        $product->prod_url = $str_url;
        $product->category_id = $request->prod_cat;
        $product->sub_category_id = $request->prod_sub_cat;
        $product->prod_image = $filename1;
        $product->image_alt = $request->image_alt;
        $product->model_no = $request->model_no;
        $product->description = $request->prod_desc;
        $product->save();
        $request->session()->flash('response_msg', 'Sub-Category added successfully !!'); //success,info,error,warning
        $request->session()->flash('response_type', 'success');
        return redirect()->back();
    }

    public function product_delete(Request $request, $id)
    {
        $data = DB::table('products')->where(['id' => $id])->select('prod_image')->first();
        $image_path = 'images/products/' . $data->prod_image;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        DB::table('products')->where(['id' => $id])->delete();
        $request->session()->flash('response_msg', 'Product deleted successfully !!'); //success,info,error,warning
        $request->session()->flash('response_type', 'success');
        return redirect()->back();
    }

    public function product_update(Request $request)
    {
        $id = $request->input('prod_id');

        $str_url = strtolower($request->prod_name);
        $str_url = preg_replace("/[^a-z0-9\s-]/", "", $str_url);
        $str_url = preg_replace("/[\s-]+/", "-", $str_url);
        $str_url = preg_replace("/[\s_]/", "-", $str_url);

        DB::table('products')->where('id', $id)->update([
            'prod_name' => $request->input('prod_name'),
            'prod_url' => $str_url,
            'category_id' => $request->input('prod_cat'),
            'sub_category_id' => $request->input('prod_sub_cat'),
            'image_alt' => $request->input('image_alt'),
            'model_no' => $request->input('model_no'),
            'description' => $request->input('prod_desc'),
        ]);

        $filename = '';
        $filename1 = '';;
        $destinationpath = 'images/products/';

        if ($request->hasFile('prod_image')) {
            if ($request->file('prod_image')->isValid()) {
                $file = $request->file('prod_image')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $filename = strtolower($filename);
                $filename = preg_replace("/[^a-z0-9_\s-]/", "", $filename);
                $filename = preg_replace("/[\s-]+/", " ", $filename);
                $filename = preg_replace("/[\s_]/", "-", $filename);
                $extension1 = $request->file('prod_image')->getClientOriginalExtension();
                $filename1 = $filename . '_' . rand(11111, 99999) . '.' . $extension1;
                $request->file('prod_image')->move($destinationpath, $filename1);

                $data = DB::table('products')->where(['id' => $id])->select('prod_image')->first();
                $image_path = 'images/products/' . $data->prod_image;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                DB::table('products')->where('id', $id)->update(['prod_image' => $filename1]);
            }
        }

        $request->session()->flash('response_msg', 'Product updated successfully !!'); //success,info,error,warning
        $request->session()->flash('response_type', 'success');
        return redirect()->back();
    }

    public function get_sub_cat($id)
    {
        $subCategories = DB::table('sub_category')->where('cat_id', $id)->get();
        $html = '<option value="">--Select Sub Category--</option>';
        foreach ($subCategories as $sub) {
            $html .= "<option value='" . $sub->id . "'>" . $sub->sub_cat_name . "</option>";
        }
        return $html;
    }
    
    public function is_trending($id)
    {
        $data = DB::table('products')->where('id', $id)->first();
        $status = ($data->is_trending == '1') ? '0' : '1';
        DB::table('products')->where('id', $id)->update(['is_trending' => $status]);
        return true;
    }

    public function is_tab($id)
    {
        $data = DB::table('products')->where('id', $id)->first();
        $status = ($data->tab_product == '1') ? '0' : '1';
        DB::table('products')->where('id', $id)->update(['tab_product' => $status]);
        return true;
    }

    /* Enquiries */
    public function enquiries()
    {
        $enquiries = DB::table('contact')->orderByDesc('id')->get();
        return view('admin_pages.enquiry', compact('enquiries'));
    }

    public function enq_delete(Request $request, $id)
    {

        DB::table('contact')->where(['id' => $id])->delete();

        $request->session()->flash('response_msg', 'Enquiry deleted successfully !!'); //success,info,error,warning
        $request->session()->flash('response_type', 'success');
        return redirect()->back();
    }

    public function admin_logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
}
