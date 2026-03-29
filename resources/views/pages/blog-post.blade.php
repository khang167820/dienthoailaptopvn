@extends('layouts.app')

@section('breadcrumbs')
    <a href="/" wire:navigate class="hover:text-blue-600">Trang chủ</a>
    <span class="mx-2">/</span>
    <a href="/blog" wire:navigate class="hover:text-blue-600">Blog</a>
    <span class="mx-2">/</span>
    <span class="text-gray-800 font-medium">{{ $post->title }}</span>
@endsection

@section('content')
<article class="py-10">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-3xl md:text-4xl font-extrabold mb-4">{{ $post->title }}</h1>
            <div class="flex items-center gap-4 text-sm text-gray-400 mb-8">
                <span>📅 {{ $post->published_at?->format('d/m/Y') }}</span>
                <span>👁️ {{ number_format($post->views ?? 0) }} lượt xem</span>
                @if($post->category)
                    <span>📂 {{ $post->category->name }}</span>
                @endif
            </div>

            @if($post->thumbnail)
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full rounded-2xl mb-8 shadow-sm" loading="lazy">
            @endif

            <div class="prose prose-lg max-w-none prose-headings:text-gray-900 prose-a:text-blue-600 prose-img:rounded-xl">
                {!! $post->content !!}
            </div>

            {{-- Tags --}}
            @if($post->tags->count())
                <div class="mt-8 flex flex-wrap gap-2">
                    @foreach($post->tags as $tag)
                        <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-sm font-medium">{{ $tag->name }}</span>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</article>
@endsection
