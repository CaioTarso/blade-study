<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index() {

        $tweets = Tweet::with('user')->latest()->take(50)->get();
        return view('home', ['tweets' => $tweets]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ], [
            'message.required' => 'O campo de mensagem é obrigatório.',
            'message.max' => 'A mensagem não pode exceder 255 caracteres.',
        ]);

        Tweet::create([
            'message' => $validated['message'],
            'user_id' => null, 
        ]);

        return redirect('/')->with('success', 'Tweet criado!');
    }


    public function edit(Tweet $tweet)
    {
        return view('tweets.edit', compact('tweet'));
    }

    public function update(Request $request, Tweet $tweet)
    {
        
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        
        $tweet->update($validated);

        return redirect('/')->with('success', 'Tweet atualizado!');
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->delete();

        return redirect('/')->with('success', 'Tweet deletado!');
    }
}