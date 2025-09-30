<?php

namespace App\Livewire;

use App\Livewire\Forms\ArticleForm;
use Livewire\Attributes\Title;

#[Title('Create Articles')]
class CreateArticle extends AdminComponent
{
    public ArticleForm $form;

    public function save() {
        $this->form->store();

        $this->redirectRoute('dashboard.articles.index', navigate: true);
    }
    
    public function render()
    {
        return view('livewire.create-article');
    }
}
