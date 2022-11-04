<?php

$path_connect = "./mysql/connect.php";
include("./oauth/cookieValidation.php");


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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Secular+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/n_index.css">
    <link rel="stylesheet" href="./css/media.css">
    <link rel="shortcut icon" href="./img/bayadera partes.png" type="image/x-icon">
    <title>Bayadera Partes - Inicio</title>
</head>

<body>
    <header>
        <nav>

            <div class="header_container_bot">
                <div class="container_bot">
                    <div style="border:0">
                        <a href="./shop/sellerproduct">Panel de vendedor</a>
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
                <a href="./shop/search">
                <div id="logo_div">
                    <h1>bayadera Partes </h1><img class="icon2" src="./img/shopbag.svg" alt="">
                </div>
                </a>


                <div id="input_div">
                    <input type="text">
                </div>
                <div id="icon_div" onclick="location.href='./shop/cart'">
                    <img src="./icons/cart-shopping-solid-svg.svg" alt="" width="20px" class="icon">
                </div>
            </div>



        </nav>


    </header>
    <div class="main_container">
        <div class="start_page">
            <div class="img_fade">
                <img src="./img/carro2.jpg" alt="">
            </div>
            <div>
                <div class="external_bd">
                    <div>
                        <h1>Bayadera partes </h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi vel temporibus, exercitationem autem est odit alias, possimus tempore voluptatibus, vitae saepe. Modi ducimus quo asperiores architecto nisi! Harum, nobis impedit.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="info">
            <div class="anim_effect1" id="anim">
                <div class="info_page1">
                    <div>
                        <img src="./img/fast_storyset.png" alt="">
                    </div>
                    <div>
                        <h2>
                            loremp
                        </h2>
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis illum officia totam repellat deserunt voluptates porro id, nisi, optio inventore quae debitis. Ipsa, aut facere! Aliquid possimus perferendis quibusdam repudiandae!
                        </p>
                    </div>
                </div>
            </div>

            <div class="anim_effect2" id="anim">
                <div class="info_page2">
                    <div>
                        <img src="./img/fast_delivery.png" alt="">
                    </div>
                    <div>
                        <h2>
                            loremp
                        </h2>
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis illum officia totam repellat deserunt voluptates porro id, nisi, optio inventore quae debitis. Ipsa, aut facere! Aliquid possimus perferendis quibusdam repudiandae!
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="anim_effect3" id="anim">
                <div class="info_page1">
                    <div>
                        <img src="./img/Treasure-rafiki.png" alt="">
                    </div>
                    <div>
                        <h2>
                            loremp
                        </h2>
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis illum officia totam repellat deserunt voluptates porro id, nisi, optio inventore quae debitis. Ipsa, aut facere! Aliquid possimus perferendis quibusdam repudiandae!
                        </p>
                    </div>
                </div>
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
</body>

</html>

<script>
    s = null
    const observer = new IntersectionObserver(entries => {
        let lock = false;
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.setAttribute("id", "animOff")
                lock = true;
            } else {


            }
        });
    });

    observer.observe(document.querySelector('.anim_effect1'));
    observer.observe(document.querySelector('.anim_effect2'));
    observer.observe(document.querySelector('.anim_effect3'));
</script>