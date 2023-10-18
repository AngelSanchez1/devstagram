<?php

namespace App\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLiked;
    public $nLikes;

    public function mount($post)
    {
        $this->isLiked = $post->checklike(auth()->user());
        $this->nLikes = $post->likes->count();
    }

    public function like()
    {
        if ( $this->post->checkLike( auth()->user() ))
        {
            auth()->user()->likes()->where('post_id', $this->post->id)->delete();
            $this->isLiked = false;
            $this->nLikes--;
        }
        else
        {
            $this->post->likes()->create([
                'user_id' =>auth()->user()->id
            ]);
            $this->isLiked = true;
            $this->nLikes++;
        }
        
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
