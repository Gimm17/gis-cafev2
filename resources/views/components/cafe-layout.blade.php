<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'GIS' }}</title>
    @include('partials.brand-head')
</head>
<body class="bg-bone text-ink">

<!-- Topbar -->
<header class="sticky top-0 z-40 bg-bone/85 backdrop-blur border-b border-line">
    <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
        <a href="/" class="flex items-center gap-3 group">
            <img src="/assets/brand/logo.webp" alt="GIS" class="w-10 h-10 rounded-full ring-1 ring-line shadow-soft2" loading="lazy">
            <div class="leading-tight">
                <p class="text-sm font-semibold tracking-tight">GIS</p>
                <p class="text-[11px] text-muted">GreatPlaceMeetsGreatPeople</p>
            </div>
        </a>

        <div class="flex items-center gap-2">
            <a href="https://maps.app.goo.gl/AHpwn3ht44fcpep58" target="_blank" rel="noopener"
	               class="tap-44 px-3 py-2 rounded-xl border border-line bg-surface/70 hover:bg-surface transition-colors text-sm font-semibold text-ink">
                Lokasi
            </a>
            <a href="https://wa.me/6282291249169" target="_blank" rel="noopener"
               class="tap-44 px-3 py-2 rounded-xl bg-primary-600 text-white font-semibold ui-btn shadow-soft2 hover:opacity-95 transition-opacity">
                WhatsApp
            </a>
        </div>
    </div>
</header>

<!-- Content -->
<main class="max-w-6xl mx-auto px-4 py-6">
    {{ $slot }}
</main>

<!-- Bottom nav (mobile) -->
<nav class="md:hidden fixed bottom-0 left-0 right-0 z-40 bg-bone/90 backdrop-blur border-t border-line">
    <div class="max-w-6xl mx-auto px-4 py-2 flex items-center justify-between">
	        <a href="/" class="tap-44 px-3 py-2 rounded-xl border border-line bg-surface/70 hover:bg-surface text-sm font-semibold text-ink">Home</a>
	        <a href="https://maps.app.goo.gl/AHpwn3ht44fcpep58" target="_blank" rel="noopener" class="tap-44 px-3 py-2 rounded-xl border border-line bg-surface/70 hover:bg-surface text-sm font-semibold text-ink">Lokasi</a>
        <a href="https://wa.me/6282291249169" target="_blank" rel="noopener" class="tap-44 px-3 py-2 rounded-xl bg-primary-600 text-white font-semibold ui-btn">WA</a>
    </div>
</nav>

<!-- Spacer for mobile bottom nav -->
<div class="md:hidden h-20"></div>

<script>
  // Global Swal style
  if (window.Swal) {
    const originalFire = Swal.fire;
    Swal.fire = function(options) {
      const merged = Object.assign({
        confirmButtonColor: '#2596BE',
        cancelButtonColor: '#6b7280',
        customClass: {
          popup: 'rounded-2xl',
          confirmButton: 'ui-btn px-5 py-2.5 font-semibold',
          cancelButton: 'ui-btn px-5 py-2.5 font-semibold'
        }
      }, options || {});
      return originalFire.call(this, merged);
    }
  }
</script>

</body>
</html>
