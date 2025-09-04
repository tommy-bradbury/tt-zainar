<?php
$page_title = 'Add a Toilet';
$body_classes = 'bg-gray-100';
require_once BASE_PATH . '/views/layout.php';
?>

<div class="min-h-screen flex flex-col w-full">
    <? require_once BASE_PATH . '/views/partial/navbar.php'; ?>
    <div class="flex-grow flex items-center justify-center p-4 sm:p-6 md:p-8">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-2xl mx-auto sm:p-6 md:p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center md:text-4xl">Add a New Toilet 🚽</h1>

            <?php if (!empty($message)): ?>
                <div class="p-3 mb-4 rounded-md <?php echo $message_type === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?> text-sm md:text-base">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>

            <form action="/toilet/add" method="POST" class="space-y-4">
                <div>
                    <label for="what_three_words" class="block text-sm font-medium text-gray-700 mb-1">What3Words Address (Optional)</label>
                    <input type="text" id="what_three_words" name="what_three_words"
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm md:text-base"
                           placeholder="e.g., ///filled.count.down">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Free?</label>
                        <select id="free" name="free" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm md:text-base">
                            <option value="">Select</option>
                            <option value="true">Yes</option>
                            <option value="false">No</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Customers Only?</label>
                        <select id="customers_only" name="customers_only" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm md:text-base">
                            <option value="">Select</option>
                            <option value="true">Yes</option>
                            <option value="false">No</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Disabled Friendly?</label>
                        <select id="disabled_friendly" name="disabled_friendly" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm md:text-base">
                            <option value="">Select</option>
                            <option value="true">Yes</option>
                            <option value="false">No</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="open_time" class="block text-sm font-medium text-gray-700 mb-1">Opening Time (Optional)</label>
                        <input type="time" id="open_time" name="open_time"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm md:text-base">
                    </div>
                    <div>
                        <label for="close_time" class="block text-sm font-medium text-gray-700 mb-1">Closing Time (Optional)</label>
                        <input type="time" id="close_time" name="close_time"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm md:text-base">
                    </div>
                </div>

                <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-200 md:text-base">
                    Add Toilet
                </button>
            </form>
        </div>
    </div>
</body>
</html>