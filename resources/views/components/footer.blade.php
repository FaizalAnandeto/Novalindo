<footer class="bg-gray-900 text-gray-300">
    {{-- Main Footer --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {{-- Company Info --}}
            <div>
                <div class="flex items-center space-x-2 mb-4">
                    <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-lg">N</span>
                    </div>
                    <div>
                        <span class="text-xl font-bold text-white">Novalindo</span>
                        <span class="text-xs text-gray-400 block">Digital Printing & Offset</span>
                    </div>
                </div>
                <p class="text-sm text-gray-400 mb-4">
                    <span class="text-red-400 font-semibold italic">Solusi, Inovasi, Kreasi</span><br>
                    Menyediakan layanan percetakan digital dan offset berkualitas tinggi untuk kebutuhan bisnis dan personal Anda.
                </p>
            </div>

            {{-- Quick Links --}}
            <div>
                <h3 class="text-white font-semibold mb-4">Menu</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-red-400 transition">Beranda</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-red-400 transition">Tentang Kami</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-red-400 transition">Layanan</a></li>
                    <li><a href="{{ route('products.index') }}" class="hover:text-red-400 transition">Produk</a></li>
                    <li><a href="{{ route('portfolio') }}" class="hover:text-red-400 transition">Portofolio</a></li>
                    <li><a href="{{ route('order.create') }}" class="hover:text-red-400 transition">Pesan</a></li>
                </ul>
            </div>

            {{-- Services --}}
            <div>
                <h3 class="text-white font-semibold mb-4">Layanan</h3>
                <ul class="space-y-2 text-sm">
                    <li>Digital Print A3</li>
                    <li>Cetak Offset</li>
                    <li>Print Outdoor & Indoor</li>
                    <li>Fotokopi</li>
                    <li>Alat Tulis Kantor</li>
                    <li>Sampul Rapot</li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h3 class="text-white font-semibold mb-4">Kontak</h3>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start space-x-2">
                        <svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>{{ App\Models\CompanySetting::get('alamat', 'Alamat kantor belum diatur') }}</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-red-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>{{ App\Models\CompanySetting::get('email', 'info@novalindo.com') }}</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-red-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span>{{ App\Models\CompanySetting::get('wa_resmi', '081234567890') }}</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-red-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>{{ App\Models\CompanySetting::get('jam_operasional', 'Senin - Sabtu: 08:00 - 17:00') }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Copyright --}}
    <div class="border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex flex-col sm:flex-row justify-between items-center">
            <p class="text-sm text-gray-500">&copy; {{ date('Y') }} Novalindo Digital Printing & Offset. All rights reserved.</p>
            <p class="text-sm text-gray-500 mt-2 sm:mt-0">Solusi, Inovasi, Kreasi</p>
        </div>
    </div>
</footer>
