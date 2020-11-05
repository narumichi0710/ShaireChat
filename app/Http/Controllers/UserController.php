<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\ChangeEmailRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\PostUser;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $authUser = Auth::user();
        $param = ['authUser' => $authUser];
        return view('users.index', $param);
    }
    public function show()
    {
        $authUser = Auth::user();
        $param = ['authUser' => $authUser];
        return view('users.show', $param);
    }

    public function profile()
    {
        $authUser = Auth::user();
        $posts = Post::latest()->simplePaginate(10);

        return view('users.profile', [
            'posts' => $posts,
            'authUser' => $authUser,

        ]);
    }

    public function userEdit(Request $request)
    {
        $authUser = Auth::user();

        $param = ['authUser' => $authUser];
        return view('users.userEdit', $param,);
    }

    public function userEditEmail(Request $request)
    {
        $authUser = Auth::user();
        $param = ['authUser' => $authUser];
        return view('users.userEditEmail', $param);
    }

    public function userUpdate(UserUpdateRequest $request)
    {

        $uploadfile = $request->file('thumbnail');

        if (!empty($uploadfile)) {
            $thumbnailname = $request->file('thumbnail')->hashName();
            $request->file('thumbnail')->storeAs('public/user', $thumbnailname);

            $param = [
                'name' => $request->name,
                'profile' => $request->profile,
                'thumbnail' => $thumbnailname,
            ];
        } else {
            $param = [
                'name' => $request->name,
                'profile' => $request->profile,
            ];
        }

        User::where('id', $request->user_id)->update($param);
        return redirect(route('users.index'))->with('success', '保存しました。');
    }

    public function userUpdateEmail(ChangeEmailRequest $request)
    {
        $param = [
            'email' => $request->email,
        ];
        User::where('id', $request->user_id)->update($param);
        return redirect(route('users.index'))->with('success', 'メールアドレスを変更しました。');
    }

    public function deleteConfirm()
    {
        return view('users.deleteConfirm');
    }

    public function delete()
    {
        User::find(Auth::id())->delete();
        return redirect('/');
    }
}
