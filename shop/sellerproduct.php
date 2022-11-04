<?php
$path_connect = "./../mysql/connect.php";
include("./../oauth/cookieValidation.php");

if (!$validated or !isset($user_id)) {
    http_response_code(401);
    include("./../error401.html");
    exit;
    //header("Location: ./trabajofinal/error404.html");
} else {
    $query = "select perm_rol.upload_products from users INNER JOIN perm_rol on perm_rol.id_rol=users.user_rol where user_id='$user_id';";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        http_response_code(401);
        include("./../error401.html");
        exit;
    }

    $result_fetch = mysqli_fetch_all($result);


    if (!isset($result_fetch[0][0])) {
        http_response_code(401);
        include("./../error401.html");
        exit;
    }
    if (!$result_fetch[0][0] == 1) {
        http_response_code(401);
        include("./../error401.html");
        exit;
    }
}

if ($validated and $user_id) {
    $result = mysqli_query($connection, "SELECT user_info_json from users where user_id=$user_id;");
    $result_fetch = mysqli_fetch_all($result);

    if ($result_fetch) {
        $info = $result_fetch[0][0];
        $info_json = json_decode($info, true);
        $nickname = $info_json["nickname"];
    }
}

function invalid_form($msg){
    echo "<br>";
    echo "<br>";
    echo $msg;
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/product_seller_panel.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Secular+One&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./../img/bayadera partes.png" type="image/x-icon">
    <link rel="stylesheet" href="./../css/footer.css">
    <link rel="stylesheet" href="./../css/media.css">
    
    <title>Panel de producto</title>

</head>

<body>
    <header>
        <nav>

            <div class="header_container_bot">
                <div class="container_bot">
                    <div style="border:0">
                        <a href="#" id="active_li">Panel de vendedor</a>
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

        <div class="div_upproducts">
            <div class="title">
                <h1>Gestor de productos</h1>
            </div>
            <div class="item" id="upload_prdc">
                <div class="redirect_upload">
                    <h1><a href="./productadd" id="redirect_link_upload">Subir producto<img src="./../icons/circle-plus-solid-svg.svg" alt=""></a></h1>
                </div>
                <div>
                    <h1><a href="">Ayuda</a></h1>
                </div>
                <i><p class="simple_text"> || "," coma decimal || "." punto de miles ||</p> </i>
            </div>
            <?php
            function new_item($id,$name,$price,$approve,$active,$total_sells,$total_stock,$create_date,$img_path){
                $price = number_format($price, 2, ',', '.' );
                $approve_txt = "No";
                $active_txt = "No";
                if($approve == 1){
                    $approve_txt = "Si";
                }
                if($active == 1){
                    $active_txt = "Si";
                }
                echo ("<div class='item'>
                <div>
                    <img src='./../img_pdrc/$img_path' alt='' id='img_id_size'>
                </div>
                <div>
                    <p class='info'>ID: </p>
                    <p class='simple_text'>$id</p>
                </div>

                <div>
                    <p class='info'>Nombre: </p>
                    <p class='simple_text'>$name</p>
                </div>

                <div>
                    <p class='info'>Precio: </p>
                    <p class='simple_text'>$price $</p>
                </div>

                <div>
                    <p class='info'>Aprovado: </p>
                    <p class='simple_text' id='on_effect_item$approve'>$approve_txt</p>
                </div>

                <div>
                    <p class='info'>Activo: </p>
                    <p class='simple_text' id='on_effect_item$active'>$active_txt</p>
                </div>

                <div>
                    <p class='info'>Total de ventas: </p>
                    <p class='simple_text'>$total_sells</p>
                </div>


                <div>
                    <p class='info'>Total de stock: </p>
                    <p class='simple_text'>$total_stock</p>
                </div>
                <div>
                    <p class='info'>Fecha de creacion: </p>
                    <p class='simple_text'>$create_date</p>
                </div>



                <div class='low_marg'>
                    <input class='edit_btn' type='button' value='Editar'>

                    <input class='rm_btn' type='button' value='Eliminar'>
                </div>

            </div>");
            }
            
            try{
                $query = "SELECT `pdrc_sales`,`product_id`,`product_name`,`product_price`,`pdrc_inventory`,`pdrc_city`,`pdrc_approve`,`pdrc_active`,`pdrc_creation_date`,`pictures_list_id` from products where seller_id = $user_id";
                $result = mysqli_query($connection,$query);
                $result_count = mysqli_num_rows($result);
                if($result_count == 0){
                    echo "<div class='item'>
                    <div>
                    <p class='info'>Parece que no tienes productos..</p>
                </div>
                    </div>";
                }else{
                    foreach($result as $row){
                        $img_path_link = "";
                        $img_id = explode(",",$row['pictures_list_id'])[0];
                        $query = "SELECT `img_path` FROM `images` WHERE image_id = $img_id";
                        $result_img = mysqli_query($connection,$query);
                        $result_fetch_img = mysqli_fetch_all($result_img);
                        if(!$result_img){
                            invalid_form("Algo ha salido mal Cx2");
                        }
                        if(mysqli_num_rows($result_img) != 1){
                            invalid_form("Algo ha salido mal Cx3");
                        }
                        
                        if(!isset($result_fetch_img[0][0])){
                            invalid_form("Algo ha salido mal Cx4");
                        }
                        
                        $img_path_link = $result_fetch_img[0][0];
    
    
                        new_item($row['product_id'],$row['product_name'],$row['product_price'],$row['pdrc_approve'],$row['pdrc_active'],$row['pdrc_sales'],$row['pdrc_inventory'],$row['pdrc_creation_date'],$img_path_link);
                    }
                }
                
            }catch(Exception $e){
                invalid_form("Algo ha salido mal Cx1");
            }
                        ?>
        </div>
    </main>
    <?php
    include("./../assets/footer.php")
    ?>
</body>

</html>

<!--
<script>
window.addEventListener("beforeunload", function (e) {
    var confirmationMessage = 'It looks like you have been editing something. '
                            + 'If you leave before saving, your changes will be lost.';

    (e || window.event).returnValue = confirmationMessage; //Gecko + IE
    return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
});

</script>

new Intl.NumberFormat('es-CO').format(16600123)

-->

<script>
    btn1 = document.getElementsByClassName("redirect_upload")[0];
    link1 = document.getElementById("redirect_link_upload");
    btn1.onclick = function() {
        link1.click();
    }
</script>