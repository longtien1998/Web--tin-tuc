<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\Account;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AccountRequest;
use Illuminate\Validation\Rules;



class AccountController extends Controller
{
    public $title = 'Admin - Account';

    public function index()
    {
        // Show the account dashboard
        $data = User::all();

        $template = 'admin.account.index';
        $title = $this->title;
        return view('admin.layouts.app-admin', compact(
            'template',
            
            'data',
            'title'
        ));
    }
    public function store(Request $request): RedirectResponse
    {
        $message = [
            'name.required' => 'Tên không được để trống.',
            'name.string' => 'Tên phải là chuỗi.',
            'name.max' => 'Tên không quá 8 ký tự.',

            'email.required' => 'Email không được để trống.',
            'email.string' => 'Email phải là chuỗi.',
            'email.email' => 'Email không đúng định dạng.',
            'email.max' => 'Email không quá 50 ký tự.',
            'email.unique' => 'Email đã tồn tại.',

            'password.required' => 'Mật khẩu không được để trống.',
            'password.confirmed' => 'Mật khẩu không trùng nhau.',

            'phone.required' => 'Số điện thoại không được để trống.',
            'phone.number' => 'Số điện thoại phải là số.',
            'phone.max' => 'Số điện thoại không quá 10 ký tự.',
            'phone.min' => 'Số điện thoại phải có 10 ký tự.',
        ];
        $validator = Validator::make($request->all(), [
            'name' =>'required|string|max:8',
            'email' =>'required|string|email|max:50|unique:'.User::class,
            'password' => 'required|confirmed',Rules\Password::defaults(),
            'phone' =>'required|max:10|min:10',
        ],$message);

        if ($validator->fails()) {
            return redirect()->back()
                                ->with('error','Thêm mới thất bại')
                                ->withErrors($validator)
                                ->withInput();
        }
        try {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password =  Hash::make($request->password);
        $user->roles = $request->roles;
        $user->email_verified_at = now();
        $user->remember_token = Str::random(10);
        $user->save();
        return redirect()->route('admin.account')->with('success', 'Đã tạo tài khoản thành công');
        }
        catch (\Exception $e) {
            $request->old('name');
            $request->old('email');
            $request->old('phone');
            $request->old('roles');
            return redirect()->back()->with('error', 'Tạo tài khoản thất bại. Lỗi: '. $e->getMessage());
        }
    }
    public function edit($id)
    {
        // Show the edit account form
        $user = User::find($id);
        return view('admin.account.edit', ['user' => $user]);
    }
    public function update(Request $request, $id):RedirectResponse
    {
        $message = [
            'editname.required' =>'Tên không được để trống',
            'editname.string' => 'Tên phải là chuỗi',
            'editname.max' => 'Tên không quá 8 ký tự',
            'email.required' => 'Email không được để trống',
            'email.string' => 'Email phải là chuỗi',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'editphone.required' => 'Số điện thoại không được để trống',
            'editphone.string' => 'Số điện thoại phải là chuỗi',
            'editphone.max' => 'Số điện thoại không quá 10 ký tự',
            'editphone.min' => 'Số điện thoại phải có 10 ký tự',
        ];
        $validator = Validator::make($request->all(), [
            'editname' =>'required|string|max:8',
            'email' =>'required|string|email|max:50|unique:'.User::class,
            'editphone' =>'required|max:10|min:10',
        ],$message);

        if ($validator->fails()) {
            return redirect()->back()
                                ->with('error','Cập nhật thất bại')
                                ->withErrors($validator)
                                ->withInput();
        }
        try {
            $user = User::find($id);
            $user->name = $request->editname;

            $user->email = $request->email;
            $user->phone = $request->editphone;
            $user->roles = $request->editroles;
            $user->save();
            return redirect()->route('admin.account')->with('success', 'Đã cập nhật tài khoản thành công');

        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Cập nhật thất bại. Lỗi: '. $e->getMessage());
        }
    }

    public function destroy($id)
    {
        // Delete the account
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Không tìm thấy tài khoản');
        }
        $user->delete();
        return redirect()->route('admin.account')->with('success', 'Đã xóa tài khoản thành công');
    }

    public function savelever(Request $request){
        $value = $request->value;
        $userId = $request->userId;
        $user = User::find($userId);

        if ($user) {
            $user->roles = $value;
            $user->save();

            return response()->json([

                'status' => 'success',
                'message' => $value
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Cập nhật thất bại'
            ], 404);
        }
    }
}
