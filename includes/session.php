<?php
/**
 * Session Security Helper
 * Centralizes session configuration and security
 */

// Secure session settings
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_samesite', 'Strict');

if (!session_id()) {
    session_start();
}

/**
 * Regenerate session ID to prevent session fixation attacks.
 * Call this after a successful login.
 */
function regenerateSession(): void
{
    session_regenerate_id(true);
}

/**
 * Destroy the current session completely.
 */
function destroySession(): void
{
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }
    session_destroy();
}

/**
 * Generate a CSRF token and store it in the session.
 */
function generateCsrfToken(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Validate a submitted CSRF token.
 */
function validateCsrfToken(string $token): bool
{
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Require user to be logged in.
 * Redirects to index.php if not authenticated.
 */
function requireUserAuth(): void
{
    if (!isset($_SESSION['u'])) {
        header('Location: index.php');
        exit;
    }
}

/**
 * Require admin to be logged in.
 * Redirects to adminSignin.php if not authenticated as admin.
 */
function requireAdminAuth(): void
{
    if (!isset($_SESSION['a'])) {
        header('Location: adminSignin.php');
        exit;
    }
}

/**
 * Sanitize a string for output – prevents XSS.
 */
function clean(string $value): string
{
    return htmlspecialchars(strip_tags(trim($value)), ENT_QUOTES, 'UTF-8');
}

/**
 * Rate-limit repeated requests (simple session-based).
 * Returns true if the action should be blocked.
 *
 * @param string $action  Unique identifier for the action
 * @param int    $limit   Max number of attempts
 * @param int    $window  Time window in seconds
 */
function isRateLimited(string $action, int $limit = 5, int $window = 60): bool
{
    $key = 'rl_' . $action;
    $now = time();

    if (!isset($_SESSION[$key])) {
        $_SESSION[$key] = ['count' => 0, 'start' => $now];
    }

    if ($now - $_SESSION[$key]['start'] > $window) {
        // Reset window
        $_SESSION[$key] = ['count' => 0, 'start' => $now];
    }

    $_SESSION[$key]['count']++;
    return $_SESSION[$key]['count'] > $limit;
}
?>
