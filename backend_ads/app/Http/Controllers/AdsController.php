<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdsRequest;
use App\Models\Ads;
use App\Models\User;

class AdsController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny',Ads::class);

        $usersAds = Ads::join('users','users.id','=','ads.user_id')->select('ads.*','users.email')->latest()->get();

        return view('pages.ads.index',compact('usersAds'));
    }

    public function create()
    {
        $this->authorize('create',Ads::class);

        $users = User::where('isAdmin',0)->get();

        return view('pages.ads.create',compact('users'));
    }

    public function edit($id)
    {
        $this->authorize('create',Ads::class);

        $ads = Ads::where('ads.id',$id)->join('users','users.id','=','ads.user_id')->select('ads.*','users.email')->latest()->get()->first();
        
        return view('pages.ads.edit',compact('ads'));
    }

    public function store(AdsRequest $request)
    {
        $this->authorize('update',Ads::class);

        $data = $request->validated();  

        Ads::create($data);

        return redirect()->back()->with('success','Successfully Added!!!');
    }

    public function update(AdsRequest $request,$id)
    {
        $this->authorize('update',Ads::class);

        $ads = Ads::where('id',$id)->firstOrFail();
        $data = $request->validated();
        $ads->fill($data)->save();

        return redirect()->route('ads.index')->with('success','Successfully Edited!!!');
    }

    public function destroy($id)
    {
        $ads = Ads::where('id',$id)->firstOrFail();

        $ads->delete();
        
        return redirect()->route('ads.index')->with('success','Ads Deleted!!!');
    }
}
