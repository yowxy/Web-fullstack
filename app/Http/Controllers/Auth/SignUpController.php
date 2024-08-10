<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignUpRequests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SignUpController extends Controller
{
      public function show(){
            return view("pages.auth.sign-up");
      }

      public function signUp(SignUpRequests $request){

        $validated  = $request->validated();
        $validated['pasword'] = bcrypt($validated['password']);
        $validated['picture'] = config('app.avatar_generator_url').$validated['username'];


        $create = User::create($validated);

        if($create){
            Auth::login($create);
            return redirect()->route('discussions.index');
        }


        return abort(500);
      }
}
