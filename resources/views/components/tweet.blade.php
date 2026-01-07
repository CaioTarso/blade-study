@props(['tweet'])

<div class="card bg-base-100 shadow">
    <div class="card-body">
        <div class="flex space-x-3">
            @if ($tweet->user)
                <div class="avatar">
                    <div class="size-10 rounded-full">
                        <img src="https://avatars.laravel.cloud/{{ urlencode($tweet->user->email) }}"
                            alt="{{ $tweet->user->name }}'s avatar" class="rounded-full" />
                    </div>
                </div>
            @else
                <div class="avatar placeholder">
                    <div class="size-10 rounded-full">
                        <img src="https://avatars.laravel.cloud/f61123d5-0b27-434c-a4ae-c653c7fc9ed6?vibe=stealth"
                            alt="Anonymous User" class="rounded-full" />
                    </div>
                </div>
            @endif

            <div class="min-w-0 flex-1">
                <div class="flex justify-between w-full">
                    <div class="flex items-center gap-1">
                        <span class="text-sm font-semibold">{{ $tweet->user ? $tweet->user->name : 'Anonymous' }}</span>
                        <span class="text-base-content/60">·</span>
                        <span class="text-sm text-base-content/60">{{ $tweet->created_at->diffForHumans() }}</span>
                        @if ($tweet->updated_at->gt($tweet->created_at->addSeconds(5)))
                            <span class="text-base-content/60">·</span>
                            <span class="text-sm text-base-content/60 italic">editado</span>
                        @endif
                    </div>

                    
                    @if (Auth::check() && $tweet->user && Auth::id() === $tweet->user->id)
                        <div class="flex gap-1">
                            <a href="/tweets/{{ $tweet->id }}/edit" class="btn btn-ghost btn-xs">
                                 Editar 
                            </a>
                            <form method="POST" action="/tweets/{{ $tweet->id }}"> @csrf @method('DELETE') <button
                                    type="submit" onclick="return confirm('Tem certeza que você quer deletar esse tweet?')"
                                    class="btn btn-ghost btn-xs text-error"> Deletar </button>
                            </form>
                        </div>
                    @endif
                </div>

                 <p class="mt-1 break-words overflow-wrap">
                    {{ $tweet->message }}
                </p>
            </div>
        </div>
    </div>
</div>