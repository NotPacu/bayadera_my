<?php

$path_connect = "./../mysql/connect.php";
include("./../oauth/cookieValidation.php");


if ($validated and $user_id) {
    $result = mysqli_query($connection, "SELECT user_info_json from users where user_id=$user_id;");
    $result_fetch = mysqli_fetch_all($result);

    if ($result_fetch) {
        $info = $result_fetch[0][0];
        $info_json = json_decode($info, true);
        $nickname = $info_json["nickname"];
    }
}
function no_session()
{
    header('Location: ' . "./../login");
}

if (!isset($user_id)) {

    echo "no set";
    no_session();
    exit;
}
if ($user_id == "") {

    echo "no set";
    no_session();
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Secular+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./../css/inspecc.css">
    <link rel="stylesheet" href="../css/search.css">
    <link rel="shortcut icon" href="./img/bayadera partes.png" type="image/x-icon">
    <link rel="stylesheet" href="./../css/media.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/cart.css">
    <title>Carrito</title>
</head>

<body>
    <header>
        <nav>

            <div class="header_container_bot">
                <div class="container_bot">
                    <div style="border:0">
                        <a href="./sellerproduct" id="active_li">Panel de vendedor</a>
                    </div>
                    <div>
                        <a href="">Vender aquí</a>
                    </div>
                    <div>
                        <a href="">Redes sociales</a>
                    </div>
                </div>
                <div class="container_bot">
                    <div style="border:0" id="state_<?php echo isset($user_id) ?>">
                        <a href="./register">Registrarse</a>
                    </div>
                    <div id="state_<?php echo isset($user_id) ?>">
                        <a href="./login">Iniciar session</a>
                    </div>

                    <div id="state_user<?php echo isset($user_id) ?>">
                        <a href=""><?php if (isset($nickname)) {
                                        echo $nickname;
                                    } ?></a>
                    </div>
                </div>

            </div>
            <div class="header_container_top">
                <a href="./../shop/search">
                    <div id="logo_div">
                        <h1>bayadera Partes </h1><img class="icon2" src="./../img/shopbag.svg" alt="">
                    </div>
                </a>


                <div id="input_div">
                    <input type="text">
                </div>

                <div id="icon_div" onclick="location.href='./cart'">
                    <img src="./../icons/cart-shopping-solid-svg.svg" alt="" width="20px" class="icon">
                </div>
            </div>



        </nav>


    </header>
    <main>
        <div class="orders_panel">
            <h1>Pedidos</h1>
            <?php




            function new_item($img, $name, $price)
            {
                echo "<div class=\"order_item\">
                <div>
                    <img src=\"./../img_pdrc/$img\" alt=\"\">
                </div>
                <div>
                    <h2>$name</h2>
                </div>
                <div>
                    <h3>$price $ cop</h3>
                </div>
            </div>";
            }

            $query = "SELECT `product_id`,`total_price` from orders WHERE client_id  = $user_id";
            $result = mysqli_query($connection, $query);

            foreach ($result as $row) {
                $pdrc_id = $row['product_id'];

                $query_2 = "SELECT `pdrc_sales`,`product_id`,`product_name`,`product_price`,`pdrc_inventory`,`pdrc_city`,`pdrc_approve`,`pdrc_active`,`pdrc_creation_date`,`pictures_list_id` from products where product_id = $pdrc_id";
                $result_ = mysqli_query($connection, $query_2);
                $pdrc_price = null;
                $pdrc_name = null;
                $pdrc_img = null;
                $result_fect = mysqli_fetch_row($result_);



                $pdrc_price = $result_fect[3];
                $pdrc_name = $result_fect[2];
                $pdrc_img = explode(",", $result_fect[9])[0];
                $query_img_q = "SELECT `img_path` FROM `images` WHERE image_id = $pdrc_img";
                $result_img = mysqli_query($connection, $query_img_q);
                $result_fetch_img = mysqli_fetch_all($result_img)[0][0];

                new_item($result_fetch_img, $pdrc_name, $pdrc_price);
            }

            ?>


        </div>

        <div class="orders_panel">
            <h1>Carrito</h1>
            <div class="order_item">
                <div>

                </div>
                <div>
                    <h2 class="title_lf">Parece que no tienes nada en tu carrito de compra :c</h2>
                </div>
            </div>
        </div>

    </main>
</body>

</html>