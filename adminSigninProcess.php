<?php
/**
 * adminSigninProcess.php — Admin login handler
 * Security: prepared statements, rate limiting, session regeneration
 */
require_once __DIR__ . '/includes/session.php';
require_once __DIR__ . '/includes/db.php';

// Rate limiting: max 5 admin login attempts per 2 minutes
if (isRateLimited('admin_login', 5, 120)) {
    http_response_code(429);
    echo 'Too many login attempts. Please wait 2 minutes.';
    exit;
}

$email      = trim($_POST['e'] ?? '');
$password   = $_POST['p'] ?? '';
$rememberme = ($_POST['r'] ?? 'false') === 'true';

if (empty($email)) {
    echo 'Please Enter Email Address.';
    exit;
}
if (empty($password)) {
    echo 'Please enter your Password.';
    exit;
}
if (strlen($password) > 100 || strlen($password) < 5) {
    echo 'Password must contain BETWEEN 5 to 100 characters.';
    exit;
}

// Fetch admin using prepared statement
$rows = Database::preparedSearch(
    'SELECT * FROM `user` WHERE `email` = ? AND `user_type_id` = 1 LIMIT 1',
    's',
    [$email]
);

if (empty($rows)) {
    echo 'Invalid credentials or you are not an Admin.';
    exit;
}

$admin = $rows[0];

if (!password_verify($password, $admin['password'])) {
    echo 'Invalid credentials or you are not an Admin.';
    exit;
}

// Admin login success
regenerateSession();
$_SESSION['a'] = $admin;

// Remember Me — email only (no password stored)
if ($rememberme) {
    setcookie('admin_rm_email', $email, time() + (60 * 60 * 24 * 30), '/', '', false, true);
} else {
    setcookie('admin_rm_email', '', time() - 3600, '/', '', false, true);
}

// Clear old insecure cookies
setcookie('email', '', time() - 3600, '/');
setcookie('password', '', time() - 3600, '/');
setcookie('username', '', time() - 3600, '/');

echo 'success';
?>
