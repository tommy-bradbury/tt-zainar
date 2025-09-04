<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Secure App'; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }

        .bg-full-screen {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        <?php if (isset($page_background_image)): ?>
        body.<?php echo str_replace(' ', '.', $body_classes); ?> {
            background-image: url('<?php echo htmlspecialchars($page_background_image); ?>');
        }
        <?php endif; ?>
    </style>
</head>
<body class="min-h-screen flex flex-col w-full <?php echo $body_classes ?? ''; ?>">
    <script src="/js/app.js"></script>
