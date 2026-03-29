@extends('layouts.app')

@section('breadcrumbs')
    <a href="/" wire:navigate class="hover:text-blue-600">Trang chủ</a>
    <span class="mx-2">/</span>
    @if($repair->deviceModel && $repair->deviceModel->brand)
        <a href="/{{ $repair->deviceModel->category->slug ?? 'sua-dien-thoai' }}/{{ $repair->deviceModel->brand->slug }}" wire:navigate class="hover:text-blue-600">{{ $repair->deviceModel->brand->name }}</a>
        <span class="mx-2">/</span>
    @endif
    <span class="text-gray-800 font-medium">{{ $repair->serviceType->name }} {{ $repair->deviceModel->name }}</span>
@endsection

@section('schema')
{!! json_encode($schemaData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
@endsection

@section('content')
<article class="py-10">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Nội dung chính --}}
            <div class="lg:col-span-2">
                <h1 class="text-3xl md:text-4xl font-extrabold mb-4 text-gray-900">
                    {{ $repair->serviceType->name }} {{ $repair->deviceModel->name }}
                </h1>

                {{-- Thẻ giá nổi bật --}}
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-6 mb-8 border border-blue-100">
                    <div class="flex flex-wrap items-center gap-6">
                        <div>
                            <span class="text-sm text-gray-500">Giá dịch vụ</span>
                            <div class="flex items-baseline gap-3">
                                <span class="text-3xl font-extrabold text-red-500">{{ $repair->display_price }}</span>
                                @if($repair->sale_price && $repair->price != $repair->sale_price)
                                    <span class="text-lg text-gray-400 line-through">{{ number_format($repair->price, 0, ',', '.') }}đ</span>
                                    <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold">-{{ $repair->discount_percent }}%</span>
                                @endif
                            </div>
                        </div>
                        <div class="flex gap-4 text-sm text-gray-600">
                            @if($repair->warranty)
                                <span class="flex items-center gap-1">🛡️ BH: {{ $repair->warranty }}</span>
                            @endif
                            @if($repair->repair_time)
                                <span class="flex items-center gap-1">⏱️ {{ $repair->repair_time }}</span>
                            @endif
                        </div>
                        <a href="tel:0xxxxxxxxx" class="ml-auto bg-gradient-to-r from-orange-500 to-red-500 text-white px-8 py-3 rounded-xl font-bold hover:shadow-lg hover:scale-105 transition-all">
                            📞 Gọi báo giá
                        </a>
                    </div>
                </div>

                {{-- Nội dung bài viết SEO --}}
                @if($repair->content)
                    <div class="prose prose-lg max-w-none prose-headings:text-gray-900 prose-a:text-blue-600">
                        {!! $repair->content !!}
                    </div>
                @endif

                {{-- FAQ Section --}}
                @if($repair->faq && count($repair->faq) > 0)
                    <div class="mt-10">
                        <h2 class="text-2xl font-bold mb-6">❓ Câu Hỏi Thường Gặp</h2>
                        <div class="space-y-3">
                            @foreach($repair->faq as $item)
                                <details class="group bg-white border border-gray-200 rounded-xl overflow-hidden">
                                    <summary class="flex items-center justify-between cursor-pointer px-6 py-4 font-semibold text-gray-800 hover:bg-gray-50 transition-colors">
                                        <span>{{ $item['question'] ?? '' }}</span>
                                        <svg class="w-5 h-5 text-gray-400 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                    </summary>
                                    <div class="px-6 pb-4 text-gray-600 leading-relaxed border-t border-gray-100 pt-3">
                                        {{ $item['answer'] ?? '' }}
                                    </div>
                                </details>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <aside class="lg:col-span-1">
                {{-- Liên hệ --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 mb-6 sticky top-24">
                    <h3 class="font-bold text-lg mb-4 text-center">📞 Liên Hệ Ngay</h3>
                    <a href="tel:0xxxxxxxxx" class="block w-full bg-gradient-to-r from-green-500 to-emerald-600 text-white text-center py-4 rounded-xl font-bold text-lg hover:shadow-lg hover:scale-105 transition-all mb-3">
                        Gọi: 0xxx.xxx.xxx
                    </a>
                    <a href="#" class="block w-full bg-blue-500 text-white text-center py-3 rounded-xl font-semibold hover:shadow-lg transition-all mb-3">
                        💬 Chat Zalo
                    </a>
                    <p class="text-center text-sm text-gray-400 mt-3">⏰ Mở cửa: 08:00 - 21:00 (Cả CN)</p>
                </div>

                {{-- Dịch vụ liên quan --}}
                @if($relatedRepairs->count())
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                        <h3 class="font-bold text-lg mb-4">🔧 Dịch vụ khác cho {{ $repair->deviceModel->name }}</h3>
                        <ul class="space-y-3">
                            @foreach($relatedRepairs as $related)
                                <li>
                                    <a href="/{{ $related->slug }}" wire:navigate class="flex items-center justify-between py-2 hover:text-blue-600 transition-colors">
                                        <span class="text-sm font-medium">{{ $related->serviceType->name }}</span>
                                        <span class="text-sm font-bold text-red-500">{{ $related->display_price }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </aside>
        </div>
    </div>
</article>
@endsection
