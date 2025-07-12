<script>
    document.querySelectorAll('.buy-btn').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');

            fetch('buyProduct.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `product_id=${productId}`,
            })
                .then(response => response.text())
                .then(message => {
                    alert(message);
                    location.reload();
                })
                .catch(error => {
                    console.error('Ошибка:', error);
                    alert('Произошла ошибка при покупке товара.');
                });
        });
    });
</script>
