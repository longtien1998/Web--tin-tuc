<?php

namespace App\Http\Controllers;

use App\Models\Theloaitin;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index($moTa){
        $namepage = Theloaitin::where('moTa', $moTa)->first();
        return view('blog',['namepage' => $namepage]);
    }
    public function show(){
        // dd($url);
        // echo 'hihihihihihih';
        // $namepage = Theloaitin::where('moTa', $url->ten)->first();
        // dd($namepage);
        // if($namepage == null) abort(404);
        // return view('blog',['namepage' => $namepage]);
        return view('blog-detail');
    }
}
