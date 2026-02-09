@extends('layouts.app')

@section('title', 'Kontak - Novalindo Digital Printing & Offset')

@section('content')

{{-- Hero --}}
<section class="bg-linear-to-r from-red-600 to-red-800 text-white pt-28 pb-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Hubungi Kami</h1>
        <p class="text-red-100 text-lg max-w-2xl">Kami siap membantu kebutuhan percetakan Anda</p>
    </div>
</section>

{{-- Contact Info --}}
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Contact Cards --}}
            <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6">
                {{-- Alamat --}}
                <div class="bg-white rounded-xl shadow-md p-6 border-t-4 border-red-600">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Alamat Kantor</h3>
                    <p class="text-gray-600 text-sm">{{ App\Models\CompanySetting::get('alamat', 'Alamat kantor belum diatur') }}</p>
                    @if(App\Models\CompanySetting::get('kantor_cabang'))
                    <p class="text-gray-500 text-xs mt-2"><strong>Cabang:</strong> {{ App\Models\CompanySetting::get('kantor_cabang') }}</p>
                    @endif
                </div>

                {{-- Email --}}
                <div class="bg-white rounded-xl shadow-md p-6 border-t-4 border-red-600">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Email Resmi</h3>
                    <a href="mailto:{{ App\Models\CompanySetting::get('email', 'info@novalindo.com') }}" class="text-red-600 hover:underline text-sm">
                        {{ App\Models\CompanySetting::get('email', 'info@novalindo.com') }}
                    </a>
                </div>

                {{-- WhatsApp Resmi --}}
                <div class="bg-white rounded-xl shadow-md p-6 border-t-4 border-red-600">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">WhatsApp Resmi</h3>
                    <a href="https://wa.me/{{ App\Models\CompanySetting::get('wa_resmi', '6281234567890') }}" target="_blank" class="text-green-600 hover:underline text-sm">
                        {{ App\Models\CompanySetting::get('wa_resmi', '081234567890') }}
                    </a>
                    @if(App\Models\CompanySetting::get('wa_cs'))
                    <p class="text-gray-500 text-xs mt-2">CS: {{ App\Models\CompanySetting::get('wa_cs') }}</p>
                    @endif
                </div>

                {{-- Jam Operasional --}}
                <div class="bg-white rounded-xl shadow-md p-6 border-t-4 border-red-600">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Jam Operasional</h3>
                    <p class="text-gray-600 text-sm">{{ App\Models\CompanySetting::get('jam_operasional', 'Senin - Sabtu: 08:00 - 17:00') }}</p>
                </div>

                {{-- Media Sosial --}}
                <div class="sm:col-span-2 bg-white rounded-xl shadow-md p-6 border-t-4 border-red-600">
                    <h3 class="font-bold text-gray-900 mb-4">Media Sosial</h3>
                    <div class="flex flex-wrap gap-4">
                        @if(App\Models\CompanySetting::get('instagram'))
                        <a href="{{ App\Models\CompanySetting::get('instagram') }}" target="_blank"
                           class="flex items-center space-x-2 bg-pink-50 text-pink-600 px-4 py-2 rounded-lg hover:bg-pink-100 transition">
                            <span class="font-medium text-sm">Instagram</span>
                        </a>
                        @endif
                        @if(App\Models\CompanySetting::get('facebook'))
                        <a href="{{ App\Models\CompanySetting::get('facebook') }}" target="_blank"
                           class="flex items-center space-x-2 bg-blue-50 text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-100 transition">
                            <span class="font-medium text-sm">Facebook</span>
                        </a>
                        @endif
                        @if(App\Models\CompanySetting::get('tiktok'))
                        <a href="{{ App\Models\CompanySetting::get('tiktok') }}" target="_blank"
                           class="flex items-center space-x-2 bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition">
                            <span class="font-medium text-sm">TikTok</span>
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Quick Order CTA --}}
            <div>
                <div class="bg-red-600 rounded-xl p-8 text-white sticky top-24">
                    <h3 class="text-2xl font-bold mb-4">Butuh Cetak Sekarang?</h3>
                    <p class="text-red-100 mb-6">Langsung buat pesanan online atau hubungi kami via WhatsApp untuk konsultasi gratis.</p>
                    <div class="space-y-3">
                        <a href="{{ route('order.create') }}" class="block w-full text-center px-6 py-3 bg-white text-red-600 font-bold rounded-lg hover:bg-yellow-300 transition">
                            Buat Pesanan Online
                        </a>
                        <a href="https://wa.me/{{ App\Models\CompanySetting::get('wa_resmi', '6281234567890') }}" target="_blank"
                           class="block w-full text-center px-6 py-3 border-2 border-white text-white font-bold rounded-lg hover:bg-white hover:text-red-600 transition">
                            Chat WhatsApp
                        </a>
                    </div>
                    <div class="mt-6 pt-6 border-t border-red-400">
                        <p class="text-red-200 text-xs mb-1">Rating Google</p>
                        <div class="flex items-center">
                            <span class="text-yellow-300 text-lg">★★★★★</span>
                            <span class="ml-2 text-white font-bold">{{ App\Models\CompanySetting::get('rating_google', '5.0') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
