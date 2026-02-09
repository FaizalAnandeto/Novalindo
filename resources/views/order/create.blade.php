@extends('layouts.app')

@section('title', 'Pemesanan - Novalindo Digital Printing & Offset')

@section('content')

{{-- Hero --}}
<section class="bg-linear-to-r from-red-600 to-red-800 text-white pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl md:text-4xl font-extrabold mb-2">Formulir Pemesanan</h1>
        <p class="text-red-100 text-lg">Isi formulir di bawah untuk membuat pesanan percetakan</p>
    </div>
</section>

<section class="py-10">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-xl mb-6">
            <h4 class="font-bold mb-2">Terjadi Kesalahan:</h4>
            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('order.store') }}" method="POST" id="orderForm">
            @csrf

            {{-- Customer Info --}}
            <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                    <span class="w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center text-sm font-bold mr-3">1</span>
                    Informasi Pemesan
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="customer_name" value="{{ old('customer_name') }}" required
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 text-sm px-4 py-2.5 border"
                               placeholder="Masukkan nama lengkap">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">No. Telepon / WhatsApp <span class="text-red-500">*</span></label>
                        <input type="text" name="customer_phone" value="{{ old('customer_phone') }}" required
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 text-sm px-4 py-2.5 border"
                               placeholder="08xxxxxxxxxx">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="customer_email" value="{{ old('customer_email') }}"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 text-sm px-4 py-2.5 border"
                               placeholder="email@contoh.com">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                        <input type="text" name="customer_address" value="{{ old('customer_address') }}"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 text-sm px-4 py-2.5 border"
                               placeholder="Alamat pengiriman/pengambilan">
                    </div>
                </div>
            </div>

            {{-- Order Items --}}
            <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                    <span class="w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center text-sm font-bold mr-3">2</span>
                    Produk yang Dipesan
                </h2>

                <div id="orderItems">
                    <div class="order-item border border-gray-200 rounded-lg p-4 mb-4" data-index="0">
                        <div class="flex justify-between items-center mb-3">
                            <h4 class="font-semibold text-gray-700 text-sm">Item #1</h4>
                            <button type="button" onclick="removeItem(this)" class="text-red-500 hover:text-red-700 text-sm hidden remove-btn">
                                ✕ Hapus
                            </button>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Produk <span class="text-red-500">*</span></label>
                                <select name="items[0][product_id]" required
                                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 text-sm px-4 py-2.5 border product-select">
                                    <option value="">-- Pilih Produk --</option>
                                    @foreach($products as $product)
                                    <option value="{{ $product->id }}"
                                            data-price="{{ $product->price }}"
                                            data-unit="{{ $product->unit }}"
                                            data-min="{{ $product->min_order }}"
                                            {{ $selectedProduct && $selectedProduct->id == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }} ({{ $product->category->name ?? '' }})
                                        @if($product->price > 0) - {{ $product->formatted_price }}/{{ $product->unit }} @endif
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah <span class="text-red-500">*</span></label>
                                <input type="number" name="items[0][quantity]" min="1" value="1" required
                                       class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 text-sm px-4 py-2.5 border quantity-input">
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Spesifikasi / Catatan Khusus</label>
                            <textarea name="items[0][specifications]" rows="2"
                                      class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 text-sm px-4 py-2.5 border"
                                      placeholder="Contoh: Ukuran A4, kertas art paper 260gr, finishing laminasi doff, dll."></textarea>
                        </div>
                        <div class="mt-2 text-right">
                            <span class="text-sm text-gray-500 item-price-display"></span>
                        </div>
                    </div>
                </div>

                <button type="button" onclick="addItem()"
                        class="w-full mt-2 py-2.5 border-2 border-dashed border-red-300 text-red-600 rounded-lg hover:bg-red-50 transition font-medium text-sm flex items-center justify-center">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Tambah Produk Lain
                </button>
            </div>

            {{-- Notes --}}
            <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                    <span class="w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center text-sm font-bold mr-3">3</span>
                    Catatan Tambahan
                </h2>
                <textarea name="notes" rows="3"
                          class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 text-sm px-4 py-2.5 border"
                          placeholder="Catatan tambahan untuk pesanan Anda (opsional)">{{ old('notes') }}</textarea>
            </div>

            {{-- Submit --}}
            <div class="flex flex-col sm:flex-row gap-4 justify-end">
                <a href="{{ route('products.index') }}" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium text-center">
                    Kembali ke Produk
                </a>
                <button type="submit"
                        class="px-8 py-3 bg-red-600 text-white font-bold rounded-lg hover:bg-red-700 transition shadow-lg flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Kirim Pesanan
                </button>
            </div>
        </form>
    </div>
</section>

@push('scripts')
<script>
    let itemCount = 1;

    function addItem() {
        const container = document.getElementById('orderItems');
        const index = itemCount;
        const html = `
            <div class="order-item border border-gray-200 rounded-lg p-4 mb-4" data-index="${index}">
                <div class="flex justify-between items-center mb-3">
                    <h4 class="font-semibold text-gray-700 text-sm">Item #${index + 1}</h4>
                    <button type="button" onclick="removeItem(this)" class="text-red-500 hover:text-red-700 text-sm">✕ Hapus</button>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Produk <span class="text-red-500">*</span></label>
                        <select name="items[${index}][product_id]" required class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 text-sm px-4 py-2.5 border product-select">
                            <option value="">-- Pilih Produk --</option>
                            @foreach($products as $product)
                            <option value="{{ $product->id }}" data-price="{{ $product->price }}" data-unit="{{ $product->unit }}" data-min="{{ $product->min_order }}">
                                {{ $product->name }} ({{ $product->category->name ?? '' }}) @if($product->price > 0) - {{ $product->formatted_price }}/{{ $product->unit }} @endif
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah <span class="text-red-500">*</span></label>
                        <input type="number" name="items[${index}][quantity]" min="1" value="1" required class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 text-sm px-4 py-2.5 border quantity-input">
                    </div>
                </div>
                <div class="mt-3">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Spesifikasi / Catatan Khusus</label>
                    <textarea name="items[${index}][specifications]" rows="2" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 text-sm px-4 py-2.5 border"
                              placeholder="Contoh: Ukuran A4, kertas art paper 260gr, finishing laminasi doff, dll."></textarea>
                </div>
                <div class="mt-2 text-right"><span class="text-sm text-gray-500 item-price-display"></span></div>
            </div>`;
        container.insertAdjacentHTML('beforeend', html);
        itemCount++;
        updateRemoveButtons();
    }

    function removeItem(btn) {
        btn.closest('.order-item').remove();
        updateRemoveButtons();
    }

    function updateRemoveButtons() {
        const items = document.querySelectorAll('.order-item');
        items.forEach((item, i) => {
            const removeBtn = item.querySelector('.remove-btn');
            if (removeBtn) {
                removeBtn.classList.toggle('hidden', items.length <= 1);
            }
        });
    }
</script>
@endpush

@endsection
