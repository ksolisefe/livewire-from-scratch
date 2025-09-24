<div class="m-auto w-1/2">
    @foreach ($articles as $article)
        <div class="mt-5 pd-3 hover:cursor-pointer hover:bg-gray-100/5 p-3 transition-all duration-300 rounded-md" wire:key="{{ $article->id }}">
            <h2 class="text-2xl text-blue-500 mb-3 hover:text-blue-700">
                <a href="/articles/{{$article->id}}">
                    {{ $article->title }}
                </a>
            </h2>
            <p class="text-gray-600">{{ str($article->content)->limit(250) }}</p>
        </div>
    @endforeach
</div>
