<?php
$page_title = 'Add a Review';
$body_classes = 'bg-gray-100';
require_once BASE_PATH . '/views/layout.php';
?>

<div class="min-h-screen flex flex-col w-full">
    <?php require_once BASE_PATH . '/views/partial/navbar.php'; ?>

    <div class="flex-grow flex items-center justify-center p-4 sm:p-6 md:p-8">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-2xl mx-auto sm:p-6 md:p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center md:text-4xl">Add a Review 📝</h1>

            <?php if (!empty($message)): ?>
                <div class="p-3 mb-4 rounded-md <?php echo $message_type === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?> text-sm md:text-base">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>

            <form action="/review/add" method="POST" class="space-y-4">
                <div>
                    <label for="toilet_id" class="block text-sm font-medium text-gray-700 mb-1">Select Toilet</label>
                    <select id="toilet_id" name="toilet_id" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm md:text-base">
                        <option value="">-- Choose a Toilet --</option>
                        <?php foreach ($toilets as $toilet): ?>
                            <option value="<?php echo htmlspecialchars($toilet['id']); ?>">
                                Toilet #<?php echo htmlspecialchars($toilet['id']); ?> (<?php echo htmlspecialchars($toilet['what_three_words'] ?? 'N/A'); ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label for="clean_score" class="block text-sm font-medium text-gray-700 mb-1">Cleanliness Score (1-10)</label>
                    <input type="number" id="clean_score" name="clean_score" min="1" max="10" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm md:text-base">
                </div>

                <div>
                    <label for="busy_score" class="block text-sm font-medium text-gray-700 mb-1">Busyness Score (1-10)</label>
                    <input type="number" id="busy_score" name="busy_score" min="1" max="10" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm md:text-base">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Opening Hours Correct?</label>
                    <select id="opening_hours_correct" name="opening_hours_correct" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm md:text-base">
                        <option value="">Select</option>
                        <option value="true">Yes</option>
                        <option value="false">No</option>
                    </select>
                </div>

                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-200 md:text-base">
                    Submit Review
                </button>
            </form>
        </div>
    </div>
</body>
</html>
