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


?>

<?php
        try{
            $product_price = null;
            $product_name = null;
            $pdrc_inventory = null;
            $pdrc_sales = null;
            $description = null;
            $img_path_f_link = null;

            $pdrc_id = trim($_GET['code']);
            if(!preg_match("/^[0-9]*$/",$pdrc_id)){
                header('Location: '."./search");
            }
            $query = "SELECT `product_id`,`pictures_list_id`,`product_name`,`product_price`,`pdrc_inventory`,`pdrc_sales`,`description` FROM `products` WHERE pdrc_active = 1 and pdrc_approve = 1 and product_id = $pdrc_id";
            $result = mysqli_query($connection,$query);
            while ($row = mysqli_fetch_array($result)) {
                $img_id_un = explode(",",$row['pictures_list_id'])[0];
                $query_img = "SELECT img_path FROM images WHERE image_id = $img_id_un";
                
                $result_img_query = mysqli_query($connection,$query_img);
                if(mysqli_num_rows($result_img_query) != 1){
                    echo "img error" . mysqli_num_rows($result_img_query);
                    exit;
                    
                }
                $img_path_fc = mysqli_fetch_all($result_img_query);
                
                if(!isset($img_path_fc[0][0])){
                    echo "img error";
                    exit;
                }
                $img_path = $img_path_fc[0][0];


                //new_producto(number_format($row['product_price'], 0, ',', '.' ),$row['product_id'],$img_path,$row['description'],$row['product_name'],$row['pdrc_sales']);
                $pdrc_sales = $row['pdrc_sales'];
                $product_price = number_format($row['product_price'],0,",",".");
                $pdrc_inventory = $row['pdrc_inventory'];
                $description = $row['description'];
                $product_name = $row['product_name'];
                $img_path_f_link = $img_path;
            }
        }catch(Exception $e){
            
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
    <title>Document</title>
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
    <a href="./search" class="back_link">
        <img class="back_icon" src="./../icons/arrow-left-solid.svg" alt="">
    </a>

    <main>
        <div class="ext_border">
            <div class="item_pdrc">
                <div>
                    <img src="./../img_pdrc/<?php echo $img_path_f_link?>" alt="">
                </div>

                <div class="pdrc_dist">
                    <div class="pdrc_title">
                        <h1><?php echo $product_name?></h1>
                        <div class="pdrc_price">
                            <div>
                                <p><?php echo $product_price?> $ - cop</p>
                            </div>

                            <div>
                                <p><?php echo $pdrc_sales?> Vendido(s)</p>
                            </div>
                        </div>
                    </div>


                    <div class="button_panel">
                        <div onclick="location.href='buy?pd_id=<?php echo $pdrc_id?>'" class="instant_buy">
                            <P>Comprar ya</P>
                        </div>
                        <div class="add_to_cart">
                            <P>Añadir al carrito</P>
                        </div>
                    </div>
                </div>
            </div>

        </div>
       
        <div class="item_pdrc_advance_info">
            <div class="description">
                <div class="title_bsc">
                <h1>descripción</h1>   <h1 class="inv_title"><?php echo $pdrc_inventory?> :Inventario</h1>  
                </div>
                

                <p><?php echo $description?></p>
            </div>

        </div>
    </main>
</body>

</html>