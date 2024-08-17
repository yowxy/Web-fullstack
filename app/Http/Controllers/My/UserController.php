<?php

namespace App\Http\Controllers\My;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Discussion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show($username){
        $user = User::where("username",$username)->first();

        if(!$user){
            return abort(404);
        }

        $Perpage = 5;
        $columns = ['*'];
        $discussionPageName = 'discussions';
        $answersPageName = 'answers';

        $picture = filter_var($user->picture, FILTER_VALIDATE_URL)
            ? $user->picture : Storage::url($user->picture);


           return view('pages.users.show',[
                'user' => $user,
                'picture' => $picture,
                'discussions' => Discussion::where('user_id', $user->id)
                   ->paginate($Perpage, $columns, $discussionPageName),
                'answers' => Answer::where('user_id', $user->id)
                   ->paginate($Perpage, $columns, $answersPageName),
           ]);
    }
}
