<?php
$page_title = 'Sign Up';
$page_background_image = '/images/best_toilet_ever.png';
$body_classes = 'bg-rainforest-image bg-full-screen';
require_once BASE_PATH . '/views/layout.php';
?>
    <?php require_once BASE_PATH . '/views/partial/navbar.php'; ?>
    <div class="flex-grow flex items-center justify-center p-4 sm:p-6 md:p-8">
        <div class="bg-white p-8 rounded-lg shadow-md max-w-md w-full mx-auto sm:p-6 md:p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center md:text-4xl">Sign Up</h1>

            <?php if (!empty($message)): ?>
                <div class="p-3 mb-4 rounded-md <?php echo $message_type === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?> text-sm md:text-base">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>

            <!-- Traditional Signup Form -->
            <h2 class="text-xl font-semibold text-gray-700 mb-4 md:text-2xl">Traditional Sign Up</h2>
            <form action="/user/signup" method="POST" class="space-y-4">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input type="text" id="username" name="username" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm md:text-base">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm md:text-base">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" id="password" name="password" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm md:text-base">
                    <p class="text-xs text-gray-500 mt-1 md:text-sm">Min 8 chars, incl. uppercase, lowercase, number, special char.</p>
                </div>
                <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200 md:text-base">
                    Sign Up
                </button>
            </form>

            <p class="mt-6 text-center text-sm text-gray-600 md:text-base">
                Already have an account? <a href="/user/login" class="font-medium text-blue-600 hover:text-blue-500">Log In</a>
            </p>
        </div>
    </div>
</body>
</html>
