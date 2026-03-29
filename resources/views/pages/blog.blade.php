@extends('layouts.app')

@section('content')
<section class="py-10">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-8">Blog Thủ Thuật</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <a href="/blog/{{ $post->slug }}" wire:navigate class="group">
                    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300">
                        @if($post->thumbnail)
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        @else
                            <div class="w-full h-52 bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center text-5xl">📱</div>
                        @endif
                        <div class="p-5">
                            <h2 class="font-bold text-lg text-gray-800 group-hover:text-blue-600 transition-colors line-clamp-2 mb-2">{{ $post->title }}</h2>
                            <p class="text-sm text-gray-500 line-clamp-2 mb-3">{{ $post->excerpt }}</p>
                            <div class="flex items-center justify-between text-xs text-gray-400">
                                <span>{{ $post->published_at?->format('d/m/Y') }}</span>
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
