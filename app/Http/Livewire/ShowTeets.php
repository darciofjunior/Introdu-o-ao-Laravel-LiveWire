<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTeets extends Component
{
    use WithPagination;

    public $content = 'Apenas um teste';
    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];

    public function render()
    {
        $tweets = Tweet::with('user')->latest()->paginate(10);

        return view('livewire.show-teets', [
            'tweets' => $tweets
        ]);
    }

    public function create()
    {
        $this->validate();

        /*Tweet::create([
            'user_id'   => 1,
            'content'   => $this->content,
        ]);*/

        auth()->user()->tweets()->create([
            'content'   => $this->content,
        ]);

        $this->content = '';
    }

    public function like($tweet_id)
    {
        $tweet = Tweet::find($tweet_id);

        $tweet->likes()->create([
            'user_id' => auth()->user()->id
        ]);
    }

    public function unlike(Tweet $tweet)
    {
        $tweet->likes()->delete();
    }
}
