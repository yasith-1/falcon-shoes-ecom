<?php
/**
 * updateUserStatusProcess.php — Toggle user active/inactive status
 * Security: prepared statements, admin auth required
 */
require_once __DIR__ . '/includes/session.php';
require_once __DIR__ . '/includes/db.php';

requireAdminAuth();

$uid = trim($_POST['u'] ?? '');

if (empty($uid) || !is_numeric($uid)) {
    echo 'Invalid User ID.';
    exit;
}

$uid = (int) $uid;

// Fetch user (only regular users, not admins)
$rows = Database::preparedSearch(
    'SELECT `user_id`, `status` FROM `user` WHERE `user_id` = ? AND `user_type_id` = 2 LIMIT 1',
    'i',
    [$uid]
);

if (empty($rows)) {
    echo 'Invalid User ID.';
    exit;
}

$user      = $rows[0];
$newStatus = $user['status'] == 1 ? 0 : 1;
$label     = $newStatus == 0 ? 'Deactivated' : 'Activated';

Database::preparedIUD(
    'UPDATE `user` SET `status` = ? WHERE `user_id` = ?',
    'ii',
    [$newStatus, $uid]
);

echo $label;
?>
