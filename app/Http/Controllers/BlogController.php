<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;

class BlogController extends Controller
{
    public function index(Posts $posts){
    	$data = $posts->orderBy('created_at','desc')->get();
    	return view('blog', compact('data'));
    }
}
