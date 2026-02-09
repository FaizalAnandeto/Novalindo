@extends('layouts.app')

@section('title', 'Pesanan Berhasil - Novalindo')

@section('content')

<section class="pt-28 pb-16">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
            {{-- Success Icon --}}
            <div class="w-20 h-20 mx-auto mb-6 bg-green-100 rounded-full flex items-center justify-center">
                <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>

            <h1 class="text-3xl font-bold text-gray-900 mb-2">Pesanan Berhasil!</h1>
            <p class="text-gray-600 mb-6">Terima kasih, pesanan Anda telah kami terima.</p>

            {{-- Order Number --}}
            <div class="bg-red-50 rounded-xl p-6 mb-6">
                <p class="text-sm text-gray-600 mb-1">Nomor Pesanan Anda:</p>
                <p class="text-3xl font-bold text-red-600">{{ $order->order_number }}</p>
                <h4 class="text-xs text-gray-500 italic">*catat nomor pesanan ini untuk cek status pemesanan</h4>
            </div>

            {{-- Order Summary --}}
            <div class="bg-gray-50 rounded-xl p-6 mb-6 text-left">
                <h3 class="font-bold text-gray-900 mb-3">Ringkasan Pesanan</h3>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Nama:</span>
                        <span class="font-medium">{{ $order->customer_name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Telepon:</span>
                        <span class="font-medium">{{ $order->customer_phone }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Status:</span>
                        <span class="inline-block bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded text-xs font-medium">{{ $order->status_label }}</span>
                    </div>
                </div>

                <hr class="my-4">

                <h4 class="font-semibold text-gray-900 mb-2">Item Pesanan:</h4>
                @foreach($order->items as $item)
                <div class="flex justify-between items-start py-2 border-b border-gray-200 last:border-0">
                    <div>
                        <p class="font-medium text-gray-900">{{ $item->product->name ?? 'Produk' }}</p>
                        <p class="text-xs text-gray-500">{{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                        @if($item->specifications)
                        <p class="text-xs text-gray-400 mt-1">{{ $item->specifications }}</p>
                        @endif
                    </div>
                    <span class="font-medium text-gray-900">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                </div>
                @endforeach

                <div class="flex justify-between mt-4 pt-4 border-t-2 border-gray-300">
                    <span class="font-bold text-gray-900">Total:</span>
                    <span class="font-bold text-red-600 text-lg">{{ $order->formatted_total }}</span>
                </div>
            </div>

            {{-- Actions --}}
            <div class="space-y-3">
                <p class="text-sm text-gray-500">
                    Tim kami akan segera menghubungi Anda untuk konfirmasi pesanan.
                    Anda juga bisa menghubungi kami via WhatsApp untuk informasi lebih lanjut.
                </p>
                <div class="flex flex-col sm:flex-row gap-3 justify-center mt-4">
                    <a href="https://wa.me/{{ App\Models\CompanySetting::get('wa_resmi', '6281234567890') }}?text=Halo, saya ingin mengkonfirmasi pesanan dengan nomor {{ $order->order_number }}"
                       target="_blank"
                       class="inline-flex items-center justify-center px-6 py-3 bg-green-500 text-white font-bold rounded-lg hover:bg-green-600 transition">
                        Konfirmasi via WhatsApp
                    </a>
                    <a href="{{ route('order.track') }}"
                       class="inline-flex items-center justify-center px-6 py-3 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition">
                        📦 Cek Status Pesanan
                    </a>
                    <a href="{{ route('home') }}"
                       class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition">
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
