<div>
    <form
        wire:submit.prevent="changeGreeting"
    >
        <div class="mt-2 flex gap-x-2">
            <select
                type="text"
                class="block p-4 border rounded-md bg-gray-700 text-white"
                wire:model.fill="greeting" 
            >
                @foreach ($greetings as $greetingItem)
                    <option value="{{ $greetingItem->greeting }}">{{ $greetingItem->greeting }}</option>
                @endforeach
            </select>
            <input
                type="text"
                class="block w-full p-4 border rounded-md bg-gray-700 text-white"
                placeholder="Type your name here!"
                wire:model.live.debounce="name" 
            />
        </div>
        <div class="text-white/80">
            @error('name')
                {{ $message }}
            @enderror
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

    @if ($greetingMessage !== '')
        <div class="mt-5">
            <h1 class="text-white">{{ $greetingMessage }}</h1>
        </div>
    @endif
</div>
