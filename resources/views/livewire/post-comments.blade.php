<div class="pt-10 mt-10 border-t-2 border-gray-200 comments-box">
    <h2 class="mb-6 text-2xl font-bold text-gray-900 font-serif">Diskusi</h2>
    
    @auth
        <div class="bg-gray-50 rounded-xl p-6 mb-8">
            <div class="flex items-start space-x-4">
                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" 
                    class="h-10 w-10 rounded-full object-cover flex-shrink-0">
                <div class="flex-1">
                    <textarea wire:model="comment"
                        class="w-full p-4 text-sm text-gray-700 border border-gray-300 rounded-lg bg-white focus:outline-none focus:border-news-blue focus:ring-2 focus:ring-news-blue/20 placeholder:text-gray-400 transition"
                        rows="4" placeholder="Tulis komentar Anda disini..."></textarea>
                    @error('comment')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <div class="flex justify-between items-center mt-4">
                        <p class="text-xs text-gray-500">Minimal 3 karakter, maksimal 200 karakter</p>
                        <button wire:click="postComment" wire:loading.attr="disabled"
                            class="inline-flex items-center justify-center px-6 py-2.5 font-medium tracking-wide text-white transition duration-200 bg-news-red rounded-lg hover:bg-red-700 focus:shadow-outline focus:outline-none disabled:opacity-50 disabled:cursor-not-allowed">
                            <span wire:loading.remove>Kirim Komentar</span>
                            <span wire:loading>Mengirim...</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="bg-gray-50 rounded-xl p-6 mb-8 text-center">
            <p class="text-gray-600 mb-3">Anda harus login untuk berkomentar</p>
            <a wire:navigate href="{{ route('login') }}" 
                class="inline-flex items-center justify-center px-6 py-2.5 font-medium text-white bg-news-blue rounded-lg hover:bg-blue-700 transition">
                Login Sekarang
            </a>
        </div>
    @endauth
    
    <div class="mt-8 space-y-6 user-comments">
        @forelse($this->comments as $comment)
            <div class="comment bg-white rounded-xl p-6 border border-gray-100 hover:shadow-sm transition">
                <div class="flex items-start space-x-4">
                    <img src="{{ $comment->user->profile_photo_url }}" alt="{{ $comment->user->name }}" 
                        class="h-10 w-10 rounded-full object-cover flex-shrink-0">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center space-x-2 mb-2">
                            <h4 class="text-sm font-bold text-gray-900">{{ $comment->user->name }}</h4>
                            <span class="text-gray-400">•</span>
                            <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-sm text-gray-700 leading-relaxed break-words">
                            {{ $comment->comment }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-12 bg-gray-50 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <p class="text-gray-500 font-medium">Belum ada komentar</p>
                <p class="text-gray-400 text-sm mt-1">Jadilah yang pertama berkomentar!</p>
            </div>
        @endforelse
    </div>
    
    @if($this->comments->hasPages())
        <div class="mt-8">
            {{ $this->comments->links() }}
        </div>
    @endif
</div>
