<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;


class TweetController extends Controller
{
    use AuthorizesRequests;

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


        auth()->user()->tweets()->create($validated);

        return redirect('/')->with('success', 'Tweet criado!');
    }


    public function edit(Tweet $tweet)
    {
        if ($tweet->user_id !== auth()->id()) {
            abort(403, 'Ação não autorizada.');
        }
        
        return view('tweets.edit', compact('tweet'));
    }

    public function update(Request $request, Tweet $tweet)
    {
        if ($tweet->user_id !== auth()->id()) {
            abort(403, 'Ação não autorizada.');
        }
        
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        
        $tweet->update($validated);

        return redirect('/')->with('success', 'Tweet atualizado!');
    }

    public function destroy(Tweet $tweet)
    {
        if ($tweet->user_id !== auth()->id()) {
            abort(403, 'Ação não autorizada.');
        }
        
        $tweet->delete();

        return redirect('/')->with('success', 'Tweet deletado!');
    }
}