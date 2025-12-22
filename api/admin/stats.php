<?php
require_once '../../config/database.php';
require_once '../../config/helpers.php';
protectAdmin();

try {
    // إحصائيات سريعة
    $totalOrders = $pdo->query("SELECT COUNT(*) FROM orders")->fetchColumn();
    $totalRevenue = $pdo->query("SELECT SUM(total_price) FROM orders WHERE status != 'cancelled'")->fetchColumn();
    $totalProducts = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();
    $totalUsers = $pdo->query("SELECT COUNT(*) FROM users WHERE role = 'customer'")->fetchColumn();

    // أخر 5 طلبات
    $latestOrders = $pdo->query("
        SELECT o.*, u.username 
        FROM orders o 
        JOIN users u ON o.user_id = u.id 
        ORDER BY o.created_at DESC LIMIT 5
    ")->fetchAll(PDO::FETCH_ASSOC);

    jsonResponse(true, 'تم جلب الإحصائيات', [
        'stats' => [
            'orders' => $totalOrders,
            'revenue' => number_format($totalRevenue, 2),
            'products' => $totalProducts,
            'users' => $totalUsers
        ],
        'latestOrders' => $latestOrders
    ]);
} catch (Exception $e) {
    jsonResponse(false, 'حدث خطأ: ' . $e->getMessage());
}
