<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function index(){
        $template = 'admin.dashboard';
        $title = 'Admin - Dashboard';
        return view('admin.layouts.app-admin', compact(
            'template',
            
            'title'
        ));
    }
}
