@extends('layouts.app')

@section('breadcrumbs')
    <a href="/" wire:navigate class="hover:text-[#d70018] transition-colors">Trang chủ</a>
    <span class="mx-1.5 text-gray-400">/</span>
    <a href="/blog" wire:navigate class="hover:text-[#d70018] transition-colors">Blog</a>
    <span class="mx-1.5 text-gray-400">/</span>
    <span class="text-gray-800 font-medium">{{ $post->title }}</span>
@endsection

@section('content')
{{-- Reading Progress Bar --}}
<div id="reading-progress" class="reading-progress" style="width: 0%"></div>

<article class="py-10 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            {{-- Category badge --}}
            @if($post->category)
                <div class="mb-4">
                    <span class="inline-flex items-center gap-1.5 bg-red-50 text-[#d70018] px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide">
                        📂 {{ $post->category->name }}
                    </span>
                </div>
            @endif

            <h1 class="text-3xl md:text-4xl font-extrabold mb-5 text-gray-900 leading-tight">{{ $post->title }}</h1>
            
            <div class="flex items-center gap-4 text-sm text-gray-400 mb-8 pb-6 border-b border-gray-100">
                <span class="flex items-center gap-1">📅 {{ $post->published_at?->format('d/m/Y') }}</span>
                <span class="flex items-center gap-1">👁️ {{ number_format($post->views ?? 0) }} lượt xem</span>
            </div>

            @if($post->thumbnail)
                <div class="rounded-2xl overflow-hidden mb-8 shadow-lg">
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full" loading="lazy">
                </div>
            @endif

            <div class="prose prose-lg max-w-none prose-headings:text-gray-900">
                {!! $post->content !!}
            </div>

            {{-- Author Card --}}
            <div class="mt-12 bg-gradient-to-br from-gray-50 to-white rounded-2xl border border-gray-200 p-6 flex items-center gap-5">
                <div class="w-16 h-16 bg-gradient-to-br from-[#d70018] to-red-600 rounded-2xl flex items-center justify-center text-white font-black text-xl shadow-lg shadow-red-500/20 shrink-0">DL</div>
                <div>
                    <p class="font-bold text-gray-900 mb-1">Điện Thoại Laptop VN</p>
                    <p class="text-sm text-gray-500 leading-relaxed">Đội ngũ kỹ thuật viên với hơn 8 năm kinh nghiệm trong lĩnh vực sửa chữa điện thoại, laptop và giải pháp phần mềm GSM.</p>
                    <div class="flex items-center gap-3 mt-2">
                        <a href="tel:0777333763" class="text-xs font-bold text-[#d70018] hover:text-red-700 transition-colors">📞 0777.333.763</a>
                        <a href="https://zalo.me/g/qncjky686" target="_blank" class="text-xs font-bold text-[#d70018] hover:text-red-700 transition-colors">💬 Zalo Group</a>
                    </div>
                </div>
            </div>

            {{-- Tags --}}
            @if($post->tags->count())
                <div class="mt-8 flex flex-wrap gap-2">
                    @foreach($post->tags as $tag)
                        <span class="bg-red-50 text-[#d70018] px-3 py-1.5 rounded-lg text-sm font-semibold border border-red-100 hover:bg-red-100 transition-colors">{{ $tag->name }}</span>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</article>

<script>
    // Reading progress bar
    window.addEventListener('scroll', function() {
        const article = document.querySelector('article');
        if (!article) return;
        const rect = article.getBoundingClientRect();
        const totalHeight = article.offsetHeight - window.innerHeight;
        const progress = Math.min(Math.max((-rect.top / totalHeight) * 100, 0), 100);
        const bar = document.getElementById('reading-progress');
        if (bar) bar.style.width = progress + '%';
    });
</script>
@endsection
