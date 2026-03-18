<?php
require_once __DIR__ . '/includes/session.php';

if (!isset($_SESSION['a'])) {
    echo 'Please login first.';
    exit;
}

destroySession();
echo 'success';
?>
