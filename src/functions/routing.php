<?php

function displayUserRoute($action, $pdo): void {
    $message = '';
    $message_type = '';
    switch ($action) {
        case 'login':
            $flash = get_flash_message();
            if($flash) {
                $message = $flash['message'];
                $message_type = $flash['type'];
            }

            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = $_POST['username'] ?? '';
                $password = $_POST['password'] ?? '';
                $result = log_in($username, $password, $pdo);

                if ($result === true) {
                    header('Location: /user/dashboard');
                    exit();
                } else {
                    $message = $result;
                    $message_type = 'error';
                }
            }
            
            require_once BASE_PATH . '/views/user/login.php';
            break;
        case 'signup':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = $_POST['username'] ?? '';
                $email = $_POST['email'] ?? '';
                $password = $_POST['password'] ?? '';
                $result = sign_up($username, $password, $email, $pdo);

                if ($result === true) {
                    set_flash_message("Registration successful! You can now log in.", 'success');
                    header('Location: /user/login');
                    exit();
                } else {
                    $message = $result;
                    $message_type = 'error';
                }
            }
            
            require_once BASE_PATH . '/views/user/signup.php';
            break;
        case 'dashboard':
            if (!is_logged_in()) {
                header('Location: /user/login');
                exit();
            }
            $userData = get_user_data($pdo);
            if (!$userData) {
                log_out();
                header('Location: /user/login');
                exit();
            }
            $page_title = 'Dashboard';
            require_once BASE_PATH . '/views/user/dashboard.php';
            break;
        case 'logout':
            log_out();
            header('Location: /user/login');
            exit();
            break;
        default:
            header("HTTP/1.0 404 Not Found");
            echo "404 Not Found";
            break;
    }
}

function displayToiletRoute($action, $pdo): void {
    require_once BASE_PATH . '/functions/toilet.php';
    $message = '';
    $message_type = '';
    switch ($action) {
        case 'find':
            $toilets = get_all_toilets($pdo);
            $page_title = 'Find a Toilet';
            require_once BASE_PATH . '/views/toilet/find.php';
            break;
        case 'add':
            if(!is_logged_in()) {
                set_flash_message("You must be logged in to add a toilet.", 'error');
                header('Location: /user/login');
                exit();
            }

            $message = '';
            $message_type = '';
            $flash = get_flash_message();
            if ($flash) {
                $message = $flash['message'];
                $message_type = $flash['type'];
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $created_by = get_user_id();

                $what_three_words = $_POST['what_three_words'] ?? null;
                $free = $_POST['free'] ?? null;
                $customers_only = $_POST['customers_only'] ?? null;
                $disabled_friendly = $_POST['disabled_friendly'] ?? null;
                $open_time = $_POST['open_time'] ?? null;
                $close_time = $_POST['close_time'] ?? null;

                if (!$created_by) {
                    $message = "User ID not found. Please log in again.";
                    $message_type = 'error';
                } else {
                    $result = add_toilet(
                        $created_by,
                        $what_three_words,
                        $free,
                        $customers_only,
                        $disabled_friendly,
                        $open_time,
                        $close_time,
                        $pdo
                    );

                    if ($result === true) {
                        set_flash_message("Toilet added successfully!", 'success');
                        header('Location: /toilet/add');
                        exit();
                    } else {
                        $message = $result;
                        $message_type = 'error';
                    }
                }
            }

            $page_title = 'Add a Toilet';
            require_once BASE_PATH . '/views/toilet/add.php';
            break;
        case 'my-added-toilets':
            if (!is_logged_in()) {
                set_flash_message("You must be logged in to view your added toilets.", 'error');
                header('Location: /user/login');
                exit();
            }

            $user_id = get_user_id();
            $my_toilets = get_toilets_by_user_id($user_id, $pdo);

            $page_title = 'My Added Toilets';
            require_once BASE_PATH . '/views/toilet/my_added.php';
            break;
        default:
            header("HTTP/1.0 404 Not Found");
            echo "404 Not Found";
            break;
    }
}


function displayReviewRoute($action, PDO $pdo): void {
    require_once BASE_PATH . '/functions/review.php';
    require_once BASE_PATH . '/functions/toilet.php';
    $message = '';
    $message_type = '';
    switch ($action) {
        case 'add':
            if (!is_logged_in()) {
                set_flash_message("You must be logged in to add a review.", 'error');
                header('Location: /user/login');
                exit();
            }

            $message = '';
            $message_type = '';
            $flash = get_flash_message();
            if ($flash) {
                $message = $flash['message'];
                $message_type = $flash['type'];
            }

            $toilets = get_all_toilets($pdo);

            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $user_id = get_user_id();
                $toilet_id = $_POST['toilet_id'] ?? null;
                $clean_score = $_POST['clean_score'] ?? null;
                $busy_score = $_POST['busy_score'] ?? null;
                $opening_hours_correct = $_POST['opening_hours_correct'] ?? null;
                
                if(!$user_id) {
                    $message = "User ID not found. Please log in again.";
                    $message_type = 'error';
                } elseif(empty($toilet_id)) {
                    $message = "Please select a toilet to review.";
                    $message_type = 'error';
                } else {
                    $result = add_review(
                        $user_id,
                        (int)$toilet_id,
                        (int)$clean_score,
                        (int)$busy_score,
                        $opening_hours_correct,
                        $pdo
                    );

                    if($result === true) {
                        set_flash_message("Review added successfully!", 'success');
                        header('Location: /review/add');
                        exit();
                    } else {
                        $message = $result;
                        $message_type = 'error';
                    }
                }
            }

            $page_title = 'Add a Review';
            require_once BASE_PATH . '/views/review/add.php';
            break;
        case 'my-reviews':
            if(!is_logged_in()) {
                set_flash_message("You must be logged in to view your reviews.", 'error');
                header('Location: /user/login');
                exit();
            }

            $user_id = get_user_id();
            $my_reviews = get_reviews_by_user_id($user_id, $pdo);

            $page_title = 'My Reviews';
            require_once BASE_PATH . '/views/review/my_reviews.php';
            break;
        default:
            header("HTTP/1.0 404 Not Found");
            echo "404 Not Found";
            break;
    }

}