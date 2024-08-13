<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function discussionLike(string   $discussionSlug){
        // get discussion berdasarkan slug dari parameter
        // like discussion dengan model tadi
        // return json
        // isi jsonnya adalah likeCount / total semua like dari discussion tsb

        $discusssion = Discussion::where('slug',$discussionSlug)->first();

        $discusssion->like();

        return response()->json([
            'status' => 'success',
            'data' => [
                'likeCount' => $discusssion->likeCount,
            ],
        ]);

    }

    public function discussionUnlike(string $discussionSlug){
        // get discussion berdasarkan slug dari parameter
        // like discussion dengan model tadi
        // return json
        // isi jsonnya adalah likeCount / total semua like dari discussion tsb


        $discusssion = Discussion::where('slug',$discussionSlug)->first();

        $discusssion->unlike();

        return response()->json([
            'status' => 'success',
            'data' => [
                'likeCount' => $discusssion->likeCount,
            ],
        ]);

    }
}
