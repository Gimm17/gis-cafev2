<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIS — Meja {{ $table->table_no }}</title>
    @include('partials.brand-head')
</head>
<body class="bg-bone text-ink">

<div class="min-h-screen flex flex-col">

    <!-- Hero -->
    <div class="relative">
        <div class="absolute inset-0">
            <img src="/assets/brand/hero-front.webp" class="w-full h-full object-cover" alt="GIS" loading="lazy">
            <div class="absolute inset-0 bg-gradient-to-b from-black/55 via-black/25 to-bone"></div>
        </div>

        <div class="relative max-w-2xl mx-auto px-4 pt-10 pb-12">
            <div class="flex items-center gap-3">
                <img src="/assets/brand/logo.webp" alt="GIS" class="w-12 h-12 rounded-full ring-1 ring-white/25 shadow-soft">
                <div>
                    <p class="text-white/95 font-semibold">GIS</p>
                    <p class="text-white/80 text-[11px]">GreatPlaceMeetsGreatPeople</p>
                </div>
            </div>

            <div class="mt-8 ui-card p-6">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-sm text-muted">Kamu sedang duduk di</p>
                        <h1 class="mt-1 text-3xl font-display font-semibold tracking-tight">Meja {{ $table->table_no }}</h1>
                        @if($table->name)
                            <p class="mt-1 text-sm text-muted">{{ $table->name }}</p>
                        @endif
                    </div>
                    <span class="ui-chip px-3 py-1 text-[11px] font-bold text-ink">QR Ordering</span>
                </div>

                <p class="mt-4 text-sm text-muted leading-relaxed">
                    Klik tombol di bawah untuk mulai pesan. Semua order akan tercatat otomatis dan kamu bisa pantau statusnya.
                </p>

                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <a href="{{ route('cafe.menu', $table->table_no) }}"
                       class="tap-44 ui-btn px-4 py-3 bg-primary-600 text-white font-semibold shadow-soft2 hover:opacity-95 transition-opacity text-center">
                        Mulai Pesan
                    </a>
	                    <a href="https://wa.me/6282291249169" target="_blank" rel="noopener"
	                       class="tap-44 ui-btn px-4 py-3 border border-line bg-surface text-ink hover:bg-surface2/70 font-semibold text-center">
                        Reservasi &amp; WhatsApp
                    </a>
                </div>

                <div class="mt-4 flex items-center justify-between gap-3 text-[12px] text-muted">
                    <a class="underline underline-offset-4 hover:text-ink" href="https://maps.app.goo.gl/AHpwn3ht44fcpep58" target="_blank" rel="noopener">Buka Lokasi</a>
                    <span class="ui-chip px-3 py-1">Table: {{ $table->table_no }}</span>
                </div>
            </div>

            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-3">
                <div class="ui-card-flat p-4">
                    <p class="text-sm font-semibold">Fast &amp; Simple</p>
                    <p class="mt-1 text-[12px] text-muted">Scan QR → pilih menu → konfirmasi. Beres.</p>
                </div>
                <div class="ui-card-flat p-4">
                    <p class="text-sm font-semibold">Work Friendly</p>
                    <p class="mt-1 text-[12px] text-muted">Nyaman buat kerja, meeting, atau santai.</p>
                </div>
                <div class="ui-card-flat p-4">
                    <p class="text-sm font-semibold">Event Ready</p>
                    <p class="mt-1 text-[12px] text-muted">Custom cup &amp; service untuk event kamu.</p>
                </div>
            </div>

            <div class="mt-6 flex justify-center">
                <img src="/assets/brand/open-hours.webp" alt="Jam Operasional" class="w-full max-w-xl rounded-2xl border border-white/20 shadow-soft" loading="lazy">
            </div>

            <p class="mt-5 text-center text-[11px] text-white/70">
                © {{ date('Y') }} GIS — Work &amp; Coffee Services
            </p>
        </div>
    </div>

</div>

</body>
</html>
