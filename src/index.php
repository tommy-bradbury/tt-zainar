<?php
require_once './functions/common.php';
require_once './functions/auth_functions.php';

$is_logged_in = is_logged_in();
// Start a new session or resume an existing one
session_start();

// For demonstration purposes, you can manually set the session variable.
// In a real application, this would be set after a user successfully logs in.
$_SESSION['loggedIn'] = false; // or false
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restroom Compass - Find Public Toilets</title>
    <!-- Inter font from Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Check for the user's preferred color scheme on page load and set the class on the html element
        if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">

    <!-- Main Container -->
    <div class="min-h-screen flex flex-col">

        <!-- Navigation Bar -->
        <nav class="p-4 md:p-6 bg-white shadow-lg dark:bg-gray-800">
            <div class="container mx-auto flex justify-between items-center">
                <!-- Logo -->
                <a href="#" class="text-2xl font-bold text-sky-600">Restroom Compass</a>

                <!-- Conditional Navigation based on PHP session -->
                <?php if ($_SESSION['loggedIn'] ?? false): ?>
                    <!-- Desktop Navigation Buttons (Logged In) -->
                    <div id="loggedInNav" class="hidden md:flex space-x-4">
                        <a href="#" class="px-4 py-2 rounded-xl text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700 transition duration-300">View All Toilets</a>
                        <a href="#" class="px-4 py-2 rounded-xl text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700 transition duration-300">My Reviews</a>
                        <a href="#" class="px-4 py-2 rounded-xl bg-sky-500 text-white hover:bg-sky-600 transition duration-300">Add a Toilet</a>
                        <a href="#" class="px-4 py-2 rounded-xl bg-green-500 text-white hover:bg-green-600 transition duration-300">Add a Review</a>
                    </div>
                <?php else: ?>
                    <!-- Desktop Navigation Buttons (Logged Out) -->
                    <div id="loggedOutNav" class="hidden md:flex space-x-4">
                        <a href="#" class="px-6 py-2 rounded-xl text-gray-700 border border-gray-300 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-600 dark:hover:bg-gray-700 transition duration-300">Login</a>
                        <a href="#" class="px-6 py-2 rounded-xl bg-sky-500 text-white hover:bg-sky-600 transition duration-300">Sign Up</a>
                    </div>
                <?php endif; ?>

                <!-- Mobile Menu Button -->
                <button id="mobileMenuButton" class="md:hidden text-gray-700 hover:text-gray-900 dark:text-gray-200 dark:hover:text-white transition duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </div>
        </nav>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="md:hidden hidden bg-white dark:bg-gray-800 p-4">
            <?php if ($_SESSION['loggedIn'] ?? false): ?>
                <div id="loggedInMobile" class="flex flex-col space-y-2 mb-4">
                    <a href="#" class="px-4 py-2 rounded-xl text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700 transition duration-300 text-center">View All Toilets</a>
                    <a href="#" class="px-4 py-2 rounded-xl text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700 transition duration-300 text-center">My Reviews</a>
                    <a href="#" class="px-4 py-2 rounded-xl bg-sky-500 text-white hover:bg-sky-600 transition duration-300 text-center">Add a Toilet</a>
                    <a href="#" class="px-4 py-2 rounded-xl bg-green-500 text-white hover:bg-green-600 transition duration-300 text-center">Add a Review</a>
                </div>
            <?php else: ?>
                <div id="loggedOutMobile" class="flex flex-col space-y-2">
                    <a href="#" class="px-6 py-2 rounded-xl text-gray-700 border border-gray-300 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-600 dark:hover:bg-gray-700 transition duration-300 text-center">Login</a>
                    <a href="#" class="px-6 py-2 rounded-xl bg-sky-500 text-white hover:bg-sky-600 transition duration-300 text-center">Sign Up</a>
                </div>
            <?php endif; ?>
        </div>

        <!-- Hero Section -->
        <main class="flex-grow flex items-center justify-center p-6 md:p-12">
            <div class="text-center">
                <h1 class="text-5xl md:text-7xl font-extrabold text-gray-900 leading-tight mb-4 dark:text-white">
                    Find the Perfect <span class="text-sky-600">Restroom</span>
                </h1>
                <p class="text-lg md:text-2xl text-gray-600 mb-8 max-w-2xl mx-auto dark:text-gray-400">
                    Your guide to clean, accessible public restrooms. Find, review, and share locations with a community of users.
                </p>

                <!-- Call to Action Buttons -->
                <div class="flex justify-center space-x-4">
                    <a href="#" id="findToiletsButton" class="px-8 py-3 rounded-xl bg-blue-500 text-white hover:bg-blue-600 text-lg font-semibold transition duration-300">Find Toilets Near Me</a>
                </div>

                <!-- Removed the client-side login toggle for PHP-based logic -->
            </div>
        </main>

        <!-- Footer -->
        <footer class="p-4 md:p-6 bg-white border-t border-gray-200 text-center text-gray-500 text-sm dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
            &copy; 2025 Restroom Compass. All rights reserved.
        </footer>
    </div>

    <script>
        // JavaScript for mobile menu toggle
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
