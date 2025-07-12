<script>
    document.getElementById('addProductForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch('addProduct.php', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.text())
            .then(message => {
                alert(message);
                $('#addProductModal').modal('hide');
                location.reload();
            })
            .catch(error => {
                console.error('Ошибка:', error);
                alert('Произошла ошибка при добавлении товара.');
            });
    });
</script>
