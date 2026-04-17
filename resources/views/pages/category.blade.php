@extends('layouts.app')

@section('breadcrumbs')
    <a href="/" wire:navigate class="hover:text-[#d70018] transition-colors">Trang chủ</a>
    <span class="mx-1.5 text-gray-400">/</span>
    <span class="text-gray-800 font-medium">{{ $category->name }}</span>
@endsection

@section('content')

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  CATEGORY HERO — Cinematic Banner                      ║
    ╚═══════════════════════════════════════════════════════╝ --}}
@php
    $categoryImages = [
        'sua-dien-thoai' => '/images/category_phone_repair.png',
        'sua-laptop' => '/images/category_laptop_repair.png',
        'sua-tablet' => '/images/category_tablet_repair.png',
    ];
    $categoryIcons = [
        'sua-dien-thoai' => '📱',
        'sua-laptop' => '💻',
        'sua-tablet' => '📟',
    ];
    $categoryColors = [
        'sua-dien-thoai' => ['from-[#d70018]', 'to-[#ff4757]', 'shadow-red-500/30'],
        'sua-laptop' => ['from-blue-500', 'to-indigo-600', 'shadow-blue-500/30'],
        'sua-tablet' => ['from-amber-500', 'to-orange-600', 'shadow-amber-500/30'],
    ];
    $heroImage = $categoryImages[$category->slug] ?? '/images/category_phone_repair.png';
    $heroIcon = $categoryIcons[$category->slug] ?? '🔧';
    $heroColors = $categoryColors[$category->slug] ?? ['from-[#d70018]', 'to-[#ff4757]', 'shadow-red-500/30'];
@endphp

<section class="relative overflow-hidden min-h-[320px] md:min-h-[380px] flex items-center">
    {{-- Background Image --}}
    <div class="absolute inset-0">
        <img src="{{ $heroImage }}" alt="{{ $category->name }}" class="w-full h-full object-cover" loading="eager">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0a0a1a]/95 via-[#1a1a2e]/80 to-[#0a0a1a]/60"></div>
    </div>

    {{-- Particle dots --}}
    <div class="particle-field">
        <span style="top:15%;left:10%;animation-duration:7s"></span>
        <span style="top:40%;left:30%;animation-duration:9s;animation-delay:1s"></span>
        <span style="top:70%;left:60%;animation-duration:6s;animation-delay:0.5s"></span>
        <span style="top:25%;left:80%;animation-duration:11s;animation-delay:2s"></span>
        <span style="top:60%;left:45%;animation-duration:8s;animation-delay:1.5s"></span>
    </div>

    {{-- Decorative glow --}}
    <div class="absolute top-0 right-0 w-96 h-96 bg-{{ str_replace('from-', '', $heroColors[0]) }}/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10 py-12 md:py-16">
        <div class="max-w-2xl">
            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-full text-xs font-bold uppercase tracking-widest mb-5 border border-white/15">
                <span class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></span>
                Dịch vụ sửa chữa chuyên nghiệp
            </div>

            {{-- Title --}}
            <h1 class="text-3xl md:text-5xl font-black text-white mb-4 leading-tight drop-shadow-lg">
                {{ $category->name }}
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-amber-400 to-orange-400 mt-1 text-2xl md:text-3xl">Bảng Giá & Dịch Vụ {{ date('Y') }}</span>
            </h1>

            {{-- Description --}}
            <p class="text-white/80 text-sm md:text-base leading-relaxed mb-8 max-w-xl">
                {{ $category->description ?: 'Chọn thương hiệu thiết bị bạn cần sửa chữa. Đội ngũ kỹ thuật viên chuyên nghiệp, bảo hành dài hạn, giá cả minh bạch.' }}
            </p>

            {{-- Quick Stats --}}
            <div class="flex flex-wrap gap-4">
                <div class="glass-dark rounded-xl px-5 py-3 flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br {{ $heroColors[0] }} {{ $heroColors[1] }} rounded-lg flex items-center justify-center text-white shadow-lg {{ $heroColors[2] }}">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <span class="block text-white font-bold text-sm">Bảo hành 6-12 tháng</span>
                        <span class="text-gray-400 text-[11px]">Cam kết chất lượng</span>
                    </div>
                </div>
                <div class="glass-dark rounded-xl px-5 py-3 flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-green-600 rounded-lg flex items-center justify-center text-white shadow-lg shadow-green-500/30">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <span class="block text-white font-bold text-sm">Lấy liền trong ngày</span>
                        <span class="text-gray-400 text-[11px]">Xử lý nhanh chóng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  BRAND GRID — Premium Cards                            ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<section class="py-12 md:py-16 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
    {{-- Decorative background --}}
    <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-red-50/30 rounded-full blur-3xl pointer-events-none -translate-y-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-blue-50/30 rounded-full blur-3xl pointer-events-none translate-y-1/2"></div>

    <div class="container mx-auto px-4 relative z-10">
        {{-- Section Header --}}
        <div class="text-center mb-10 reveal">
            <div class="inline-flex items-center gap-2 bg-red-50 text-[#d70018] px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest mb-4">
                <span class="w-2 h-2 bg-[#d70018] rounded-full animate-pulse"></span>
                Chọn thương hiệu
            </div>
            <h2 class="text-xl md:text-2xl font-black text-gray-900 uppercase tracking-tight">Chọn Hãng Thiết Bị Cần Sửa</h2>
            <p class="text-gray-500 text-sm mt-2 max-w-md mx-auto">Bấm vào thương hiệu để xem bảng giá chi tiết từng dòng máy</p>
        </div>

        {{-- Brand Cards --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5 stagger-children reveal">
            @foreach($brands as $brand)
                <a href="/{{ $category->slug }}/{{ $brand->slug }}" wire:navigate
                   class="group flex flex-col items-center gap-4 p-6 rounded-2xl bg-white border-2 border-gray-100 hover:border-[#d70018] transition-all duration-400 card-premium relative overflow-hidden"
                   id="brand-{{ $brand->slug }}">

                    {{-- Hover glow effect --}}
                    <div class="absolute inset-0 bg-gradient-to-br from-red-50/0 to-pink-50/0 group-hover:from-red-50/50 group-hover:to-pink-50/50 transition-all duration-500 pointer-events-none"></div>

                    {{-- Brand Logo --}}
                    <div class="relative z-10">
                        @if($brand->logo)
                            <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" class="w-16 h-16 object-contain grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-500" loading="lazy">
                        @else
                            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-red-50 to-pink-50 flex items-center justify-center text-[#d70018] font-bold text-2xl group-hover:from-red-100 group-hover:to-pink-100 group-hover:scale-110 transition-all duration-500 shadow-sm">
                                {{ substr($brand->name, 0, 1) }}
                            </div>
                        @endif
                    </div>

                    {{-- Brand Name --}}
                    <span class="relative z-10 text-sm font-bold text-gray-700 group-hover:text-[#d70018] transition-colors text-center">{{ $brand->name }}</span>

                    {{-- Arrow indicator --}}
                    <div class="relative z-10 w-8 h-8 bg-gray-50 group-hover:bg-[#d70018] rounded-full flex items-center justify-center transition-all duration-300">
                        <svg class="w-4 h-4 text-gray-400 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </div>
                </a>
            @endforeach
        </div>

        {{-- Empty State --}}
        @if($brands->isEmpty())
            <div class="text-center py-16">
                <div class="text-6xl mb-4">🔧</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Đang cập nhật</h3>
                <p class="text-gray-500 text-sm">Danh mục này đang được bổ sung thương hiệu. Vui lòng liên hệ để được tư vấn!</p>
                <a href="tel:0777333763" class="inline-flex items-center gap-2 bg-[#d70018] text-white px-6 py-3 rounded-xl font-bold text-sm mt-6 hover:bg-red-700 transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    Gọi tư vấn: 0777.333.763
                </a>
            </div>
        @endif
    </div>
</section>

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  CTA SECTION                                           ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<section class="py-12 bg-gradient-to-r from-[#1a1a2e] via-[#0f3460] to-[#1a1a2e] relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width=%2240%22%20height=%2240%22%20xmlns=%22http://www.w3.org/2000/svg%22%3E%3Ccircle%20cx=%2220%22%20cy=%2220%22%20r=%221%22%20fill=%22rgba(255,255,255,0.04)%22/%3E%3C/svg%3E')]"></div>

    <div class="container mx-auto px-4 relative z-10 text-center">
        <h2 class="text-xl md:text-2xl font-black text-white mb-4 uppercase tracking-tight">Không Tìm Thấy Thiết Bị?</h2>
        <p class="text-gray-400 text-sm mb-6 max-w-md mx-auto">Liên hệ trực tiếp để được tư vấn và báo giá miễn phí cho mọi dòng máy</p>
        <div class="flex justify-center gap-4 flex-wrap">
            <a href="tel:0777333763" class="btn-3d inline-flex items-center gap-2 bg-yellow-400 text-black px-7 py-3.5 rounded-xl font-bold text-sm shadow-lg shadow-yellow-400/25 hover:bg-white hover:text-[#d70018] transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                CSKH: 0777.333.763
            </a>
            <a href="tel:0934660219" class="btn-3d inline-flex items-center gap-2 glass-dark text-white px-7 py-3.5 rounded-xl font-bold text-sm hover:bg-white/20 transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                Kỹ thuật: 0934.660.219
            </a>
        </div>
    </div>
</section>

{{-- Scroll reveal script --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const revealElements = document.querySelectorAll('.reveal, .stagger-children');
    if (revealElements.length) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        revealElements.forEach(el => observer.observe(el));
    }
});
</script>
@endsection
