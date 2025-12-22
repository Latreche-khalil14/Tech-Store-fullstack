<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Store - سلة التسوق</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .cart-table { width: 100%; border-collapse: collapse; margin-top: 2rem; background: white; border-radius: 10px; overflow: hidden; box-shadow: var(--shadow); }
        .cart-table th, .cart-table td { padding: 1.5rem; text-align: right; border-bottom: 1px solid #eee; }
        .cart-table th { background: #f4f4f4; }
        .cart-summary { margin-top: 2rem; background: white; padding: 2rem; border-radius: 10px; box-shadow: var(--shadow); text-align: left; }
        .btn-checkout { background: var(--success); color: white; border: none; padding: 15px 30px; border-radius: 5px; cursor: pointer; font-size: 1.1rem; }
    </style>
</head>
<body>
    <header>
        <div class="logo"><h2 onclick="location.href='index.html'">🖥️ Tech Store</h2></div>
        <nav><ul><li><a href="index.html">الرئيسية</a></li><li><a href="products.html">المنتجات</a></li><li id="user-nav"><a href="login.html">تسجيل الدخول</a></li></ul></nav>
        <div class="nav-icons"><div class="cart-icon" onclick="location.href='cart.html'">🛒 <span class="cart-count">0</span></div></div>
    </header>

    <div class="container">
        <h2 class="section-title">سلة التسوق</h2>
        <div id="cart-content">
            <table class="cart-table" id="cart-table">
                <thead><tr><th>المنتج</th><th>السعر</th><th>الكمية</th><th>الإجمالي</th><th>إجراء</th></tr></thead>
                <tbody></tbody>
            </table>
            <div class="cart-summary">
                <h3>الإجمالي الكلي: <span id="cart-total">0</span> $</h3>
                <br>
                <button class="btn-checkout" onclick="checkout()">إتمام الطلب</button>
            </div>
        </div>
        <div id="cart-empty" style="display:none; text-align:center;">
            <p>سلتك فارغة حالياً</p>
            <br>
            <button class="btn-add" onclick="location.href='products.html'">تسوق الآن</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        $(document).ready(function() {
            renderCart();

            function renderCart() {
                let cart = JSON.parse(localStorage.getItem('cart')) || [];
                if (cart.length === 0) {
                    $('#cart-content').hide();
                    $('#cart-empty').show();
                    return;
                }

                $('#cart-table tbody').html('');
                let total = 0;

                cart.forEach((item, index) => {
                    $.get(`api/products/get_by_id.php?id=${item.id}`, function(response) {
                        if (response.success) {
                            const p = response.data;
                            const itemTotal = p.price * item.quantity;
                            total += itemTotal;
                            
                            $('#cart-table tbody').append(`
                                <tr>
                                    <td>${p.name}</td>
                                    <td>${p.price} $</td>
                                    <td>${item.quantity}</td>
                                    <td>${itemTotal.toFixed(2)} $</td>
                                    <td><button style="color:red; cursor:pointer; background:none; border:none;" onclick="removeFromCart(${p.id})">حذف</button></td>
                                </tr>
                            `);
                            $('#cart-total').text(total.toFixed(2));
                        }
                    });
                });
            }

            window.removeFromCart = function(id) {
                let cart = JSON.parse(localStorage.getItem('cart')) || [];
                cart = cart.filter(i => i.id !== id);
                localStorage.setItem('cart', JSON.stringify(cart));
                location.reload();
            };

            window.checkout = function() {
                const user = localStorage.getItem('user');
                if (!user) {
                    alert('يرجى تسجيل الدخول لإتمام الطلب');
                    location.href = 'login.html';
                    return;
                }
                location.href = 'checkout.html';
            };
        });
    </script>
</body>
</html>
