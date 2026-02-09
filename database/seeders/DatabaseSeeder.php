<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CompanySetting;
use App\Models\Product;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Admin Novalindo',
            'email' => 'admin@novalindo.com',
            'password' => Hash::make('password'),
        ]);

        // Company Settings
        $settings = [
            ['key' => 'tagline', 'value' => 'Solusi, Inovasi, Kreasi', 'group' => 'general'],
            ['key' => 'berdiri_sejak', 'value' => '-', 'group' => 'about'],
            ['key' => 'visi', 'value' => 'Menjadi perusahaan percetakan terdepan yang memberikan solusi cetak terbaik dan terpercaya dengan kualitas unggul dan pelayanan prima.', 'group' => 'about'],
            ['key' => 'misi_1', 'value' => 'Memberikan layanan percetakan berkualitas tinggi dengan teknologi terkini', 'group' => 'about'],
            ['key' => 'misi_2', 'value' => 'Mengutamakan kepuasan pelanggan melalui pelayanan yang profesional', 'group' => 'about'],
            ['key' => 'misi_3', 'value' => 'Terus berinovasi mengikuti perkembangan teknologi percetakan', 'group' => 'about'],
            ['key' => 'alamat', 'value' => 'Alamat Kantor Novalindo', 'group' => 'contact'],
            ['key' => 'email', 'value' => 'info@novalindo.com', 'group' => 'contact'],
            ['key' => 'wa_resmi', 'value' => '6281234567890', 'group' => 'contact'],
            ['key' => 'wa_cs', 'value' => '6281234567891', 'group' => 'contact'],
            ['key' => 'jam_operasional', 'value' => 'Senin - Sabtu: 08:00 - 17:00 WIB', 'group' => 'contact'],
            ['key' => 'kantor_cabang', 'value' => '', 'group' => 'contact'],
            ['key' => 'instagram', 'value' => 'https://instagram.com/novalindo', 'group' => 'social'],
            ['key' => 'facebook', 'value' => 'https://facebook.com/novalindo', 'group' => 'social'],
            ['key' => 'tiktok', 'value' => '', 'group' => 'social'],
            ['key' => 'rating_google', 'value' => '5.0', 'group' => 'general'],
        ];

        foreach ($settings as $setting) {
            CompanySetting::create($setting);
        }

        // Services
        $services = [
            ['name' => 'Digital Print A3', 'slug' => 'digital-print-a3', 'description' => 'Layanan cetak digital format A3 berkualitas tinggi. Cocok untuk kebutuhan cetak dokumen, brosur, dan materi promosi.', 'machines' => 'Mesin Konika Minolta C3080', 'sort_order' => 1],
            ['name' => 'Cetak Offset', 'slug' => 'cetak-offset', 'description' => 'Layanan cetak offset untuk kebutuhan percetakan dalam jumlah besar dengan kualitas warna konsisten dan tajam.', 'machines' => 'Mesin GTO 4 Warna, Mesin Oliver 58, Mesin Oliver 52, Mesin Toko, Mesin Ryobi, Mesin Toko Besty', 'sort_order' => 2],
            ['name' => 'Sampul Rapot', 'slug' => 'sampul-rapot', 'description' => 'Pembuatan sampul rapot berkualitas dengan pilihan finishing: sablon, hot print, dan sleting.', 'machines' => null, 'sort_order' => 3],
            ['name' => 'Fotokopi', 'slug' => 'fotokopi', 'description' => 'Layanan fotokopi cepat dan berkualitas untuk berbagai kebutuhan penggandaan dokumen.', 'machines' => null, 'sort_order' => 4],
            ['name' => 'Alat Tulis Kantor', 'slug' => 'alat-tulis-kantor', 'description' => 'Menyediakan berbagai kebutuhan alat tulis kantor lengkap dengan harga bersaing.', 'machines' => null, 'sort_order' => 5],
            ['name' => 'Print Outdoor', 'slug' => 'print-outdoor', 'description' => 'Layanan cetak outdoor untuk banner, spanduk, MMT, dan media promosi luar ruangan lainnya.', 'machines' => null, 'sort_order' => 6],
            ['name' => 'Print Indoor', 'slug' => 'print-indoor', 'description' => 'Layanan cetak indoor untuk poster, photo, stiker, dan media promosi dalam ruangan.', 'machines' => null, 'sort_order' => 7],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // Categories & Products
        $categoriesData = [
            ['name' => 'Digital Print A3', 'slug' => 'digital-print-a3', 'description' => 'Produk cetak digital format A3', 'products' => [
                ['name' => 'Print HVS A3', 'slug' => 'print-hvs-a3', 'description' => 'Cetak digital pada kertas HVS ukuran A3', 'price' => 3000, 'unit' => 'lembar', 'min_order' => 1],
            ]],
            ['name' => 'Offset', 'slug' => 'offset', 'description' => 'Produk cetak offset', 'products' => [
                ['name' => 'Nota NCR', 'slug' => 'nota-ncr', 'description' => 'Cetak nota NCR 2 ply, 3 ply dengan berbagai ukuran', 'price' => 150000, 'unit' => 'rim', 'min_order' => 1],
            ]],
            ['name' => 'Ivory', 'slug' => 'ivory', 'description' => 'Produk cetak pada kertas ivory', 'products' => [
                ['name' => 'Cetak Ivory', 'slug' => 'cetak-ivory', 'description' => 'Cetak pada kertas ivory untuk kemasan dan box', 'price' => 0, 'unit' => 'pcs', 'min_order' => 100],
            ]],
            ['name' => 'Undangan', 'slug' => 'undangan', 'description' => 'Berbagai jenis undangan cetak', 'products' => [
                ['name' => 'Undangan Pernikahan', 'slug' => 'undangan-pernikahan', 'description' => 'Cetak undangan pernikahan custom desain', 'price' => 3000, 'unit' => 'pcs', 'min_order' => 100],
                ['name' => 'Undangan Khitanan', 'slug' => 'undangan-khitanan', 'description' => 'Cetak undangan khitanan berbagai desain', 'price' => 2500, 'unit' => 'pcs', 'min_order' => 100],
            ]],
            ['name' => 'Art Paper', 'slug' => 'art-paper', 'description' => 'Produk cetak pada kertas art paper', 'products' => [
                ['name' => 'Brosur Art Paper', 'slug' => 'brosur-art-paper', 'description' => 'Cetak brosur pada kertas art paper glossy/doff', 'price' => 500, 'unit' => 'lembar', 'min_order' => 100],
                ['name' => 'Cetak Chromo', 'slug' => 'cetak-chromo', 'description' => 'Cetak label dan stiker pada kertas chromo', 'price' => 0, 'unit' => 'lembar', 'min_order' => 500],
            ]],
            ['name' => 'Packaging', 'slug' => 'packaging', 'description' => 'Kemasan dan packaging custom', 'products' => [
                ['name' => 'Box Packaging Custom', 'slug' => 'box-packaging-custom', 'description' => 'Cetak box packaging custom desain dan ukuran', 'price' => 0, 'unit' => 'pcs', 'min_order' => 100],
            ]],
            ['name' => 'Sampul Rapot', 'slug' => 'sampul-rapot', 'description' => 'Berbagai jenis sampul rapot', 'products' => [
                ['name' => 'Rapot Sablon', 'slug' => 'rapot-sablon', 'description' => 'Sampul rapot dengan finishing sablon', 'price' => 15000, 'unit' => 'pcs', 'min_order' => 50],
                ['name' => 'Rapot Hot Print', 'slug' => 'rapot-hot-print', 'description' => 'Sampul rapot dengan finishing hot print emas/perak', 'price' => 20000, 'unit' => 'pcs', 'min_order' => 50],
                ['name' => 'Rapot Sleting', 'slug' => 'rapot-sleting', 'description' => 'Sampul rapot dengan sleting/resleting', 'price' => 25000, 'unit' => 'pcs', 'min_order' => 50],
            ]],
            ['name' => 'Fotokopi', 'slug' => 'fotokopi', 'description' => 'Layanan fotokopi', 'products' => [
                ['name' => 'Fotokopi Hitam Putih', 'slug' => 'fotokopi-hitam-putih', 'description' => 'Fotokopi hitam putih kertas A4/F4', 'price' => 200, 'unit' => 'lembar', 'min_order' => 1],
                ['name' => 'Fotokopi Warna', 'slug' => 'fotokopi-warna', 'description' => 'Fotokopi berwarna kertas A4/F4', 'price' => 1000, 'unit' => 'lembar', 'min_order' => 1],
            ]],
            ['name' => 'Alat Tulis Kantor', 'slug' => 'alat-tulis-kantor', 'description' => 'Perlengkapan ATK', 'products' => [
                ['name' => 'ATK Lengkap', 'slug' => 'atk-lengkap', 'description' => 'Berbagai kebutuhan alat tulis kantor', 'price' => 0, 'unit' => 'pcs', 'min_order' => 1],
            ]],
            ['name' => 'Outdoor', 'slug' => 'outdoor', 'description' => 'Media cetak outdoor', 'products' => [
                ['name' => 'MMT / Banner', 'slug' => 'mmt-banner', 'description' => 'Cetak banner MMT flexy untuk outdoor', 'price' => 25000, 'unit' => 'm²', 'min_order' => 1],
                ['name' => 'One Way Vision', 'slug' => 'one-way-vision', 'description' => 'Cetak stiker one way vision untuk kaca', 'price' => 85000, 'unit' => 'm²', 'min_order' => 1],
                ['name' => 'Vinil Outdoor', 'slug' => 'vinil-outdoor', 'description' => 'Cetak pada bahan vinil untuk outdoor', 'price' => 75000, 'unit' => 'm²', 'min_order' => 1],
                ['name' => 'Backlite', 'slug' => 'backlite', 'description' => 'Cetak backlite untuk neon box dan lightbox', 'price' => 85000, 'unit' => 'm²', 'min_order' => 1],
            ]],
            ['name' => 'Indoor', 'slug' => 'indoor', 'description' => 'Media cetak indoor', 'products' => [
                ['name' => 'Photo Paper Print', 'slug' => 'photo-paper-print', 'description' => 'Cetak foto berkualitas pada photo paper', 'price' => 75000, 'unit' => 'm²', 'min_order' => 1],
                ['name' => 'Albatros', 'slug' => 'albatros', 'description' => 'Cetak pada bahan albatros untuk indoor', 'price' => 65000, 'unit' => 'm²', 'min_order' => 1],
                ['name' => 'Stiker Transparent', 'slug' => 'stiker-transparent', 'description' => 'Cetak stiker transparan', 'price' => 95000, 'unit' => 'm²', 'min_order' => 1],
                ['name' => 'Name Tag', 'slug' => 'name-tag', 'description' => 'Cetak name tag custom', 'price' => 15000, 'unit' => 'pcs', 'min_order' => 10],
                ['name' => 'Kalender Custom', 'slug' => 'kalender-custom', 'description' => 'Cetak kalender custom', 'price' => 0, 'unit' => 'pcs', 'min_order' => 50],
                ['name' => 'Map / Folder', 'slug' => 'map-folder', 'description' => 'Cetak map/folder custom', 'price' => 0, 'unit' => 'pcs', 'min_order' => 100],
                ['name' => 'Amplop Custom', 'slug' => 'amplop-custom', 'description' => 'Cetak amplop dengan logo perusahaan', 'price' => 0, 'unit' => 'pcs', 'min_order' => 100],
                ['name' => 'ID Card', 'slug' => 'id-card', 'description' => 'Cetak ID Card PVC', 'price' => 15000, 'unit' => 'pcs', 'min_order' => 10],
            ]],
            ['name' => 'Lainnya', 'slug' => 'lainnya', 'description' => 'Produk percetakan lainnya', 'products' => [
                ['name' => 'Buku Yasin', 'slug' => 'buku-yasin', 'description' => 'Cetak buku yasin custom', 'price' => 0, 'unit' => 'pcs', 'min_order' => 50],
                ['name' => 'Stampel / Cap', 'slug' => 'stampel-cap', 'description' => 'Pembuatan stampel/cap rubber dan otomatis', 'price' => 35000, 'unit' => 'pcs', 'min_order' => 1],
                ['name' => 'Mug Custom', 'slug' => 'mug-custom', 'description' => 'Cetak mug custom dengan foto atau desain', 'price' => 35000, 'unit' => 'pcs', 'min_order' => 1],
            ]],
        ];

        $sortOrder = 1;
        foreach ($categoriesData as $catData) {
            $products = $catData['products'];
            unset($catData['products']);
            $catData['sort_order'] = $sortOrder++;
            $category = Category::create($catData);

            $prodSort = 1;
            foreach ($products as $prodData) {
                $prodData['category_id'] = $category->id;
                $prodData['sort_order'] = $prodSort++;
                Product::create($prodData);
            }
        }

        // Testimonials
        $testimonials = [
            ['name' => 'Budi Santoso', 'company' => 'PT Maju Jaya', 'content' => 'Kualitas cetak sangat bagus dan pengerjaan cepat. Kami selalu mempercayakan kebutuhan percetakan perusahaan ke Novalindo.', 'rating' => 5, 'sort_order' => 1],
            ['name' => 'Siti Rahayu', 'company' => 'Dinas Pendidikan', 'content' => 'Pelayanan ramah dan hasil cetak memuaskan. Sampul rapot yang dipesan sesuai dengan ekspektasi kami.', 'rating' => 5, 'sort_order' => 2],
            ['name' => 'Ahmad Hidayat', 'company' => null, 'content' => 'Harga bersaing dengan kualitas yang tidak mengecewakan. Terima kasih Novalindo!', 'rating' => 4, 'sort_order' => 3],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
