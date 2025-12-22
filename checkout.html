<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Store - إتمام الطلب</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <div class="logo"><h2 onclick="location.href='index.html'">🖥️ Tech Store</h2></div>
    </header>

    <div class="container" style="max-width: 600px;">
        <h2 class="section-title">تفاصيل الشحن والدفع</h2>
        <div style="background: white; padding: 2rem; border-radius: 10px; box-shadow: var(--shadow);">
            <form id="checkout-form">
                <div style="margin-bottom: 1rem;">
                    <label>عنوان الشحن بالتفصيل</label>
                    <textarea id="address" style="width:100%; padding:10px; border-radius:5px; height:100px; border:1px solid #ddd;" required></textarea>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <label>طريقة الدفع</label>
                    <p><b>الدفع عند الاستلام (COD)</b></p>
                </div>
                <button type="submit" class="btn-checkout" style="width: 100%;">تأكيد الطلب</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            const user = JSON.parse(localStorage.getItem('user'));
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            
            if (!user) location.href = 'login.html';
            if (cart.length === 0) location.href = 'products.html';

            $('#checkout-form').on('submit', function(e) {
                e.preventDefault();
                
                // حساب الإجمالي (يفضل عمله في Backend أيضاً للأمان كما فعلنا في API)
                let total = 0;
                let processedCount = 0;
                
                cart.forEach(item => {
                    $.get(`api/products/get_by_id.php?id=${item.id}`, function(res) {
                        if (res.success) {
                            total += res.data.price * item.quantity;
                        }
                        processedCount++;
                        
                        if (processedCount === cart.length) {
                           sendOrder(total);
                        }
                    });
                });
            });

            function sendOrder(total) {
                const orderData = {
                    cart: cart,
                    total: total,
                    address: $('#address').val()
                };

                $.ajax({
                    url: 'api/orders/create.php',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(orderData),
                    success: function(res) {
                        if (res.success) {
                            alert('تم تسجيل طلبك بنجاح! شكراً لتعاملك معنا.');
                            localStorage.removeItem('cart');
                            location.href = 'index.html';
                        } else {
                            alert(res.message);
                        }
                    },
                    error: function() {
                        alert('حدث خطأ أثناء إرسال الطلب');
                    }
                });
            }
        });
    </script>
</body>
</html>
