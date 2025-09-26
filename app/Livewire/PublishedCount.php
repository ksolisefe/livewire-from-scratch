<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class PublishedCount extends Component
{
    public string $placeholderText = ''; 

    #[Computed(cache: true, key: 'published-count')]
    public function count() {
        sleep(1);
        
        return Article::query()
            ->where('published', true)
            ->count();
    }
    
    public function placeholder() {
        return view('livewire.placeholder', [
            'message' => $this->placeholderText
        ]);
    }
    
    public function render()
    {
        return view('livewire.published-count');
    }
}
