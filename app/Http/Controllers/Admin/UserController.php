<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Show list user
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index() {
        $users = User::get();
        return view('admin.user.index', [
            'users' => $users
        ]);
    }

    /**
     * Show form create user
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create() {
        return view('admin.user.create');
    }

    /**
     * Handle create user
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
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

    /**
     * Show form edit user
     *
     * @param integer $id user
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id) {
        $user = User::findOrFail($id);
        return view('admin.user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Handle update user
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
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

    /**
     * Handle delete user
     *
     * @param integer $id user
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function delete($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
