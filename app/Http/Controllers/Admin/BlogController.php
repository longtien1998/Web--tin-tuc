<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Theloaitin;
use App\Http\Requests\BlogsRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    public function index(){
        $data = Blog::all();

        $title = 'Admin - Blogs';
        $template = 'admin.blog.index';
        return view('admin.layouts.app-admin', compact(
            'template',
            'title',

            'data',
        ));
    }
    public function create(){
        $loaitins = Theloaitin::all();


        $title = 'Admin - Blogs - Create';
        $template = 'admin.blog.create';
        return view('admin.layouts.app-admin', compact(
            'template',
            'title',

            'loaitins'
        ));
    }
    public function store(BlogsRequest $request){
        try{
            $tieuDe = $request->tieuDe;
            $url = Str::slug($request->url);
            if(empty($url)) $url = Str::slug($tieuDe);

            $anHien = $request->anHien;
            if(empty($anHien)) $anHien = 0;

            $noiBat = $request->noiBat;
            if(empty($noiBat)) $noiBat= 0;

            if($request->has('uploadImg')){
                $file = $request->uploadImg;
                $ext = $file->Extension();
                $name = date('d').'-'.date('h-i-s').'-blog.'.$ext;
                $path = 'upload/blog/'.date('Y').'/'.date('m');

            }
            $uploadImg = $path.'/'.$name;
            $nguoiDangId = Auth::user()->id;
            $request->merge(['hinhAnh'=>$uploadImg,'anHien'=>$anHien, 'noiBat'=>$noiBat,'url'=>$url, 'nguoiDangId'=>$nguoiDangId]);

            Blog::create($request->all());
            $file->move($path, $name);
            return redirect()->route('admin.blog')->with(['success' => 'Thêm mới bài viết thành công']);
        }
        catch (\Exception $e){
            return redirect()->back()->with(['error' => 'lỗi thêm mới bài viết'. $e->getMessage()]);
        }
    }
    public function edit($id){
        try {
            $blog = Blog::find($id);
            if($blog){
                $loaitins = Theloaitin::all();
                $title = 'Admin - Blogs - Edit';
                $template = 'admin.blog.edit';
                return view('admin.layouts.app-admin', compact(
                    'template',
                    'title',
                    'blog',
                    'loaitins'
                ));
            }
            else{
                return redirect()->back()->with(['error' => 'Bài viết không tồn tại']);
            }

        }
        catch (\Exception $e){
            return redirect()->back()->with(['error' => 'Lỗi tìm kiếm bài viết'. $e->getMessage()]);
        }
    }
    public function update(BlogsRequest $request,Blog $id){
        try{
            $tieuDe = $request->tieuDe;
            $url = Str::slug($request->url);
            if(empty($url)) $url = Str::slug($tieuDe);

            $anHien = $request->anHien;
            if(empty($anHien)) $anHien = 0;

            $noiBat = $request->noiBat;
            if(empty($noiBat)) $noiBat= 0;

            if($request->has('uploadImg')){
                $file = $request->uploadImg;
                $ext = $file->Extension();
                $name = date('d').'-'.date('h-i-s').'-blog.'.$ext;
                $path = 'upload/blog/'.date('Y').'/'.date('m');
                $uploadImg = $path.'/'.$name;
            } else {
                $uploadImg = $request->hinhAnh;
            }

            $nguoiDangId = Auth::user()->id;
            $request->merge(['hinhAnh'=>$uploadImg,'anHien'=>$anHien, 'noiBat'=>$noiBat,'url'=>$url, 'nguoiDangId'=>$nguoiDangId]);
            // dd($request->all());

            $id->fill($request->all())->save();

            if($request->has('uploadImg')) $file->move($path, $name);

            return redirect()->route('admin.blog')->with(['success' => 'Chỉnh sửa bài viết thành công']);
        }
        catch (\Exception $e){
            return redirect()->back()->with(['error' => 'lỗi Chỉnh sửa bài viết'. $e->getMessage()]);
        }
    }
    public function destroy($id){
        try {
            $blog = Blog::find($id);
            if($blog){
                $blog->delete();
                return redirect()->route('admin.blog')->with(['success' => 'Xóa bài viết thành công']);
            }
            else{
                return redirect()->back()->with(['error' => 'Bài viết không tồn tại']);
            }

        }
        catch (\Exception $e){
            return redirect()->back()->with(['error' => 'Lỗi xóa bài viết'. $e->getMessage()]);
        }
    }
}
