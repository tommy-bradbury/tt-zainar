<!-- BASE_PATH . '/views/partial/navbar.php' -->

<nav class="sticky top-0 h-[5vh] bg-gray-800 shadow-md w-full z-50">
  <div class="mx-auto max-w-7xl h-full px-4 sm:px-6 lg:px-8">
    <div class="h-full flex items-center justify-between gap-3">
      <!-- Brand -->
      <a href="/" class="inline-flex items-center h-full text-white text-2xl font-bold rounded-md px-3 hover:bg-gray-700/60 transition">
        Zainar
      </a>

      <!-- Mobile menu button -->
      <div class="md:hidden">
        <button id="mobile-menu-button" class="inline-flex items-center justify-center h-10 w-10 text-gray-300 hover:text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-white/70 rounded-md">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
          <span class="sr-only">Open menu</span>
        </button>
      </div>

      <!-- Links: desktop inline, mobile overlay panel (hidden by default) -->
      <div
        id="navbar-links"
        class="hidden md:flex md:items-center md:space-x-6 md:static md:bg-transparent md:border-0 md:p-0
               fixed top-[5vh] left-0 right-0 z-40 bg-gray-800/95 backdrop-blur border-b border-gray-700 p-3"
      >
        <?php if(is_logged_in()): ?>
          <!-- Toilet dropdown -->
          <div class="relative group w-full md:w-auto">
            <button id="toilet-menu-button" class="text-gray-300 hover:text-white px-3 py-2 rounded-md font-medium flex items-center transition w-full md:w-auto justify-start">
              Toilet
              <svg id="toilet-menu-arrow" class="ml-2 h-4 w-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </button>
            <!-- Desktop hover dropdown; mobile toggled by JS -->
            <div id="toilet-submenu" class="hidden md:absolute md:top-full md:left-0 bg-gray-700 text-white rounded-md shadow-lg py-2 z-10 min-w-[180px] w-full md:w-auto">
              <a href="/toilet/find" class="block px-4 py-2 hover:bg-gray-600 transition text-left">Find a Toilet</a>
              <a href="/toilet/add" class="block px-4 py-2 hover:bg-gray-600 transition text-left">Add a Toilet</a>
              <a href="/review/add" class="block px-4 py-2 hover:bg-gray-600 transition text-left">Review a Toilet</a>
              <a href="/toilet/my-added-toilets" class="block px-4 py-2 hover:bg-gray-600 transition text-left">My Added Toilets</a>
            </div>
          </div>

          <a href="/my-reviews" class="text-gray-300 hover:text-white px-3 py-2 rounded-md font-medium transition w-full md:w-auto text-left">My Reviews</a>
          <a href="/review/review-new" class="text-gray-300 hover:text-white px-3 py-2 rounded-md font-medium transition w-full md:w-auto text-left">Add New Review</a>

          <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-4 md:ml-auto w-full md:w-auto justify-start">
            <a href="/user/account" class="bg-red-600 text-white px-4 py-2 rounded-md font-medium hover:bg-red-700 transition w-full text-left md:w-auto">My Account</a>
            <a href="/user/logout" class="bg-red-600 text-white px-4 py-2 rounded-md font-medium hover:bg-red-700 transition w-full text-left md:w-auto">Logout</a>
          </div>
        <?php else: ?>
          <a href="/toilet/find" class="text-gray-300 hover:text-white px-3 py-2 rounded-md font-medium transition w-full md:w-auto text-left">Find a Toilet</a>

          <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-4 md:ml-auto w-full md:w-auto justify-start">
            <a href="/user/login" class="bg-red-600 text-white px-4 py-2 rounded-md font-medium hover:bg-red-700 transition w-full text-left md:w-auto">Log in</a>
            <a href="/user/signup" class="bg-red-600 text-white px-4 py-2 rounded-md font-medium hover:bg-red-700 transition w-full text-left md:w-auto">Sign up</a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>