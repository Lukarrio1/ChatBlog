<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function home(){
        return view('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('DashBoard');
    }

    public function store(Request $request){
        $store = new Blog;
        $this->validate($request,[
            "Title"=>"required|min:3|max:100",
            "Body"=>"required|min:10|max:250"
        ]);
        $store->Title = $request->Title;
        $store->Body = $request->Body;
        $store->save();
        return 200;
    }
}
