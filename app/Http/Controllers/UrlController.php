<?php

namespace App\Http\Controllers;

use App\Models\Short_url;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class UrlController extends Controller
{
   
    public function index(){
        $users=User::all()->where('id',Auth::user()->id);
        $urls = Short_url::where('user_id',Auth::user()->id)->latest()->paginate(5);
        return view('dashboared.url',[
            'urls'=>$urls,
          'users'=>$users
        ]);
    }
    public function create(){
        return view('dashboared.create');
    }

    public function store(Request $request){
        $short_url = new Short_url();

        $short_url->user_id = Auth::user()->id;
        $short_url->url = $request->url;
        $short_url->shortcut = Str::random(8);
        $short_url->save();
       return redirect()->route('dashboard.index');
       
    }

    public function visitorStore(Request $request){
        $short_url = new Short_url();
        if (Auth::user()) {
        $short_url->user_id = Auth::user()->id;
        }
        
        $short_url->url = $request->url;
        $short_url->shortcut = Str::random(8);
        $short_url->save();
        $url = Short_url::latest()->first();
      //  dd($url);
        return redirect()->back()->with('success',$url);
       
    }

    public function destroy($id){
        Short_url::destroy($id);
        return redirect()->route('dashboard.index');
    }

    public function short($short){

        $urls = Short_url::get()->where('shortcut',$short)->first();
        if($urls){
            $urls->increment('clicks');

          return redirect()->away($urls->url);
        }
        else{
            route('dashboard.index'); abort(404);
        }

    }

}
