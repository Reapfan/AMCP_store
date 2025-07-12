<div class="my-2 ml-4 d-flex justify-content-start align-items-center">
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle mr-4" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Выбрать производителя
        </button>
        <div class="dropdown-menu">
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
            $query = "SELECT manufacturer FROM product GROUP BY manufacturer ORDER BY manufacturer ";
            $res = pg_query($con, $query);

            while ($row = pg_fetch_assoc($res)){
                echo '<a class="dropdown-item" href="/CoolStore/CoolStore/homePage.php/?manufacturer='.htmlspecialchars(($row['manufacturer'])).'">'.htmlspecialchars(($row['manufacturer'])).'</a>';
            }

            pg_close($con);
            ?>
        </div>

        <a href="/CoolStore/CoolStore/homePage.php" class="btn btn-secondary mr-4">Сбросить фильтр</a>
        <button type="button" class="btn btn-secondary mr-4" data-toggle="modal" data-target="#addProductModal">Добавить продукт</button>
        <?php
        include_once 'addProductForm.php'
        ?>
        <?php
        include_once 'addProductFinal.php'
        ?>
    </div>
</div>
