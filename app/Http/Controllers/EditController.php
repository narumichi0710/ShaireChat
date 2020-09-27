<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ChangeNameRequest;
use App\Http\Requests\ChangeEmailRequest;



class EditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $auth = Auth::user();
        return view('edit.index', ['auth' => $auth]);
    }

    public function showChangeNameForm()
    {
        $auth = Auth::user();
        return view('edit.name', ['auth' => $auth]);
    }

    public function changeName(ChangeNameRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->get('name');
        $user->save();

        return redirect()->route('edit')->with('status', __('Your name has been changed.'));
    }

    public function showChangeEmailForm()
    {
        $auth = Auth::user();
        return view('edit.email', ['auth' => $auth]);
    }

    public function changeEmail(ChangeEmailRequest $request)
    {
        $user = Auth::user();
        $user->email = $request->get('email');
        $user->save();

        return redirect()->route('edit')->with('status', __('Your email addredd has been changed.'));
    }

}
