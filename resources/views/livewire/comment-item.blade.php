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
            <div class="text-gray-600">
                {{ $comment->content }}
            </div>
            <div class="flex items-center gap-2">
                <a href="#" class="text-sm text-blue-600">Reply</a>
                @if ($comment->user_id == Auth::id())
                <span>&#8226;</span>
                <a href="#" class="text-sm text-green-600">Edit</a>
                <span>&#8226;</span>
                <a href="#" class="text-sm text-red-600">Delete</a>
                @endif
            </div>
        </div>
    </div>
</div>