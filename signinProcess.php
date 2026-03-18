<?php
/**
 * signinProcess.php — User login handler
 * Security: input sanitization, prepared statements, rate limiting
 */
require_once __DIR__ . '/includes/session.php';
require_once __DIR__ . '/includes/db.php';

// Rate limiting: max 10 login attempts per minute
if (isRateLimited('user_login', 10, 60)) {
    http_response_code(429);
    echo 'Too many login attempts. Please wait a moment.';
    exit;
}

$email      = trim($_POST['e'] ?? '');
$password   = $_POST['p'] ?? '';
$rememberme = ($_POST['r'] ?? 'false') === 'true';

// Input validation
if (empty($email)) {
    echo 'Please Enter Your Email Address.';
    exit;
}
if (strlen($email) > 100) {
    echo 'Email Address Must Contain LOWER THAN 100 characters.';
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'Invalid Email Address.';
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

// Fetch user by email using prepared statement
$rows = Database::preparedSearch(
    'SELECT * FROM `user` WHERE `email` = ? LIMIT 1',
    's',
    [$email]
);

if (empty($rows)) {
    echo 'Invalid Email OR Password.';
    exit;
}

$user = $rows[0];

// Verify hashed password
if (!password_verify($password, $user['password'])) {
    echo 'Invalid Email OR Password.';
    exit;
}

if ($user['status'] != 1) {
    echo 'Your account has been deactivated. Please contact support.';
    exit;
}

// Login successful — regenerate session to prevent fixation
regenerateSession();
$_SESSION['u'] = $user;

// Remember Me — store only email (NEVER store password in cookie)
if ($rememberme) {
    $token = bin2hex(random_bytes(32));
    setcookie('rm_email', $email, time() + (60 * 60 * 24 * 30), '/', '', false, true);
    // Note: in production, store a hashed token in DB and verify it
} else {
    setcookie('rm_email', '', time() - 3600, '/', '', false, true);
}

// Clear old insecure cookies
setcookie('email', '', time() - 3600, '/');
setcookie('password', '', time() - 3600, '/');

echo 'Success';
?>
