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

    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Secular+One&display=swap" rel="stylesheet">
    <script src="./js/43ddb05bc0.js" crossorigin="anonymous"></script>
    
    
    <link rel="stylesheet" href="css/register.css">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <title>Bayadera Partes - Registrarme</title>
</head>
<body>
<header>
        <nav> 
            <ul>
                
                <li class="logo"><a href="./shop/search">Tienda <i class="fa-solid fa-bag-shopping"></i></a> </li>
                <li class="search"> <input type="text" name="" id="searchbox"></li>
                <li class="register-link"><a href="" >Registrarse <i class="fa-solid fa-plus fa-fw"></i></a></li>
                <li class="login-link"><a href="./login">Entrar <i class="fa-solid fa-arrow-right-to-bracket"></i></a></li>
            </ul>
        </nav>
    </header>

    <div class="main">
        <div class="border">
          <div class="container">
            <form action="./mysql/adduser" method="get">
                <h1>Registrate</h1>

                <h6>Nombre real</h6>

                <input type="text" name="rand_stuff" value="3a749ca0ea55eaaad3a749ca0ea55eaaad918cc8dc59476043a749ca0ea55eaaad918cc8dc5947604918cc8dc59476043a749ca0ea55eaaad918cc8dc59476043a749ca0ea55eaaad918cc8dc59476043a749ca0ea55eaaad918cc8dc59476043a749ca0ea55eaaad918cc8dc5947604" style="display: None;">

                <input type="text" name="real_name" id="real_name" placeholder="Juanito Peréz" required autocomplete="off" maxlength="45">
                <span class="sl1"></span>
                
                <h6>Número de telefono</h6>
                <input type="text" name="phone" id="phone" placeholder="304-123-4567" required autocomplete="off" maxlength="10">
                <span class="sl2"></span>

                <h6>Fecha de nacimiento</h6>
                <input type="date" name="bird_datetime" id="bird_datetime" placeholder="26/08/2005" required autocomplete="off" min="1930-01-01"  max="2004-12-31" onkeydown="return false">
                <span class="sltime"></span>

                <h6>Correo electronico</h6>
                <input type="email" name="email" id="email" placeholder="correo@electronico.co" required autocomplete="off">
                <span class="sl5"></span>
                
                <h6>Apodo o nombre de usuario</h6>
                <input type="text" name="nickname" id="nickname" placeholder="pepa3223" required autocomplete="off">
                <span class="sl3"></span>

                <h6>Contraseña</h6>
                <input type="password" name="sec_key" id="sec_key" placeholder="contraseña" required autocomplete="off" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!#%*?&])[A-Za-z\d$@$!#%*?&]{8,15}[^\s]$" title="Minimo 8 caracteres Maximo 15 , Al menos una letra mayúscula , Al menos una letra minucula , Al menos un dígito , No espacios en blanco , Al menos 1 caracter especial">
                <span class="sl4"></span>


                <p>Aceptas todos los <a href="">Terminos y condiciones</a> <input type="checkbox" name="eula" id="eula" required></p>
                <input type="submit" id="submit" value="Registrarme">


                <div class="ses-msg">
                    <p >Ya tienes una cuenta? <a href="./login">Inicia sesion</a></p>
                </div>
                
            </form>     
        </div>  
        </div>
        
    </div>
    <footer >
            
        <div class="foot-cont" >
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

</body>
</html>