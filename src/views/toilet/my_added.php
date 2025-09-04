<?php
$page_title = 'My Added Toilets';
$body_classes = 'bg-gray-100';
require_once BASE_PATH . '/views/layout.php';
?>

<div class="min-h-screen flex flex-col w-full">
    <? require_once BASE_PATH . '/views/partial/navbar.php'; ?>
    <div class="flex-grow flex items-center justify-center p-4 sm:p-6 md:p-8">
        <div class="bg-white p-8 rounded-lg shadow-md text-center w-full max-w-4xl mx-auto sm:p-6 md:p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 md:text-4xl">My Added Toilets 📜</h1>

            <?php if (empty($my_toilets)): ?>
                <p class="text-gray-600 text-base md:text-lg">You haven't added any toilets yet. Why not <a href="/toilet/add" class="text-blue-600 hover:underline">add one now</a>?</p>
            <?php else: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 text-left mt-8">
                    <?php foreach ($my_toilets as $toilet): ?>
                        <div class="bg-indigo-50 p-6 rounded-lg shadow-sm border border-indigo-200 text-sm md:text-base">
                            <h3 class="text-xl font-semibold text-indigo-800 mb-2 md:text-2xl">Toilet #<?php echo htmlspecialchars($toilet['id']); ?></h3>
                            <?php if ($toilet['what_three_words']): ?>
                                <p class="text-gray-700 mb-1"><strong>What3Words:</strong> <?php echo htmlspecialchars($toilet['what_three_words']); ?></p>
                            <?php endif; ?>
                            <p class="text-gray-700 mb-1"><strong>Free:</strong> <?php echo htmlspecialchars(ucfirst($toilet['free'] ?? 'N/A')); ?></p>
                            <p class="text-gray-700 mb-1"><strong>Customers Only:</strong> <?php echo htmlspecialchars(ucfirst($toilet['customers_only'] ?? 'N/A')); ?></p>
                            <p class="text-700 mb-1"><strong>Disabled Friendly:</strong> <?php echo htmlspecialchars(ucfirst($toilet['disabled_friendly'] ?? 'N/A')); ?></p>
                            <?php if ($toilet['open_time'] && $toilet['close_time']): ?>
                                <p class="text-gray-700 mb-1"><strong>Hours:</strong> <?php echo htmlspecialchars(substr($toilet['open_time'], 0, 5)); ?> - <?php echo htmlspecialchars(substr($toilet['close_time'], 0, 5)); ?></p>
                            <?php endif; ?>
                            <p class="text-xs text-gray-500 mt-2 md:text-sm">Added on: <?php echo date('Y-m-d', strtotime($toilet['created_at'] ?? '')); ?></p>
                            <!-- Optional: Link to edit or view details of this specific toilet -->
                            <a href="/toilet/view/<?php echo htmlspecialchars($toilet['id']); ?>" class="inline-block mt-4 text-indigo-600 hover:underline text-sm md:text-base">View Details</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
