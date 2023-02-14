<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\Http\Requests\UserRequest;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function welcome()
    {
        return view('/layouts.welcome');
    }

    public function home()
    {
        return view('/layouts.home');
    }

    public function signIn()
    {
        return view('/auth.sign-in');
    }

    public function signInStore(SignInRequest $request)
    {
        $request->validated();
        $user = User::where('email', $request->input('email'))->first();
        if (Hash::check($request->input('password'), $user->password)) {
            auth()->login($user);
            return redirect(route('home'));
        }
        else {
            session(['email'=> $request->input('email')]);
            return back()->with('alert', 'invalidPassword');
        }
    }

    public function signUp()
    {
        return view('/auth.sign-up');
    }

    public function signUpStore(SignUpRequest $request)
    {
        $request->validated();
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'password_confirmation' => $request->input('password_confirmation')
        ]);
        auth()->login($user);
        return redirect(route('home'));
    }

    public function signOut()
    {
        auth()->logout();
        return redirect(route('home'));
    }

    public function profile()
    {
        return view('/profile.profile', ['user' => auth()->user(), 'publications' => Publication::where('user_id', auth()->id())->get()]);
    }

    public function edit($id)
    {
         return view('/profile.edit', ['publication' => Publication::findOrFail($id)]);
    }

    public function editStore(Request $request, $id)
    {
        Publication::where(['id' => Publication::findOrFail($id)->id])->update([
            'user_id' => $request->user()->id,
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'pet' => $request->input('pet'),
            'add_inf' => $request->input('add_inf')
        ]);
        if($request->file('img')) {
            $file = $request->file('img');
            $name = time() . $file->getClientOriginalName();
            Publication::where(['id' => Publication::findOrFail($id)->id])->update([
                'img' => $file->move('image', $name)
            ]);
        }
        return redirect(route('profile'));
    }

    public function delete($id)
    {
        Publication::findOrFail($id)->delete();
        return redirect(route('profile'));
    }

    public function change($id)
    {
        return view('/profile.change', ['user' => User::findOrFail($id)]);
    }

    public function changeStore(UserRequest $request, $id)
    {
        $request->validated();
        User::where(['id' => User::findOrFail($id)->id])->update([
            'password' => Hash::make($request->input('password')),
        ]);
        return redirect(route('profile'));
    }
}
