<div class="flex justify-between mb-4 gap-3">
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
        @if ($editing)
        <livewire:comment-create :comment-model="$comment" />
        @else
        <div>
            {{ $comment->content }}
        </div>
        @endif
        <div class="flex items-center gap-2">
            <a wire:click.prevent="startReplyComment" href="#"
                class="text-sm text-gray-400 hover:text-blue-500">Reply</a>
            @if ($comment->user_id == Auth::id())
            <a wire:click.prevent="startEditComment" href="" class="text-sm text-gray-400 hover:text-blue-500">Edit</a>
            <a wire:click.prevent="deleteComment" wire:loading.remove
                wire:confirm="Are you sure you want to delete this comment?" href=""
                class="text-sm text-gray-400 hover:text-red-500">Delete</a>
            <p wire:loading wire:target="deleteComment" class="text-sm text-red-500">Deleting...</p>
            @endif
        </div>

        @if($replying)
        <livewire:comment-create :post="$comment->post" :parent-comment="$comment" />
        @endif
    </div>
</div>