<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إدارة المنتجات</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.html"> <!-- Reuse styles slightly -->
    <style>
        :root { --admin-primary: #4e73df; --admin-dark: #2c3e50; }
        body { font-family: 'Tajawal', sans-serif; display: flex; margin: 0; background: #f8f9fc; }
        .sidebar { width: 250px; background: var(--admin-dark); color: white; min-height: 100vh; padding: 20px; }
        .sidebar nav ul { list-style: none; padding: 0; }
        .sidebar nav ul li { padding: 15px 0; border-bottom: 1px solid #34495e; cursor: pointer; }
        .main-content { flex: 1; padding: 30px; }
        table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        th, td { padding: 15px; text-align: right; border-bottom: 1px solid #eee; }
        .modal { display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); justify-content:center; align-items:center; }
        .modal-content { background:white; padding:30px; border-radius:10px; width:400px; }
        .input-group { margin-bottom:15px; }
        .input-group label { display:block; margin-bottom:5px; }
        .input-group input, .input-group select, .input-group textarea { width:100%; padding:8px; border-radius:5px; border:1px solid #ddd; }
        .btn { padding: 10px 20px; border-radius: 5px; cursor: pointer; border: none; }
        .btn-add { background: #2ecc71; color: white; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>إدارة المتجر</h2>
        <nav>
            <ul>
                <li onclick="location.href='index.html'">📊 الإحصائيات</li>
                <li onclick="location.href='products.html'">📦 المنتجات</li>
                <li onclick="location.href='../index.html'">🌐 عودة للمتجر</li>
                <li onclick="logout()">🚪 خروج</li>
            </ul>
        </nav>
    </div>

    <div class="main-content">
        <h1>إدارة المنتجات</h1>
        <button class="btn btn-add" onclick="$('#addModal').css('display','flex')">➕ إضافة منتج جديد</button>
        
        <table>
            <thead><tr><th>الاسم</th><th>السعر</th><th>القسم</th><th>المخزون</th><th>إجراء</th></tr></thead>
            <tbody id="products-table"></tbody>
        </table>
    </div>

    <!-- Modal إضافة منتج -->
    <div id="addModal" class="modal">
        <div class="modal-content">
            <h2>إضافة منتج جديد</h2>
            <form id="add-product-form">
                <div class="input-group"><label>اسم المنتج</label><input type="text" id="p-name" required></div>
                <div class="input-group"><label>السعر</label><input type="number" step="0.01" id="p-price" required></div>
                <div class="input-group"><label>القسم</label>
                    <select id="p-category" required>
                        <option value="1">لابتوب</option><option value="2">كمبيوتر مكتبي</option><option value="3">شاشات</option><option value="4">الملحقات</option>
                    </select>
                </div>
                <div class="input-group"><label>المخزون</label><input type="number" id="p-stock" required></div>
                <div class="input-group"><label>الوصف</label><textarea id="p-desc" required></textarea></div>
                <button type="submit" class="btn btn-add" style="width:100%">حفظ المنتج</button>
                <button type="button" onclick="$('.modal').hide()" class="btn" style="width:100%; margin-top:10px;">إلغاء</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            loadProducts();

            $('#add-product-form').on('submit', function(e) {
                e.preventDefault();
                const data = {
                    name: $('#p-name').val(),
                    price: $('#p-price').val(),
                    category_id: $('#p-category').val(),
                    stock: $('#p-stock').val(),
                    description: $('#p-desc').val()
                };

                $.ajax({
                    url: '../api/admin/products_manage.php',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(data),
                    success: function(res) {
                        if (res.success) {
                            alert('تمت الإضافة!');
                            location.reload();
                        }
                    }
                });
            });
        });

        function loadProducts() {
            $.get('../api/products/get_all.php?limit=100', function(res) {
                if (res.success) {
                    let html = '';
                    res.data.products.forEach(p => {
                        html += `<tr>
                            <td>${p.name}</td>
                            <td>${p.price} $</td>
                            <td>${p.category_name}</td>
                            <td>${p.stock}</td>
                            <td><button onclick="deleteProduct(${p.id})" style="color:red; border:none; background:none; cursor:pointer">حذف</button></td>
                        </tr>`;
                    });
                    $('#products-table').html(html);
                }
            });
        }

        function deleteProduct(id) {
            if (confirm('هل أنت متأكد من الحذف؟')) {
                $.ajax({
                    url: `../api/admin/products_manage.php?id=${id}`,
                    method: 'DELETE',
                    success: function(res) {
                        if (res.success) loadProducts();
                    }
                });
            }
        }
    </script>
</body>
</html>
