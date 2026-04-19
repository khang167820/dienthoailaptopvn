@extends('layouts.app')

@section('breadcrumbs')
    <a href="/" wire:navigate class="hover:text-[#d70018] transition-colors">Trang chủ</a>
    <span class="mx-1.5 text-gray-400">/</span>
    <span class="text-gray-800 font-medium">{{ $category->name }}</span>
@endsection

@section('content')

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  CATEGORY HERO — Viện Di Động Inspired                 ║
    ╚═══════════════════════════════════════════════════════╝ --}}
@php
    $categoryImages = [
        'sua-dien-thoai' => '/images/category_phone_repair.png',
        'sua-laptop' => '/images/category_laptop_repair.png',
        'sua-tablet' => '/images/category_tablet_repair.png',
    ];
    $heroImage = $categoryImages[$category->slug] ?? '/images/category_phone_repair.png';
@endphp

<section class="relative overflow-hidden min-h-[280px] md:min-h-[340px] flex items-center">
    <div class="absolute inset-0">
        <img src="{{ $heroImage }}" alt="{{ $category->name }}" class="w-full h-full object-cover" loading="eager">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0a0a1a]/95 via-[#1a1a2e]/80 to-[#0a0a1a]/50"></div>
    </div>
    <div class="particle-field">
        <span style="top:15%;left:10%;animation-duration:7s"></span>
        <span style="top:40%;left:30%;animation-duration:9s;animation-delay:1s"></span>
        <span style="top:70%;left:60%;animation-duration:6s;animation-delay:0.5s"></span>
        <span style="top:25%;left:80%;animation-duration:11s;animation-delay:2s"></span>
    </div>

    <div class="container mx-auto px-4 relative z-10 py-10 md:py-14">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
            <div class="max-w-xl">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-full text-xs font-bold uppercase tracking-widest mb-4 border border-white/15">
                    <span class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></span>
                    Dịch vụ sửa chữa chuyên nghiệp
                </div>
                <h1 class="text-3xl md:text-5xl font-black text-white mb-3 leading-tight drop-shadow-lg">{{ $category->name }}</h1>
                <p class="text-white/75 text-sm md:text-base leading-relaxed">{{ $category->description ?: 'Chọn thương hiệu thiết bị bạn cần sửa chữa. Bảo hành dài hạn, giá cả minh bạch.' }}</p>
            </div>

            {{-- Quick Contact Card --}}
            <div class="glass-dark rounded-2xl p-5 min-w-[260px] hidden lg:block">
                <p class="text-white font-bold text-sm mb-3 flex items-center gap-2">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span> Tư vấn miễn phí
                </p>
                <a href="tel:0777333763" class="flex items-center gap-3 bg-white/10 rounded-xl px-4 py-3 mb-2 hover:bg-white/20 transition-colors">
                    <div class="w-9 h-9 bg-gradient-to-br from-[#d70018] to-[#ff4757] rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <div>
                        <span class="block text-white font-bold text-sm">0777.333.763</span>
                        <span class="text-gray-400 text-[10px]">CSKH (Mai Quyên)</span>
                    </div>
                </a>
                <a href="tel:0934660219" class="flex items-center gap-3 bg-white/10 rounded-xl px-4 py-3 hover:bg-white/20 transition-colors">
                    <div class="w-9 h-9 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                    </div>
                    <div>
                        <span class="block text-white font-bold text-sm">0934.660.219</span>
                        <span class="text-gray-400 text-[10px]">Kỹ thuật (Khang)</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  TRUST BADGES BAR                                      ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<section class="bg-gradient-to-r from-[#1a1a2e] via-[#0f3460] to-[#1a1a2e] py-0">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 divide-x divide-white/10">
            <div class="py-5 text-center">
                <div class="flex justify-center mb-2"><span class="text-2xl">🛡️</span></div>
                <span class="block text-white font-bold text-sm">Bảo hành 6-12 tháng</span>
                <span class="text-gray-500 text-[10px]">Cam kết chất lượng</span>
            </div>
            <div class="py-5 text-center">
                <div class="flex justify-center mb-2"><span class="text-2xl">⚡</span></div>
                <span class="block text-white font-bold text-sm">Sửa lấy liền</span>
                <span class="text-gray-500 text-[10px]">Trong ngày</span>
            </div>
            <div class="py-5 text-center">
                <div class="flex justify-center mb-2"><span class="text-2xl">💯</span></div>
                <span class="block text-white font-bold text-sm">Linh kiện chính hãng</span>
                <span class="text-gray-500 text-[10px]">Nguồn gốc rõ ràng</span>
            </div>
            <div class="py-5 text-center">
                <div class="flex justify-center mb-2"><span class="text-2xl">👁️</span></div>
                <span class="block text-white font-bold text-sm">Quan sát trực tiếp</span>
                <span class="text-gray-500 text-[10px]">Minh bạch 100%</span>
            </div>
        </div>
    </div>
</section>

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  BRAND GRID                                            ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<section class="py-10 md:py-14 bg-white relative overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-8 reveal">
            <h2 class="text-xl md:text-2xl font-black text-gray-900 uppercase tracking-tight">Chọn Hãng {{ $category->name }}</h2>
            <p class="text-gray-500 text-sm mt-1">Bấm vào thương hiệu để xem bảng giá chi tiết</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 stagger-children reveal">
            @foreach($brands as $brand)
                <a href="/{{ $category->slug }}/{{ $brand->slug }}" wire:navigate
                   class="group flex flex-col items-center gap-3 p-5 rounded-2xl bg-white border-2 border-gray-100 hover:border-[#d70018] transition-all duration-300 card-premium"
                   id="brand-{{ $brand->slug }}">
                    @if($brand->logo)
                        <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" class="w-14 h-14 object-contain grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-400" loading="lazy">
                    @else
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-red-50 to-pink-50 flex items-center justify-center text-[#d70018] font-bold text-xl group-hover:scale-110 transition-transform">
                            {{ substr($brand->name, 0, 1) }}
                        </div>
                    @endif
                    <span class="text-sm font-bold text-gray-700 group-hover:text-[#d70018] transition-colors">{{ $brand->name }}</span>
                    <svg class="w-4 h-4 text-gray-300 group-hover:text-[#d70018] transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            @endforeach
        </div>

        @if($brands->isEmpty())
            <div class="text-center py-12">
                <div class="text-5xl mb-3">🔧</div>
                <h3 class="text-lg font-bold text-gray-900 mb-1">Đang cập nhật</h3>
                <p class="text-gray-500 text-sm mb-4">Danh mục này đang được bổ sung thương hiệu</p>
                <a href="tel:0777333763" class="inline-flex items-center gap-2 bg-[#d70018] text-white px-6 py-3 rounded-xl font-bold text-sm hover:bg-red-700 transition-colors">📞 Gọi tư vấn</a>
            </div>
        @endif
    </div>
</section>

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  QUY TRÌNH SỬA CHỮA — Process Steps                   ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<section class="py-12 md:py-14 bg-gray-50 border-t border-gray-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-10 reveal">
            <div class="inline-flex items-center gap-2 bg-blue-50 text-blue-600 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest mb-3">
                <span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>
                Quy trình chuyên nghiệp
            </div>
            <h2 class="text-xl md:text-2xl font-black text-gray-900 uppercase tracking-tight">Quy Trình Sửa Chữa 4 Bước</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 stagger-children reveal">
            {{-- Step 1 --}}
            <div class="relative bg-white rounded-2xl p-6 border border-gray-100 text-center group hover:border-[#d70018]/30 transition-all card-premium">
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-8 h-8 bg-gradient-to-br from-[#d70018] to-[#ff4757] rounded-full flex items-center justify-center text-white font-black text-sm shadow-lg shadow-red-500/25">1</div>
                <div class="text-4xl mb-4 mt-2">📋</div>
                <h3 class="font-bold text-gray-900 mb-2">Tiếp Nhận & Khám Bệnh</h3>
                <p class="text-xs text-gray-500 leading-relaxed">Tiếp nhận máy, kiểm tra và chẩn đoán chính xác lỗi trong 10-15 phút</p>
            </div>
            {{-- Step 2 --}}
            <div class="relative bg-white rounded-2xl p-6 border border-gray-100 text-center group hover:border-[#d70018]/30 transition-all card-premium">
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-8 h-8 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-black text-sm shadow-lg shadow-blue-500/25">2</div>
                <div class="text-4xl mb-4 mt-2">💰</div>
                <h3 class="font-bold text-gray-900 mb-2">Báo Giá Minh Bạch</h3>
                <p class="text-xs text-gray-500 leading-relaxed">Báo giá rõ ràng, không phát sinh thêm. Khách đồng ý mới tiến hành sửa</p>
            </div>
            {{-- Step 3 --}}
            <div class="relative bg-white rounded-2xl p-6 border border-gray-100 text-center group hover:border-[#d70018]/30 transition-all card-premium">
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-8 h-8 bg-gradient-to-br from-amber-500 to-orange-600 rounded-full flex items-center justify-center text-white font-black text-sm shadow-lg shadow-amber-500/25">3</div>
                <div class="text-4xl mb-4 mt-2">🔧</div>
                <h3 class="font-bold text-gray-900 mb-2">Sửa Chữa & Thay Thế</h3>
                <p class="text-xs text-gray-500 leading-relaxed">Kỹ thuật viên sửa chữa trực tiếp, khách hàng có thể quan sát toàn bộ</p>
            </div>
            {{-- Step 4 --}}
            <div class="relative bg-white rounded-2xl p-6 border border-gray-100 text-center group hover:border-[#d70018]/30 transition-all card-premium">
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-8 h-8 bg-gradient-to-br from-emerald-500 to-green-600 rounded-full flex items-center justify-center text-white font-black text-sm shadow-lg shadow-emerald-500/25">4</div>
                <div class="text-4xl mb-4 mt-2">✅</div>
                <h3 class="font-bold text-gray-900 mb-2">Bàn Giao & Bảo Hành</h3>
                <p class="text-xs text-gray-500 leading-relaxed">Kiểm tra lại máy cùng khách, bàn giao phiếu bảo hành chính thức</p>
            </div>
        </div>
    </div>
</section>

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  DỊCH VỤ PHỔ BIẾN                                     ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<section class="py-12 md:py-14 bg-white border-t border-gray-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-10 reveal">
            <div class="inline-flex items-center gap-2 bg-red-50 text-[#d70018] px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest mb-3">
                <span class="w-1.5 h-1.5 bg-[#d70018] rounded-full"></span>
                Dịch vụ phổ biến
            </div>
            <h2 class="text-xl md:text-2xl font-black text-gray-900 uppercase tracking-tight">Dịch Vụ {{ $category->name }} Được Yêu Cầu Nhiều Nhất</h2>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 stagger-children reveal">
            @php
                $services = [
                    ['icon' => '📱', 'name' => 'Thay Màn Hình', 'color' => 'from-red-50 to-pink-50 border-red-100', 'textColor' => 'text-[#d70018]'],
                    ['icon' => '🔋', 'name' => 'Thay Pin', 'color' => 'from-green-50 to-emerald-50 border-green-100', 'textColor' => 'text-green-600'],
                    ['icon' => '🔲', 'name' => 'Ép Kính', 'color' => 'from-blue-50 to-indigo-50 border-blue-100', 'textColor' => 'text-blue-600'],
                    ['icon' => '📷', 'name' => 'Thay Camera', 'color' => 'from-purple-50 to-violet-50 border-purple-100', 'textColor' => 'text-purple-600'],
                    ['icon' => '🔌', 'name' => 'Thay Chân Sạc', 'color' => 'from-amber-50 to-orange-50 border-amber-100', 'textColor' => 'text-amber-600'],
                    ['icon' => '🖥️', 'name' => 'Sửa Mainboard', 'color' => 'from-gray-50 to-slate-50 border-gray-200', 'textColor' => 'text-gray-700'],
                ];
            @endphp
            @foreach($services as $service)
                <div class="group bg-gradient-to-br {{ $service['color'] }} border rounded-2xl p-5 text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300 cursor-pointer">
                    <div class="text-3xl mb-3 group-hover:scale-110 transition-transform">{{ $service['icon'] }}</div>
                    <span class="font-bold text-sm {{ $service['textColor'] }}">{{ $service['name'] }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  CTA — Liên hệ đặt lịch                               ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<section class="py-14 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-[#1a1a2e] via-[#d70018] to-[#0f3460] animate-gradient-shift"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width=%2240%22%20height=%2240%22%20xmlns=%22http://www.w3.org/2000/svg%22%3E%3Ccircle%20cx=%2220%22%20cy=%2220%22%20r=%221%22%20fill=%22rgba(255,255,255,0.05)%22/%3E%3C/svg%3E')]"></div>

    <div class="container mx-auto px-4 relative z-10 text-center">
        <h2 class="text-xl md:text-3xl font-black text-white mb-3 uppercase tracking-tight">Liên Hệ Báo Giá Ngay Hôm Nay</h2>
        <p class="text-white/70 text-sm mb-6 max-w-md mx-auto">Gọi điện hoặc gửi Zalo để được tư vấn miễn phí. Chúng tôi phục vụ 08:00 - 21:00 kể cả Chủ Nhật.</p>
        <div class="flex justify-center gap-4 flex-wrap">
            <a href="tel:0777333763" class="btn-3d inline-flex items-center gap-2 bg-yellow-400 text-black px-7 py-3.5 rounded-xl font-bold text-sm shadow-lg shadow-yellow-400/25 hover:bg-white hover:text-[#d70018] transition-colors">
                📞 CSKH: 0777.333.763
            </a>
            <a href="tel:0934660219" class="btn-3d inline-flex items-center gap-2 glass-dark text-white px-7 py-3.5 rounded-xl font-bold text-sm hover:bg-white/20 transition-colors">
                🔧 Kỹ thuật: 0934.660.219
            </a>
        </div>
    </div>
</section>

@endsection

