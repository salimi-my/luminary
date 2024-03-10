<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-primary border
    border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-yellow-400
    focus:bg-yellow-400 active:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2
    transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>