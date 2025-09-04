<?php
$page_title = 'Zainar';
$page_background_image = '/images/best_toilet_ever.png';
$body_classes = 'bg-rainforest-image bg-full-screen';
require_once BASE_PATH . '/views/layout.php';
?>

<?php require_once BASE_PATH . '/views/partial/navbar.php'; ?>

<main id="page-content" class="h-[95vh] overflow-y-auto snap-y snap-mandatory scroll-smooth">
  <!-- HERO: Zainar + Quick Search -->
  <section class="relative  h-[95vh] snap-start flex items-center" data-snap-section>
    <!-- Gradient veil over background for readability -->
    <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-gradient-to-b from-slate-900/70 via-slate-900/30 to-slate-900/10"></div>
    <!-- Decorative blobs -->
    <div aria-hidden="true" class="pointer-events-none absolute -top-20 -left-10 h-72 w-72 rounded-full bg-blue-500/30 blur-3xl"></div>
    <div aria-hidden="true" class="pointer-events-none absolute -bottom-16 -right-10 h-72 w-72 rounded-full bg-emerald-400/30 blur-3xl"></div>

    <div class="relative z-10 w-full">
      <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
          <h1 class="text-5xl sm:text-6xl font-extrabold tracking-tight text-white drop-shadow-md">
            Zainar
          </h1>
          <p class="mt-4 text-lg sm:text-xl text-white/90 leading-relaxed">
            Find clean, accessible public toilets near you — fast. Discover facilities, check amenities, and read trusted community reviews before you go.
          </p>

          <div class="mt-8 flex flex-col sm:flex-row gap-3">
            <button
              id="quickSearchBtn"
              type="button"
              class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-6 py-3 text-white font-semibold shadow-md hover:bg-blue-700 hover:-translate-y-0.5 transition focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-500"
            >
              Quick Search (Use my location)
            </button>
            <a
              href="#search"
              class="inline-flex items-center justify-center rounded-lg border border-white/30 bg-white/20 px-6 py-3 text-white font-semibold backdrop-blur-md hover:bg-white/30 hover:-translate-y-0.5 transition focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-white/70"
            >
              Search Manually
            </a>
          </div>

          <!-- Scroll hint -->
          <div class="mt-14 flex items-center gap-3 text-white/80">
            <span class="text-sm uppercase tracking-wider">Scroll for more</span>
            <svg class="h-5 w-5 animate-bounce" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
              <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 10.2l3.71-2.97a.75.75 0 0 1 .94 1.17l-4.24 3.4a.75.75 0 0 1-.94 0l-4.24-3.4a.75.75 0 0 1 .02-1.19z" clip-rule="evenodd"/>
            </svg>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SEARCH SECTION -->
  <section id="search" class="relative h-[95vh] snap-start py-12 sm:py-16 md:py-20" data-snap-section>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 md:grid-cols-2 md:gap-10 items-stretch">
        <!-- Search Card -->
        <div class="rounded-2xl border border-slate-200/70 bg-white/90 backdrop-blur-md shadow-xl ring-1 ring-black/5">
          <div class="p-6 sm:p-8">
            <h2 class="text-2xl sm:text-3xl font-bold text-slate-900">Search nearby toilets</h2>
            <p class="mt-2 text-slate-600">
              Enter a place, landmark, or What3Words. Filter by accessibility, opening hours, or fees.
            </p>

            <form action="/toilet/find" method="GET" class="mt-5">
              <label for="searchInput" class="sr-only">Search toilets by What3Words or keywords</label>
              <div class="flex flex-col sm:flex-row gap-3">
                <div class="relative flex-1">
                  <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M12.9 14.32a8 8 0 1 1 1.414-1.414l3.387 3.387a1 1 0 0 1-1.414 1.414l-3.387-3.387ZM14 8a6 6 0 1 0-12 0 6 6 0 0 0 12 0Z" clip-rule="evenodd"/>
                    </svg>
                  </span>
                  <input
                    id="searchInput"
                    name="q"
                    type="text"
                    inputmode="search"
                    placeholder="e.g. What3Words, station name, park, postcode"
                    class="w-full rounded-lg border border-slate-300 bg-white px-10 py-3 text-base md:text-lg text-slate-900 shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                  />
                </div>
                <button
                  type="submit"
                  class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-5 py-3 text-white font-semibold shadow-sm hover:bg-blue-700 hover:-translate-y-0.5 transition focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-500"
                >
                  Search
                </button>
              </div>

              <!-- Quick filters -->
              <div class="mt-4 flex flex-wrap gap-2">
                <a href="/toilet/find?q=accessible" class="inline-flex items-center rounded-full border border-slate-300 bg-white px-3 py-1.5 text-sm text-slate-700 hover:border-blue-400 hover:text-blue-700 transition">Accessible</a>
                <a href="/toilet/find?q=baby+change" class="inline-flex items-center rounded-full border border-slate-300 bg-white px-3 py-1.5 text-sm text-slate-700 hover:border-blue-400 hover:text-blue-700 transition">Baby change</a>
                <a href="/toilet/find?q=24h" class="inline-flex items-center rounded-full border border-slate-300 bg-white px-3 py-1.5 text-sm text-slate-700 hover:border-blue-400 hover:text-blue-700 transition">24/7</a>
                <a href="/toilet/find?q=free" class="inline-flex items-center rounded-full border border-slate-300 bg-white px-3 py-1.5 text-sm text-slate-700 hover:border-blue-400 hover:text-blue-700 transition">Free</a>
                <button
                  type="button"
                  id="useLocationBtn"
                  class="inline-flex items-center gap-1.5 rounded-full border border-emerald-300 bg-emerald-50 px-3 py-1.5 text-sm text-emerald-700 hover:bg-emerald-100 transition focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-emerald-400"
                  aria-label="Use my location"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M12 2a1 1 0 0 1 1 1v1.055A8.004 8.004 0 0 1 20.945 11H22a1 1 0 1 1 0 2h-1.055A8.004 8.004 0 0 1 13 19.945V21a1 1 0 1 1-2 0v-1.055A8.004 8.004 0 0 1 3.055 13H2a1 1 0 1 1 0-2h1.055A8.004 8.004 0 0 1 11 3.055V2a1 1 0 0 1 1-1Zm0 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8Z"/>
                  </svg>
                  Use my location
                </button>
              </div>
            </form>
          </div>
        </div>

        <!-- Map-like placeholder -->
        <div class="rounded-2xl border border-slate-200/70 bg-gradient-to-br from-slate-50 to-white shadow-xl ring-1 ring-black/5 overflow-hidden">
          <div class="h-full p-4 sm:p-6 md:p-8">
            <div class="relative h-64 sm:h-72 md:h-full w-full rounded-xl overflow-hidden">
              <!-- Faux map grid -->
              <div class="absolute inset-0 bg-[linear-gradient(to_right,rgba(100,116,139,0.08)_1px,transparent_1px),linear-gradient(to_bottom,rgba(100,116,139,0.08)_1px,transparent_1px)] bg-[size:20px_20px]"></div>
              <div class="absolute inset-0 bg-gradient-to-tr from-blue-50/60 via-emerald-50/50 to-transparent"></div>
              <div class="absolute inset-0 flex items-center justify-center">
                <div class="rounded-full bg-blue-600/90 text-white px-3 py-1 text-sm shadow-md">Your location</div>
              </div>
              <div class="absolute bottom-3 left-3 text-xs text-slate-500 bg-white/80 backdrop-blur px-2 py-1 rounded-md border border-slate-200">Map preview</div>
            </div>
          </div>
        </div>
      </div>
      <p class="mt-4 text-sm text-slate-500">
        Tip: “Quick Search” uses your location one-time to find nearby facilities. You can also search by place or What3Words.
      </p>
    </div>
  </section>

  <!-- FEATURES / INFORMATION -->
  <section id="learn-more" class="relative  h-[95vh] snap-start py-12 sm:py-16 md:py-20 bg-white/70 backdrop-blur" data-snap-section>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
      <div class="max-w-3xl">
        <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900">Built for real-world needs</h2>
        <p class="mt-3 text-slate-600">
          Zainar helps you find the right facility quickly, with details that matter when you’re out and about.
        </p>
      </div>

      <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <!-- Card 1 -->
        <article class="rounded-xl border border-slate-200 bg-white shadow-sm hover:shadow-md transition overflow-hidden">
          <div class="aspect-video bg-slate-100 flex items-center justify-center">
            <svg class="h-10 w-10 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M3 5a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v4H3V5Zm0 6h10v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-8Zm12-6h4a2 2 0 0 1 2 2v12l-4-3-4 3V5a2 2 0 0 1 2-2Z"/></svg>
          </div>
          <div class="p-5">
            <h3 class="font-semibold text-slate-900">Smart search and filters</h3>
            <p class="mt-2 text-sm text-slate-600">Search by place, What3Words, or keywords. Filter by accessibility, baby-change, opening hours, and fees.</p>
          </div>
        </article>

        <!-- Card 2 -->
        <article class="rounded-xl border border-slate-200 bg-white shadow-sm hover:shadow-md transition overflow-hidden">
          <div class="aspect-video bg-slate-100 flex items-center justify-center">
            <svg class="h-10 w-10 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M8 4a2 2 0 0 0-2 2v7H4a2 2 0 1 0 0 4h2v1a2 2 0 1 0 4 0v-1h4v1a2 2 0 1 0 4 0v-1h2a2 2 0 1 0 0-4h-2V6a2 2 0 0 0-2-2H8Z"/></svg>
          </div>
          <div class="p-5">
            <h3 class="font-semibold text-slate-900">Accessibility first</h3>
            <p class="mt-2 text-sm text-slate-600">See step-free access, cubicle sizes, rails, and parent-friendly facilities where available.</p>
          </div>
        </article>

        <!-- Card 3 -->
        <article class="rounded-xl border border-slate-200 bg-white shadow-sm hover:shadow-md transition overflow-hidden">
          <div class="aspect-video bg-slate-100 flex items-center justify-center">
            <svg class="h-10 w-10 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 12a5 5 0 1 0-4.546-2.916L3 16l6.916-4.454A5 5 0 0 0 12 12Zm8-2a2 2 0 1 1-4.001-.001A2 2 0 0 1 20 10Zm-12 8a2 2 0 1 1-4.001-.001A2 2 0 0 1 8 18Zm8 2a2 2 0 1 1-4.001-.001A2 2 0 0 1 16 20Z"/></svg>
          </div>
          <div class="p-5">
            <h3 class="font-semibold text-slate-900">Trusted community reviews</h3>
            <p class="mt-2 text-sm text-slate-600">Real experiences from locals and travelers help you choose quickly and confidently.</p>
          </div>
        </article>

        <!-- Card 4 -->
        <article class="rounded-xl border border-slate-200 bg-white shadow-sm hover:shadow-md transition overflow-hidden sm:col-span-2 lg:col-span-1">
          <div class="aspect-video bg-slate-100 flex items-center justify-center">
            <svg class="h-10 w-10 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M4 5a2 2 0 0 1 2-2h4l2 2h6a2 2 0 0 1 2 2v2H4V5Zm0 6h20v6a2 2 0 0 1-2 2H6l-2-2V11Z"/></svg>
          </div>
          <div class="p-5">
            <h3 class="font-semibold text-slate-900">Up-to-date details</h3>
            <p class="mt-2 text-sm text-slate-600">Opening hours, fees, and reported closures are kept current by the community and our checks.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- JOIN THE COMMUNITY -->
  <section id="join" class="relative h-[95vh] snap-start py-12 sm:py-16 md:py-20" data-snap-section>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-10 md:grid-cols-2 md:items-center">
        <div>
          <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900">Join the Zainar community</h2>
          <p class="mt-3 text-slate-600">
            Create an account to add new locations, contribute reviews, and help keep information accurate for everyone.
          </p>
          <ul class="mt-4 space-y-2 text-slate-700">
            <li class="flex items-start gap-2"><span class="mt-1 h-2.5 w-2.5 rounded-full bg-emerald-500"></span> Earn recognition for helpful contributions.</li>
            <li class="flex items-start gap-2"><span class="mt-1 h-2.5 w-2.5 rounded-full bg-blue-500"></span> Track your submissions and edits.</li>
            <li class="flex items-start gap-2"><span class="mt-1 h-2.5 w-2.5 rounded-full bg-purple-500"></span> Shape a trusted, privacy-friendly resource.</li>
          </ul>

          <div class="mt-6 flex flex-col sm:flex-row gap-3">
            <a href="/user/signup" class="inline-flex items-center justify-center rounded-lg bg-emerald-600 px-6 py-3 text-white font-semibold shadow-sm hover:bg-emerald-700 hover:-translate-y-0.5 transition focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-emerald-500">
              Create account
            </a>
            <a href="/user/login" class="inline-flex items-center justify-center rounded-lg bg-purple-600 px-6 py-3 text-white font-semibold shadow-sm hover:bg-purple-700 hover:-translate-y-0.5 transition focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-purple-500">
              Log in
            </a>
          </div>

          <p class="mt-4 text-sm text-slate-500">No spam. No tracking across the web. Your location is only used to help you search nearby.</p>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
          <div class="aspect-[16/10] bg-[radial-gradient(circle_at_25%_25%,#dbeafe,transparent_40%),radial-gradient(circle_at_75%_25%,#d1fae5,transparent_40%),linear-gradient(135deg,#f8fafc_0%,#ffffff_100%)] relative">
            <div class="absolute inset-0 grid grid-cols-12 grid-rows-6 opacity-20">
              <div class="col-span-6 row-span-3 m-4 rounded-xl bg-slate-400/30"></div>
              <div class="col-span-3 row-span-2 m-4 rounded-xl bg-emerald-400/30"></div>
              <div class="col-span-3 row-span-2 m-4 rounded-xl bg-blue-400/30"></div>
              <div class="col-span-7 row-span-3 m-4 rounded-xl bg-purple-400/20"></div>
            </div>
            <div class="absolute bottom-3 left-3 text-xs text-slate-600 bg-white/80 backdrop-blur px-2 py-1 rounded-md border border-slate-200">Community preview</div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- Geolocation for Quick Search + button in Search section -->
<script>
  (function () {
    const quickBtn = document.getElementById('quickSearchBtn');
    const useBtn = document.getElementById('useLocationBtn');

    function locateAndGo(buttonEl) {
      if (!('geolocation' in navigator)) {
        document.getElementById('search')?.scrollIntoView({ behavior: 'smooth' });
        return;
      }
      if (!buttonEl) return;

      const original = buttonEl.textContent;
      buttonEl.disabled = true;
      buttonEl.textContent = 'Locating...';

      navigator.geolocation.getCurrentPosition(
        (pos) => {
          const { latitude, longitude } = pos.coords;
          const url = new URL('/toilet/find', window.location.origin);
          url.searchParams.set('lat', latitude.toFixed(6));
          url.searchParams.set('lng', longitude.toFixed(6));
          window.location.href = url.toString();
        },
        () => {
          buttonEl.disabled = false;
          buttonEl.textContent = original;
          // Graceful fallback to manual search
          document.getElementById('search')?.scrollIntoView({ behavior: 'smooth' });
          alert('Unable to fetch your location. You can search manually below.');
        },
        { enableHighAccuracy: true, timeout: 8000, maximumAge: 0 }
      );
    }

    quickBtn && quickBtn.addEventListener('click', () => locateAndGo(quickBtn));
    useBtn && useBtn.addEventListener('click', () => locateAndGo(useBtn));
  })();
</script>

</body>
</html>