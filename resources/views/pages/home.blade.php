@extends('layouts.app')

@section('content')
{{-- Hero Section --}}
<section class="relative bg-gradient-to-br from-blue-700 via-blue-800 to-indigo-900 text-white overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-72 h-72 bg-white rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-400 rounded-full blur-3xl translate-x-1/3 translate-y-1/3"></div>
    </div>
    <div class="container mx-auto px-4 py-16 md:py-24 relative z-10">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-3xl md:text-5xl font-extrabold leading-tight mb-6">
                Sửa Chữa Điện Thoại & Laptop
                <span class="text-yellow-400">Chuyên Nghiệp</span>
            </h1>
            <p class="text-lg md:text-xl text-blue-100 mb-8 leading-relaxed">
                Linh kiện chính hãng • Bảo hành dài hạn • Sửa lấy liền trong ngày
            </p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="tel:0xxxxxxxxx" class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-8 py-4 rounded-2xl text-lg font-bold hover:shadow-2xl hover:scale-105 transition-all duration-300 flex items-center gap-2">
                    📞 Gọi báo giá ngay
                </a>
                <a href="#bang-gia" class="bg-white/10 backdrop-blur-sm text-white border-2 border-white/30 px-8 py-4 rounded-2xl text-lg font-semibold hover:bg-white/20 transition-all duration-300">
                    💰 Xem bảng giá
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Chọn thiết bị --}}
<section class="py-12 bg-white" id="thiet-bi">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-2">Thiết Bị Của Bạn Bị Gì?</h2>
        <p class="text-gray-500 text-center mb-10">Chọn hãng để xem bảng giá sửa chữa chi tiết</p>

        <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-4">
            @foreach($brands as $brand)
                <a href="/sua-dien-thoai/{{ $brand->slug }}" wire:navigate
                   class="group flex flex-col items-center gap-3 p-4 rounded-2xl border-2 border-gray-100 hover:border-blue-500 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 bg-white">
                    @if($brand->logo)
                        <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" class="w-12 h-12 object-contain group-hover:scale-110 transition-transform" loading="lazy">
                    @else
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center text-blue-600 font-bold text-lg">
                            {{ substr($brand->name, 0, 1) }}
                        </div>
                    @endif
                    <span class="text-sm font-medium text-gray-700 group-hover:text-blue-600 transition-colors">{{ $brand->name }}</span>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- Danh mục dịch vụ --}}
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-10">Dịch Vụ Sửa Chữa</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($categories as $category)
                <a href="/{{ $category->slug }}" wire:navigate
                   class="group relative bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl border border-gray-100 hover:border-blue-200 transition-all duration-300 overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-bl from-blue-50 to-transparent rounded-bl-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center text-white text-2xl flex-shrink-0 group-hover:scale-110 transition-transform shadow-lg">
                            {{ $category->icon ?? '🔧' }}
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-800 group-hover:text-blue-600 transition-colors mb-1">{{ $category->name }}</h3>
                            <p class="text-sm text-gray-500 leading-relaxed">{{ $category->description ?: 'Dịch vụ chuyên nghiệp, bảo hành dài hạn' }}</p>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-blue-600 text-sm font-semibold opacity-0 group-hover:opacity-100 transition-opacity">
                        Xem chi tiết →
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- Bảng giá nổi bật --}}
@if($featuredRepairs->count())
<section class="py-12 bg-white" id="bang-gia">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-2">Bảng Giá Sửa Chữa Phổ Biến</h2>
        <p class="text-gray-500 text-center mb-10">Giá cập nhật mới nhất {{ date('m/Y') }}</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($featuredRepairs as $repair)
                <a href="/{{ $repair->slug }}" wire:navigate
                   class="group bg-white rounded-2xl border border-gray-100 hover:border-blue-300 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">{{ $repair->serviceType->name ?? '' }}</span>
                            @if($repair->discount_percent)
                                <span class="text-xs font-bold text-red-500 bg-red-50 px-2 py-1 rounded-full">-{{ $repair->discount_percent }}%</span>
                            @endif
                        </div>
                        <h3 class="font-bold text-gray-800 group-hover:text-blue-600 transition-colors mb-2 line-clamp-2">
                            {{ $repair->serviceType->name ?? '' }} {{ $repair->deviceModel->name ?? '' }}
                        </h3>
                        <div class="flex items-baseline gap-2">
                            <span class="text-xl font-extrabold text-red-500">{{ $repair->display_price }}</span>
                            @if($repair->sale_price && $repair->price != $repair->sale_price)
                                <span class="text-sm text-gray-400 line-through">{{ number_format($repair->price, 0, ',', '.') }}đ</span>
                            @endif
                        </div>
                        @if($repair->warranty)
                            <p class="text-xs text-gray-500 mt-2">🛡️ BH: {{ $repair->warranty }}</p>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Quy trình sửa chữa --}}
<section class="py-12 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-10">Quy Trình Sửa Chữa Minh Bạch</h2>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @php
                $steps = [
                    ['icon' => '📋', 'title' => 'Tiếp nhận & Kiểm tra', 'desc' => 'Kiểm tra máy miễn phí, báo giá chi tiết trước khi sửa'],
                    ['icon' => '💬', 'title' => 'Xác nhận & Báo giá', 'desc' => 'Khách hàng đồng ý giá mới bắt đầu sửa chữa'],
                    ['icon' => '🔧', 'title' => 'Sửa chữa chuyên nghiệp', 'desc' => 'Kỹ thuật viên tay nghề cao sửa trực tiếp trước mặt'],
                    ['icon' => '✅', 'title' => 'Bàn giao & Bảo hành', 'desc' => 'Kiểm tra kỹ lưỡng, bàn giao kèm phiếu bảo hành'],
                ];
            @endphp
            @foreach($steps as $index => $step)
                <div class="relative text-center">
                    <div class="w-20 h-20 mx-auto bg-white rounded-2xl shadow-lg flex items-center justify-center text-3xl mb-4 border-2 border-blue-100">
                        {{ $step['icon'] }}
                    </div>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-bold">{{ $index + 1 }}</div>
                    <h3 class="font-bold text-gray-800 mb-2">{{ $step['title'] }}</h3>
                    <p class="text-sm text-gray-500">{{ $step['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Blog --}}
@if($latestPosts->count())
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-10">
            <h2 class="text-2xl md:text-3xl font-bold">Blog Thủ Thuật</h2>
            <a href="/blog" wire:navigate class="text-blue-600 font-semibold hover:underline">Xem tất cả →</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($latestPosts as $post)
                <a href="/blog/{{ $post->slug }}" wire:navigate class="group">
                    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300">
                        @if($post->thumbnail)
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        @else
                            <div class="w-full h-48 bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center text-4xl">📱</div>
                        @endif
                        <div class="p-4">
                            <h3 class="font-bold text-gray-800 group-hover:text-blue-600 transition-colors line-clamp-2 mb-2">{{ $post->title }}</h3>
                            <p class="text-sm text-gray-500 line-clamp-2">{{ $post->excerpt }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CTA --}}
<section class="py-12 bg-gradient-to-r from-blue-700 to-indigo-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-2xl md:text-3xl font-bold mb-4">Máy bạn đang gặp vấn đề?</h2>
        <p class="text-blue-100 mb-8 text-lg">Liên hệ ngay để được tư vấn miễn phí và báo giá trong 5 phút!</p>
        <a href="tel:0xxxxxxxxx" class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-500 to-red-500 text-white px-10 py-4 rounded-2xl text-xl font-bold hover:shadow-2xl hover:scale-105 transition-all duration-300">
            📞 0xxx.xxx.xxx
        </a>
    </div>
</section>
@endsection
