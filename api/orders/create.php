<?php
session_start();
require_once '../../config/database.php';
require_once '../../config/helpers.php';

header('Content-Type: application/json; charset=utf-8');

if (!isLoggedIn()) {
    jsonResponse(false, 'يجب تسجيل الدخول أولاً');
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(false, 'Request method invalid');
}

$data = json_decode(file_get_contents('php://input'), true);
$userId = $_SESSION['user_id'];
$cart = $data['cart'];
$total = $data['total'];
$address = sanitize($data['address']);

if (empty($cart) || empty($address)) {
    jsonResponse(false, 'يرجى إكمال جميع البيانات');
}

try {
    $pdo->beginTransaction();

    // 1. إنشاء الطلب
    $stmt = $pdo->prepare("INSERT INTO orders (user_id, total_price, shipping_address) VALUES (?, ?, ?)");
    $stmt->execute([$userId, $total, $address]);
    $orderId = $pdo->lastInsertId();

    // 2. إضافة تفاصيل المنتجات
    $stmtItem = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");

    foreach ($cart as $item) {
        // جلب السعر الحالي من قاعدة البيانات للأمان
        $pStmt = $pdo->prepare("SELECT price FROM products WHERE id = ?");
        $pStmt->execute([$item['id']]);
        $price = $pStmt->fetchColumn();

        $stmtItem->execute([$orderId, $item['id'], $item['quantity'], $price]);

        // تحديث المخزون
        $pdo->prepare("UPDATE products SET stock = stock - ? WHERE id = ?")->execute([$item['quantity'], $item['id']]);
    }

    $pdo->commit();
    jsonResponse(true, 'تم إنشاء الطلب بنجاح', ['order_id' => $orderId]);

} catch (Exception $e) {
    $pdo->rollBack();
    jsonResponse(false, 'حدث خطأ أثناء إنشاء الطلب: ' . $e->getMessage());
}
