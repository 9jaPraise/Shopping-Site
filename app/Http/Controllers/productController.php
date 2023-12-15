<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use App\Models\Category;

class productController extends Controller
{
    //

    public function index(){
        $posts = Post::latest()->get();
        return view('productPosts.product-page', compact('posts'));
    }

    public function create(){
        $categories = category::all();
        return view('productPosts.create-productPost', compact('categories'));
    }

    public function store(Request $request){

            //validatig user input
            $request->validate([
                "title"=>'required',
                "discountPrice"=>'required',
                "realPrice"=>'required',
                "savedAmount"=>'required',
                "productDescription"=>'required',
                "image"=>'required | image',
                "quantity"=>'required',
                "category_id"=>'required',
            ],

            [
                "category_id.required"=>'The category is required'
            ]);



            $title = $request -> input('title');

            if (Post::latest()->first() !== null) {
                $postId = Post::latest()->first()->id+1;
            } else {
                $postId = 1;
            }


            $slug = Str::slug($title,'-') . '-' . $postId;
            $discountPrice = $request -> input('discountPrice');
            $realPrice = $request -> input('realPrice');
            $productCode =Str::upper(Str::random(10));
            $savedAmount = $request -> input('savedAmount');
            $productDescription = $request -> input('productDescription');
            $user_id = Auth::user()->id;
            $quantity= $request -> input('quantity');
            $trending= $request -> input('trending') == True ? '1':'0';
            $category_id = $request -> input('category_id');

            //Request image file from the form/store image to DB
            $image= 'storage/' . $request->file('image')->store('productImage','public');

            $post = new Post();

            $post -> title = $title;
            $post -> slug = $slug;
            $post -> discountPrice = $discountPrice;
            $post -> realPrice = $realPrice;
            $post -> productCode = $productCode;
            $post -> savedAmount = $savedAmount;
            $post -> image = $image;
            $post -> productDescription = $productDescription;
            $post -> user_id = $user_id;
            $post -> quantity = $quantity;
            $post -> trending = $trending;
            $post -> category_id = $category_id;


            $post->save();

           return redirect(route('product.index'))->with('status', 'A New Item has been Added Successfully');
    }

    public function edit(post $post){

        if (auth()->user()->id !== $post->user->id){
            abort(403);
        }

        return view('productPosts.edit-product', compact('post'));
    }

    public function show(post $post){
        $category = $post ->category;

        $relatedProducts = $category->posts()->where('id', '!=', $post->id)->latest()->take(3)->get();
        return view('productPosts.single-product', compact('post', 'relatedProducts'));
    }

    public function update(Request $request, post $post){

        if (auth()->user()->id !== $post->user->id){
            abort(403);
        }

          //validatig user input
            $request->validate([
                "title"=>'required',
                "discountPrice"=>'required',
                "realPrice"=>'required',
                "savedAmount"=>'required',

                "productDescription"=>'required',
                "quantity"=>'required',
            ]);

            $title = $request -> input('title');
            $postId = $post->id;
            $slug = Str::slug($title,'-') . '-' . $postId;
            $discountPrice = $request -> input('discountPrice');
            $realPrice = $request -> input('realPrice');
            $savedAmount = $request -> input('savedAmount');
            $quantity= $request -> input('quantity');
            $trending= $request -> input('trending') == True ? '1':'0';
            $productDescription = $request -> input('productDescription');

            //Request image file from the form/store image to DB
            if($request->hasFile('image')){
                $image = '/storage/productImage'.$post->image;
                if(File::exists($image)){
                    File::delete($image);
                }
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time().'.'.$ext;
                $file->move('/storage/productImage', $filename);
                $post -> image = $filename;
            }



            $post -> title = $title;
            $post -> slug = $slug;
            $post -> discountPrice = $discountPrice;
            $post -> realPrice = $realPrice;
            $post -> savedAmount = $savedAmount;

            $post -> quantity = $quantity;
            $post -> trending = $trending;
            $post -> productDescription = $productDescription;

            $post->save();

        return redirect()->back()->with('status', 'Changes Saved Successfully');
    }

    public function destroy(post $post){
        $path='asset/storage/productImage/'.$post->image;
        if(File::exists($path)){
               File::delete($path);
            }
        $post->delete();
        return redirect()->back()->with('status', 'Item Deleted Successfully');
    }
}
