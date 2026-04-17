@extends('layouts.app')

@section('breadcrumbs')
    <a href="/" wire:navigate class="hover:text-[#d70018] transition-colors">Trang chủ</a>
    <span class="mx-1.5 text-gray-400">/</span>
    <a href="/{{ $category->slug }}" wire:navigate class="hover:text-[#d70018] transition-colors">{{ $category->name }}</a>
    <span class="mx-1.5 text-gray-400">/</span>
    <span class="text-gray-800 font-medium">{{ $brand->name }}</span>
@endsection

@section('content')

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  BRAND HERO — Premium Design                           ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<section class="page-hero py-10 md:py-14">
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col md:flex-row md:items-center gap-5">
            {{-- Brand Logo --}}
            <div class="shrink-0">
                @if($brand->logo)
                    <div class="w-20 h-20 bg-white rounded-2xl p-3 shadow-xl shadow-black/20 border border-white/20">
                        <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" class="w-full h-full object-contain">
                    </div>
                @else
                    <div class="w-20 h-20 bg-gradient-to-br from-[#d70018] to-[#ff4757] rounded-2xl flex items-center justify-center text-white font-black text-3xl shadow-xl shadow-red-500/25">
                        {{ substr($brand->name, 0, 1) }}
                    </div>
                @endif
            </div>

            {{-- Title & Info --}}
            <div>
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm text-white px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest mb-2 border border-white/15">
                    <span class="w-1.5 h-1.5 bg-green-400 rounded-full animate-pulse"></span>
                    Có sẵn linh kiện
                </div>
                <h1 class="text-3xl md:text-4xl font-black text-white mb-2">Sửa Chữa {{ $brand->name }}</h1>
                <p class="text-gray-300 text-sm md:text-base flex items-center gap-3 flex-wrap">
                    <span>Chọn dòng máy {{ $brand->name }} bạn cần sửa chữa</span>
                    <span class="hidden md:inline w-1 h-1 bg-gray-500 rounded-full"></span>
                    <span class="hidden md:inline text-yellow-400 font-semibold">{{ $deviceModels->count() }} dòng máy</span>
                </p>
            </div>

            {{-- Quick Call --}}
            <div class="md:ml-auto">
                <a href="tel:0777333763" class="btn-3d inline-flex items-center gap-2 bg-yellow-400 text-black px-6 py-3 rounded-xl font-bold text-sm shadow-lg shadow-yellow-400/25 hover:bg-white hover:text-[#d70018] transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    Báo giá ngay
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  DEVICE MODEL GRID                                     ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<section class="py-10 md:py-14 bg-gradient-to-b from-gray-50 to-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-8 reveal">
            <h2 class="text-xl md:text-2xl font-black text-gray-900 uppercase tracking-tight">Chọn Dòng Máy {{ $brand->name }}</h2>
            <p class="text-gray-500 text-sm mt-1">Bấm vào dòng máy để xem bảng giá sửa chữa chi tiết</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5 stagger-children reveal">
            @foreach($deviceModels as $model)
                <a href="/{{ $category->slug }}/{{ $brand->slug }}/{{ $model->slug }}" wire:navigate
                   class="group bg-white rounded-2xl border-2 border-gray-100 hover:border-[#d70018] shadow-sm transition-all duration-400 overflow-hidden card-premium"
                   id="model-{{ $model->slug }}">
                    @if($model->image)
                        <div class="overflow-hidden bg-gradient-to-br from-gray-50 to-white p-2">
                            <img src="{{ asset('storage/' . $model->image) }}" alt="{{ $model->name }}" class="w-full h-40 object-contain group-hover:scale-110 transition-transform duration-500" loading="lazy">
                        </div>
                    @else
                        <div class="w-full h-40 bg-gradient-to-br from-red-50 to-gray-50 flex items-center justify-center relative overflow-hidden">
                            <div class="text-5xl group-hover:scale-110 transition-transform duration-500">📱</div>
                            <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width=%2240%22%20height=%2240%22%20xmlns=%22http://www.w3.org/2000/svg%22%3E%3Ccircle%20cx=%2220%22%20cy=%2220%22%20r=%221%22%20fill=%22rgba(215,0,24,0.03)%22/%3E%3C/svg%3E')]"></div>
                        </div>
                    @endif
                    <div class="p-4 border-t border-gray-100 text-center">
                        <h3 class="font-bold text-gray-900 group-hover:text-[#d70018] transition-colors text-sm md:text-base">{{ $model->name }}</h3>
                        <div class="flex items-center justify-center gap-1 text-[#d70018] text-xs font-semibold mt-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            Xem bảng giá
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        @if($deviceModels->isEmpty())
            <div class="text-center py-14">
                <div class="text-5xl mb-3">🔍</div>
                <h3 class="text-lg font-bold text-gray-900 mb-1">Đang cập nhật</h3>
                <p class="text-gray-500 text-sm mb-5">Danh sách dòng máy {{ $brand->name }} đang được bổ sung</p>
                <a href="tel:0777333763" class="inline-flex items-center gap-2 bg-[#d70018] text-white px-6 py-3 rounded-xl font-bold text-sm hover:bg-red-700 transition-colors">📞 Gọi tư vấn: 0777.333.763</a>
            </div>
        @endif
    </div>
</section>

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  WHY CHOOSE US — Mini E-E-A-T                          ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<section class="py-10 bg-white border-t border-gray-100">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 reveal">
            <div class="flex items-start gap-4 p-5 bg-red-50/50 rounded-2xl border border-red-100/50">
                <div class="w-12 h-12 bg-gradient-to-br from-[#d70018] to-[#ff4757] rounded-xl flex items-center justify-center text-white shrink-0 shadow-lg shadow-red-500/20">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">8+ Năm Kinh Nghiệm</h3>
                    <p class="text-xs text-gray-500 leading-relaxed">Đội ngũ kỹ thuật viên Khang & Thanhtaj am hiểu từng chi tiết mạch điện {{ $brand->name }}</p>
                </div>
            </div>
            <div class="flex items-start gap-4 p-5 bg-blue-50/50 rounded-2xl border border-blue-100/50">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center text-white shrink-0 shadow-lg shadow-blue-500/20">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">Hệ Sinh Thái Tool Mạnh</h3>
                    <p class="text-xs text-gray-500 leading-relaxed">Sở hữu 20+ tool phần mềm chính hãng, xử lý mọi lỗi phần mềm {{ $brand->name }}</p>
                </div>
            </div>
            <div class="flex items-start gap-4 p-5 bg-green-50/50 rounded-2xl border border-green-100/50">
                <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-green-600 rounded-xl flex items-center justify-center text-white shrink-0 shadow-lg shadow-green-500/20">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">Hỗ Trợ Từ Xa 100%</h3>
                    <p class="text-xs text-gray-500 leading-relaxed">Hỗ trợ xử lý lỗi phần mềm {{ $brand->name }} từ xa qua TeamViewer/UltraViewer</p>
                </div>
            </div>
        </div>
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
