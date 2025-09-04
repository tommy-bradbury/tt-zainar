<?php
/**
 * Adds a new toilet record to the database.
 *
 * @param int $created_by The ID of the user who created this toilet.
 * @param string|null $what_three_words What3Words address.
 * @param string|null $free 'true' or 'false' if the toilet is free.
 * @param string|null $customers_only 'true' or 'false' if for customers only.
 * @param string|null $disabled_friendly 'true' or 'false' if disabled friendly.
 * @param string|null $open_time Opening time (HH:MM:SS format).
 * @param string|null $close_time Closing time (HH:MM:SS format).
 * @param PDO $pdo
 * @return bool|string Returns true on success, or an error message string on failure.
 */
function add_toilet(
    int $created_by,
    string $what_three_words,
    string $free,
    string $customers_only,
    string $disabled_friendly,
    string $open_time,
    string $close_time,
    PDO $pdo
): bool|string {
    if (!in_array($free, ['true', 'false', null])) {
        return "Invalid value for 'free'.";
    }
    if (!in_array($customers_only, ['true', 'false', null])) {
        return "Invalid value for 'customers only'.";
    }
    if (!in_array($disabled_friendly, ['true', 'false', null])) {
        return "Invalid value for 'disabled friendly'.";
    }
    if(preg_match('/^[^.]+\.[^.]+\.[^.]+$/', $what_three_words) !== 1) {
        return "Invalid value for 'what three words'.";
    }

    if($open_time !== '' xor $close_time !== '') {
        return "Open time and Close time must both be submitted or neither.";
    }

    $what_three_words = $what_three_words ? htmlspecialchars($what_three_words, ENT_QUOTES, 'UTF-8') : null;

    try {

        if($open_time !== '') {
            $sql = "INSERT INTO toilets (created_by, what_three_words, free, customers_only, disabled_friendly, open_time, close_time) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $payload = [$created_by, $what_three_words, $free, $customers_only, $disabled_friendly, $open_time, $close_time];
        } else {
            $sql = "INSERT INTO toilets (created_by, what_three_words, free, customers_only, disabled_friendly) VALUES (?, ?, ?, ?, ?)";
            $payload = [$created_by, $what_three_words, $free, $customers_only, $disabled_friendly];
        }
        $stmt = $pdo->prepare($sql);
        $stmt->execute($payload);
        return true;
    } catch (PDOException $e) {
        error_log("Add toilet database error: " . $e->getMessage());
        dd($e->getMessage());
        return "An error occurred while adding the toilet. Please try again.";
    }
}

/**
 * Retrieves all toilet records from the database.
 *
 * @param PDO $pdo
 * @return array Returns an array of toilet records.
 */
function get_all_toilets(PDO $pdo): array {
    try {
        $sql = "SELECT * FROM toilets ORDER BY created_at DESC";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Get all toilets database error: " . $e->getMessage());
        return [];
    }
}

/**
 * Retrieves toilet records added by a specific user.
 *
 * @param int $user_id The ID of the user who added the toilets.
 * @param PDO $pdo
 * @return array Returns an array of toilet records.
 */
function get_toilets_by_user_id(int $user_id, PDO $pdo): array {
    try {
        $sql = "SELECT * FROM toilets WHERE created_by = ? ORDER BY created_at DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Get toilets by user ID database error: " . $e->getMessage());
        return [];
    }
}
