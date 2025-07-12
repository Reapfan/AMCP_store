<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include_once 'header.php';
        include_once 'dropdownMenu.php';
    ?>

    <div class="album py-5 bg-light" bis_skin_checked="1">
        <div class="container" bis_skin_checked="1">
            <?php
            $host = "your_host";
            $port = "your_port";
            $dbname = "store_db";
            $user = "your_user";
            $password = "your_password";

            $con = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

            if (!$con) {
                die("Ошибка подключения к базе данных.");
            }

            $manufacturer = isset($_GET['manufacturer']) ? $_GET['manufacturer'] : null;

            if ($manufacturer){
                $query = "SELECT id, pr_name, quantity, price, image_url, manufacturer FROM product
                          WHERE manufacturer = $1 ORDER BY id";
                $params = [$manufacturer];
                $res = pg_query_params($con, $query, $params);
            } else{
                $query = "SELECT id, pr_name, quantity, price, image_url, manufacturer FROM product 
                          ORDER BY id";
                $res = pg_query($con, $query);
            }


            echo '<div class="row" bis_skin_checked="1">';

            while ($row = pg_fetch_assoc($res)) {
                $disabled = ($row['quantity'] <= 0) ? 'disabled' : '';

                echo '
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
        <div class="card h-100 d-flex flex-column shadow-sm">
            <img class="card-img-top" src="' . htmlspecialchars($row['image_url']) . '" alt="' . htmlspecialchars($row['pr_name']) . '" style="height: 225px; width: 100%; object-fit: cover;">
            <div class="card-body d-flex flex-column">
                <p class="card-text">' . htmlspecialchars($row['pr_name']) . '</p>
                <div class="mt-auto">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary buy-btn"
                             data-product-id="' . $row['id'] . '" ' . $disabled . '>Buy</button>
                             <button type="button" class="btn btn-sm btn-outline-secondary mr-1 more-btn"
                             data-toggle="modal" data-target="#productModal"
                             data-product-id="' . $row['id'] . '" data-product-name="' . htmlspecialchars($row['pr_name']) . '"
                             data-product-manufacturer="' . htmlspecialchars($row['manufacturer']) . '"
                             data-product-quantity="' . $row['quantity'] . '" data-product-price="' . $row['price'] . '"
                             data-product-image="' . htmlspecialchars($row['image_url']) . '">More</button>
                        </div>
                        <small class="text-muted ml-2">' . htmlspecialchars($row['price']) . ' PUM</small>
                    </div>
                </div>
            </div>
        </div>
    </div>';
            }

            include_once 'buyScript.php';
            include_once 'buyProduct.php';
            include_once 'moreScript.php';
            include_once 'morePage.php';

            echo '</div>';


            ?>
        </div>
    </div>

    <?php
    include_once 'footer.php'
    ?>

</body>
</html>


