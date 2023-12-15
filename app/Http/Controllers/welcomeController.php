<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class welcomeController extends Controller
{
    //

    public function index(){

        $postClothings = Post::where('category_id','1')->latest()->get();

        $postElectronics = Post::where('category_id','3')->latest()->get();

        $postDrinks = Post::where('category_id','2')->latest()->get();

        $categories = Category::all();

        return view('welcome', compact('postClothings','postElectronics','postDrinks','categories'));
    }

    public function search(Request $request){

        if($request->search){
            $posts=Post::where('title','like', '%' . $request->search . '%')->
            orwhere('productDescription','like', '%'. $request->search .'%')->latest()->get();
        }elseif($request->category){
            $posts = Category::where('categoryName', $request->category)->firstOrfail()
            ->posts()->paginate(3)->withQueryString();
        }
        else{
            $posts=Post::latest()->get();
        }

        $categories = Category::all();

        return view('search', compact('posts','categories') );

    }

    public function admin(){
        return view('admin.dashboard');
    }

}
