<?php

namespace App\Http\Controllers;

use App\Models\Short_url;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class UrlController extends Controller
{
   
    public function index(){
        $urls = Short_url::get();
        return view('dashboared.url',[
            'urls'=>$urls
        ]);
    }
    public function create(){
        return view('dashboared.create');
    }

    public function store(Request $request){
        $short_url = new Short_url();
        $short_url->url = $request->url;
        $short_url->shortcut = Str::random(8);
        $short_url->save();
       return redirect()->route('dashboard.index');
       
    }

    public function short($short){

        $urls = Short_url::get()->where('shortcut',$short)->first();
        if($urls){
          return redirect()->away($urls->url);
        }
        else{
            route('dashboard.index'); abort(404);
        }
    }

}
