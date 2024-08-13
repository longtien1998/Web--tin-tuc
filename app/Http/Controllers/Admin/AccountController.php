<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(){
        return view('admin.account.index')->with('success','Bạn đã đăng nhập thành công');
    }
}
