<?php
require_once '../../config/database.php';
require_once '../../config/helpers.php';
protectAdmin();

$method = $_SERVER['REQUEST_METHOD'];

try {
    if ($method === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);

        // مسار افتراضي للصورة إذا لم توجد
        $imageUrl = 'assets/images/placeholder.jpg';
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['name'])));

        $stmt = $pdo->prepare("INSERT INTO products (name, slug, description, price, category_id, stock, image_url) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            sanitize($data['name']),
            $slug,
            sanitize($data['description']),
            $data['price'],
            $data['category_id'],
            $data['stock'],
            $imageUrl
        ]);
        jsonResponse(true, 'تم إضافة المنتج بنجاح');
    }

    if ($method === 'DELETE') {
        $id = $_GET['id'];
        $pdo->prepare("DELETE FROM products WHERE id = ?")->execute([$id]);
        jsonResponse(true, 'تم حذف المنتج');
    }
} catch (Exception $e) {
    jsonResponse(false, 'حدث خطأ: ' . $e->getMessage());
}
