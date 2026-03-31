<div>
    <div x-data="{ show: false }" @open-price-popup.window="show = true" @keydown.escape.window="show = false">
        {{-- Modal Overlay --}}
        <div x-show="show" x-transition.opacity class="fixed inset-0 z-[100] bg-black/60 backdrop-blur-sm flex items-center justify-center p-4" style="display: none;">
            {{-- Modal Content --}}
            <div x-show="show" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                @click.away="show = false"
                class="bg-white w-full max-w-5xl rounded-2xl shadow-2xl overflow-hidden flex flex-col h-[85vh]">
                
                {{-- Header --}}
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center justify-between shrink-0">
                    <div>
                        <h3 class="text-xl font-black text-gray-800 tracking-tight uppercase">Tra Cứu Bảng Giá Nhanh</h3>
                        <p class="text-xs text-gray-500 mt-1">Gõ tên dòng máy (ví dụ: iPhone 15 Pro) hoặc tên dịch vụ (ví dụ: Thay màn hình).</p>
                    </div>
                    <button @click="show = false" class="text-gray-400 hover:text-[#d70018] transition-colors p-2 bg-white rounded-full shadow-sm">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                {{-- Search Bar --}}
                <div class="p-6 shrink-0 bg-white">
                    <div class="relative">
                        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Nhập để tìm kiếm..." class="w-full h-12 pl-12 pr-4 text-gray-900 border-2 border-gray-200 rounded-xl focus:border-[#d70018] focus:ring-0 transition-colors shadow-inner text-sm font-medium">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </div>
                    </div>
                </div>

                {{-- Table Wrapper (Scrollable) --}}
                <div class="flex-1 px-6 pb-6 relative flex flex-col min-h-0">
                    <div wire:loading.delay class="absolute inset-0 bg-white/50 backdrop-blur-sm z-10 flex items-center justify-center">
                        <div class="w-8 h-8 rounded-full border-4 border-gray-200 border-t-[#d70018] animate-spin"></div>
                    </div>

                    @if($repairs->isEmpty())
                        <div class="text-center py-12 m-auto">
                            <div class="text-4xl mb-3">🔍</div>
                            <h4 class="text-gray-500 font-medium">Không tìm thấy dịch vụ nào phù hợp!</h4>
                            <p class="text-sm text-gray-400 mt-1">Hãy thử gõ lại tên máy (VD: iPhone 11) hoặc liên hệ Hotline: 0777.333.763</p>
                        </div>
                    @else
                        <div class="overflow-y-auto flex-1 rounded-xl border border-gray-100 shadow-sm relative">
                            <table class="w-full text-left text-sm text-gray-600 relative">
                                <thead class="bg-red-50 sticky top-0 z-[5] shadow-sm">
                                    <tr>
                                        <th class="px-4 py-3 font-extrabold text-[#d70018] uppercase tracking-widest text-xs">Dịch vụ</th>
                                        <th class="px-4 py-3 font-extrabold text-[#d70018] uppercase tracking-widest text-xs">Dòng máy</th>
                                        <th class="px-4 py-3 font-extrabold text-[#d70018] uppercase tracking-widest text-xs text-right">Giá sửa</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 bg-white">
                                    @foreach($repairs as $repair)
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            <td class="px-4 py-4">
                                                <div class="font-bold text-gray-800">{{ $repair->serviceType->name ?? 'N/A' }}</div>
                                                @if($repair->short_description)
                                                    <div class="text-[10px] text-gray-400 mt-0.5 max-w-xs truncate" title="{{ $repair->short_description }}">{{ $repair->short_description }}</div>
                                                @endif
                                            </td>
                                            <td class="px-4 py-4 font-semibold text-gray-700">
                                                {{ $repair->deviceModel->name ?? 'N/A' }}
                                            </td>
                                            <td class="px-4 py-4 text-right">
                                                <div class="flex flex-col items-end gap-0.5">
                                                    <span class="font-black text-[#d70018] text-base">{{ $repair->display_price }}</span>
                                                    @if($repair->sale_price && $repair->price != $repair->sale_price)
                                                        <span class="text-xs text-gray-400 line-through">{{ number_format($repair->price, 0, ',', '.') }}đ</span>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

                {{-- Pagination Footer --}}
                @if($repairs->hasPages())
                    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50 flex-shrink-0">
                        {{ $repairs->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
