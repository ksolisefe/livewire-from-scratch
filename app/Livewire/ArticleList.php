<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Manage Articles')]
class ArticleList extends AdminComponent
{
    use WithPagination;

    public bool $showOnlyPublished = false;
    
    #[Computed(persist: false)]
    public function articles() {
        $query = Article::query();

        if ($this->showOnlyPublished) {
            $query->where('published', 1);
        }
        
        return $query->latest()->paginate(10, ['id', 'title', 'content'], pageName: 'articles-page');
    }
    
    public function delete(Article $article) {
        if ($this->articles->count() < 10) {
            throw new \Exception("Nope");
        }
        
        $article->delete();
        unset($this->articles);
        cache()->forget('published-count');
    }

    public function showAll() {
        $this->showOnlyPublished = false;
        $this->resetPage(pageName: 'articles-page');
    }
    
    public function showPublished() {
        $this->showOnlyPublished = true;
        $this->resetPage(pageName: 'articles-page');
    }

    // public function render()
    // {
    //     return view('livewire.article-list');
    // }
}
