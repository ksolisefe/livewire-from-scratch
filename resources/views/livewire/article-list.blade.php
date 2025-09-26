<div class="flex flex-col m-auto  w-1/2 mb-4">
    <div class="mb-3 flex justify-between items-center">
        <a
            href="/dashboard/articles/create"
            class="text-gray-200 p-2 bg-indigo-700 hover:bg-indigo-900 rounded-sm"
            wire:navigate
        >
            Create Article
        </a>
        <div>
            <button
                class="text-gray-200 p-2 bg-blue-700 hover:bg-blue-900 rounded-sm"
                wire:click="showAll"
            >
                Show All
            </button>
            <button
                class="text-gray-200 p-2 bg-blue-700 hover:bg-blue-900 rounded-sm"
                wire:click="showPublished"
            >
                Show Published (<livewire:published-count placeholder-text="..." :key="'published-count'" />)
            </button>
        </div>
    </div>
    <div class="my-3">
        {{ $this->articles->links() }}
    </div>
    <table>
        <thead class="text-sm uppercase bg-gray-700 text-gray-400">
            <tr>
                <th class="px-6 py-3 w-4/5">Title</th>
                <th class="px-6 py-3 w-1/5">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($this->articles as $article)
                <tr wire:key="{{ $article->id }}" class="border-b bg-gray-800 border-gray-700">
                    <td class="px-6 py-4 w-4/5">{{ $article->title }}</td>
                    <td class="px-6 py-4 w-1/5">
                        <a class="text-gray-200 p-2"
                            href="/dashboard/articles/{{ $article->id }}/edit"
                            wire:navigate
                        >
                            Edit
                        </a>
                        <button class="text-gray-200 p-2 bg-red-700 hover:bg-red-800 rounded-md"
                            wire:click="delete({{ $article->id }})"
                            wire:confirm="Are you sure you want to delete this article?"
                        >
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="my-3">
        {{ $this->articles->links() }}
    </div>
</div>
