<?php

/**
 * Adds a new review record to the database.
 *
 * @param int $user_id
 * @param int $toilet_id
 * @param int $clean_score
 * @param int $busy_score
 * @param string $opening_hours_correct
 * @param PDO $pdo
 * @return bool|string Returns true on success, or an error message string on failure.
 */
function add_review(
    int $user_id,
    int $toilet_id,
    int $clean_score,
    int $busy_score,
    string $opening_hours_correct,
    PDO $pdo
): bool|string {
    // Input validation
    if ($clean_score < 1 || $clean_score > 10) {
        return "Cleanliness score must be between 1 and 10.";
    }
    if ($busy_score < 1 || $busy_score > 10) {
        return "Busyness score must be between 1 and 10.";
    }
    if (!in_array($opening_hours_correct, ['true', 'false'])) {
        return "Opening hours correct must be 'true' or 'false'.";
    }

    try {
        $sql = "INSERT INTO reviews (user_id, toilet_id, clean_score, busy_score, opening_hours_correct) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $user_id,
            $toilet_id,
            $clean_score,
            $busy_score,
            $opening_hours_correct
        ]);
        return true;
    } catch (PDOException $e) {
        error_log("Add review database error: " . $e->getMessage());
        return "An error occurred while adding the review. Please try again.";
    }
}

/**
 * Retrieves review records for a specific toilet.
 *
 * @param int $toilet_id
 * @param PDO $pdo
 * @return array Returns an array of review records, including reviewer username.
 */
function get_reviews_by_toilet_id(int $toilet_id, PDO $pdo): array {
    try {
        $sql = "SELECT r.*, u.username FROM reviews r JOIN users u ON r.user_id = u.id WHERE r.toilet_id = ? ORDER BY r.created_at DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$toilet_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Get reviews by toilet ID database error: " . $e->getMessage());
        return [];
    }
}

/**
 * Retrieves review records added by a specific user.
 *
 * @param int $user_id The ID of the user who added the reviews.
 * @param PDO $pdo
 * @return array Returns an array of review records, including toilet name.
 */
function get_reviews_by_user_id(int $user_id, PDO $pdo): array {
    try {
        $sql = "SELECT r.*, t.what_three_words FROM reviews r JOIN toilets t ON r.toilet_id = t.id WHERE r.user_id = ? ORDER BY r.created_at DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Get reviews by user ID database error: " . $e->getMessage());
        return [];
    }
}