<div>
    <form wire:submit.prevent="createComment" x-data="{ focused: false }" class="my-4">
        <div class="mb-2">
            <textarea @click="focused = true" wire:model="content"
                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
                :rows="focused ? '3' : '2'" placeholder="Leave a comment"></textarea>
        </div>
        <div :class="focused ? 'flex items-center gap-2' : 'hidden'">
            <button type="submit"
                class="rounded-md bg-blue-600 px-3.5 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                Submit
            </button>
            <button @click="focused = false" type="button"
                class="rounded-md bg-transparent px-3.5 py-2 text-center text-sm font-semibold text-black hover:bg-gray-200/50">
                Cancel
            </button>
        </div>
    </form>
</div>