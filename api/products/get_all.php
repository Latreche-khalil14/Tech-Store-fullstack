<?php
require_once '../../config/database.php';
require_once '../../config/helpers.php';

header('Content-Type: application/json; charset=utf-8');

try {
    // Get pagination parameters
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 12;
    $offset = ($page - 1) * $limit;

    // Get category filter
    $categoryId = isset($_GET['category']) ? (int) $_GET['category'] : null;

    // Build query
    $sql = "SELECT p.*, c.name as category_name 
            FROM products p 
            LEFT JOIN categories c ON p.category_id = c.id 
            WHERE 1=1";

    $params = [];

    if ($categoryId) {
        $sql .= " AND p.category_id = ?";
        $params[] = $categoryId;
    }

    $sql .= " ORDER BY p.created_at DESC LIMIT {$limit} OFFSET {$offset}";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Get total count
    $countSql = "SELECT COUNT(*) as total FROM products WHERE 1=1";
    $countParams = [];

    if ($categoryId) {
        $countSql .= " AND category_id = ?";
        $countParams[] = $categoryId;
    }

    $stmt = $pdo->prepare($countSql);
    $stmt->execute($countParams);
    $total = $stmt->fetch()['total'];

    jsonResponse(true, 'تم جلب المنتجات بنجاح', [
        'products' => $products,
        'pagination' => [
            'page' => $page,
            'limit' => $limit,
            'total' => $total,
            'pages' => ceil($total / $limit)
        ]
    ]);

} catch (PDOException $e) {
    jsonResponse(false, 'حدث خطأ أثناء جلب المنتجات');
}
