<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.more-btn').forEach(button => {
            button.addEventListener('click', function () {
                const productName = this.getAttribute('data-product-name');
                const productManufacturer = this.getAttribute('data-product-manufacturer');
                const productQuantity = this.getAttribute('data-product-quantity');
                const productPrice = this.getAttribute('data-product-price');
                const productImage = this.getAttribute('data-product-image');

                document.getElementById('productName').textContent = productName;
                document.getElementById('productManufacturer').textContent = productManufacturer;
                document.getElementById('productQuantity').textContent = productQuantity;
                document.getElementById('productPrice').textContent = productPrice;

                const productImageElement = document.getElementById('productImage');
                productImageElement.src = productImage;
                productImageElement.alt = productName;
            });
        });
    });
</script>