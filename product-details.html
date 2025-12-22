<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Store - تفاصيل المنتج</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .details-container { display: flex; gap: 4rem; flex-wrap: wrap; margin-top: 2rem; }
        .details-image { flex: 1; min-width: 300px; background: #eee; height: 400px; display: flex; align-items: center; justify-content: center; border-radius: 15px; font-size: 5rem; }
        .details-info { flex: 1; min-width: 300px; }
        .details-info h1 { margin-bottom: 1rem; }
        .details-info .price { font-size: 2rem; color: var(--primary-color); font-weight: bold; margin-bottom: 1.5rem; }
        .details-info p { margin-bottom: 2rem; color: #555; }
    </style>
</head>
<body>
    <header>
        <div class="logo"><h2 onclick="location.href='index.html'">🖥️ Tech Store</h2></div>
        <nav><ul><li><a href="index.html">الرئيسية</a></li><li><a href="products.html">المنتجات</a></li><li id="user-nav"><a href="login.html">تسجيل الدخول</a></li></ul></nav>
        <div class="nav-icons"><div class="cart-icon" onclick="location.href='cart.html'">🛒 <span class="cart-count">0</span></div></div>
    </header>

    <div class="container">
        <div id="product-details" class="details-container">
            <!-- AJAX Result -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const productId = urlParams.get('id');

            if (!productId) location.href = 'products.html';

            $.get(`api/products/get_by_id.php?id=${productId}`, function(response) {
                if (response.success) {
                    const p = response.data;
                    document.title = `Tech Store - ${p.name}`;
                    $('#product-details').html(`
                        <div class="details-image">🖼️</div>
                        <div class="details-info">
                            <h1>${p.name}</h1>
                            <div class="price">${p.price} $</div>
                            <p>${p.description}</p>
                            <div style="margin-bottom: 1rem;">التوفر: <b>${p.stock > 0 ? 'في المخزن' : 'غير متوفر'}</b></div>
                            <button class="btn-add" style="padding: 15px 40px;" onclick="addToCart(${p.id})">أضف إلى السلة</button>
                        </div>
                    `);
                } else {
                    $('#product-details').html('<p>المنتج غير موجود</p>');
                }
            });
        });
    </script>
</body>
</html>
