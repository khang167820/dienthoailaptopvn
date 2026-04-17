@extends('layouts.app')

@section('breadcrumbs')
    <a href="/" wire:navigate class="hover:text-[#d70018] transition-colors">Trang chủ</a>
    <span class="mx-1.5 text-gray-400">/</span>
    <a href="/{{ $category->slug }}" wire:navigate class="hover:text-[#d70018] transition-colors">{{ $category->name }}</a>
    <span class="mx-1.5 text-gray-400">/</span>
    <a href="/{{ $category->slug }}/{{ $brand->slug }}" wire:navigate class="hover:text-[#d70018] transition-colors">{{ $brand->name }}</a>
    <span class="mx-1.5 text-gray-400">/</span>
    <span class="text-gray-800 font-medium">{{ $deviceModel->name }}</span>
@endsection

@section('schema')
{!! json_encode($schemaData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
@endsection

@section('content')

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  DEVICE MODEL HERO                                     ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<section class="page-hero py-10 md:py-14">
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm text-white px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest mb-3 border border-white/15">
                    <span class="w-1.5 h-1.5 bg-yellow-400 rounded-full animate-pulse"></span>
                    Bảng giá cập nhật {{ date('m/Y') }}
                </div>
                <h1 class="text-2xl md:text-4xl font-black text-white mb-2">Bảng Giá Sửa Chữa {{ $deviceModel->name }}</h1>
                <p class="text-gray-300 text-sm flex items-center gap-3 flex-wrap">
                    <span class="flex items-center gap-1.5">🛡️ Bảo hành dài hạn</span>
                    <span class="w-1 h-1 bg-gray-500 rounded-full"></span>
                    <span class="flex items-center gap-1.5">⚡ Sửa lấy liền</span>
                    <span class="w-1 h-1 bg-gray-500 rounded-full"></span>
                    <span class="flex items-center gap-1.5">💯 Linh kiện chuẩn</span>
                </p>
            </div>
            <a href="tel:0777333763" class="btn-3d shrink-0 inline-flex items-center gap-2 bg-yellow-400 text-black px-6 py-3 rounded-xl font-bold text-sm shadow-lg shadow-yellow-400/25 hover:bg-white hover:text-[#d70018] transition-colors">
                📞 Gọi Báo Giá Ngay
            </a>
        </div>
    </div>
</section>

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  PRICING TABLE — Premium Design                        ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<section class="py-10 md:py-14 bg-gradient-to-b from-gray-50 to-white">
    <div class="container mx-auto px-4">
        {{-- Desktop Table --}}
        <div class="hidden md:block bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden reveal">
            <div class="overflow-x-auto">
                <table class="w-full table-brand">
                    <thead>
                        <tr class="text-white">
                            <th class="text-left px-6 py-4 font-bold text-sm">Dịch vụ sửa chữa</th>
                            <th class="text-right px-6 py-4 font-bold text-sm">Giá gốc</th>
                            <th class="text-right px-6 py-4 font-bold text-sm">Giá ưu đãi</th>
                            <th class="text-center px-6 py-4 font-bold text-sm">Bảo hành</th>
                            <th class="text-center px-6 py-4 font-bold text-sm">Thời gian</th>
                            <th class="text-center px-6 py-4 font-bold text-sm w-[120px]"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($repairs as $index => $repair)
                            <tr class="border-b border-gray-50 hover:bg-red-50/30 transition-colors group">
                                <td class="px-6 py-5">
                                    <a href="/{{ $repair->slug }}" wire:navigate class="font-bold text-gray-900 hover:text-[#d70018] transition-colors text-base group-hover:text-[#d70018]">
                                        {{ $repair->serviceType->name }}
                                    </a>
                                    @if($repair->short_description)
                                        <p class="text-xs text-gray-400 mt-1 max-w-xs">{{ $repair->short_description }}</p>
                                    @endif
                                    @if($repair->is_featured)
                                        <span class="inline-block mt-1.5 text-[9px] bg-gradient-to-r from-amber-400 to-orange-500 text-black px-2 py-0.5 rounded-full font-bold uppercase tracking-wider">🔥 Phổ biến</span>
                                    @endif
                                </td>
                                <td class="text-right px-6 py-5">
                                    @if($repair->sale_price && $repair->price != $repair->sale_price)
                                        <span class="text-gray-400 line-through text-sm">{{ number_format($repair->price, 0, ',', '.') }}đ</span>
                                    @endif
                                </td>
                                <td class="text-right px-6 py-5">
                                    <span class="font-black text-xl text-[#d70018]">{{ $repair->display_price }}</span>
                                    @if($repair->discount_percent)
                                        <span class="ml-1.5 text-[10px] bg-red-50 text-[#d70018] px-2 py-0.5 rounded-full font-bold border border-red-100">-{{ $repair->discount_percent }}%</span>
                                    @endif
                                </td>
                                <td class="text-center px-6 py-5">
                                    <span class="inline-flex items-center gap-1 text-sm text-gray-600 font-medium">
                                        <svg class="w-4 h-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                        {{ $repair->warranty ?? 'Liên hệ' }}
                                    </span>
                                </td>
                                <td class="text-center px-6 py-5 text-sm text-gray-500">
                                    {{ $repair->repair_time ?? '—' }}
                                </td>
                                <td class="text-center px-6 py-5">
                                    <a href="tel:0777333763" class="inline-flex items-center gap-1.5 bg-gradient-to-r from-[#d70018] to-[#ff2d4a] text-white px-5 py-2.5 rounded-xl text-xs font-bold hover:shadow-lg hover:shadow-red-500/25 hover:scale-105 transition-all duration-300">
                                        📞 Gọi ngay
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Mobile Cards --}}
        <div class="md:hidden space-y-4 stagger-children reveal">
            @foreach($repairs as $repair)
                <div class="bg-white rounded-2xl border border-gray-200 p-5 card-premium">
                    <div class="flex items-start justify-between gap-3 mb-3">
                        <div>
                            <a href="/{{ $repair->slug }}" wire:navigate class="font-bold text-gray-900 text-base hover:text-[#d70018] transition-colors">{{ $repair->serviceType->name }}</a>
                            @if($repair->short_description)
                                <p class="text-xs text-gray-400 mt-1">{{ $repair->short_description }}</p>
                            @endif
                        </div>
                        @if($repair->discount_percent)
                            <span class="shrink-0 text-[10px] bg-gradient-to-r from-[#d70018] to-[#ff4757] text-white px-2.5 py-1 rounded-lg font-bold shadow-sm">-{{ $repair->discount_percent }}%</span>
                        @endif
                    </div>

                    <div class="flex items-end justify-between pt-3 border-t border-gray-100">
                        <div>
                            <span class="block text-2xl font-black text-[#d70018]">{{ $repair->display_price }}</span>
                            @if($repair->sale_price && $repair->price != $repair->sale_price)
                                <span class="text-xs text-gray-400 line-through">{{ number_format($repair->price, 0, ',', '.') }}đ</span>
                            @endif
                        </div>
                        <div class="text-right space-y-1">
                            <span class="block text-[10px] text-gray-500">🛡️ {{ $repair->warranty ?? 'Liên hệ' }}</span>
                            <span class="block text-[10px] text-gray-500">⏱️ {{ $repair->repair_time ?? '—' }}</span>
                        </div>
                    </div>

                    <a href="tel:0777333763" class="mt-4 w-full flex items-center justify-center gap-2 bg-gradient-to-r from-[#d70018] to-[#ff2d4a] text-white py-3 rounded-xl text-sm font-bold hover:shadow-lg transition-all">
                        📞 Gọi Báo Giá Ngay
                    </a>
                </div>
            @endforeach
        </div>

        @if($repairs->isEmpty())
            <div class="text-center py-14 reveal">
                <div class="text-5xl mb-3">📋</div>
                <h3 class="text-lg font-bold text-gray-900 mb-1">Đang cập nhật bảng giá</h3>
                <p class="text-gray-500 text-sm mb-5">Bảng giá sửa chữa {{ $deviceModel->name }} đang được cập nhật</p>
                <a href="tel:0777333763" class="inline-flex items-center gap-2 bg-[#d70018] text-white px-6 py-3 rounded-xl font-bold text-sm hover:bg-red-700 transition-colors">📞 Liên hệ báo giá</a>
            </div>
        @endif

        {{-- Note --}}
        @if($repairs->count())
        <div class="mt-6 bg-amber-50 border border-amber-200 rounded-xl p-4 flex items-start gap-3 reveal">
            <span class="text-xl shrink-0">ℹ️</span>
            <div class="text-xs text-amber-800 leading-relaxed">
                <strong>Lưu ý:</strong> Giá trên chỉ mang tính tham khảo và có thể thay đổi tùy tình trạng máy thực tế. Vui lòng liên hệ hotline <a href="tel:0777333763" class="text-[#d70018] font-bold underline">0777.333.763</a> để được báo giá chính xác nhất. Tất cả dịch vụ đều có phiếu bảo hành chính thức.
            </div>
        </div>
        @endif
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const els = document.querySelectorAll('.reveal, .stagger-children');
    if (els.length) {
        const obs = new IntersectionObserver((entries) => {
            entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('revealed'); obs.unobserve(e.target); } });
        }, { threshold: 0.1 });
        els.forEach(el => obs.observe(el));
    }
});
</script>
@endsection
