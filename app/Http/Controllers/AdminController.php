<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cat_Description;
use App\Models\Cat_Des_Images;
use App\Models\Portfolio;
use App\Models\Port_Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Svg\Tag\Rect;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $a1 = DB::table('category')->count();
        $a2 = DB::table('portfolio')->count();
        $a3 = DB::table('contact')->count();
        $a4 = DB::table('company_info')->count();
        $a5 = DB::table('testimonials')->count();
        return view('admin_pages.dashboard', compact('a1', 'a2', 'a3', 'a4', 'a5'));
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

    public function company_info(){

        $company_info = DB::table('company_info')->first();
        return view('admin_pages.company',compact('company_info'));
    }

    public function company_info_update(Request $request){

        $company_info = array(
            'comp_email1' => $request->c_email1,
            'comp_contact1' => $request->c_no1,
            'comp_address' => $request->c_adrs,
            'comp_map' => $request->c_map,
            'comp_sm1' => $request->c_sm1,
            'comp_sm2' => $request->c_sm2,
            'comp_sm3' => $request->c_sm3,
        );
        $company_info = DB::table('company_info')->where('id',1)->update($company_info);
        $request->session()->flash('response_msg', 'Company Info updated successfully !!'); //success,info,error,warning
        $request->session()->flash('response_type', 'success');
        return redirect()->back();
    }

    /* Category */
    public function category()
    {
        $categories = Category::with('cat_description')->orderByDesc('id')->get();
        return view('admin_pages.category', compact('categories'));
    }

    public function category_add(Request $request)
    {
        if(Category::where('cat_name',$request->cat_name)->exists()){
        $request->session()->flash('response_msg', 'Category already added !!'); //success,info,error,warning
        $request->session()->flash('response_type', 'error');
        return redirect()->back(); 
        }else{
        $filename = '';$filename1 = '';
        $filename2 = '';$filename21 = '';
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

        if (request()->file('cat_ban_image') != '' || request()->file('cat_ban_image') != null) {
            if (request()->file('cat_ban_image')->isValid()) {
                $file = request()->file('cat_ban_image')->getClientOriginalName();
                $filename2 = pathinfo($file, PATHINFO_FILENAME);
                $filename2 = strtolower($filename2);
                $filename2 = preg_replace("/[^a-z0-9_\s-]/", "", $filename2);
                $filename2 = preg_replace("/[\s-]+/", " ", $filename2);
                $filename2 = preg_replace("/[\s_]/", "-", $filename2);
                $extension1 = request()->file('cat_ban_image')->getClientOriginalExtension();
                $filename21 = $filename . '_' . rand(11111, 99999) . '.' . $extension1;
                request()->file('cat_ban_image')->move($destinationpath, $filename21);
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
        $category->cat_ban_image = $filename21;
        $category->cat_description = $request->cat_description;
        $category->cat_detail_des = $request->cat_detail_des;
        $category->cat_meta = $request->cat_meta;
        $category->save();
        $request->session()->flash('response_msg', 'Category added successfully !!'); 
        $request->session()->flash('response_type', 'success');
        return redirect()->back(); 
        }
    }

    public function category_delete(Request $request, $id)
    {
        $cat_desc = DB::table('cat_description')->where(['category_id' => $id])->count();
        if($cat_desc > 0){
            $request->session()->flash('response_msg', 'Cannot delete category with details !!'); 
            $request->session()->flash('response_type', 'error');
            return redirect()->back();
        }else{
        $data = DB::table('category')->where(['id' => $id])->select('cat_image','cat_ban_image')->first();
        $image_path = 'images/category/' . $data->cat_image;
        $image_path2 = 'images/category/' . $data->cat_ban_image;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        if (File::exists($image_path2)) {
            File::delete($image_path2);
        }
        DB::table('category')->where(['id' => $id])->delete();
        $request->session()->flash('response_msg', 'Category deleted successfully !!');
        $request->session()->flash('response_type', 'success');
        return redirect()->back();
       }
    }
    public function is_home($id)
    {
        $data = DB::table('cat_description')->where('id', $id)->first();
        if($data->is_home == 0){$status = 1;}else{ $status = 0;}
        DB::table('cat_description')->where('id', $id)->update(['is_home' => $status]);
        return response()->json(['success' => true]);
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
            'cat_detail_des' => $request->input('cat_detail_des'),
        ]);

        $filename = '';$filename1 = '';
        $filename2 = '';$filename21 = '';
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
                $image_path = 'images/category/' . $data->cat_image;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                File::delete($image_path);

                DB::table('category')->where('id', $id)->update(['cat_image' => $filename1]);
            }
        }

        if ($request->hasFile('cat_ban_image')) {
            if ($request->file('cat_ban_image')->isValid()) {
                $file = $request->file('cat_ban_image')->getClientOriginalName();
                $filename2 = pathinfo($file, PATHINFO_FILENAME);
                $filename2 = strtolower($filename2);
                $filename2 = preg_replace("/[^a-z0-9_\s-]/", "", $filename2);
                $filename2 = preg_replace("/[\s-]+/", " ", $filename2);
                $filename2 = preg_replace("/[\s_]/", "-", $filename2);
                $extension1 = $request->file('cat_ban_image')->getClientOriginalExtension();
                $filename21 = $filename2 . '_' . rand(11111, 99999) . '.' . $extension1;
                $request->file('cat_ban_image')->move($destinationpath, $filename21);

                $data = DB::table('category')->where(['id' => $id])->select('cat_ban_image')->first();
                $image_path = 'images/category/' . $data->cat_ban_image;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                File::delete($image_path);

                DB::table('category')->where('id', $id)->update(['cat_ban_image' => $filename21]);
            }
        }

        $request->session()->flash('response_msg', 'Category updated successfully !!'); 
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

        $filename = '';$filename1 = '';
        $filename2 = '';$filename21 = '';
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

        if (request()->file('cat_des_ban_image') != '' || request()->file('cat_des_ban_image') != null) {
            if (request()->file('cat_des_ban_image')->isValid()) {
                $file = request()->file('cat_des_ban_image')->getClientOriginalName();
                $filename2 = pathinfo($file, PATHINFO_FILENAME);
                $filename2 = strtolower($filename2);
                $filename2 = preg_replace("/[^a-z0-9_\s-]/", "", $filename2);
                $filename2 = preg_replace("/[\s-]+/", " ", $filename2);
                $filename2 = preg_replace("/[\s_]/", "-", $filename2);
                $extension1 = request()->file('cat_des_ban_image')->getClientOriginalExtension();
                $filename21 = $filename2 . '_' . rand(11111, 99999) . '.' . $extension1;
                request()->file('cat_des_ban_image')->move($destinationpath, $filename21);
            }
        }

        $data = new Cat_Description();
        $data->category_id = $request->category_id;
        $data->cat_dec_heading = $request->cat_dec_heading;
        $data->cat_dec_url = $str_url;
        $data->cat_des_image = $filename1;
        $data->cat_des_ban_image = $filename21;
        $data->cat_dec_description = $request->cat_dec_description;
        $data->cat_dec_meta = $request->cat_dec_meta;
        $data->save();

        $filename_1 = ''; $filename_11 = '';
        $destinationpath_1 = 'images/category-detail/';
        if (request()->file('cat_des_cimg') != '' || request()->file('cat_des_cimg') != null) {
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
        }

        $request->session()->flash('response_msg', 'Category Detail added successfully !!'); 
        $request->session()->flash('response_type', 'success');
        return redirect()->back();
    }

    public function category_detail_update(Request $request,$id)
    {
        $data = DB::table('cat_description')->where(['id' => $id])->select('cat_des_image','category_id')->first();

        $str_url = strtolower($request->cat_dec_heading);
        $str_url = preg_replace("/[^a-z0-9\s-]/", "", $str_url);
        $str_url = preg_replace("/[\s-]+/", "-", $str_url); 
        $str_url = preg_replace("/[\s_]/", "-", $str_url);

        $filename = '';$filename1 = '';
        $filename2 = '';$filename21 = '';
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

                $image_path = 'images/category/' . $data->cat_des_image;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                DB::table('cat_description')->where('id', $id)->update(['cat_des_image' => $filename1]);
            }
        }

        if (request()->file('cat_des_ban_image') != '' || request()->file('cat_des_ban_image') != null) {
            if (request()->file('cat_des_ban_image')->isValid()) {
                $file = request()->file('cat_des_ban_image')->getClientOriginalName();
                $filename2 = pathinfo($file, PATHINFO_FILENAME);
                $filename2 = strtolower($filename2);
                $filename2 = preg_replace("/[^a-z0-9_\s-]/", "", $filename2);
                $filename2 = preg_replace("/[\s-]+/", " ", $filename2);
                $filename2 = preg_replace("/[\s_]/", "-", $filename2);
                $extension1 = request()->file('cat_des_ban_image')->getClientOriginalExtension();
                $filename21 = $filename2 . '_' . rand(11111, 99999) . '.' . $extension1;
                request()->file('cat_des_ban_image')->move($destinationpath, $filename21);

                $image_path = 'images/category/' . $data->cat_des_ban_image;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                DB::table('cat_description')->where('id', $id)->update(['cat_des_ban_image' => $filename21]);
            }
        }

        DB::table('cat_description')->where('id', $id)->update([
            'cat_dec_heading' => $request->input('cat_dec_heading'),
            'cat_dec_url' => $str_url,
            'cat_dec_description' => $request->input('cat_dec_description'),
            'cat_dec_meta' => $request->input('cat_dec_meta'),
        ]);

        $filename_1 = '';
        $filename_11 = '';
        $destinationpath_1 = 'images/category-detail/';
        if (request()->file('cat_des_cimg') != '' || request()->file('cat_des_cimg') != null) {
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
                    DB::table('cat_des_images')->insert(['category_id' => $data->category_id, 'cat_des_id' => $id, 'cat_des_cimg' => $filename_11]);
                }
        }

        $request->session()->flash('response_msg', 'Category Detail update successfully !!');
        $request->session()->flash('response_type', 'success');
        return redirect()->back();
    }

    public function category_detail_delete(Request $request, $id)
    {
        $data1 = DB::table('cat_des_images')->where(['cat_des_id' => $id])->select('cat_des_cimg')->get();
        foreach($data1 as $d){
        $image_path = 'images/category-detail/' . $d->cat_des_cimg;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        DB::table('cat_des_images')->where(['id' => $id])->delete();
        }

        $data = DB::table('cat_description')->where(['id' => $id])->select('cat_des_image')->first();
        $image_path = 'images/category/' . $data->cat_des_image;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        DB::table('cat_description')->where(['id' => $id])->delete();

        $request->session()->flash('response_msg', 'Category Detail deleted successfully !!');
        $request->session()->flash('response_type', 'success');
        return redirect()->back();
    }

    public function category_detail_img_delete(Request $request, $id)
    {
        $apid = $request->apid;
        $data = DB::table('cat_des_images')->where(['id' => $id])->select('cat_des_cimg','cat_des_id')->first();
        $image_path = 'images/category-detail/' . $data->cat_des_cimg;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        DB::table('cat_des_images')->where(['id' => $id])->delete();
        
        $images = $data = DB::table('cat_des_images')->where(['cat_des_id' => $data->cat_des_id])->get(); 
        $html = '';
        foreach($images as $img){
            $html .='<img src="'.asset('images/category-detail/' . $img->cat_des_cimg).'" style="height:50px;" class="img-responsive"> 
            <a class="btn btn-danger btn-sm color-white" onclick="deleteImage(\''.$img->id.'\',\''.$apid.'\')"><i class="fas fa-trash"></i></a>';
        }
        return response()->json(['status' => true,  'data' => $html]);
    }

    /* Portfolio */
    public function portfolio()
    {
        $portfolio = Portfolio::orderByDesc('id')->get();
        $tabs = DB::table('tabs')->orderByDesc('tab')->get();
        return view('admin_pages.portfolio', compact('portfolio','tabs'));
    }
    
    public function portfolio_update(Request $request)
    {
        $str_url = strtolower($request->p_heading);
        $str_url = preg_replace("/[^a-z0-9\s-]/", "", $str_url);
        $str_url = preg_replace("/[\s-]+/", "-", $str_url); 
        $str_url = preg_replace("/[\s_]/", "-", $str_url);

        $filename = '';
        $filename1 = '';
        $destinationpath = 'images/portfolio/';
        if (request()->file('p_image') != '' || request()->file('p_image') != null) {
            if (request()->file('p_image')->isValid()) {
                $file = request()->file('p_image')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $filename = strtolower($filename);
                $filename = preg_replace("/[^a-z0-9_\s-]/", "", $filename);
                $filename = preg_replace("/[\s-]+/", " ", $filename);
                $filename = preg_replace("/[\s_]/", "-", $filename);
                $extension1 = request()->file('p_image')->getClientOriginalExtension();
                $filename1 = $filename . '_' . rand(11111, 99999) . '.' . $extension1;
                request()->file('p_image')->move($destinationpath, $filename1);

                $data = DB::table('portfolio')->where(['id' => $request->id])->select('p_image')->first();
                $image_path = 'images/portfolio/' . $data->p_image;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                DB::table('portfolio')->where(['id'=> $request->id])->update(['p_image' => $filename1]);
            }
        }

        DB::table('portfolio')->where('id', $request->id)->update([
            'p_heading' => $request->input('p_heading'),
            'p_url' => $str_url,
            'p_description' => $request->input('p_description'),
            'p_meta' => $request->input('p_meta'),
        ]);

        $request->session()->flash('response_msg', 'Portfolio update successfully !!');
        $request->session()->flash('response_type', 'success');
        return redirect()->back();
    }

    public function portfolio_delete(Request $request, $id)
    {   
        $data = DB::table('port_details')->where('portfolio_id',$id)->select('id','pd_image')->get();
        foreach($data as $d){
        $image_path = 'images/portfolio-detail/' . $d->pd_image;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        DB::table('port_details')->where(['id' => $d->id])->delete();
        }

        $data1 = DB::table('portfolio')->where('id',$id)->select('p_image')->first();
        $image_path = 'images/portfolio/' . $data1->p_image;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        DB::table('portfolio')->where('id',$id)->delete();
        $request->session()->flash('response_msg', 'Portfolio Delete successfully !!');
        $request->session()->flash('response_type', 'success');
        return redirect()->back();
        
    }

    public function portfolio_detail($url)
    {
        $portfolio = Portfolio::where('p_url',$url)->first();
        $tabs = DB::table('tabs')->orderByDesc('tab')->get();
        $details = Port_Details::with('portfolio','tab')->where('portfolio_id',$portfolio->id)->orderByDesc('id')->get();
        return view('admin_pages.portfolio-detail', compact('details','tabs'));
    }

    public function portfolio_detail_add(Request $request){
        $filename = '';
        $filename1 = '';
        $destinationpath = 'images/portfolio-detail/';
        if (request()->file('pd_image') != '' || request()->file('pd_image') != null) {
            if (request()->file('pd_image')->isValid()) {
                $file = request()->file('pd_image')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $filename = strtolower($filename);
                $filename = preg_replace("/[^a-z0-9_\s-]/", "", $filename);
                $filename = preg_replace("/[\s-]+/", " ", $filename);
                $filename = preg_replace("/[\s_]/", "-", $filename);
                $extension1 = request()->file('pd_image')->getClientOriginalExtension();
                $filename1 = $filename . '_' . rand(11111, 99999) . '.' . $extension1;
                request()->file('pd_image')->move($destinationpath, $filename1);
            }
        }

    
        $data = new Port_Details();
        $data->portfolio_id = $request->portfolio_id;
        $data->tab_id = $request->tab_id;
        $data->pd_image = $filename1;
        $data->pd_heading = $request->pd_heading;
        $data->pd_video = $request->pd_video;
        $data->save();
        $request->session()->flash('response_msg', 'Portfolio Detail added successfully !!'); 
        $request->session()->flash('response_type', 'success');
        return redirect()->back(); 
    }

    public function portfolio_detail_update(Request $request){
        $id = $request->id;
        $filename = '';
        $filename1 = '';
        $destinationpath = 'images/portfolio-detail/';
        if (request()->file('pd_image') != '' || request()->file('pd_image') != null) {
            if (request()->file('pd_image')->isValid()) {
                $file = request()->file('pd_image')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $filename = strtolower($filename);
                $filename = preg_replace("/[^a-z0-9_\s-]/", "", $filename);
                $filename = preg_replace("/[\s-]+/", " ", $filename);
                $filename = preg_replace("/[\s_]/", "-", $filename);
                $extension1 = request()->file('pd_image')->getClientOriginalExtension();
                $filename1 = $filename . '_' . rand(11111, 99999) . '.' . $extension1;
                request()->file('pd_image')->move($destinationpath, $filename1);

                $data = DB::table('port_details')->where(['id' => $id])->select('pd_image')->first();
                $image_path = asset('images/portfolio-detail/' . $data->pd_image);
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                DB::table('port_details')->where(['id'=> $id])->update(['pd_image' => $filename1]);
            }
        }

        DB::table('port_details')->where('id', $id)->update([
            'tab_id' => $request->input('tab_id'),
            'pd_heading' => $request->input('pd_heading'),
            'pd_video' => $request->input('pd_video'),
        ]);

        $request->session()->flash('response_msg', 'Portfolio Detail update successfully !!'); 
        $request->session()->flash('response_type', 'success');
        return redirect()->back(); 
    }

    public function portfolio_detail_delete(Request $request, $id){
        $data = DB::table('port_details')->where(['id' => $id])->select('pd_image','portfolio_id')->first();
        $image_path = 'images/portfolio-detail/' . $data->pd_image;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        DB::table('port_details')->where(['id' => $id])->delete();
        $request->session()->flash('response_msg', 'Portfolio detail deleted successfully !!');
        $request->session()->flash('response_type', 'success');
        if(DB::table('port_details')->where('portfolio_id',$data->portfolio_id)->count() > 0){
            return redirect()->back();
        }else{
            return redirect()->route('portfolio');
        }
        
    }

    /* Tabs */
    public function tab_add(Request $request)
    {
        DB::table('tabs')->insert(['tab' => $request->tab]);
        $request->session()->flash('response_msg', 'Portfolio Tab Add successfully !!');
        $request->session()->flash('response_type', 'success');
        return redirect()->back();
    }

    public function tab_update(Request $request)
    {
        DB::table('tabs')->where('id',$request->id)->update(['tab' => $request->tab]);
        $request->session()->flash('response_msg', 'Portfolio Tab Update successfully !!');
        $request->session()->flash('response_type', 'success');
        return redirect()->back();
    }

    public function tab_delete(Request $request, $id)
    {   
        $data = DB::table('port_details')->where('tab_id',$id)->count();
        if($data > 0){
            $request->session()->flash('response_msg', 'Cannot delete tab with details !!'); 
            $request->session()->flash('response_type', 'error');
            return redirect()->back();
        }else{
        DB::table('tabs')->where('id',$id)->delete();
        $request->session()->flash('response_msg', 'Portfolio Tab Delete successfully !!');
        $request->session()->flash('response_type', 'success');
        return redirect()->back();
        }
    }


    /* Testimonials */

    public function testimonials()
    {
        $testimonials = DB::table('testimonials')->orderByDesc('id')->get();
        return view('admin_pages.testimonials', compact('testimonials'));
    }

    public function testimonial_add(Request $request)
    {
        $filename = '';$filename1 = '';
        $destinationpath = 'images/testimonials/';
        if (request()->file('t_image') != '' || request()->file('t_image') != null) {
            if (request()->file('t_image')->isValid()) {
                $file = request()->file('t_image')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $filename = strtolower($filename);
                $filename = preg_replace("/[^a-z0-9_\s-]/", "", $filename);
                $filename = preg_replace("/[\s-]+/", " ", $filename);
                $filename = preg_replace("/[\s_]/", "-", $filename);
                $extension1 = request()->file('t_image')->getClientOriginalExtension();
                $filename1 = $filename . '_' . rand(11111, 99999) . '.' . $extension1;
                request()->file('t_image')->move($destinationpath, $filename1);
            }
        }

        $array = array(
            't_heading' => $request->t_heading,
            't_description' => $request->t_description,
            't_name' => $request->t_name,
            't_image' => $filename1
        );
        DB::table('testimonials')->insert($array);
        $request->session()->flash('response_msg', 'Testimonial added successfully !!'); 
        $request->session()->flash('response_type', 'success');
        return redirect()->back(); 

    }

    public function testimonial_delete(Request $request, $id)
    {
        
        $data = DB::table('testimonials')->where('id' ,$id)->select('t_image')->first();
        $image_path = 'images/testimonials/' . $data->t_image;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        DB::table('testimonials')->where(['id' => $id])->delete();
        $request->session()->flash('response_msg', 'Testimonial deleted successfully !!');
        $request->session()->flash('response_type', 'success');
        return redirect()->back();
       
    }

    public function testimonial_update(Request $request)
    {
        $id = $request->input('testimonial_id');

        DB::table('testimonials')->where('id', $id)->update([
            't_heading' => $request->t_heading,
            't_description' => $request->t_description,
            't_name' => $request->t_name
        ]);

        $filename = '';$filename1 = '';
        $destinationpath = 'images/testimonials/';

        if ($request->hasFile('t_image')) {
            if ($request->file('t_image')->isValid()) {
                $file = $request->file('t_image')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $filename = strtolower($filename);
                $filename = preg_replace("/[^a-z0-9_\s-]/", "", $filename);
                $filename = preg_replace("/[\s-]+/", " ", $filename);
                $filename = preg_replace("/[\s_]/", "-", $filename);
                $extension1 = $request->file('t_image')->getClientOriginalExtension();
                $filename1 = $filename . '_' . rand(11111, 99999) . '.' . $extension1;
                $request->file('t_image')->move($destinationpath, $filename1);

                $data = DB::table('testimonials')->where(['id' => $id])->select('t_image')->first();
                $image_path = 'images/testimonials/' . $data->t_image;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                File::delete($image_path);

                DB::table('testimonials')->where('id', $id)->update(['t_image' => $filename1]);
            }
        }

        $request->session()->flash('response_msg', 'Testimonial updated successfully !!'); 
        $request->session()->flash('response_type', 'success');
        return redirect()->back();
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
