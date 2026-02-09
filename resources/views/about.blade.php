@extends('layouts.app')

@section('title', 'Tentang Kami - Novalindo Digital Printing & Offset')

@section('content')

{{-- Hero --}}
<section class="bg-linear-to-r from-red-600 to-red-800 text-white pt-28 pb-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Tentang Kami</h1>
        <p class="text-red-100 text-lg max-w-2xl">Mengenal lebih dekat Percetakan Novalindo Digital Printing & Offset</p>
    </div>
</section>

{{-- Company Info --}}
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-block bg-red-50 text-red-600 px-4 py-2 rounded-full text-sm font-semibold mb-4">Tentang Novalindo</div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Percetakan Novalindo <br>Digital Printing & Offset</h2>
                <p class="text-gray-600 mb-4">
                    Percetakan Novalindo adalah perusahaan percetakan yang bergerak di bidang digital printing dan cetak offset.
                    Dengan pengalaman bertahun-tahun, kami telah melayani berbagai klien dari instansi pemerintah, perusahaan swasta, hingga perorangan.
                </p>
                <p class="text-gray-600 mb-6">
                    Didukung oleh mesin-mesin modern dan tenaga profesional, kami berkomitmen untuk menghasilkan produk cetakan berkualitas tinggi
                    dengan harga yang kompetitif dan pengerjaan tepat waktu.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="bg-red-50 rounded-lg p-4">
                        <h4 class="font-bold text-red-600 mb-1">Tagline</h4>
                        <p class="text-gray-700 italic">"Solusi, Inovasi, Kreasi"</p>
                    </div>
                    <div class="bg-red-50 rounded-lg p-4">
                        <h4 class="font-bold text-red-600 mb-1">Berdiri Sejak</h4>
                        <p class="text-gray-700">{{ App\Models\CompanySetting::get('berdiri_sejak', 'Tahun pendirian') }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-linear-to-br from-red-100 to-red-50 rounded-2xl p-8 flex items-center justify-center min-h-[400px]">
                <div class="text-center">
                    <div class="w-32 h-32 mx-auto bg-red-600 rounded-2xl flex items-center justify-center mb-4 shadow-lg">
                        <span class="text-white font-extrabold text-5xl">N</span>
                    </div>
                    <p class="text-red-600 font-bold text-xl">Novalindo</p>
                    <p class="text-gray-500 text-sm">Digital Printing & Offset</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Visi Misi --}}
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-xl p-8 shadow-md border-l-4 border-red-600">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">
                    <span class="text-red-600">Visi</span>
                </h3>
                <p class="text-gray-600 leading-relaxed">
                    {{ App\Models\CompanySetting::get('visi', 'Menjadi perusahaan percetakan terdepan yang memberikan solusi cetak terbaik dan terpercaya di Indonesia dengan kualitas yang unggul dan pelayanan yang prima.') }}
                </p>
            </div>
            <div class="bg-white rounded-xl p-8 shadow-md border-l-4 border-red-600">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">
                    <span class="text-red-600">Misi</span>
                </h3>
                <ul class="text-gray-600 space-y-2">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ App\Models\CompanySetting::get('misi_1', 'Memberikan layanan percetakan berkualitas tinggi') }}
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ App\Models\CompanySetting::get('misi_2', 'Mengutamakan kepuasan pelanggan') }}
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ App\Models\CompanySetting::get('misi_3', 'Terus berinovasi mengikuti perkembangan teknologi') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- Tim --}}
@if($teamMembers->count() > 0)
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Tim <span class="text-red-600">Kami</span></h2>
            <p class="text-gray-600">Didukung oleh tenaga profesional berpengalaman</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($teamMembers as $member)
            <div class="bg-white rounded-xl shadow-md overflow-hidden text-center group hover:shadow-xl transition">
                @if($member->photo)
                <div class="h-48 overflow-hidden">
                    <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
                @else
                <div class="h-48 bg-linear-to-br from-red-100 to-red-50 flex items-center justify-center">
                    <div class="w-20 h-20 rounded-full bg-red-200 flex items-center justify-center">
                        <span class="text-red-600 font-bold text-2xl">{{ substr($member->name, 0, 1) }}</span>
                    </div>
                </div>
                @endif
                <div class="p-4">
                    <h4 class="font-bold text-gray-900">{{ $member->name }}</h4>
                    <p class="text-sm text-red-600">{{ $member->position }}</p>
                    <span class="inline-block mt-2 text-xs bg-{{ $member->type === 'karyawan' ? 'blue' : 'green' }}-100 text-{{ $member->type === 'karyawan' ? 'blue' : 'green' }}-700 px-2 py-1 rounded-full">
                        {{ $member->type === 'karyawan' ? 'Karyawan' : 'Reseller' }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
