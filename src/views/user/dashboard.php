<?php
$currentTime = new DateTime();
$hour = $currentTime->format('H');
if ($hour >= 5 && $hour < 12) {
    $greeting = "Good morning";
} elseif ($hour >= 12 && $hour < 17) {
    $greeting = "Good afternoon";
} elseif ($hour >= 17 && $hour < 22) {
    $greeting = "Good evening";
} else {
    $greeting = "Good night";
}
$page_title = 'Dashboard';
$page_background_image = '/images/best_toilet_ever.png';
$body_classes = 'bg-rainforest-image bg-full-screen';
require_once BASE_PATH . '/views/layout.php';

?>

    <div class="min-h-screen flex flex-col w-full">
        <?php require_once BASE_PATH . '/views/partial/navbar.php'; ?>

        <div class="flex-grow flex items-center justify-center p-6 sm:p-8 md:p-12 lg:p-16">
            <div class="bg-white p-8 sm:p-10 md:p-12 rounded-xl shadow-2xl text-center w-full max-w-5xl mx-auto border border-gray-200">
                <h1 class="text-4xl font-extrabold text-blue-700 mb-6 md:text-5xl lg:text-6xl tracking-tight">Welcome to your Dashboard!</h1>
                <p class="text-gray-700 mb-2 text-lg md:text-xl">Hello, <span class="font-bold text-purple-600"><?php echo htmlspecialchars($userData['username']); ?></span>!</p>
                <p class="text-gray-600 mb-2 text-base md:text-lg">Your User ID: <span class="font-semibold text-gray-800"><?php echo htmlspecialchars($userData['id']); ?></span></p>
                <p class="text-gray-600 mb-8 text-base md:text-lg">Your Email: <span class="font-semibold text-gray-800"><?php echo htmlspecialchars($userData['email']); ?></span></p>

                <hr class="my-8 border-t-2 border-gray-200">

                <h2 class="text-3xl font-bold text-gray-800 mb-6 md:text-4xl lg:text-5xl">The Noble Quest for the Perfect Loo 👑</h2>
                <p class="text-gray-700 text-lg md:text-xl leading-relaxed mb-4">
                    Welcome, fellow traveler, on the grand and often perilous quest for the perfect public lavatory!
                    Here, in your personal dashboard, begins your journey to catalog, review, and discover
                    the finest porcelain thrones the world has to offer.
                </p>
                <p class="text-gray-700 text-lg md:text-xl leading-relaxed mt-4 mb-4">
                    No longer shall we suffer the indignity of a cold seat, a faulty flush, or the perplexing absence
                    of hot water from the taps. We seek out the sanctuaries where cleanliness is not a forgotten art,
                    and where the cleaners are far from blind to the needs of weary adventurers.
                    Join us in mapping the oases of relief, one review at a time!
                </p>

                <a href="/toilet/find" class="inline-block mt-10 px-8 py-4 bg-blue-600 text-white font-bold text-lg rounded-full shadow-lg hover:bg-blue-700 hover:shadow-xl transform hover:scale-105 transition duration-300 ease-in-out">
                    Start Your Quest Now!
                </a>
            </div>
        </div>
    </div>
</body>
</html>
