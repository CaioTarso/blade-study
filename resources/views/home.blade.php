
<x-layout>
    <x-slot:title>
        Bem vindo(a)
    </x-slot:title>
    <div class="max-w-2xl mx-auto">
        @foreach ($tweets as $tweet)
            <div class="card bg-base-100 shadow mt-8">
                <div class="card-body">
                    <div>
                        <div class="font-semibold">{{ $tweet['author'] }}</div>
                        <div class="mt-1">{{ $tweet['message'] }}</div>
                        <div class="text-sm text-gray-500 mt-2">{{ $tweet['time'] }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>