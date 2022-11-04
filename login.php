<?php
include("./oauth/cookieValidation.php");

if($validated){
    header("Location: ./shop/search");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/n_login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Secular+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/media.css">
    <link rel="shortcut icon" href="./img/bayadera partes.png" type="image/x-icon">
    <title>Bayadera partes - Login</title>
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

                    <div id="state_user<?php echo "" ?>">
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
    <div class="main">
        <div class="border">
            <div class="container">
                <form action="./oauth/oathuser" method="get">
                    <div class="title">
                        <h1>Inicia sesion</h1>
                    </div>

                    <input type="text" name="rand_stuff" value="3a749ca0ea55eaaad3a749ca0ea55eaaad918cc8dc59476043a749ca0ea55eaaad918cc8dc5947604918cc8dc59476043a749ca0ea55eaaad918cc8dc59476043a749ca0ea55eaaad918cc8dc59476043a749ca0ea55eaaad918cc8dc59476043a749ca0ea55eaaad918cc8dc5947604" style="display: None;">

                    <div class="input2">
                        <div class="cont_in">
                            <input type="text" id="input2_f" name="email"  pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$" title="ejemplo@gmail.com" id="email" placeholder=" " required autocomplete="off">
                            
                            <div class="placeholder">
                                <h6 id="email_holder">Correo electronico</h6>
                            </div>
                            
                        </div>
                        
                    </div>




                    <div class="input1">
                        <div class="cont_in" id="cont_2">
                            <input type="text"  id="input1_f" name="sec_key" id="sec_key" placeholder=" " required autocomplete="off" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!#%*?&])[A-Za-z\d$@$!#%*?&]{8,15}[^\s]$" title="Minimo 8 caracteres Maximo 15 , Al menos una letra mayúscula , Al menos una letra minucula , Al menos un dígito , No espacios en blanco , Al menos 1 caracter especial">
                            <div class="placeholder" id="pass_place">
                                <h6 id="pass_holder">Contraseña</h6>
                            </div>
                        </div>

                        <div id="show_pass">
                            <p><i style="margin-left: 2px;" onmousedown="toggle_pass()" onmouseup="toggle_pass()" class="fa-solid fa-eye"></i></p>
                        </div>
                    </div>


                    <div class="input3">
                        <input type="submit" id="submit" value="Iniciar sesion">
                        <div class="ses-msg">
                            <p style="color: #d7d7d7;">No tienes una cuenta? <a style="top:-1px;position:relative" href="./register">Registrate ya</a></p>
                        </div>
                    </div>


                </form>


            </div>
        </div>
</body>

</html>
<script>
    var btn = document.getElementsByClassName('input2')[0];
    var text = document.getElementById('input2_f');

    btn.addEventListener('click', function() {
        text.focus();
    });

    var btn2 = document.getElementsByClassName('input1')[0];
    var text2 = document.getElementById('input1_f');

    btn2.addEventListener('click', function() {
        text2.focus();
    });

</script>