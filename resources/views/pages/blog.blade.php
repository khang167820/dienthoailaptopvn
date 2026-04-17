@extends('layouts.app')

@section('breadcrumbs')
    <a href="/" wire:navigate class="hover:text-[#d70018] transition-colors">Trang chủ</a>
    <span class="mx-1.5 text-gray-400">/</span>
    <span class="text-gray-800 font-medium">Thủ Thuật & Tin Tức</span>
@endsection

@section('content')

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  BLOG HERO — Cinematic Banner                          ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<section class="relative overflow-hidden min-h-[300px] md:min-h-[360px] flex items-center">
    {{-- Background Image --}}
    <div class="absolute inset-0">
        <img src="/images/category_tips_tricks.png" alt="Blog Thủ Thuật" class="w-full h-full object-cover" loading="eager">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0a0a1a]/95 via-[#1a1a2e]/80 to-[#0a0a1a]/50"></div>
    </div>

    {{-- Particle dots --}}
    <div class="particle-field">
        <span style="top:20%;left:15%;animation-duration:7s"></span>
        <span style="top:50%;left:40%;animation-duration:9s;animation-delay:1s"></span>
        <span style="top:70%;left:70%;animation-duration:6s;animation-delay:0.5s"></span>
        <span style="top:30%;left:85%;animation-duration:11s;animation-delay:2s"></span>
    </div>

    {{-- Decorative glow --}}
    <div class="absolute top-0 right-0 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10 py-12 md:py-16">
        <div class="max-w-2xl mx-auto text-center">
            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-full text-xs font-bold uppercase tracking-widest mb-5 border border-white/15">
                <span class="text-lg">💡</span>
                Kiến thức & Thủ thuật
            </div>

            {{-- Title --}}
            <h1 class="text-3xl md:text-5xl font-black text-white mb-4 leading-tight drop-shadow-lg">
                Blog Thủ Thuật
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-purple-300 via-blue-400 to-cyan-400 mt-1 text-2xl md:text-3xl">Chia Sẻ Từ Chuyên Gia Kỹ Thuật</span>
            </h1>

            {{-- Description --}}
            <p class="text-white/80 text-sm md:text-base leading-relaxed max-w-lg mx-auto">
                Chia sẻ kiến thức sửa chữa, test point, unlock và các giải pháp kỹ thuật dành cho cộng đồng thợ & người dùng
            </p>

            {{-- Stats --}}
            <div class="flex justify-center gap-6 mt-8">
                <div class="text-center">
                    <span class="block text-2xl font-black text-yellow-400">{{ $posts->total() }}+</span>
                    <span class="text-[11px] text-white/60 font-medium">Bài viết</span>
                </div>
                <div class="w-px bg-white/15"></div>
                <div class="text-center">
                    <span class="block text-2xl font-black text-yellow-400">Free</span>
                    <span class="text-[11px] text-white/60 font-medium">Miễn phí</span>
                </div>
                <div class="w-px bg-white/15"></div>
                <div class="text-center">
                    <span class="block text-2xl font-black text-yellow-400">24/7</span>
                    <span class="text-[11px] text-white/60 font-medium">Cập nhật</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ╔═══════════════════════════════════════════════════════╗
    ║  BLOG GRID — Magazine Layout                           ║
    ╚═══════════════════════════════════════════════════════╝ --}}
<section class="py-12 md:py-16 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
    <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-purple-50/30 rounded-full blur-3xl pointer-events-none -translate-y-1/2"></div>

    <div class="container mx-auto px-4 relative z-10">
        {{-- Section Header --}}
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10 reveal">
            <div>
                <div class="inline-flex items-center gap-2 bg-blue-50 text-blue-600 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest mb-3">
                    <span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>
                    Bài viết mới nhất
                </div>
                <h2 class="text-xl md:text-2xl font-black text-gray-900 uppercase tracking-tight">Tất Cả Bài Viết</h2>
            </div>
            <p class="text-gray-500 text-sm">Trang {{ $posts->currentPage() }}/{{ $posts->lastPage() }}</p>
        </div>

        {{-- Posts Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 stagger-children reveal">
            @foreach($posts as $post)
                <a href="/blog/{{ $post->slug }}" wire:navigate class="group" id="post-{{ $post->slug }}">
                    <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden transition-all duration-400 hover:border-[#d70018]/30 card-premium h-full flex flex-col">
                        {{-- Thumbnail --}}
                        <div class="overflow-hidden relative">
                            @if($post->thumbnail)
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-52 object-cover group-hover:scale-110 transition-transform duration-700" loading="lazy">
                            @else
                                <div class="w-full h-52 bg-gradient-to-br from-[#1a1a2e] to-[#0f3460] flex items-center justify-center text-5xl relative overflow-hidden">
                                    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width=%2260%22%20height=%2260%22%20xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cpath%20d=%22M30%200L60%2030L30%2060L0%2030Z%22%20fill=%22none%22%20stroke=%22rgba(255,255,255,0.04)%22%20stroke-width=%221%22/%3E%3C/svg%3E')]"></div>
                                    📱
                                </div>
                            @endif

                            {{-- Category Badge --}}
                            @if($post->category)
                                <div class="absolute top-3 left-3">
                                    <span class="bg-[#d70018] text-white text-[10px] font-bold px-3 py-1.5 rounded-lg shadow-lg shadow-red-500/25">{{ $post->category->name ?? 'Thủ thuật' }}</span>
                                </div>
                            @endif

                            {{-- Gradient overlay --}}
                            <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-white to-transparent pointer-events-none"></div>
                        </div>

                        {{-- Content --}}
                        <div class="p-5 flex-1 flex flex-col">
                            <h2 class="font-bold text-base md:text-lg text-gray-900 group-hover:text-[#d70018] transition-colors line-clamp-2 mb-2.5">{{ $post->title }}</h2>
                            <p class="text-sm text-gray-500 line-clamp-2 mb-4 leading-relaxed">{{ $post->excerpt }}</p>

                            {{-- Footer --}}
                            <div class="flex items-center justify-between text-xs text-gray-400 mt-auto pt-3 border-t border-gray-100">
                                <div class="flex items-center gap-3">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        {{ $post->published_at?->format('d/m/Y') }}
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        {{ number_format($post->views ?? 0) }}
                                    </span>
                                </div>
                                <span class="flex items-center gap-1 text-[#d70018] font-bold group-hover:gap-2 transition-all">
                                    Đọc thêm
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-12">
            {{ $posts->links() }}
        </div>

        {{-- Empty State --}}
        @if($posts->isEmpty())
            <div class="text-center py-16">
                <div class="text-6xl mb-4">📝</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Chưa có bài viết</h3>
                <p class="text-gray-500 text-sm">Chúng tôi đang chuẩn bị nội dung chất lượng. Hãy quay lại sau!</p>
            </div>
        @endif
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
