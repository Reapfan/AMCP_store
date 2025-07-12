<?php
ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = "localhost";
$port = "5432";
$dbname = "store_db";
$user = "postgres";
$password = "ramzay04";

$con = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$con) {
    die("Ошибка подключения к базе данных.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_name = basename($_FILES['image']['name']);
        $image_path = __DIR__ . "/pr_img/" . $image_name;

        if (!is_dir(__DIR__ . "/pr_img")) {
            mkdir(__DIR__ . "/pr_img", 0755, true); // Создаём папку, если её нет
        }

        if (move_uploaded_file($image_tmp, $image_path)) {
            $image_path = "/CoolStore/CoolStore/pr_img/" . $image_name;

            $pr_name = $_POST['pr_name'];
            $manufacturer = $_POST['manufacturer'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];

            $query = "INSERT INTO product (pr_name, manufacturer, quantity, price, image_url)
                      VALUES ($1, $2, $3, $4, $5)";
            $params = [$pr_name, $manufacturer, $quantity, $price, $image_path];
            $res = pg_query_params($con, $query, $params);

            if ($res) {
                echo "Товар успешно добавлен!";
            } else {
                echo "Ошибка при добавлении товара: " . pg_last_error($con);
            }
        } else {
            echo "Ошибка при перемещении файла.";
        }
    } else {
        echo "Ошибка при загрузке файла: " . $_FILES['image']['error'];
    }
} else {
    echo "Форма не отправлена или файл не загружен.";
}

pg_close($con);
?>