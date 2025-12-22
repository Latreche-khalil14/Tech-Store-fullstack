$(document).ready(function() {
    // التحقق من حالة تسجيل الدخول
    checkAuth();
    loadFeaturedProducts();
    updateCartIcon();

    // تسجيل الخروج
    $('#logout-btn').on('click', function() {
        localStorage.removeItem('user');
        $.post('api/auth/logout.php', function() {
            window.location.reload();
        });
    });

    function checkAuth() {
        const user = JSON.parse(localStorage.getItem('user'));
        if (user) {
            $('#user-nav').html(`<a href="#">مرحباً، ${user.username}</a>`);
            $('#logout-btn').show();
        }
    }

    function loadFeaturedProducts() {
        $.ajax({
            url: 'api/products/get_all.php?limit=4',
            method: 'GET',
            success: function(response) {
                if (response.success) {
                    const products = response.data.products;
                    let html = '';
                    products.forEach(p => {
                        html += `
                            <div class="product-card" onclick="location.href='product-details.html?id=${p.id}'" style="cursor:pointer">
                                <div class="product-image">🖼️</div>
                                <div class="product-info">
                                    <h3>${p.name}</h3>
                                    <p class="price">${p.price} $</p>
                                    <button class="btn-add" onclick="event.stopPropagation(); addToCart(${p.id})">أضف للسلة</button>
                                </div>
                            </div>
                        `;
                    });
                    $('#featured-products').html(html);
                }
            }
        });
    }
});

// وظائف السلة (تستخدم في كل الصفحات)
function addToCart(productId) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let item = cart.find(i => i.id === productId);
    
    if (item) {
        item.quantity += 1;
    } else {
        cart.push({ id: productId, quantity: 1 });
    }
    
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartIcon();
    alert('تمت الإضافة للسلة بنجاح!');
}

function updateCartIcon() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let count = cart.reduce((total, item) => total + item.quantity, 0);
    $('.cart-count').text(count);
}
