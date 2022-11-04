<?php

$path_connect = "./../mysql/connect.php";
include("./../oauth/cookieValidation.php");


if($validated and $user_id){
    $result = mysqli_query($connection,"SELECT user_info_json from users where user_id=$user_id;");
    $result_fetch = mysqli_fetch_all($result);
    
    if($result_fetch){
        $info =$result_fetch[0][0];
        $info_json = json_decode($info,true);
        $nickname = $info_json["nickname"];
        
    }
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Secular+One&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/search.css">
    <link rel="shortcut icon" href="./img/bayadera partes.png" type="image/x-icon">
    <link rel="stylesheet" href="./../css/media.css">
    <title>Bayadera Partes - Buscar</title>
</head>

<body>
    <header>
        <nav>

            <div class="header_container_bot">
                <div class="container_bot">
                    <div style="border:0">
                        <a href="./sellerproduct">Panel de vendedor</a>
                    </div>
                    <div>
                        <a href="">Vender aquí</a>
                    </div>
                    <div>
                        <a href="">Redes sociales</a>
                    </div>
                </div>
                <div class="container_bot">
                    <div style="border:0" id="state_<?php echo isset($user_id)?>">
                        <a href="./../register">Registrarse</a>
                    </div>
                    <div id="state_<?php echo isset($user_id)?>">
                        <a href="./../login">Iniciar session</a>
                    </div>

                    <div id="state_user<?php echo isset($user_id)?>" >
                        <a href=""><?php if (isset($nickname)) {
                                        echo $nickname;
                                    } ?> </a>
                    </div>
                </div>

            </div>
            <div class="header_container_top">
                <div id="logo_div">
                    <h1>bayadera Partes</h1> <img class="icon2" src="./../img/shopbag.svg" alt="">
                </div>

                <div id="input_div">
                    <input type="text">
                </div>

                <div id="icon_div" onclick="location.href='./cart'">
                    <img src="../icons/cart-shopping-solid-svg.svg" alt="" width="20px" class="icon">
                </div>
            </div>



        </nav>
    </header>

    <div class="main_container">
        <div class="container">
            <div class="categories">
                <div>
                    <h4>Categorias similares</h4>
                    <ul>
                        <li><input type="checkbox" name="" id=""> Filtro 1</li>
                        <li><input type="checkbox" name="" id=""> Filtro 2</li>
                        <li><input type="checkbox" name="" id=""> Filtro 3</li>
                        <li><input type="checkbox" name="" id=""> Filtro 4</li>
                    </ul>
                </div>
                <hr>
                <div>
                    <h4>Filtros</h4>
                    <ul>
                        <li> <input type="checkbox" name="" id=""> Menor precio</li>
                        <li> <input type="checkbox" name="" id=""> Mayor precio</li>
                        <li> <input type="checkbox" name="" id=""> Mejor puntuacion</li>
                        <li> <input type="checkbox" name="" id=""> Más vendido</li> 
                    </ul>
                </div>
                <hr>


            </div>

            <div class="product">
                <?php
                function new_producto($price,$id,$img_path,$description,$name,$total_sales){
                    echo "
                <div class='item'  onclick=\"location.href='inspecc?code=$id' \">
                    <div class='item_img'>
                        <img src='./..//img_pdrc/$img_path' alt=''>
                    </div>
                    <div class='item_description' id='title_description'>
                        <p>$name</p>
                        
                    </div>
                    <div class='item_description' >
                        <p>$description</p>

                    </div>
                    <div class='price_div'>
                        <p class='price_text'>$price cop</p>
                        <p class='sales_text'><span>$total_sales </span> Vendido(s)</p>
                    </div>
                </div>
                ";
                

                }
                try{
                    $query = "SELECT `product_id`,`pictures_list_id`,`product_name`,`product_price`,`pdrc_inventory`,`pdrc_sales`,`description` FROM `products` WHERE pdrc_active = 1 and pdrc_approve = 1 limit 25";
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


                        new_producto(number_format($row['product_price'], 0, ',', '.' ),$row['product_id'],$img_path,$row['description'],$row['product_name'],$row['pdrc_sales']);

                    }
                }catch(Exception $e){
                    echo "s";
                }
                ?>
                
            </div>
        </div>
    </div>
    <footer >
            
            <div class="foot-cont">
                <div>
                    <ul>
                        <li><h1>Redes sociales</h1></li>
                        <li><a href="">Facebook</a></li>
                        <li><a href="">Twitter</a></li>
                        <li><a href="">Instagram</a></li>
                    </ul>
                </div>
                <div>
                    <ul>
                        <li><h1>Ayuda</h1></li>
                        <li><a href="">Contactanos</a></li>
                        <li><a href="">Quienes somos</a></li>
                        <li><a href="">Politica de privacidad</a></li>
                    </ul>
                </div>
                <div>
                    <ul>
                        <li><h1>Extra</h1></li>
                        <li><a href="">Informar un error</a></li>
                        <li><a href=""></a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="foot-rhg">
                <h6>Bayadera Partes ©</h6>
            </div>
        </footer>
        <div class="add_div" id="active<?php echo isset($_GET['code'])?>">
                <p>Su compra ha sido realizada exitosamente</p>
        </div>
</body>

</html>
<script>
    function printMousePos(event) {
        var elem = document.getElementsByClassName("add_div")[0];
  elem.parentNode.removeChild(elem);
}

document.addEventListener("click", printMousePos);
</script>