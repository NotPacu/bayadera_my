<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/n_register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Secular+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/media.css"><link rel="stylesheet" href="./css/media.css">
    <link rel="shortcut icon" href="./img/bayadera partes.png" type="image/x-icon">
    <title>Bayadera - Registrate</title>
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
                <form action="./mysql/adduser" method="get">
                    <div class="title">
                        <h1>Registrarte</h1>
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



                    <div class="input2">
                        <div class="cont_in" >
                            <input type="text" id="input3_f"  name="real_name"  pattern="^\S[A-Za-z0-9\s]+\S$" title="Debes ingresar un nombre de usuario valido" id="email" placeholder=" " required autocomplete="off">
                            <div class="placeholder">
                                <h6 id="email_holder">Nombre real</h6>
                            </div>
                        </div>
                    </div>

                    <div class="input2">
                        <div class="cont_in">
                            <input type="text" id="input4_f" name="phone"  pattern="^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s-]?\d{4}$"  maxlength="10" title="Debe ingresar un número de telefono valido" id="email" placeholder=" " required autocomplete="off">
                            <div class="placeholder">
                                <h6 id="email_holder">Numero de telfono</h6>
                            </div>
                        </div>
                    </div>

                    <div class="input2">
                        <div class="cont_in">
                            <input type="date" id="input5_f" onkeydown="return false"  min="1930-01-01"  max="2004-12-31" name="bird_datetime"  pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$" title="ejemplo@gmail.com" id="email" placeholder=" " required autocomplete="off">
                            <div class="placeholder">
                                <h6 id="email_holder">Fecha de nacimiento</h6>
                            </div>
                        </div>
                    </div>

                    <div class="input2">
                        <div class="cont_in">
                            <input type="text" id="input6_f" name="nickname" maxlength="23" pattern="(?!.*[\.\-\_]{2,})^[a-zA-Z0-9\.\-\_]{3,24}$" title="ejemplo@gmail.com" id="email" placeholder=" " required autocomplete="off">
                            <div class="placeholder">
                                <h6 id="email_holder">Nombre de usuario</h6>
                            </div>
                        </div>
                    </div>

                    
                    <div class="input3">
                        <input type="submit" id="submit" value="Registrarse">
                        <div class="ses-msg">
                            <p style="color: #d7d7d7;">Ya tienes una cuenta? <a style="top:-1px;position:relative" href="./login">Inicia sesion</a></p>
                        </div>
                    </div>

                    
                    <input type="hidden" name="eula" value="true">

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

    var btn3 = document.getElementsByClassName('input2')[1];
    var text3 = document.getElementById('input3_f');

    btn3.addEventListener('click', function() {
        text3.focus();
    });

    var btn4 = document.getElementsByClassName('input2')[2];
    var text4 = document.getElementById('input4_f');

    btn4.addEventListener('click', function() {
        text4.focus();
    });

    var btn5 = document.getElementsByClassName('input2')[3];
    var text5 = document.getElementById('input5_f');

    btn5.addEventListener('click', function() {
        text5.focus();
    });

    var btn6 = document.getElementsByClassName('input2')[4];
    var text6 = document.getElementById('input6_f');

    btn6.addEventListener('click', function() {
        text6.focus();
    });



</script>