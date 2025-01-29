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
        $data = DB::table('portfolio')->first();
        $details = DB::table('port_details')->where('portfolio_id',$data->id)->get();
        $tabs = DB::table('tabs')->get();
        return view('web_pages.cinematography',compact('data','details','tabs'));
    }

    public function portfolio($url,$url2=null)
    {
        if($url2 != null){
            $data = Cat_Description::where('cat_dec_url',$url2)->first();
            $details = DB::table('cat_des_images')->where('cat_des_id',$data->id)->get();
            return view('web_pages.gallery',compact('details','data'));
        }else{
           $data = DB::table('category')->where('cat_url',$url)->first();
           $details = Cat_Description::with('cat_images')->where('category_id',$data->id)->get();
           return view('web_pages.portfolio',compact('details','data'));
        }
        
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

}
