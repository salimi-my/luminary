<div class="bg-white px-6 py-2 flex items-center gap-6 shadow">
    <button wire:click="likeDislike(true)"
        class="flex items-center gap-2 text-green-300 hover:text-yellow-500 transition-all {{ $hasLikeDislike ? 'text-yellow-500' : '' }}">
        <x-heroicon-o-hand-thumb-up class="w-5 h-5" />
        {{ $likes }}
    </button>
    <button wire:click="likeDislike(false)"
        class="flex items-center gap-2 text-red-300 hover:text-yellow-500 transition-all {{ $hasLikeDislike === false ? 'text-yellow-500' : '' }}">
        <x-heroicon-o-hand-thumb-down class="w-5 h-5" />
        {{ $dislikes }}
    </button>
</div>