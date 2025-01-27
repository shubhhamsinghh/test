<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Career;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sub_Category;
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
        return redirect('/login');
        // $categories = Category::get();
        // $products = Product::with('category', 'sub_category')->where('is_trending', '1')->get();
        // // $tab_products = Product::with('category', 'sub_category')->where('tab_product', '1')->get(); tab_products
        // return view('web_pages.index', compact('categories', 'products'));
        
    }

    public function contact_us()
    {
        return view('web_pages.contact');
    }

    public function about_us()
    {
        return view('web_pages.about');
    }

    public function certification()
    {
        return view('web_pages.certification');
    }

    public function contact_add(Request $request)
    {
        // $data = [
        //     'name' => $request->name,
        //     'phone' => $request->phone,
        //     'email' => $request->email,
        //     'message' => $request->message,
        // ];


        // $user['to'] = 'ajangra182@gmail.com';

        // Mail::send('web_pages.form_mail', ['name' => $data['name'], 'email' => $data['email'], 'phone' => $data['phone'], 'msg' => $data['message']], function ($message) use ($user) {
        //     $message->to($user['to']);
        //     $message->subject('Meditechealthcare Contact Form');
        // });
    
    
$to = "mhchisar@gmail.com";
$subject = "Meditechealthcare Contact Form";
$html = 'Hello Admin, 
<p><b>Name: </b> '.$request->name.'</p>
<p><b>Email: </b> '.$request->email.'</p>
<p><b>Phone: </b> '.$request->phone.'</p>
<p><b>Message: '.$request->message.'</b> </p>

Thank You,
<br>
<p>'.config('app.name').'</p>';


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: Meditechealthcare <meditechhealthcarehsr@gmail.com>";

mail($to,$subject,$html,$headers);




        $contact = new Contact();
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->message = $request->message;
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
