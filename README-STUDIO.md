# Ainun Ijlal Studio

Proyek Laravel dengan 22 contoh landing page dan pratinjau video. Video dioptimalkan menjadi 640 × 400 piksel pada 24 fps; browser mengunduhnya saat kartu terlihat. MP4 digunakan jika didukung dan WebM menjadi cadangan. Gambar WebP tetap tersedia sebagai poster, termasuk ketika pengguna meminta pengurangan gerak.

## Dependensi: vendor dan node_modules

- **`vendor/` wajib untuk menjalankan Laravel.** Folder tersebut tidak disertakan agar ZIP tetap ringan. Instal di server atau komputer menggunakan Composer. Jika server tidak menyediakan Composer, jalankan Composer di lingkungan yang kompatibel lalu unggah `vendor/` ke server. Folder `vendor/` berada di root proyek, bukan di dalam `public/`.
- **`node_modules/` tidak diperlukan untuk menjalankan halaman studio ini.** CSS dan JavaScript-nya sudah tersedia langsung di `public/css` dan `public/js`; aset build yang sudah ada juga disertakan. Node.js dan `npm install` hanya dibutuhkan jika Anda ingin mengubah serta membangun ulang aset Vite yang menggunakan `resources/`.
- Jangan menghapus file `composer.json`, `composer.lock`, `package.json`, atau lockfile karena diperlukan untuk memasang ulang dependensi secara konsisten.

## Menjalankan atau memperbarui proyek

Dibutuhkan PHP 8.3 atau lebih baru yang memenuhi persyaratan `composer.json`, ekstensi Laravel, dan Composer. Dari folder proyek:

```sh
composer install
php artisan optimize:clear
php artisan serve
```

File `.env` asli tidak disertakan demi keamanan. Jika Anda sudah memiliki `.env` yang aktif, gunakan kembali file tersebut dan jangan mengganti `APP_KEY`. Jika membuat instalasi **baru** tanpa `.env`, salin `.env.example` menjadi `.env`, jalankan `php artisan key:generate`, dan sesuaikan database. Untuk driver sesi/database yang menggunakan tabel, jalankan migrasi sesuai kebutuhan (`php artisan migrate`).

## Produksi di studio.ainunijlal.com

Atur DNS dan HTTPS, lalu arahkan document root ke `public/`. Untuk server produksi, instal dependensi dengan `composer install --no-dev --optimize-autoloader`, atur `.env` dengan `APP_ENV=production`, `APP_DEBUG=false`, dan `APP_URL=https://studio.ainunijlal.com`. Siapkan database dan jalankan migrasi jika diperlukan. Pastikan `storage/` dan `bootstrap/cache/` dapat ditulis oleh server. Pastikan server menyajikan MP4 sebagai `video/mp4` dan WebM sebagai `video/webm`, serta mendukung byte-range untuk pemutaran yang efisien. `.env` dapat berisi rahasia: jangan publikasikan, jangan letakkan di `public/`, dan jangan unggah ke repositori publik.

## Mengubah katalog

Data katalog berada di `config/portfolio.php`. HTML contoh ada di `public/portfolio`, poster di `public/previews`, dan video MP4/WebM di `public/preview-videos`. Saat menambahkan contoh, sediakan kedua format video dengan nama dasar yang sama, serta poster WebP. Video adalah rekaman halaman, bukan preview interaktif. Beberapa font, gambar, dan tautan pada halaman contoh bergantung pada layanan eksternal.

Hak cipta di footer menggunakan tahun server Laravel (`now()->year`) dan diperbarui secara otomatis. Jika browser masih menampilkan video atau CSS lama setelah pembaruan, lakukan refresh paksa dan bersihkan cache CDN jika ada.
