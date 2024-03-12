<div class="bg-white px-6 py-2 flex items-center gap-6 shadow">
    <button wire:click="likeDislike(true)"
        class="flex items-center gap-2 hover:text-green-400 transition-all {{ $hasLikeDislike ? 'opacity-100 text-green-400' : 'opacity-50 text-yellow-600' }}">
        @if($hasLikeDislike)
        <x-heroicon-s-hand-thumb-up class="w-5 h-5" />
        @else
        <x-heroicon-o-hand-thumb-up class="w-5 h-5" />
        @endif
        {{ $likes }}
    </button>
    <button wire:click="likeDislike(false)"
        class="flex items-center gap-2 hover:text-red-400 transition-all {{ $hasLikeDislike === false ? 'opacity-100 text-red-400' : 'opacity-50 text-yellow-600' }}">
        @if($hasLikeDislike === false)
        <x-heroicon-s-hand-thumb-down class="w-5 h-5" />
        @else
        <x-heroicon-o-hand-thumb-down class="w-5 h-5" />
        @endif
        {{ $dislikes }}
    </button>
</div>