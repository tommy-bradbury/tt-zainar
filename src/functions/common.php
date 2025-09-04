<?php

/**
 * Stores a one-time message in the session.
 *
 * @param string $message
 * @param string $type
 * @return void
 */
function set_flash_message(string $message, string $type = 'success'): void {
    $_SESSION['flash_message'] = [
        'message' => $message,
        'type' => $type
    ];
}

/**
 * Retrieves and clears a one-time message from the session.
 *
 * @return array|null
 */
function get_flash_message(): ?array {
    if (isset($_SESSION['flash_message'])) {
        $message = $_SESSION['flash_message'];
        unset($_SESSION['flash_message']);
        return $message;
    }
    return null;
}


function dd(...$args)
{
    echo '<pre style="background-color: #2b2b2b; color: #a9b7c6; padding: 15px; border-radius: 8px; overflow-x: auto; font-family: monospace; font-size: 14px; line-height: 1.6;">';
    foreach ($args as $arg) {
        var_dump($arg);
    }
    echo '</pre>';
    die(1); // Exit with a non-zero status code to indicate an error/termination
}

function d(...$args)
{
    echo '<pre style="background-color: #3e3e3e; color: #c0c0c0; padding: 15px; margin-bottom: 10px; border-radius: 8px; overflow-x: auto; font-family: monospace; font-size: 14px; line-height: 1.6;">';
    foreach ($args as $arg) {
        var_dump($arg);
    }
    echo '</pre>';
}