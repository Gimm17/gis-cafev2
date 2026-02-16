@props(['title' => 'Admin'])

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin' }} - GIS Admin</title>

    @include('partials.brand-head')

    <style>
        .sidebar-link.active {
            background: rgb(37 150 190 / .12);
            border-color: rgb(37 150 190 / .30);
            color: rgb(37 150 190 / 1);
        }
        .sidebar-link.active svg {
            color: rgb(37 150 190 / 1);
        }
    </style>
</head>
<body class="text-ink min-h-screen admin-scope">

<div class="flex">

    <!-- Sidebar (Desktop) -->
    <aside class="hidden lg:flex w-72 h-screen sticky top-0 bg-surface border-r border-line p-5 flex-col">

        <!-- Logo -->
        <div class="flex items-center gap-3 pb-5 border-b border-line">
            <img src="/assets/brand/logo.webp" alt="GIS" class="w-10 h-10 rounded-xl border border-line bg-surface p-1">
            <div>
                <p class="font-extrabold tracking-tight">GIS Admin</p>
                <p class="text-[11px] text-muted">GreatPlaceMeetsGreatPeople</p>
            </div>
        </div>

        <!-- Nav -->
        <nav class="mt-5 space-y-2 flex-1">

            <a href="{{ route('admin.dashboard') }}" class="sidebar-link tap-44 flex items-center gap-3 px-4 py-3 rounded-2xl border border-transparent hover:border-line hover:bg-surface2/60 transition-all {{ request()->routeIs('admin.dashboard') ? 'active border-line' : '' }}">
                <svg class="w-5 h-5 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span class="font-semibold">Dashboard</span>
            </a>

            <a href="{{ route('admin.orders') }}" class="sidebar-link tap-44 flex items-center gap-3 px-4 py-3 rounded-2xl border border-transparent hover:border-line hover:bg-surface2/60 transition-all {{ request()->routeIs('admin.orders*') ? 'active border-line' : '' }}">
                <svg class="w-5 h-5 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                <span class="font-semibold">Orders</span>
            </a>

            <a href="{{ route('admin.products') }}" class="sidebar-link tap-44 flex items-center gap-3 px-4 py-3 rounded-2xl border border-transparent hover:border-line hover:bg-surface2/60 transition-all {{ request()->routeIs('admin.products*') ? 'active border-line' : '' }}">
                <svg class="w-5 h-5 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16 0H4"/></svg>
                <span class="font-semibold">Products</span>
            </a>

            <a href="{{ route('admin.categories') }}" class="sidebar-link tap-44 flex items-center gap-3 px-4 py-3 rounded-2xl border border-transparent hover:border-line hover:bg-surface2/60 transition-all {{ request()->routeIs('admin.categories*') ? 'active border-line' : '' }}">
                <svg class="w-5 h-5 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>
                <span class="font-semibold">Categories</span>
            </a>

            <a href="{{ route('admin.modifiers') }}" class="sidebar-link tap-44 flex items-center gap-3 px-4 py-3 rounded-2xl border border-transparent hover:border-line hover:bg-surface2/60 transition-all {{ request()->routeIs('admin.modifiers*') ? 'active border-line' : '' }}">
                <svg class="w-5 h-5 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 0V3m0 11v7m9-10h-5M8 11H3"/></svg>
                <span class="font-semibold">Modifiers</span>
            </a>

            <a href="{{ route('admin.tables') }}" class="sidebar-link tap-44 flex items-center gap-3 px-4 py-3 rounded-2xl border border-transparent hover:border-line hover:bg-surface2/60 transition-all {{ request()->routeIs('admin.tables*') ? 'active border-line' : '' }}">
                <svg class="w-5 h-5 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 10V7a2 2 0 012-2h6a2 2 0 012 2v3M7 10v9a2 2 0 002 2h6a2 2 0 002-2v-9"/></svg>
                <span class="font-semibold">Tables & QR</span>
            </a>

            <a href="{{ route('admin.banners') }}" class="sidebar-link tap-44 flex items-center gap-3 px-4 py-3 rounded-2xl border border-transparent hover:border-line hover:bg-surface2/60 transition-all {{ request()->routeIs('admin.banners*') ? 'active border-line' : '' }}">
                <svg class="w-5 h-5 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h16v16H4V4zm4 4h8v8H8V8z"/></svg>
                <span class="font-semibold">Banners</span>
            </a>

            <a href="{{ route('admin.reports') }}" class="sidebar-link tap-44 flex items-center gap-3 px-4 py-3 rounded-2xl border border-transparent hover:border-line hover:bg-surface2/60 transition-all {{ request()->routeIs('admin.reports*') ? 'active border-line' : '' }}">
                <svg class="w-5 h-5 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6m4 6V7m4 10v-4"/></svg>
                <span class="font-semibold">Reports</span>
            </a>

            <a href="{{ route('admin.feedback') }}" class="sidebar-link tap-44 flex items-center gap-3 px-4 py-3 rounded-2xl border border-transparent hover:border-line hover:bg-surface2/60 transition-all {{ request()->routeIs('admin.feedback*') ? 'active border-line' : '' }}">
                <svg class="w-5 h-5 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h6m-6 4h10M5 20l-1 1V5a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6l-1 1z"/></svg>
                <span class="font-semibold">Feedback</span>
            </a>

            <a href="{{ route('admin.settings') }}" class="sidebar-link tap-44 flex items-center gap-3 px-4 py-3 rounded-2xl border border-transparent hover:border-line hover:bg-surface2/60 transition-all {{ request()->routeIs('admin.settings*') ? 'active border-line' : '' }}">
                <svg class="w-5 h-5 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6a3 3 0 100 6 3 3 0 000-6zm7.4 3a7.4 7.4 0 01-.1 1l2 1.6-2 3.4-2.4-1a7.4 7.4 0 01-1.7 1l-.4 2.6H9.2l-.4-2.6a7.4 7.4 0 01-1.7-1l-2.4 1-2-3.4 2-1.6a7.4 7.4 0 01-.1-1 7.4 7.4 0 01.1-1l-2-1.6 2-3.4 2.4 1a7.4 7.4 0 011.7-1l.4-2.6h5.6l.4 2.6a7.4 7.4 0 011.7 1l2.4-1 2 3.4-2 1.6c.06.33.1.66.1 1z"/></svg>
                <span class="font-semibold">Settings</span>
            </a>

        </nav>

        <!-- Bottom -->
        <div class="pt-4 border-t border-line">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full tap-44 px-4 py-3 rounded-2xl bg-surface border border-line text-red-600 font-bold hover:bg-red-50/60 transition-colors">
                    Logout
                </button>
            </form>
        </div>

    </aside>

    <!-- Main Content -->
    <main class="flex-1">

        <!-- Top Header -->
        <header class="sticky top-0 z-40 bg-bone/80 backdrop-blur-md border-b border-line">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 py-3 flex items-center justify-between">

                <!-- Mobile menu button -->
                <button class="lg:hidden tap-44 px-3 rounded-2xl border border-line bg-surface/70 hover:bg-surface transition-colors" onclick="document.getElementById('mobileMenu').classList.remove('hidden')">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>

                <div>
                    <p class="text-sm text-muted">{{ $title }}</p>
                    <p class="font-extrabold tracking-tight">GIS Work & Coffee</p>
                </div>

                <a href="/" class="tap-44 px-4 py-2 rounded-2xl border border-line bg-surface/70 hover:bg-surface transition-colors text-sm font-semibold">Lihat Website</a>
            </div>
        </header>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-6">
            @if(session('success'))
                <div class="ui-card p-4 mb-6 border border-green-200 bg-green-50/60 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="ui-card p-4 mb-6 border border-red-200 bg-red-50/60 text-red-800">
                    {{ session('error') }}
                </div>
            @endif

            {{ $slot }}
        </div>

    </main>

</div>

<!-- Mobile Menu Overlay -->
<div id="mobileMenu" class="hidden fixed inset-0 z-50">
    <div class="absolute inset-0 bg-black/40" onclick="document.getElementById('mobileMenu').classList.add('hidden')"></div>

    <aside class="absolute left-0 top-0 h-full w-[86vw] max-w-sm bg-surface border-r border-line p-4 overflow-y-auto">

        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="/assets/brand/logo.webp" alt="GIS" class="w-10 h-10 rounded-xl border border-line bg-surface p-1">
                <div>
                    <p class="font-extrabold tracking-tight">GIS Admin</p>
                    <p class="text-[11px] text-muted">GreatPlaceMeetsGreatPeople</p>
                </div>
            </div>
            <button class="tap-44 px-3 rounded-2xl border border-line bg-surface2/50" onclick="document.getElementById('mobileMenu').classList.add('hidden')">
                ✕
            </button>
        </div>

        <!-- Quick Icon Grid (Mobile) -->
        <div class="mt-4 ui-card p-3">
            <div class="flex items-center justify-between">
                <p class="text-xs font-bold tracking-wide text-muted">QUICK NAV</p>
                <a href="/" class="text-xs font-semibold text-primary-700">Website</a>
            </div>

            <div class="mt-3 grid grid-cols-4 gap-2">
                @php
                    $quick = [
                        ['label' => 'Home', 'route' => 'admin.dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                        ['label' => 'Orders', 'route' => 'admin.orders', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                        ['label' => 'Menu', 'route' => 'admin.products', 'icon' => 'M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16 0H4'],
                        ['label' => 'QR', 'route' => 'admin.tables', 'icon' => 'M3 10h18M7 10V7a2 2 0 012-2h6a2 2 0 012 2v3M7 10v9a2 2 0 002 2h6a2 2 0 002-2v-9'],
                        ['label' => 'Cat', 'route' => 'admin.categories', 'icon' => 'M4 6h16M4 12h16M4 18h7'],
                        ['label' => 'Mods', 'route' => 'admin.modifiers', 'icon' => 'M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 0V3m0 11v7m9-10h-5M8 11H3'],
                        ['label' => 'Rpt', 'route' => 'admin.reports', 'icon' => 'M9 17v-6m4 6V7m4 10v-4'],
                        ['label' => 'Set', 'route' => 'admin.settings', 'icon' => 'M12 6a3 3 0 100 6 3 3 0 000-6zm7.4 3a7.4 7.4 0 01-.1 1l2 1.6-2 3.4-2.4-1a7.4 7.4 0 01-1.7 1l-.4 2.6H9.2l-.4-2.6a7.4 7.4 0 01-1.7-1l-2.4 1-2-3.4 2-1.6a7.4 7.4 0 01-.1-1 7.4 7.4 0 01.1-1l-2-1.6 2-3.4 2.4 1a7.4 7.4 0 011.7-1l.4-2.6h5.6l.4 2.6a7.4 7.4 0 011.7 1l2.4-1 2 3.4-2 1.6c.06.33.1.66.1 1z'],
                    ];
                @endphp

                @foreach($quick as $q)
                    <a href="{{ route($q['route']) }}"
                       class="tap-44 rounded-2xl border border-line bg-surface2/40 hover:bg-surface2/70 transition-colors flex flex-col items-center justify-center gap-1 text-[11px] font-semibold">
                        <svg class="w-5 h-5 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $q['icon'] }}"/></svg>
                        <span>{{ $q['label'] }}</span>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Full Menu (Compact List) -->
        <details class="mt-3 ui-card p-3">
            <summary class="tap-44 cursor-pointer list-none flex items-center justify-between rounded-2xl px-3 py-2 bg-surface2/40 border border-line">
                <span class="text-sm font-bold">Semua Menu</span>
                <span class="text-xs text-muted">tap</span>
            </summary>

            <nav class="mt-3 space-y-1">
                @php
                    $menuItems = [
                        ['route' => 'admin.dashboard', 'label' => 'Dashboard'],
                        ['route' => 'admin.orders', 'label' => 'Orders'],
                        ['route' => 'admin.products', 'label' => 'Products'],
                        ['route' => 'admin.categories', 'label' => 'Categories'],
                        ['route' => 'admin.modifiers', 'label' => 'Modifiers'],
                        ['route' => 'admin.tables', 'label' => 'Tables & QR'],
                        ['route' => 'admin.banners', 'label' => 'Banners'],
                        ['route' => 'admin.reports', 'label' => 'Reports'],
                        ['route' => 'admin.feedback', 'label' => 'Feedback'],
                        ['route' => 'admin.settings', 'label' => 'Settings'],
                    ];
                @endphp

                @foreach($menuItems as $m)
                    <a href="{{ route($m['route']) }}"
                       class="tap-44 flex items-center justify-between px-4 py-3 rounded-2xl border border-transparent hover:border-line hover:bg-surface2/60 transition-all {{ request()->routeIs($m['route'].'*') ? 'active border-line sidebar-link' : '' }}">
                        <span class="font-semibold">{{ $m['label'] }}</span>
                        <span class="text-muted">›</span>
                    </a>
                @endforeach
            </nav>
        </details>

        <div class="mt-4">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full tap-44 px-4 py-3 rounded-2xl bg-surface border border-line text-red-600 font-bold hover:bg-red-50/60 transition-colors">
                    Logout
                </button>
            </form>
        </div>

    </aside>
</div>

</body>
</html>
