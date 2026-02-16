<x-admin-layout title="Dashboard">
    {{-- Cafe Open/Close Toggle (compact) --}}
    <div class="mb-4 sm:mb-6">
        <div class="ui-card-flat p-3 sm:p-4 flex items-center justify-between gap-3 sm:gap-4 {{ $cafeIsOpen ? 'border-l-4 border-green-500' : 'border-l-4 border-red-500' }}">
            <div class="flex items-center gap-3 min-w-0">
                <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl {{ $cafeIsOpen ? 'bg-green-50' : 'bg-red-50' }} flex items-center justify-center flex-shrink-0">
                    <span class="text-xl sm:text-2xl">{{ $cafeIsOpen ? '🟢' : '🔴' }}</span>
                </div>
                <div class="min-w-0">
                    <p class="font-extrabold tracking-tight text-ink text-base sm:text-lg truncate">Cafe {{ $cafeIsOpen ? 'BUKA' : 'TUTUP' }}</p>
                    <p class="text-[11px] sm:text-xs text-muted truncate">{{ $cafeIsOpen ? 'Pelanggan bisa memesan saat ini' : 'Semua pesanan diblokir' }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.settings.toggle-cafe') }}" class="flex-shrink-0">
                @csrf
                <button type="submit"
                    class="tap-44 px-4 sm:px-6 py-2.5 sm:py-3 rounded-2xl font-extrabold text-xs sm:text-sm transition-colors {{ $cafeIsOpen ? 'bg-red-600 hover:bg-red-700 text-white' : 'bg-green-600 hover:bg-green-700 text-white' }}"
                    onclick="return confirm('{{ $cafeIsOpen ? 'Tutup cafe sekarang?' : 'Buka cafe sekarang?' }}')">
                    {{ $cafeIsOpen ? '🔒 Tutup' : '🔓 Buka' }}
                </button>
            </form>
        </div>
    </div>

    {{-- Quick Actions (icon grid — mobile next level) --}}
    <div class="mb-4 sm:mb-6">
        <div class="ui-card p-3 sm:p-5">
            <div class="flex items-center justify-between gap-3">
                <div>
                    <p class="text-xs font-extrabold tracking-wide text-muted">QUICK ACTIONS</p>
                    <p class="text-[12px] sm:text-sm text-muted">Akses menu admin paling sering dipakai.</p>
                </div>
                <a href="{{ route('admin.orders') }}" class="tap-44 px-3 sm:px-4 py-2 rounded-2xl border border-line bg-surface2/50 hover:bg-surface2/80 text-xs sm:text-sm font-bold">
                    Cek Orders
                </a>
            </div>

            <div class="mt-3 sm:mt-4 grid grid-cols-4 sm:grid-cols-8 gap-2">
                @php
                    $tiles = [
                        ['label' => 'Orders', 'route' => 'admin.orders', 'badge' => ($pendingOrders ?? 0), 'badgeClass' => 'bg-amber-100 text-amber-800', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                        ['label' => 'Menu', 'route' => 'admin.products', 'badge' => ($totalProducts ?? 0), 'badgeClass' => 'bg-primary-100 text-primary-800', 'icon' => 'M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16 0H4'],
                        ['label' => 'Cat', 'route' => 'admin.categories', 'badge' => null, 'badgeClass' => '', 'icon' => 'M4 6h16M4 12h16M4 18h7'],
                        ['label' => 'QR', 'route' => 'admin.tables', 'badge' => null, 'badgeClass' => '', 'icon' => 'M3 10h18M7 10V7a2 2 0 012-2h6a2 2 0 012 2v3M7 10v9a2 2 0 002 2h6a2 2 0 002-2v-9'],
                        ['label' => 'Mods', 'route' => 'admin.modifiers', 'badge' => null, 'badgeClass' => '', 'icon' => 'M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 0V3m0 11v7m9-10h-5M8 11H3'],
                        ['label' => 'Ban', 'route' => 'admin.banners', 'badge' => null, 'badgeClass' => '', 'icon' => 'M4 4h16v16H4V4zm4 4h8v8H8V8z'],
                        ['label' => 'Rpt', 'route' => 'admin.reports', 'badge' => null, 'badgeClass' => '', 'icon' => 'M9 17v-6m4 6V7m4 10v-4'],
                        ['label' => 'Set', 'route' => 'admin.settings', 'badge' => null, 'badgeClass' => '', 'icon' => 'M12 6a3 3 0 100 6 3 3 0 000-6zm7.4 3a7.4 7.4 0 01-.1 1l2 1.6-2 3.4-2.4-1a7.4 7.4 0 01-1.7 1l-.4 2.6H9.2l-.4-2.6a7.4 7.4 0 01-1.7-1l-2.4 1-2-3.4 2-1.6a7.4 7.4 0 01-.1-1 7.4 7.4 0 01.1-1l-2-1.6 2-3.4 2.4 1a7.4 7.4 0 011.7-1l.4-2.6h5.6l.4 2.6a7.4 7.4 0 011.7 1l2.4-1 2 3.4-2 1.6c.06.33.1.66.1 1z'],
                    ];
                @endphp

                @foreach($tiles as $t)
                    <a href="{{ route($t['route']) }}"
                       class="tap-44 relative rounded-2xl border border-line bg-surface2/35 hover:bg-surface2/70 transition-colors flex flex-col items-center justify-center gap-1 px-2">
                        <svg class="w-5 h-5 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $t['icon'] }}"/></svg>
                        <span class="text-[11px] font-extrabold tracking-tight">{{ $t['label'] }}</span>

                        @if(!is_null($t['badge']))
                            <span class="absolute top-1 right-1 text-[10px] font-extrabold px-2 py-0.5 rounded-full {{ $t['badgeClass'] }}">
                                {{ $t['badge'] }}
                            </span>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- KPI Cards (compact & mobile-first) -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-2 sm:gap-5 mb-5 sm:mb-6">
        <div class="ui-card-flat p-3 sm:p-4">
            <div class="flex items-center justify-between mb-2 sm:mb-3">
                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-2xl bg-primary-50 border border-line flex items-center justify-center">
                    <svg class="w-5 h-5 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <span class="ui-chip px-2.5 py-1 text-[11px] text-muted hidden sm:inline-flex">Hari ini</span>
            </div>
            <p class="text-[11px] text-muted">Penjualan</p>
            <p class="text-base sm:text-2xl font-extrabold tracking-tight text-ink">Rp {{ number_format($todaySales ?? 0, 0, ',', '.') }}</p>
        </div>

        <div class="ui-card-flat p-3 sm:p-4">
            <div class="flex items-center justify-between mb-2 sm:mb-3">
                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-2xl bg-primary-50 border border-line flex items-center justify-center">
                    <svg class="w-5 h-5 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
                <span class="ui-chip px-2.5 py-1 text-[11px] text-muted hidden sm:inline-flex">Hari ini</span>
            </div>
            <p class="text-[11px] text-muted">Pesanan</p>
            <p class="text-base sm:text-2xl font-extrabold tracking-tight text-ink">{{ $todayOrders ?? 0 }}</p>
        </div>

        <div class="ui-card-flat p-3 sm:p-4">
            <div class="flex items-center justify-between mb-2 sm:mb-3">
                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-2xl bg-primary-50 border border-line flex items-center justify-center">
                    <svg class="w-5 h-5 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <span class="ui-chip px-2.5 py-1 text-[11px] text-muted hidden sm:inline-flex">Aktif</span>
            </div>
            <p class="text-[11px] text-muted">Diproses</p>
            <p class="text-base sm:text-2xl font-extrabold tracking-tight text-ink">{{ $pendingOrders ?? 0 }}</p>
        </div>

        <div class="ui-card-flat p-3 sm:p-4">
            <div class="flex items-center justify-between mb-2 sm:mb-3">
                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-2xl bg-primary-50 border border-line flex items-center justify-center">
                    <svg class="w-5 h-5 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
                <span class="ui-chip px-2.5 py-1 text-[11px] text-muted hidden sm:inline-flex">Total</span>
            </div>
            <p class="text-[11px] text-muted">Menu Aktif</p>
            <p class="text-base sm:text-2xl font-extrabold tracking-tight text-ink">{{ $totalProducts ?? 0 }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-5">
        <!-- Recent Orders -->
        <section class="ui-card">
            <div class="p-4 sm:p-5 border-b ui-divider flex items-center justify-between">
                <div>
                    <h3 class="font-extrabold tracking-tight">Pesanan terbaru</h3>
                    <p class="text-[12px] text-muted">Pantau order yang masuk.</p>
                </div>
                <a href="{{ route('admin.orders') }}" class="text-sm font-extrabold text-primary-700 hover:text-primary-800">Lihat semua</a>
            </div>

            <div class="divide-y ui-divider">
                @forelse($recentOrders ?? [] as $order)
                    <div class="p-3 sm:p-4 flex items-center justify-between gap-3 hover:bg-gray-50 transition-colors">
                        <div class="min-w-0">
                            <p class="font-extrabold text-ink truncate text-sm">{{ $order->order_code }}</p>
                            <p class="text-[11px] text-muted mt-0.5 truncate">{{ $order->customer_name }} • Meja {{ $order->table->table_no ?? '-' }}</p>
                        </div>
                        <div class="text-right flex-shrink-0">
                            <p class="font-extrabold text-ink text-sm">Rp {{ number_format($order->grand_total, 0, ',', '.') }}</p>
                            <span class="inline-flex ui-chip px-2.5 py-1 text-[11px] font-extrabold mt-1
                                {{ $order->order_status === 'DITERIMA' ? 'text-primary-800' : '' }}
                                {{ $order->order_status === 'DIPROSES' ? 'text-amber-700' : '' }}
                                {{ $order->order_status === 'READY' ? 'text-green-700' : '' }}
                                {{ $order->order_status === 'SELESAI' ? 'text-gray-700' : '' }}">
                                {{ $order->order_status }}
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-center text-muted">Belum ada pesanan hari ini</div>
                @endforelse
            </div>
        </section>

        <!-- Top Products -->
        <section class="ui-card">
            <div class="p-4 sm:p-5 border-b ui-divider">
                <h3 class="font-extrabold tracking-tight">Produk terlaris</h3>
                <p class="text-[12px] text-muted">Berdasarkan jumlah terjual.</p>
            </div>

            <div class="divide-y ui-divider">
                @forelse($topProducts ?? [] as $product)
                    <div class="p-3 sm:p-4 flex items-center gap-3 sm:gap-4 hover:bg-gray-50 transition-colors">
                        <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-2xl bg-primary-50 border border-line flex items-center justify-center flex-shrink-0 overflow-hidden">
                            @if($product->image_url)
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                            @else
                                <svg class="w-6 h-6 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-extrabold text-ink truncate text-sm">{{ $product->name }}</p>
                            <p class="text-[11px] text-muted mt-0.5">{{ $product->order_count ?? 0 }} terjual</p>
                        </div>
                        <div class="text-right">
                            <p class="font-extrabold text-primary-800 text-sm">{{ $product->price_rupiah }}</p>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-center text-muted">Belum ada data penjualan</div>
                @endforelse
            </div>
        </section>
    </div>
</x-admin-layout>
