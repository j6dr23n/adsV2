<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Models\Ads;
use App\Models\ContactForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function dashboard(Request $request)
    {
        $contactForms = ContactForm::latest()->get();

        $ads = DB::table('users')->join('ads','ads.user_id','=','users.id')->where('users.id',auth()->id())->select('users.name','ads.*')->latest()->get();

        if($request->filled('startDate') && $request->filled('endDate')){
            $ads = Ads::whereDate('ads.created_at','>=',$request->startDate)->whereDate('ads.created_at','<=',$request->endDate)->join('users','users.id','=','ads.user_id')->where('ads.user_id',auth()->id())->select(DB::raw("(sum(revenue)) as revenue"),DB::raw("(sum(imperssions)) as imperssions"),DB::raw("(sum(clicks)) as clicks"),DB::raw("(sum(eCPM)) as eCPM"))->latest('ads.created_at')->get();
        }

        return view('dashboard',compact('contactForms','ads'));
    }

    public function chart(){
        $ads = DB::table('users')->join('ads','ads.user_id','=','users.id')->where('users.id',auth()->id())->select('ads.*')->latest()->limit(7)->get(); 

        return response()->json($ads); 
    }

    public function reports(Request $request)
    {
        $ads = User::join('ads','ads.user_id','=','users.id')->where('users.id',auth()->id())->select('ads.*')->latest()->paginate(15); 

        if($request->filled('startDate') && $request->filled('endDate')){
            $ads = Ads::whereDate('ads.created_at','>=',$request->startDate)->whereDate('ads.created_at','<=',$request->endDate)->join('users','users.id','=','ads.user_id')->where('ads.user_id',auth()->id())->select('ads.*')->latest('ads.created_at')->paginate(10);
        } 

        return view('pages.reports',compact('ads'));
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
