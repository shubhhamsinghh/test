<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use App\Models\Cat_Description;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function default()
    {
        return redirect('/');
    }

    public function index()
    {
        $cats = Cat_Description::where('is_home',1)->get();
        $videos = DB::table('port_details')->orderby('id','desc')->paginate(5);
        return view('web_pages.index',compact('cats','videos'));
    }

    public function about_us()
    {
        return view('web_pages.about');
    }

    public function cinematography()
    {
        return view('web_pages.cinematography');
    }

    public function portfolio($url,$url2=null)
    {
        return view('web_pages.portfolio');
    }

    public function contact_us()
    {
        return view('web_pages.contact');
    }

    public function contact_add(Request $request)
    {
    
        // $to = "ajaysingh@gmail.com";
        // $subject = "Oberoi Production";
        // $html = 'Hello Admin, 
        // <p><b>Name: </b> '.$request->name.'</p>
        // <p><b>Email: </b> '.$request->email.'</p>
        // <p><b>Phone: </b> '.$request->phone.'</p>

        // Thank You,
        // <br>
        // <p>'.config('app.name').'</p>';


        // $headers = "MIME-Version: 1.0" . "\r\n";
        // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // $headers .= "From: Oberoi Production <oberoi.productiontts@gmail.com>";

        // mail($to,$subject,$html,$headers);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->save();

        return redirect()->route('thank_you');
    }

    public function thank_you()
    {
        return view('web_pages.thank_you');
    }

    public function get_product($cat_url, $sub_cat = Null, $product = Null)
    {
        if ($product != Null) {
            $product = Product::with('category', 'sub_category')->where('prod_url', $product)->first();
            return view('web_pages.product_detail', compact('product'));
        } elseif ($sub_cat != Null) {
            $sub_cat = Sub_Category::where('sub_cat_url', $sub_cat)->first();
            $products = Product::with('category', 'sub_category')->where('sub_category_id', $sub_cat->id)->orderBy('id', 'desc')->get();
            $categories = Category::where('id', '!=', $sub_cat->cat_id)->orderBy('cat_name')->get();
            return view('web_pages.product_listing', compact('products', 'categories'));
        } else {
            $cat = Category::where('cat_url', $cat_url)->first();
            $subCategories = Sub_Category::with('category')->where('cat_id', $cat->id)->orderBy('sr_no', 'asc')->get();
            $categories = Category::where('cat_url', '!=', $cat_url)->orderBy('cat_name')->get();
            return view('web_pages.category', compact('subCategories', 'categories', 'cat'));
        }
    }
}
