@extends('layouts.app')

@section('title', 'Cek Pesanan - Novalindo')

@section('content')

<section class="pt-28 pb-16 min-h-screen bg-gray-50">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-gray-900">Cek Status Pesanan</h1>
            <p class="text-gray-600 mt-2">Masukkan nomor pesanan dan nomor telepon Anda untuk melihat status pesanan.</p>
        </div>

        {{-- Search Form --}}
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
            <form action="{{ route('order.track.search') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="order_number" class="block text-sm font-semibold text-gray-700 mb-1">Nomor Pesanan</label>
                    <input type="text" name="order_number" id="order_number" value="{{ old('order_number') }}"
                           placeholder="Contoh: NVL202602070001"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition text-lg tracking-wider uppercase"
                           required>
                </div>

                <div>
                    <label for="customer_phone" class="block text-sm font-semibold text-gray-700 mb-1">Nomor Telepon</label>
                    <input type="text" name="customer_phone" id="customer_phone" value="{{ old('customer_phone') }}"
                           placeholder="Nomor telepon saat memesan"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition"
                           required>
                </div>

                @if($errors->has('not_found'))
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg flex items-center gap-2">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-sm">{{ $errors->first('not_found') }}</span>
                </div>
                @endif

                <button type="submit"
                        class="w-full py-3 bg-red-600 text-white font-bold rounded-lg hover:bg-red-700 transition shadow-md text-lg">
                    🔍 Cek Pesanan
                </button>
            </form>
        </div>

        {{-- Order Result --}}
        @if(isset($order))
        <div class="bg-white rounded-2xl shadow-lg p-8" id="result">
            {{-- Status Header --}}
            <div class="text-center mb-6">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full mb-4
                    @switch($order->status)
                        @case('pending') bg-yellow-100 @break
                        @case('confirmed') bg-blue-100 @break
                        @case('processing') bg-indigo-100 @break
                        @case('completed') bg-green-100 @break
                        @case('cancelled') bg-red-100 @break
                    @endswitch
                ">
                    @switch($order->status)
                        @case('pending')
                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            @break
                        @case('confirmed')
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            @break
                        @case('processing')
                            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            @break
                        @case('completed')
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            @break
                        @case('cancelled')
                            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            @break
                    @endswitch
                </div>

                <h2 class="text-xl font-bold text-gray-900">{{ $order->order_number }}</h2>

                <span class="inline-block mt-2 px-4 py-1.5 rounded-full text-sm font-bold
                    @switch($order->status)
                        @case('pending') bg-yellow-100 text-yellow-700 @break
                        @case('confirmed') bg-blue-100 text-blue-700 @break
                        @case('processing') bg-indigo-100 text-indigo-700 @break
                        @case('completed') bg-green-100 text-green-700 @break
                        @case('cancelled') bg-red-100 text-red-700 @break
                    @endswitch
                ">
                    {{ $order->status_label }}
                </span>
            </div>

            {{-- Progress Tracker --}}
            @if($order->status !== 'cancelled')
            <div class="mb-8">
                @php
                    $steps = ['pending', 'confirmed', 'processing', 'completed'];
                    $currentIndex = array_search($order->status, $steps);
                    if ($currentIndex === false) $currentIndex = -1;
                @endphp
                <div class="flex items-center justify-between relative">
                    {{-- Line behind --}}
                    <div class="absolute top-5 left-0 right-0 h-0.5 bg-gray-200"></div>
                    <div class="absolute top-5 left-0 h-0.5 bg-red-500 transition-all duration-500"
                         style="width: {{ $currentIndex >= 0 ? ($currentIndex / (count($steps) - 1)) * 100 : 0 }}%"></div>

                    @foreach($steps as $i => $step)
                    <div class="relative flex flex-col items-center z-10" style="width: 25%">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold
                            {{ $i <= $currentIndex ? 'bg-red-600 text-white' : 'bg-gray-200 text-gray-500' }}">
                            @if($i < $currentIndex)
                                ✓
                            @else
                                {{ $i + 1 }}
                            @endif
                        </div>
                        <span class="text-xs mt-2 text-center font-medium {{ $i <= $currentIndex ? 'text-red-600' : 'text-gray-400' }}">
                            @switch($step)
                                @case('pending') Menunggu @break
                                @case('confirmed') Dikonfirmasi @break
                                @case('processing') Diproses @break
                                @case('completed') Selesai @break
                            @endswitch
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Order Details --}}
            <div class="bg-gray-50 rounded-xl p-6 mb-6">
                <h3 class="font-bold text-gray-900 mb-3">Detail Pesanan</h3>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Nama:</span>
                        <span class="font-medium">{{ $order->customer_name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Telepon:</span>
                        <span class="font-medium">{{ $order->customer_phone }}</span>
                    </div>
                    @if($order->customer_email)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Email:</span>
                        <span class="font-medium">{{ $order->customer_email }}</span>
                    </div>
                    @endif
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tanggal Pesan:</span>
                        <span class="font-medium">{{ $order->created_at->format('d M Y, H:i') }} WIB</span>
                    </div>
                </div>
            </div>

            {{-- Item List --}}
            <div class="bg-gray-50 rounded-xl p-6 mb-6">
                <h3 class="font-bold text-gray-900 mb-3">Item Pesanan</h3>
                @foreach($order->items as $item)
                <div class="flex justify-between items-start py-3 border-b border-gray-200 last:border-0">
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

            {{-- Action --}}
            <div class="text-center space-y-3">
                <p class="text-sm text-gray-500">Ada pertanyaan tentang pesanan Anda?</p>
                <a href="https://wa.me/{{ App\Models\CompanySetting::get('wa_resmi', '6281234567890') }}?text=Halo, saya ingin menanyakan status pesanan {{ $order->order_number }}"
                   target="_blank"
                   class="inline-flex items-center justify-center px-6 py-3 bg-green-500 text-white font-bold rounded-lg hover:bg-green-600 transition">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    Hubungi via WhatsApp
                </a>
            </div>
        </div>
        @endif

    </div>
</section>

@endsection
