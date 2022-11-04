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
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/upload_prdc.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Secular+One&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./../img/bayadera partes.png" type="image/x-icon">
    <link rel="stylesheet" href="./../css/media.css">
    <title>Bayadera partes - Subir producto</title>
</head>

<body>

    <body>
        <header>
            <nav>
                <div class="header_container_bot">
                    <div class="container_bot">
                        <div style="border:0">
                            <a href="javascript:void(0)" style="pointer-events: none" id="active_li" disabled>Panel de vendedor</a>
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
            <a href="./sellerproduct.php" class="back_link">
                <img class="back_icon" src="./../icons/arrow-left-solid.svg" alt="">
            </a>
            <div class="all_form" id="all_form_container">
                <div class="title_div">
                    <h1>Subir producto</h1>
                </div>
                <form action="./product/add" method="post" enctype="multipart/form-data" id="form_data_semder">
                    <div class="image_wrap">
                        <label for="img0" class="selector_img">
                            <div id="add_btn">
                                <img src="./../icons/circle-plus-solid-svg.svg" alt="" id="add_btn">
                            </div>
                        </label>
                        <div class="file_cont_div">
                            <input type="file" name="file0" id="img0" accept="image/jpeg" style="display: none;" required>
                            <img src="#" id="img0_show" class="img_list" hidden>
                        </div>
                    </div>
                    <div style="display: flex;">
                        <div class="info_prdc" style="border-right: 1px solid gray;">
                            <div class="info_item">
                                <input type="text" name="prdc_name" id="prdc_name" required pattern="^[a-zA-z0-9\s]{3,70}$" title="maximo 45 caracteres y sin caracteres especiales">
                                <label for="prdc_name">Nombre del producto</label>
                            </div>
                            <div class="info_item">
                                <input type="number" name="pdrc_price" id="pdrc_price" min="5000" value="5000" required pattern="^[0-9]{3,17}$" title="no puedes pasar de 17 digitos">
                                <label for="pdrc_price">Precio del producto</label>
                            </div>
                            <div class="info_item">
                                <textarea name="prdc_description" autoc="off" id="prdc_description" minlength=10 maxlength=1000 cols="30" rows="10" pattern='^.{3,1001}$' title="debe tener de 10 a 1000 caracteres" required></textarea>
                                <label for="prdc_description">Descripcion del producto</label>
                            </div>
                        </div>

                        <div class="info_prdc" style="border-right: 1px solid gray;">
                            <div class="info_item">
                                <input type="number" name="prdc_invent" id="prdc_invent" max="999"  required maxlength="3" onkeydown="return event.key != 'Enter';">
                                <label for="prdc_invent">Inventario <br> <i>(cantidad del producto)</i></label>
                            </div>
                            <div class="info_item">
                                <input type="text" name="prdc_tags" id="prdc_tags" placeholder="Tag" pattern="^[a-zA-z]{3,15}$" title="No debe tener numeros ni caracteres especiales" disabled required>
                                <label id="dsbl_label" for="prdc_tags">Etiquetas <i id="info_tag" style="font-size: 1vw;margin-left: 0.5vw;">?</i> <i style="font-size: 0.7vw;">Las etiquetas sirven para que tu producto sea<br>encontrado por personas interesadas en el</i></label>

                            </div>

                        </div>
                    </div>
                    <div style="display: flex;">
                        <div class="info_prdc">
                            <div class="info_item">
                                <select name="pdrc_city" id="pdrc_city">
                                    <option value="Medellin">Medellin</option>
                                    <option value="Itagüi">Itagüi</option>
                                    <option value="Estrella">Estrella</option>
                                    <option value="Bello">Bello</option>
                                    <option value="barrancabermeja">barrancabermeja</option>
                                    <option value="Sabaneta">Sabaneta</option>



                                </select>
                                <label for="prdc_city">Municipio</label>
                                    
                            </div>
                            
                            <div class="info_item" id="pdrc_add_item_clss">
                                <div class="prdc_type_div">
                                    <input  type="text" name="prdc_types" id="prdc_types" value="" pattern="^[a-zA-z0-9]{3,15}$" disabled><button id="button_add_type"><b>+</b></button>
                                </div>
                               
                                <label id="dsbl_label" id="prdc_types_label" for="prdc_types">Añadir variacion</label>
                            </div>

                        </div>


                        

                </form>
                <input type="submit" value="Enviar" name="submit" id="submit_btn" >


            </div>
            <div class="upload_sbtn">
                <label id="upload_label_btn" for="submit" onclick="send_all()">Subir producto</label>
                <label id="pre_see_label_btn" for="">Previsualizar</label>
            </div>
        </main>
    </body>

</html>
<script>
    id_index = 0;
    active_alert = true;
    window.addEventListener("beforeunload", function(e) {
        if(active_alert){
            var confirmationMessage = '';
            (e || window.event).returnValue = confirmationMessage; //Gecko + IE
            return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
        }

    });
    
    function update_img() {
        img1 = document.getElementById("img" + id_index);
        img1_frame = document.getElementById("img" + id_index.toString() + "_show");
        img1_frame.hidden = true;
        if (id_index > 0) {
            img1.required = false;
        }
        div_img = document.getElementsByClassName("file_cont_div")[0];
        clone_sle = div_img.cloneNode(true);
        clone_sle.childNodes[1].id = "img" + (id_index + 1);
        clone_sle.childNodes[3].id = "img" + (id_index + 1) + "_show";
        clone_sle.childNodes[3].src = "#";
        clone_sle.childNodes[1].name = "file" + id_index;
        label_for = document.getElementsByClassName("selector_img")[0];
        img1.onchange = function() {
            [file] = img1.files;
            if (file) {
                img1_frame.hidden = false;
                img1.onchange = function() {}
                img1_frame.src = URL.createObjectURL(file);
                if (id_index !== 4) {
                    id_index += 1;
                    label_for.setAttribute("for", "img" + id_index);
                    document.getElementsByClassName("image_wrap")[0].appendChild(clone_sle);
                    update_img();
                } else {
                    label_for.setAttribute("for", "img" + -1);
                }
            }
        }
    }
    update_img();
    update_img();

    function send_all(){
        if (id_index <= 1){
            window.alert("Necesitas almenos 2 imagenes para tu producto");
            return 0;
        }
        active_alert=true;
        if(window.confirm("Estas seguro que quieres subir tu producto, verifica que esté todo bien antes de subirlo")){
            active_alert = false
            document.getElementById('submit_btn').click();
            return 0;
        }

    }
</script>