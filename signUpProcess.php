<?php
/**
 * signUpProcess.php — User registration handler
 * Security: prepared statements, input validation, duplicate check
 */
require_once __DIR__ . '/includes/session.php';
require_once __DIR__ . '/includes/db.php';

// Rate limiting: max 3 registrations per 5 minutes
if (isRateLimited('user_register', 3, 300)) {
    echo 'Too many registration attempts. Please wait a moment.';
    exit;
}

$fname    = trim($_POST['f'] ?? '');
$lname    = trim($_POST['l'] ?? '');
$email    = trim($_POST['e'] ?? '');
$mobile   = trim($_POST['m'] ?? '');
$username = trim($_POST['u'] ?? '');
$password = $_POST['p'] ?? '';

// Validation
if (empty($fname)) {
    echo 'Please Enter Your First Name.';
    exit;
}
if (strlen($fname) > 20) {
    echo 'First Name Must Contain LOWER THAN 20 characters.';
    exit;
}
if (empty($lname)) {
    echo 'Please Enter Your Last Name.';
    exit;
}
if (strlen($lname) > 20) {
    echo 'Last Name Must Contain LOWER THAN 20 characters.';
    exit;
}
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
if (empty($mobile)) {
    echo 'Please Enter Your Mobile Number.';
    exit;
}
if (strlen($mobile) !== 10) {
    echo 'Mobile Number Must Contain 10 digits.';
    exit;
}
if (!preg_match('/^07[012456789]{1}[0-9]{7}$/', $mobile)) {
    echo 'Invalid Mobile Number.';
    exit;
}
if (empty($username)) {
    echo 'Please Enter Your Username.';
    exit;
}
if (strlen($username) > 30) {
    echo 'Username Must Contain LOWER THAN 30 characters.';
    exit;
}
if (empty($password)) {
    echo 'Please Enter Your Password.';
    exit;
}
if (strlen($password) < 8 || strlen($password) > 100) {
    echo 'Password Must Contain 8 to 100 Characters.';
    exit;
}

// Check for existing user — prepared statement
$existing = Database::preparedSearch(
    'SELECT `user_id` FROM `user` WHERE `email` = ? OR `mobile` = ? OR `username` = ? LIMIT 1',
    'sss',
    [$email, $mobile, $username]
);

if (!empty($existing)) {
    echo 'A user with the same Email, Mobile, or Username already exists.';
    exit;
}

// Hash password and insert
$hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

$ok = Database::preparedIUD(
    'INSERT INTO `user` (`fname`, `lname`, `email`, `mobile`, `username`, `password`, `user_type_id`) VALUES (?, ?, ?, ?, ?, ?, ?)',
    'ssssssi',
    [$fname, $lname, $email, $mobile, $username, $hash, 2]
);

echo $ok ? 'Success' : 'Registration failed. Please try again.';
?>
