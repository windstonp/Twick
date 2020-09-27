<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class ProfileController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function show(User $user)
    {
        return view('profiles.show',[
            'user' => $user,
            'twicks'=>$user->twicks()->WithLikes()->paginate(5)
        ]);
    }
    public function edit(User $user){
        $this->authorize('edit',$user);
        return view('profiles.edit',compact('user'));
    }
    public function update(User $user){
        $this->authorize('edit',$user);
        $attributes =request()->validate([
            'username'=>
                [
                    'string',
                    'required',
                    'max:255',
                    'alpha_dash',
                    Rule::unique('users')->ignore($user)
                ],
            'name' =>
                [
                    'string',
                    'required',
                    'max:255'
                ],
            'avatar' =>
                [
                    'file',
                    'max:2000'
                ],
            'banner' =>
                [
                    'file',
                    'max:2000'
                ],
            'email' =>
                [
                    'string',
                    'required',
                    'email',
                    Rule::unique('users')->ignore($user)
                ],
            'password' =>
                [
                    'string',
                    'required',
                    'min:8',
                    'max:255',
                    'confirmed'
                ]
        ]);
        if(request('banner')){
            $attributes['banner'] = request('banner')->store('banners');
        }
        if(request('avatar')){
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($attributes);

        return redirect($user->path());
    }
    public function destroy(User $user){
        User::destroy($user->id);
        return redirect('/');
    }
}
