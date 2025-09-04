<?php
$page_title = 'Log In';
$page_background_image = '/images/best_toilet_ever.png';
$body_classes = 'bg-login-image bg-full-screen';
require_once BASE_PATH . '/views/layout.php';
?>
    <?php require_once BASE_PATH . '/views/partial/navbar.php'; ?>

    <div class="flex-grow flex items-center justify-center p-4 sm:p-6 md:p-8">
        <div class="bg-white p-8 rounded-lg shadow-md max-w-md w-full mx-auto sm:p-6 md:p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center md:text-4xl">Log In</h1>

            <?php if (!empty($message)): ?>
                <div class="p-3 mb-4 rounded-md <?php echo $message_type === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?> text-sm md:text-base"><?php echo htmlspecialchars($message); ?></div>
            <?php endif; ?>
            <form action="/user/login" method="POST" class="space-y-4">
                <div>
                    <label for="username_traditional" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input type="text" id="username_traditional" name="username" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm md:text-base">
                </div>
                <div>
                    <label for="password_traditional" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" id="password_traditional" name="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm md:text-base">
                </div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition duration-200 md:text-base">
                    Log In
                </button>
            </form>

            <p class="mt-6 text-center text-sm text-gray-600 md:text-base">Don't have an account? <a href="/user/signup" class="font-medium text-blue-600 hover:text-blue-500">Sign Up</a>
            </p>
        </div>
    </div>
</body>
</html>