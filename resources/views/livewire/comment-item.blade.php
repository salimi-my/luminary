<div>
    <div class="flex mb-4 gap-3">
        <div class="w-12 h-12 flex items-center justify-center bg-gray-200 rounded-full">
            <x-heroicon-o-user class="w-6 h-6 text-gray-500" />
        </div>
        <div class="flex-1">
            <div>
                <a href="#" class="font-semibold text-blue-600">
                    {{ $comment->user->name }}
                </a>
                - <span class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
            </div>
            <div class="">
                {{ $comment->content }}
            </div>
            <div class="flex items-center gap-2">
                <a href="#" class="text-sm text-gray-400 hover:text-blue-500">Reply</a>
                @if ($comment->user_id == Auth::id())
                <a href="#" class="text-sm text-gray-400 hover:text-blue-500">Edit</a>
                <a wire:click.prevent="deleteComment" wire:loading.remove href=""
                    class="text-sm text-gray-400 hover:text-red-500">Delete</a>
                <p wire:loading wire:target="deleteComment" class="text-sm text-red-500">Deleting...</p>
                @endif
            </div>
        </div>
    </div>
</div>