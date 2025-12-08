<div>
    @if ($subscribed)
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Terima kasih!</strong>
            <span class="block sm:inline">Anda telah berhasil berlangganan newsletter kami.</span>
        </div>
    @else
        <form wire:submit.prevent="subscribe" class="flex flex-col space-y-2">
            <input wire:model="email" type="email" placeholder="Email Anda"
                class="px-4 py-2 bg-gray-800 border border-gray-700 rounded text-white focus:outline-none focus:border-news-red text-sm placeholder-gray-500">
            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

            <button type="submit"
                class="px-4 py-2 bg-news-red text-white font-bold rounded hover:bg-red-700 transition text-sm uppercase disabled:opacity-50"
                wire:loading.attr="disabled">
                <span wire:loading.remove>Langganan</span>
                <span wire:loading>Memproses...</span>
            </button>
        </form>
    @endif
</div>