<?php

namespace App\Http\Controllers;

use App\Http\Requests\Discussion\StoreRequest;
use App\Http\Requests\Discussion\UpdateRequest;
use App\Models\Answer;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Discussion;
use Illuminate\Support\Str;


class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {



        $discussions = Discussion::with('user','category');

        if ($request->search) {
            $discussions->where('title', 'like', "%$request->search%")
                ->orWhere('content', 'like', "%$request->search%");
        }


        return response()->view('pages.discussions.index', [
            'discussions' => $discussions->orderBy('created_at', 'desc')
                                         ->paginate(10)
                                         ->withQueryString(),
            'categories' => Category::all(),
            'search' => $request->search,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view("pages.discussions.form",[
                'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
         // dapatkan dulu data dari form request yang sudah tervalidasi
        // get data category berdasarkan slug nya
        // dapatkan id dari category nya
        // masukkan user id ke array validated
        // tambahkan slug + timestamp berdasarkan title ke array validated
        // buat content_preview berdasarkan content
        // caranya bersihkan content dari tag
        // cek apakah content ini karakternya lebih 120
        // jika iya maka masukkan content tersebut ke content preview + '...'
        // jika tidak maka masukkan content tersebut ke content preview tanpa '...'
        // baru masukkan data detail question itu ke tabel discussions
        // jika berhasil maka buat notif berhasil lalu redirect ke list discussion
        // jika tidak maka kembalikan error 500

        $validated = $request->validated();
        $categoryid = Category::where('slug', $validated['category_slug'])->first()->id;

        $validated['category_id'] = $categoryid;
        $validated['user_id'] = auth()->id();
        $validated['slug'] = Str::slug($validated['title']). '_' .time();


        $stripContent = strip_tags($validated['content']);
        $isContentLong = strlen($stripContent) > 120;
        $validated ['content_preview'] = $isContentLong
           ? (substr($stripContent,0, 120). '...'  ):$stripContent;

        $create = Discussion::create($validated);
        if($create){
            session()->flash('notif.success', 'Discussion created successfully!');
            return redirect()->route('discussions.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $discussion = Discussion::with(['user','category']) -> where('slug', $slug)->first();


        if (!$discussion) {
            return abort(404);
        }

        $discussionAnswer = Answer::where('discussion_id',$discussion->id)
            ->orderBy('created_at','desc')
            ->paginate(5);


        $notlikedImage = url('assets/images/image 10.png');

        $LikedImage = url('assets/images/liked.png');

        return response()->view("pages.discussions.show",[
            'discussion' => $discussion,
            'categories' => Category::all(),
            'LikedImage' => $LikedImage,
            'notLikedImage' => $notlikedImage,
            'discussionAnswers' => $discussionAnswer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $discussion = Discussion::with('category')->where('slug',$slug)->first();

        if(!$discussion){
            return   abort(404);
        }

        //variabel mengecek apakah ini milik milik si user

        $isOwnedByUser = $discussion->user_id == auth()->id();

        if(!$isOwnedByUser){
            return abort(404);
        }

        return response()->view('pages.discussions.form',[
            'discussion' => $discussion,
            'categories' => Category::all(),
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $slug)
    {

        $discussion = Discussion::with('category')->where('slug',$slug)->first();

        if(!$discussion){
            return   abort(404);
        }

        //variabel mengecek apakah ini milik milik si user

        $isOwnedByUser = $discussion->user_id == auth()->id();

        if(!$isOwnedByUser){
            return abort(404);
        }

        $validated = $request->validated();
        $categoryid = Category::where('slug', $validated['category_slug'])->first()->id;

        $validated['category_id'] = $categoryid;
        $validated['user_id'] = auth()->id();


        $stripContent = strip_tags($validated['content']);
        $isContentLong = strlen($stripContent) > 120;
        $validated ['content_preview'] = $isContentLong
           ? (substr($stripContent,0, 120). '...'  ):$stripContent;

        $update = $discussion->update($validated);

        if($update){
            session()->flash('notif.success', 'Discussion updaed successfully!');
            return redirect()->route('discussions.show', $slug);
        }

        return abort(500);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $discussion = Discussion::with('category')->where('slug',$slug)->first();
        if(!$discussion){
            return abort(404);
        }

        $isOwnedByUser = $discussion->user_id == auth()->id();

        if(!$isOwnedByUser){
            return abort(404);
        }
        $delete = $discussion->delete();

        if ($delete) {
            session()->flash('notif.success', 'Discussion deleted successfully');
            return redirect()->route('discussions.index');
        }

        return abort(500);
    }
}
