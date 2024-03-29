<div>
    <form wire:submit.prevent="createComment" x-data="{
            focused: {{ $parentComment ? 'true' : 'false' }},
            isEdit: {{ $commentModel ? 'true' : 'false' }},
            init() {
                if (this.isEdit || this.focused) {
                    this.$refs.input.focus()
                }

                $wire.on('commentCreated', () => {
                    this.focused = false;
                })
            }
        }" class="my-4">
        <div class="mb-2">
            <textarea x-ref="input" @click="focused = true" wire:model="content"
                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6"
                :rows="focused ? '3' : '2'" placeholder="Leave a comment"></textarea>
        </div>
        <div :class="isEdit || focused ? 'flex items-center gap-2' : 'hidden'">
            <button wire:loading.remove type="submit"
                class="rounded-md bg-primary transition-color ease-in-out duration-200 px-3.5 py-2 text-center text-sm font-semibold shadow-sm hover:bg-yellow-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600">
                Submit
            </button>
            <button wire:loading type="button"
                class="rounded-md bg-primary px-3.5 py-2 text-center text-sm font-semibold shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600 disabled:opacity-80 cursor-not-allowed"
                disabled>
                <i class="fa-solid fa-circle-notch animate-spin mr-1"></i> Submitting
            </button>
            <button @click="focused = false; isEdit = false; $dispatch('cancelEditing')" type="button"
                class="rounded-md bg-transparent transition-color ease-in-out duration-200 px-3.5 py-2 text-center text-sm font-semibold text-black hover:bg-gray-200/50">
                Cancel
            </button>
        </div>
    </form>
</div>