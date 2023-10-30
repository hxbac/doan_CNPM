<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::get();
        return view('admin.user.index', [
            'users' => $users
        ]);
    }

    public function create() {
        return view('admin.user.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
        ], [
            'name.required' => 'Tên người dùng là bắt buộc',
            'name.string' => 'Kiểu dữ liệu không hợp lệ',
            'name.max' => 'Tối đa 255 ký tự',
            'email.required' => 'Email là bắt buộc',
            'email.string' => 'Kiểu dữ liệu không hợp lệ',
            'email.email' => 'Sai định dạng email',
            'email.max' => 'Tối đa 255 ký tự',
            'email.unique' => 'Email đã được sử dụng',
            'password.required' => 'Mật khẩu là bắt buộc',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect()->route('admin.user.index');
    }

    public function edit($id) {
        $user = User::find($id);
        return view('admin.user.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
        ], [
            'name.required' => 'Tên người dùng là bắt buộc',
            'name.string' => 'Kiểu dữ liệu không hợp lệ',
            'name.max' => 'Tối đa 255 ký tự',
            'email.required' => 'Email là bắt buộc',
            'email.string' => 'Kiểu dữ liệu không hợp lệ',
            'email.email' => 'Sai định dạng email',
            'email.max' => 'Tối đa 255 ký tự',
            'email.unique' => 'Email đã được sử dụng',
            'password.required' => 'Mật khẩu là bắt buộc',
        ]);
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->role = $request->role;
        if ($request->changePassword) {
            $user->password = $request->password;
        }
        $user->save();
        return redirect()->route('admin.user.index');
    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
