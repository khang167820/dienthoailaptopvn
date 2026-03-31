<div>
    <div x-data="{ show: false }" @open-price-popup.window="show = true" @keydown.escape.window="show = false">
        {{-- Modal Overlay --}}
        <div x-show="show" x-transition.opacity class="fixed inset-0 z-[100] bg-black/60 backdrop-blur-sm flex items-center justify-center p-2 sm:p-4" style="display: none;">
            {{-- Modal Content --}}
            <div x-show="show" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                @click.away="show = false"
                class="bg-white w-full max-w-5xl rounded-2xl shadow-2xl overflow-hidden flex flex-col h-[90vh] sm:h-[85vh]">
                
                {{-- Header --}}
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center justify-between shrink-0">
                    <div>
                        <h3 class="text-xl font-black text-gray-800 tracking-tight uppercase">Tra Cứu Bảng Giá Nhanh</h3>
                        <p class="text-xs text-gray-500 mt-1">Sử dụng ô tìm kiếm và bộ lọc để tra giá chính xác nhất.</p>
                    </div>
                    <button @click="show = false" class="text-gray-400 hover:text-[#d70018] transition-colors p-2 bg-white rounded-full shadow-sm">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                {{-- Search & Filters --}}
                <div class="p-6 shrink-0 bg-white border-b border-gray-50">
                    <div class="flex flex-col md:flex-row gap-3">
                        {{-- Search Input --}}
                        <div class="relative flex-1">
                            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Nhập tên máy hoặc dịch vụ (VD: iPhone 11)..." class="w-full h-11 pl-11 pr-4 text-gray-900 border border-gray-200 rounded-xl focus:border-[#d70018] focus:ring-0 transition-colors shadow-inner text-sm font-medium">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            </div>
                        </div>
                        
                        {{-- Service Type Filter --}}
                        <div class="w-full md:w-64">
                            <select wire:model.live="serviceFilter" class="w-full h-11 text-gray-700 border border-gray-200 rounded-xl focus:border-[#d70018] focus:ring-0 text-sm font-medium bg-gray-50">
                                <option value="">-- Tất cả dịch vụ --</option>
                                @foreach($serviceTypes as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Device Model Filter --}}
                        <div class="w-full md:w-64">
                            <select wire:model.live="deviceFilter" class="w-full h-11 text-gray-700 border border-gray-200 rounded-xl focus:border-[#d70018] focus:ring-0 text-sm font-medium bg-gray-50">
                                <option value="">-- Tất cả dòng máy --</option>
                                @foreach($deviceModels as $model)
                                    <option value="{{ $model->id }}">{{ $model->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Table (Scrollable Area) --}}
                <div class="flex-1 overflow-y-auto px-6 pb-6 pt-4 relative bg-gray-50/30">
                    <div wire:loading.delay class="fixed inset-0 bg-white/50 backdrop-blur-sm z-[105] flex items-center justify-center">
                        <div class="w-8 h-8 rounded-full border-4 border-gray-200 border-t-[#d70018] animate-spin shadow-lg"></div>
                    </div>

                    @if($repairs->isEmpty())
                        <div class="text-center py-12 m-auto bg-white rounded-2xl border border-dashed border-gray-200">
                            <div class="text-4xl mb-3">🔍</div>
                            <h4 class="text-gray-500 font-medium">Không tìm thấy báo giá phù hợp!</h4>
                            <p class="text-sm text-gray-400 mt-1">Vui lòng thay đổi từ khóa hoặc bộ lọc, hoặc gọi báo giá trực tiếp.</p>
                        </div>
                    @else
                        <div class="rounded-xl border border-gray-200 shadow-sm bg-white overflow-hidden">
                            <table class="w-full text-left text-sm text-gray-600">
                                <thead class="bg-red-50 border-b border-red-100">
                                    <tr>
                                        <th class="px-4 py-3.5 font-extrabold text-[#d70018] uppercase tracking-widest text-[11px]">Dịch vụ</th>
                                        <th class="px-4 py-3.5 font-extrabold text-[#d70018] uppercase tracking-widest text-[11px]">Dòng máy</th>
                                        <th class="px-4 py-3.5 font-extrabold text-[#d70018] uppercase tracking-widest text-[11px] text-right">Chi phí ước tính</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($repairs as $repair)
                                        <tr class="hover:bg-red-50/40 transition-colors" wire:key="repair-{{ $repair->id }}">
                                            <td class="px-4 py-4 align-top">
                                                <div class="font-bold text-gray-800">{{ $repair->serviceType->name ?? 'N/A' }}</div>
                                                @if($repair->short_description)
                                                    <div class="text-[10px] text-gray-400/90 mt-1 max-w-xs leading-relaxed" title="{{ $repair->short_description }}">{{ $repair->short_description }}</div>
                                                @endif
                                            </td>
                                            <td class="px-4 py-4 align-top font-semibold text-gray-700">
                                                {{ $repair->deviceModel->name ?? 'N/A' }}
                                            </td>
                                            <td class="px-4 py-4 align-top text-right">
                                                <div class="flex flex-col items-end justify-center">
                                                    <span class="font-black text-[#d70018] text-base">{{ $repair->display_price }}</span>
                                                    @if($repair->sale_price && $repair->price != $repair->sale_price)
                                                        <span class="text-[11px] text-gray-400 line-through mt-0.5">{{ number_format($repair->price, 0, ',', '.') }}đ</span>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- End of list --}}
                        <div class="py-6 flex justify-center items-center text-gray-400 text-[10px] font-semibold uppercase tracking-wider">
                            Đang hiển thị toàn bộ {{ $repairs->count() }} dịch vụ.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
