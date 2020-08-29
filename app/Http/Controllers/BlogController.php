<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use App\Category;

class BlogController extends Controller
{
    public function index(Posts $posts){
    	$category = Category::all();
    	$data = $posts->orderBy('created_at','desc')->take(8)->get(); // selain orderBy kita bisa juga menggunakan latest()
    	return view('blog', compact('data','category'));
    }

    public function isi_blog($slug){
    	$category = Category::all();
    	$data = posts::where('slug', $slug)->get();
    	return view('blog.isi_post', compact('data','category'));
    }

    public function list_blog(){
    	$category = Category::all();
    	$data = posts::latest()->paginate(2);
    	return view('blog.list_post', compact('data','category'));
    }
}
