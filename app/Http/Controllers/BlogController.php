<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use App\Category;

class BlogController extends Controller
{
    public function index(Posts $posts){
    	$category_widget = Category::all();
    	$data = $posts->orderBy('created_at','desc')->take(8)->get(); // selain orderBy kita bisa juga menggunakan latest()
    	return view('blog', compact('data','category_widget'));
    }

    public function isi_blog($slug){
    	$category_widget = Category::all();
    	$data = posts::where('slug', $slug)->get();
    	return view('blog.isi_post', compact('data','category_widget'));
    }

    public function list_blog(){
    	$category_widget = Category::all();
    	$data = posts::latest()->paginate(6);
    	return view('blog.list_post', compact('data','category_widget'));
    }

    public function list_category(Category $category){
        $category_widget = Category::all();
        $data = $category->posts()->paginate(6);
        return view('blog.list_post', compact('data','category_widget'));
    }

    public function cari(request $request){
        $category_widget = Category::all();
        $data = posts::where('judul', $request->cari)->orWhere('judul','like','%'.$request->cari.'%')->paginate(6);
        return view('blog.list_post', compact('data','category_widget'));
    }
}
