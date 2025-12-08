<x-app-layout title="Halaman Tidak Ditemukan">
    <div class="min-h-[60vh] flex flex-col items-center justify-center text-center px-4">
        <div class="mb-8">
            <svg class="w-32 h-32 text-gray-200 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <h1 class="text-6xl font-bold text-news-red mb-4 font-serif">404</h1>
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Halaman Tidak Ditemukan</h2>
        <p class="text-gray-600 max-w-md mx-auto mb-8">
            Maaf, halaman yang Anda cari mungkin telah dihapus, namanya diubah, atau tidak tersedia untuk sementara
            waktu.
        </p>
        <a href="{{ route('home') }}"
            class="inline-flex items-center px-6 py-3 bg-news-red text-white font-bold rounded-lg hover:bg-red-700 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>
            </svg>
            Kembali ke Beranda
        </a>
    </div>
</x-app-layout>