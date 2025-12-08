<x-app-layout title="Terjadi Kesalahan">
    <div class="min-h-[60vh] flex flex-col items-center justify-center text-center px-4">
        <div class="mb-8">
            <svg class="w-32 h-32 text-gray-200 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                </path>
            </svg>
        </div>
        <h1 class="text-6xl font-bold text-news-red mb-4 font-serif">500</h1>
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Terjadi Kesalahan Server</h2>
        <p class="text-gray-600 max-w-md mx-auto mb-8">
            Maaf, terjadi kesalahan internal pada server kami. Tim teknis kami telah diberitahu dan sedang bekerja untuk
            memperbaikinya.
        </p>
        <div class="flex space-x-4">
            <a href="{{ route('home') }}"
                class="inline-flex items-center px-6 py-3 bg-gray-800 text-white font-bold rounded-lg hover:bg-gray-700 transition">
                Kembali ke Beranda
            </a>
            <button onclick="window.location.reload()"
                class="inline-flex items-center px-6 py-3 bg-news-red text-white font-bold rounded-lg hover:bg-red-700 transition">
                Coba Lagi
            </button>
        </div>
    </div>
</x-app-layout>