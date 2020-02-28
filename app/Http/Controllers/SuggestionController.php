<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suggestion;
use App\Vote;

class SuggestionController extends Controller
{
    public function add()
    {
        return view('suggestions.add');
    }

    public function index()
    {
        $suggestions = Suggestion::all();

        return view('suggestions.index', compact('suggestions'));
    }

    public function edit($id)
    {
        $suggestion = Suggestion::find($id);

        return view('suggestions.edit', compact('suggestion'));
    }

    public function upvote($suggestion_id)
    {
        // Create a new record in DB
        // $vote = new Vote();
        // $vote->suggestion_id = $suggestion_id;
        // $vote->save();

        // Vote::create([
        //     'suggestion_id' => $suggestion_id
        // ]);
        
        $suggestion = Suggestion::find($suggestion_id);
        $vote = new Vote();
        $suggestion->votes()->save($vote);

        return redirect()->route('suggestions.index');
    }

    public function downvote($suggestion_id)
    {
        // $downvote = Suggestion::find($id);
        // // if ($downvote->votes != 0) {
        //     $downvote->votes -= 1;
        //     $downvote->save();
        // // }
        $suggestion = Suggestion::find($suggestion_id);
        $suggestion->votes()->first()->delete();
        // dd($vote);
        // $suggestion->votes()->delete($vote);

        return redirect()->route('suggestions.index');
    }

    public function store(Request $request)
    {
        // $suggestion = new Suggestion();
        // $suggestion->author = $request->author;
        // $suggestion->content = $request->content;
        // $suggestion->votes = 0;
        // $suggestion->save();

        Suggestion::create([
            'author' => $request->author,
            'content' => $request->content
        ]);

        return redirect()->route('suggestions.index');
    }

    public function update(Request $request, $id)
    {
        $suggestion = Suggestion::find($id);
        // $suggestion->author = $request->author;
        // $suggestion->content = $request->content;
        // $suggestion->save();

        $suggestion->update([
            'author' => $request->author,
            'content' => $request->content
        ]);

        return redirect()->route('suggestions.index');
    }

    public function delete($id)
    {
        $suggestion = Suggestion::find($id);
        $suggestion->delete();

        return redirect()->route('suggestions.index');
    }
}
