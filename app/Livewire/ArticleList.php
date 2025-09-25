<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Title;

#[Title('Manage Articles')]
class ArticleList extends AdminComponent
{
    public function delete(Article $article) {
        $article->delete();
    }

    public function render()
    {
        // The error occurs because `with(['title', 'content'])` is used incorrectly.
        // The `with()` method is for eager loading Eloquent relationships, not columns.
        // 'title' and 'content' are columns, not relationships.
        // That's why you get a RelationNotFoundException.
        // To fetch columns, just use `get(['id', 'title', 'content'])` as below:
        return view('livewire.article-list', [
            'articles' => Article::query()
                ->latest()
                ->get(['id', 'title', 'content']),
        ]);
    }
}
