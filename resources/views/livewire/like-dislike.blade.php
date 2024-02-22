<div class="flex items-center gap-4">
    <button wire:click="likeDislike(true)" class="flex items-center gap-2 hover:text-blue-500 transition-all">
        <x-heroicon-o-hand-thumb-up class="w-5 h-5" />
        {{ $likes }}
    </button>
    <button wire:click="likeDislike(false)" class="flex items-center gap-2 hover:text-blue-500 transition-all">
        <x-heroicon-o-hand-thumb-down class="w-5 h-5" />
        {{ $dislikes }}
    </button>
</div>