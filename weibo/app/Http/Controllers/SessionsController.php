<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }
    
    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        //$password = bcrypt($request->password);
        //$user = User::where('email', $request->email)->get();
        //\Log::info($user);
        //\Log::info($user['0']['password']);
        
        //if (!$user->isEmpty() && password_verify($request->password, $user['0']['password'])) {
        if (Auth::attempt($credentials)) {
            session()->flash('success', '欢迎回来！');
            //return redirect()->route('users.show', $user[0]->id);
            return redirect()->route('users.show', [Auth::user()]);
        } else {
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }

        return;
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect('login');
    }
}
