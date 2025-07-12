<?php
ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = "your_host";
$port = "your_port";
$dbname = "store_db";
$user = "your_user";
$password = "your_password";

$con = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$con) {
    die("Ошибка подключения к базе данных.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    $query = "UPDATE product SET quantity = quantity - 1 WHERE id = $1 AND quantity > 0";
    $params = [$product_id];
    $res = pg_query_params($con, $query, $params);

    if ($res) {
        echo "Товар успешно куплен!";
    } else {
        echo "Ошибка при покупке товара: " . pg_last_error($con);
    }
}

pg_close($con);
?>