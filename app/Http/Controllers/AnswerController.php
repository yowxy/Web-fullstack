<?php

namespace App\Http\Controllers;

use App\Http\Requests\Answer\StoreRequest;
use App\Http\Requests\Answer\UpdateRequest;
use App\Models\Answer;
use App\Models\Discussion;
use Illuminate\Http\Request;


class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, $slug)
    {
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();

        $validated['discussion_id'] = Discussion::where('slug',$slug)->first()->id;

        $create = Answer::create($validated);

        if ($create) {
            session()->flash('notif.success', 'Your answer posted successfully');
            return redirect()->route('discussions.show', $slug);
        }

        return abort(500);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $answer = Answer::find($id);

        if(!$answer){
            return abort(404);
        }


        $isOwnedByUser = $answer->user_id == auth()->id();

        if(!$isOwnedByUser){
            return abort(404);
        }

        return response()->view('pages.answer.form',[
            'answer' => $answer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $answer = Answer::find($id);

        if(!$answer){
            return abort(404);
        }


        $isOwnedByUser = $answer->user_id == auth()->id();

        if(!$isOwnedByUser){
            return abort(404);
        }


        $validated = $request ->validated();
        $update = $answer->update($validated);

        if($update){
            session()->flash('notif.success','Answers update succesfully');
            return redirect()->route('discussions.show', $answer->discussion->slug);
        }

        return abort (500);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $answer = Answer::find($id);

        if(!$answer){
            return abort(404);
        }


        $isOwnedByUser = $answer->user_id == auth()->id();

        if(!$isOwnedByUser){
            return abort(404);
        }


        $delete = $answer->delete();

        if($delete){
            session()->flash('notif.success','Answers Delete succesfully');
            return redirect()->route('discussions.show', $answer->discussion->slug);
        }

        return abort (500);
    }
}
