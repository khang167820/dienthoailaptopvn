@extends('layouts.app')

@section('breadcrumbs')
    <a href="/" wire:navigate class="hover:text-[#d70018] transition-colors">Trang chủ</a>
    <span class="mx-1.5 text-gray-400">/</span>
    <span class="text-gray-800 font-medium">{{ $category->name }}</span>
@endsection

@section('content')
{{-- Category Hero --}}
<section class="page-hero py-10 md:py-14">
    <div class="container mx-auto px-4 relative z-10">
        <h1 class="text-3xl md:text-4xl font-black text-white mb-3">{{ $category->name }}</h1>
        <p class="text-gray-300 text-sm md:text-base max-w-lg">{{ $category->description ?: 'Chọn thương hiệu thiết bị bạn cần sửa chữa' }}</p>
    </div>
</section>

<section class="py-10 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5">
            @foreach($brands as $brand)
                <a href="/{{ $category->slug }}/{{ $brand->slug }}" wire:navigate
                   class="group flex flex-col items-center gap-3 p-6 rounded-2xl border-2 border-gray-100 bg-white hover:border-[#d70018] transition-all duration-300 card-hover">
                    @if($brand->logo)
                        <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" class="w-16 h-16 object-contain group-hover:scale-110 transition-transform" loading="lazy">
                    @else
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-red-50 to-pink-50 flex items-center justify-center text-[#d70018] font-bold text-2xl group-hover:from-red-100 group-hover:to-pink-100 transition-colors">
                            {{ substr($brand->name, 0, 1) }}
                        </div>
                    @endif
                    <span class="text-sm font-semibold text-gray-700 group-hover:text-[#d70018] transition-colors">{{ $brand->name }}</span>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
