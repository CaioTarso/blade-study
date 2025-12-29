<x-layout>
    <x-slot:title>
        Welcome
    </x-slot:title>
    <div class="max-w-2xl mx-auto">
        @forelse ($tweets as $tweet)
            <div class="card bg-base-100 shadow mt-8">
                <div class="card-body">
                    <div>
                        <div class="font-semibold"> {{ $tweet->user ? $tweet->user->email : 'Anonymous' }}</div>
                        <div class="mt-1">{{ $tweet->message }}</div>
                        <div class="text-sm text-gray-500 mt-2">
                            {{ $tweet->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Ainda não existe não tweets. Seja o primeiro!</p>
        @endforelse
    </div>
</x-layout>