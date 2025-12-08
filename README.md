# Kabar Rakyat - Portal Berita Modern

![Kabar Rakyat Banner](https://via.placeholder.com/1200x400?text=Kabar+Rakyat+Portal)

**Kabar Rakyat** adalah sebuah platform portal berita modern yang dibangun menggunakan ekosistem Laravel. Website ini dirancang untuk menyajikan informasi terkini dengan antarmuka yang bersih, responsif, dan ramah pengguna, serta dioptimalkan untuk performa dan SEO.

## 🚀 Fitur Utama

### 📰 Manajemen Konten Berita
- **Artikel Lengkap**: Mendukung rich text, gambar unggulan, dan kategori.
- **Kategori Dinamis**: Pengelompokan berita berdasarkan topik (Politik, Ekonomi, Olahraga, dll).
- **Pencarian Cepat**: Fitur pencarian berita yang responsif.
- **Berita Terpopuler**: Menampilkan berita yang paling banyak dibaca.

### 💬 Interaksi Pengguna
- **Sistem Komentar**: Diskusi interaktif menggunakan Livewire.
- **Like System**: Fitur suka pada artikel.
- **Newsletter**: Berlangganan berita terbaru via email.

### 🔍 SEO & Performa
- **Sitemap XML & HTML**: Struktur situs yang mudah dirayapi mesin pencari dan manusia.
- **Meta Tags Lengkap**: Open Graph, Twitter Cards, dan Schema.org JSON-LD.
- **Optimasi Kecepatan**: Menggunakan caching dan aset yang diminimalisir.

### 🛠️ Fitur Teknis Lainnya
- **Halaman Statis**: Tentang Kami, Redaksi, Kontak, Privacy Policy, Terms of Service.
- **Custom Error Pages**: Halaman 404 dan 500 yang disesuaikan dengan tema.
- **Responsive Design**: Tampilan optimal di Desktop, Tablet, dan Mobile.

## 💻 Teknologi yang Digunakan

- **Framework**: [Laravel 11](https://laravel.com)
- **Frontend**: [Blade Templates](https://laravel.com/docs/blade)
- **Styling**: [Tailwind CSS](https://tailwindcss.com)
- **Interactivity**: [Livewire](https://livewire.laravel.com) & [Alpine.js](https://alpinejs.dev)
- **Database**: MySQL / MariaDB

## ⚙️ Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di komputer lokal Anda:

1.  **Clone Repository**
    ```bash
    git clone https://github.com/username/kabar-rakyat.git
    cd kabar-rakyat
    ```

2.  **Install Dependencies**
    ```bash
    composer install
    npm install
    ```

3.  **Konfigurasi Environment**
    Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database Anda.
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Setup Database**
    Pastikan database sudah dibuat, lalu jalankan migrasi.
    ```bash
    php artisan migrate --seed
    ```

5.  **Build Assets**
    ```bash
    npm run build
    ```

6.  **Jalankan Server**
    ```bash
    php artisan serve
    ```

    Buka browser dan akses `http://127.0.0.1:8000`.

## 📂 Struktur Proyek

- `app/Livewire`: Komponen interaktif (Komentar, Like, Newsletter).
- `app/Http/Controllers`: Logika bisnis utama (Post, Page, Sitemap).
- `resources/views`: Tampilan antarmuka (Layouts, Pages, Components).
- `routes/web.php`: Definisi rute aplikasi.

## 🤝 Kontribusi

Kontribusi selalu diterima! Silakan buat *Pull Request* atau laporkan *Issue* jika Anda menemukan bug atau memiliki saran fitur baru.

## 📄 Lisensi

Proyek ini dilisensikan di bawah [MIT License](https://opensource.org/licenses/MIT).

---
&copy; 2025 Kabar Rakyat. Dibuat dengan ❤️ untuk Indonesia.
