<?php
// Helper Functions

/**
 * Return JSON response
 */
function jsonResponse($success, $message, $data = null)
{
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data' => $data
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

/**
 * Sanitize input
 */
function sanitize($data)
{
    return htmlspecialchars(strip_tags(trim($data)));
}

/**
 * Check if user is logged in
 */
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

/**
 * Check if user is admin, if not exit with error
 */
function protectAdmin()
{
    if (session_status() === PHP_SESSION_NONE)
        session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'غير مصرح لك بالدخول']);
        exit;
    }
}

/**
 * Check if user is admin
 */
function isAdmin()
{
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}
