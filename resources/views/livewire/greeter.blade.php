<div>
    <form
        wire:submit.prevent="changeName"
    >
        <div class="mt-2 flex gap-x-2">
            <select
                type="text"
                class="block p-4 border rounded-md bg-gray-700 text-white"
                wire:model.fill="greeting" 
            >
                <option value="Hello">Hello</option>
                <option value="Hi">Hi</option>
                <option value="Hey">Hey</option>
                <option value="Howdy">Howdy</option>
            </select>
            <input
                type="text"
                class="block w-full p-4 border rounded-md bg-gray-700 text-white"
                placeholder="Type your name here!"
                wire:model.live.debouce.1000="name" 
            />
        </div>
        <div class="mt-2">
            <button
                type="submit"
                class="text-white font-medium rounded-md px-4 py-2 bg-blue-600"
            >
                Greet
            </button>
        </div>
    </form>

    @if ($name !== '')
        <div class="mt-5">
            <h1 class="text-white">{{ $greeting }}, {{ $name }}!</h1>
        </div>
    @endif
</div>
