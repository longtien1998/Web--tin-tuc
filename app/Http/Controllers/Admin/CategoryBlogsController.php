<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Theloaitin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\CategoryRequest;

class CategoryBlogsController extends Controller
{

    public function index(){
        $data = Theloaitin::all();
        
        $dataJson = json_encode($data);
        $title = 'Admin - Category';
        $template = 'admin.category.index';
        return view('admin.layouts.app-admin', compact(
            'template',
            'title',

            'data',
            'dataJson'
        ));
    }
    public function create(){

    }
    public function store(CategoryRequest $request){
        $ten = $request->ten;
        $lang = $request->lang;
        $url = Str::slug($request->url);
        if(empty($url)) $url = Str::slug($ten);
        $count = Theloaitin::count();
        try {
            $data = Theloaitin::create([
                'ten' => $ten,
                'lang' => $lang,
                'url' => $url,
                'thuTu' => $count + 1
            ]);

            return redirect()->route('admin.category')->with('success', 'Thêm mới thành công');
        }
        catch(\Exception $e) {
            return redirect()->back()->with('error', 'Thêm mới không thành công');
        }
    }
    public function destroy($id){
        try {
            Theloaitin::destroy($id);
            return redirect()->route('admin.category')->with('success', 'Xóa thành công');
        }
        catch(\Exception $e) {
            return redirect()->back()->with('error', 'Xóa không thành công'.$e);
        }
    }

    public function update(Request $request){
        $id = $request->id;
        $ten = $request->ten;
        $lang = $request->lang;
        $url = Str::slug($request->url);
        if(empty($url)) $url = Str::slug($ten);
        $thuTu = $request->thuTu;
        try{
            Theloaitin::where('id', $id)->update([
                'ten' => $ten,
                'lang' => $lang,
                'url' => $url,
                'thuTu' => $thuTu
            ]);

            return redirect()->route('admin.category')->with('success', 'Cập nhật thành công');

        }
        catch(\Exception $e) {
            return redirect()->back()->with('error', 'Cập nhật không thành công');
        }
    }

}
