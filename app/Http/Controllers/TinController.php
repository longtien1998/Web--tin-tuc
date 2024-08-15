<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theloaitin;
use App\Models\Tin;

class TinController extends Controller
{
    public function index($ten, $url){
        $namepage = Theloaitin::where('url', $ten)->first();
        $page = Tin::where('url', $url)->first();
        // dd($page);
        // dd($namepage);
        // if($namepage == null) abort(404);
        return view('blog-detail',['namepage' => $namepage, 'page' => $page]);
    }
    public function show($ten, $tieude){

    }
}
