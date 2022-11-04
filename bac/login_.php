

<?php
include("./oauth/cookieValidation.php");

if($validated){
    header("Location: ./shop/search");
}

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
    <script src="./js/43ddb05bc0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css" loading="lazy">

    <link rel="stylesheet" href="css/register.css">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <link rel="stylesheet" href="./css/login.css">
    
    <title>Bayadera Partes - Iniciar sesion</title>
</head>

<body>
    <header>

        <nav>


            <ul>

                <li class="logo"><a href="./shop/search">Tienda <i class="fa-solid fa-bag-shopping"></i></a> </li>
                <li class="search"> <input type="text" name="" id="searchbox"></li>
                <li class="register-link"><a href="./register">Registrarse <i class="fa-solid fa-plus fa-fw"></i></a></li>
                <li class="login-link"><a href="">Entrar <i class="fa-solid fa-arrow-right-to-bracket"></i></a></li>
            </ul>
        </nav>
    </header>

    <div class="main">
        <div class="border">
            <div class="container">
                <form action="./oauth/oathuser" method="get">
                    <h1>Inicia sesion</h1>
                    <input type="text" name="rand_stuff" value="3a749ca0ea55eaaad3a749ca0ea55eaaad918cc8dc59476043a749ca0ea55eaaad918cc8dc5947604918cc8dc59476043a749ca0ea55eaaad918cc8dc59476043a749ca0ea55eaaad918cc8dc59476043a749ca0ea55eaaad918cc8dc59476043a749ca0ea55eaaad918cc8dc5947604" style="display: None;">

                    <br>
                    <div class="placeholder">
                        <h6 id="email_holder">Correo electronico</h6>
                    </div>

                    <div class="cont_in">
                        <input type="text" name="email" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$" title="ejemplo@gmail.com" id="email" placeholder="" required autocomplete="off" onfocus='document.querySelector("#email_holder").style.top = "-1.7vh" ; document.querySelector("#email_holder").style.left = "0.5vh" ;  document.querySelector("#email_holder").style.color = "rgb(255, 160, 35)"
                        ;document.querySelector("#email_holder").style.fontSize = "16px"' onfocusout='down_anim_h6_email()'>
                        <span class="sl5"></span>
                    </div>
                

                    <br><br>
                    <div class="placeholder">
                        <h6 id="pass_holder">Contraseña</h6>
                    </div>

                    <div class="cont_in">
                        <input type="password" name="sec_key" id="sec_key" placeholder="" required autocomplete="off" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!#%*?&])[A-Za-z\d$@$!#%*?&]{8,15}[^\s]$" title="Minimo 8 caracteres Maximo 15 , Al menos una letra mayúscula , Al menos una letra minucula , Al menos un dígito , No espacios en blanco , Al menos 1 caracter especial" onfocus='document.querySelector("#pass_holder").style.top = "-1.7vh" ; document.querySelector("#pass_holder").style.left = "0.5vh" ;  document.querySelector("#pass_holder").style.color = "rgb(255, 160, 35) "
                        ;document.querySelector("#pass_holder").style.fontSize = "16px" ' onfocusout='down_anim_h6_pass() ; '>
                        <span class="sl4"></span>
                    </div>
                    <div id="show_pass">
                        <p >Mostrar contraseña <i style="margin-left: 2px;" onmousedown="toggle_pass()" onmouseup="toggle_pass()" class="fa-solid fa-eye"></i></p>
                    </div>
                    

                    <br>
                    <input type="submit" id="submit" value="Iniciar sesion">


                    <div class="ses-msg">
                        <p style="color: #d7d7d7;">No tienes una cuenta? <a style="top:-1px;position:relative" href="./register">Registrate ya</a></p>
                    </div>

                </form>


            </div>
        </div>

    </div>
    <footer>

        <div class="foot-cont">
            <div>
                <ul>
                    <li>
                        <h1>Redes sociales</h1>
                    </li>
                    <li><a href="">Facebook</a></li>
                    <li><a href="">Twitter</a></li>
                    <li><a href="">Instagram</a></li>
                </ul>
            </div>
            <div>
                <ul>
                    <li>
                        <h1>Ayuda</h1>
                    </li>
                    <li><a href="">Contactanos</a></li>
                    <li><a href="">Quienes somos</a></li>
                    <li><a href="">Politica de privacidad</a></li>
                </ul>
            </div>
            <div>
                <ul>
                    <li>
                        <h1>Extra</h1>
                    </li>
                    <li><a href="">Informar un error</a></li>
                    <li><a href=""></a></li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="foot-rhg">
            <h6>Bayadera Partes ©</h6>
        </div>



</body>

</html>


<script>
    email_tick = document.querySelector("#email");
    pass_tick = document.querySelector("#sec_key");

    function update_pos_text() {

    }

    function down_anim_h6_email() {
        document.querySelector("#email_holder").style.color = "rgb(255, 255, 255)";
        if (email_tick.value === "") {
            document.querySelector("#email_holder").style.top = "2.4vh";
            document.querySelector("#email_holder").style.left = "2vh";
            document.querySelector("#email_holder").style.fontSize = "13px";
            document.querySelector("#email_holder").style.color = "rgb(187, 187, 187)";
        }
    };

    function down_anim_h6_pass() {
        document.querySelector("#pass_holder").style.color = "rgb(255, 255, 255)";
        if (pass_tick.value === "") {
            document.querySelector("#pass_holder").style.top = "2.4vh";
            document.querySelector("#pass_holder").style.left = "2vh"
            document.querySelector("#pass_holder").style.fontSize = "13px";
            document.querySelector("#pass_holder").style.color = "rgb(187, 187, 187)";
        }
    };

    function toggle_pass() {
    var x = document.getElementById("sec_key");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}



    //window.addEventListener('resize');
</script>


