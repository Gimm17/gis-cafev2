<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

<script>
  // GIS — Premium Clean (logo-driven palette)
  // NOTE: We use CSS vars for "auto" theme (light/dark via prefers-color-scheme).
  tailwind.config = {
    theme: {
      extend: {
        fontFamily: {
          sans: ['Inter', 'sans-serif'],
          display: ['Playfair Display', 'serif'],
        },
        colors: {
          // dynamic colors (light/dark) via CSS vars
          bone: 'rgb(var(--bone-rgb) / <alpha-value>)',
          surface: 'rgb(var(--surface-rgb) / <alpha-value>)',
          surface2: 'rgb(var(--surface2-rgb) / <alpha-value>)',
          ink: 'rgb(var(--ink-rgb) / <alpha-value>)',
          muted: 'rgb(var(--muted-rgb) / <alpha-value>)',
          line: 'rgb(var(--line-rgb) / 0.12)',

          // brand
          primary: {
            50:  '#EFF8FC',
            100: '#D7EFF8',
            200: '#A9DDF0',
            300: '#79C9E7',
            400: '#4FB2D8',
            500: '#2596BE',
            600: '#1E7EA2',
            700: '#186584',
            800: '#134E66',
            900: '#0F3B4D',
          }
        },
        boxShadow: {
          soft: '0 14px 34px rgba(11,16,32,.10)',
          soft2: '0 8px 22px rgba(11,16,32,.08)',
        }
      }
    }
  }
</script>

<style>
  :root{
    /* Light (default) */
    --bone-rgb: 247 242 232; /* #F7F2E8 */
    --surface-rgb: 255 255 255;
    --surface2-rgb: 255 255 255;
    --ink-rgb: 11 16 32;
    --muted-rgb: 90 100 122;
    --line-rgb: 11 16 32;

    --shadow-1: 0 14px 34px rgba(11,16,32,.10);
    --shadow-2: 0 8px 22px rgba(11,16,32,.08);
  }

  @media (prefers-color-scheme: dark){
    :root{
      --bone-rgb: 10 14 22;     /* deep navy */
      --surface-rgb: 16 23 42;  /* #10172A */
      --surface2-rgb: 16 23 42;
      --ink-rgb: 235 241 255;   /* #EBF1FF */
      --muted-rgb: 160 174 196; /* #A0AEC4 */
      --line-rgb: 235 241 255;

      --shadow-1: 0 18px 46px rgba(0,0,0,.42);
      --shadow-2: 0 10px 26px rgba(0,0,0,.34);
    }

    /* a bit softer grain in dark */
    .grain:before{ mix-blend-mode: overlay; opacity: .16; }
  }

  html, body{ font-family: 'Inter', sans-serif; background: rgb(var(--bone-rgb) / 1); color: rgb(var(--ink-rgb) / 1); }

  /* Premium cards */
  .ui-card{ background: rgb(var(--surface-rgb) / 1); border:1px solid rgb(var(--line-rgb) / .12); border-radius:18px; box-shadow: var(--shadow-1); }
  .ui-card-flat{ background: rgb(var(--surface-rgb) / 1); border:1px solid rgb(var(--line-rgb) / .12); border-radius:18px; box-shadow: var(--shadow-2); }
  .ui-chip{ border:1px solid rgb(var(--line-rgb) / .12); background: rgb(var(--surface2-rgb) / .70); border-radius:999px; }
  .ui-focus:focus{ outline:none; box-shadow:0 0 0 3px rgba(37,150,190,.22); border-color:rgba(37,150,190,.55); }
  .ui-btn{ border-radius:14px; }
  .ui-divider{ border-color: rgb(var(--line-rgb) / .12); }

  /* Make tap targets comfortable on mobile */
  .tap-44{ min-height:44px; }

  /* Tailwind CDN doesn't always include line-clamp plugin */
  .line-clamp-1, .line-clamp-2{ display:-webkit-box; -webkit-box-orient:vertical; overflow:hidden; }
  .line-clamp-1{ -webkit-line-clamp:1; }
  .line-clamp-2{ -webkit-line-clamp:2; }

  /* Subtle grain */
  .grain{ position:relative; }
  .grain:before{
    content:"";
    position:absolute;
    inset:0;
    pointer-events:none;
    background-image:url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="180" height="180"><filter id="n"><feTurbulence type="fractalNoise" baseFrequency=".9" numOctaves="2" stitchTiles="stitch"/></filter><rect width="180" height="180" filter="url(%23n)" opacity=".18"/></svg>');
    mix-blend-mode:multiply;
    opacity:.25;
  }

  /* Admin-only compactness + palette normalization */
  .admin-scope .bg-white{ background-color: rgb(var(--surface-rgb) / 1) !important; }
  .admin-scope .bg-gray-50{ background-color: rgb(var(--surface2-rgb) / .75) !important; }
  .admin-scope .border-gray-100,
  .admin-scope .border-gray-200,
  .admin-scope .border-gray-300{ border-color: rgb(var(--line-rgb) / .14) !important; }
  .admin-scope .text-gray-900,
  .admin-scope .text-gray-800{ color: rgb(var(--ink-rgb) / 1) !important; }
  .admin-scope .text-gray-700,
  .admin-scope .text-gray-600,
  .admin-scope .text-gray-500,
  .admin-scope .text-gray-400{ color: rgb(var(--muted-rgb) / 1) !important; }
  .admin-scope .shadow-sm{ box-shadow: var(--shadow-2) !important; }

  /* Mobile density adjustments (admin only) */
  @media (max-width: 640px){
    .admin-scope .p-6{ padding: 1rem !important; }
    .admin-scope .p-5{ padding: .95rem !important; }
    .admin-scope .p-4{ padding: .85rem !important; }
    .admin-scope .gap-6{ gap: 1rem !important; }
    .admin-scope .gap-4{ gap: .75rem !important; }
    .admin-scope .text-2xl{ font-size: 1.25rem !important; }
    .admin-scope .text-xl{ font-size: 1.1rem !important; }
    .admin-scope .text-lg{ font-size: 1rem !important; }
  }
</style>
