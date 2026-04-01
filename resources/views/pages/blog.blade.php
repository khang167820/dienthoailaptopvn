@extends('layouts.app')

@section('content')
{{-- Blog Hero --}}
<section class="page-hero py-12 md:py-16">
    <div class="container mx-auto px-4 relative z-10 text-center">
        <div class="inline-flex items-center gap-2 bg-white/10 text-white px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wide mb-4 backdrop-blur-sm border border-white/10">
            <span class="text-sm">💡</span> Kiến thức & Thủ thuật
        </div>
        <h1 class="text-3xl md:text-4xl font-black text-white mb-3">Blog Thủ Thuật</h1>
        <p class="text-gray-300 text-sm md:text-base max-w-lg mx-auto">Chia sẻ kiến thức sửa chữa, test point, unlock và các giải pháp kỹ thuật dành cho cộng đồng thợ</p>
    </div>
</section>

<section class="py-10 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <a href="/blog/{{ $post->slug }}" wire:navigate class="group">
                    <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden transition-all duration-300 hover:border-[#d70018]/30 card-hover h-full flex flex-col">
                        @if($post->thumbnail)
                            <div class="overflow-hidden">
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                            </div>
                        @else
                            <div class="w-full h-52 bg-gradient-to-br from-red-50 to-gray-100 flex items-center justify-center text-5xl">📱</div>
                        @endif
                        <div class="p-5 flex-1 flex flex-col">
                            <h2 class="font-bold text-lg text-gray-900 group-hover:text-[#d70018] transition-colors line-clamp-2 mb-2">{{ $post->title }}</h2>
                            <p class="text-sm text-gray-500 line-clamp-2 mb-3">{{ $post->excerpt }}</p>
                            <div class="flex items-center justify-between text-xs text-gray-400 mt-auto pt-3 border-t border-gray-100">
                                <span>📅 {{ $post->published_at?->format('d/m/Y') }}</span>
                                <span>👁️ {{ number_format($post->views ?? 0) }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $posts->links() }}
        </div>
    </div>
</section>
@endsection
