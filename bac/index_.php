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
    <link rel="stylesheet" href="./css/flickity.min.css">
    <script src="./js/flickity.pkgd.min.js"></script>
    
    <link rel="stylesheet" href="./css/index_fix.css">



    <title>Bayadera Partes</title>
</head>
<body >
    <header>
        <nav>
            <ul>
                <li class="logo"><a href="./shop/search">Tienda<i class="fa-solid fa-bag-shopping"></i></a> </li>
                <li class="search"> <input type="text" name="" id="searchbox"></li>
                <li class="register-link"><a href="./register" >Registrarse <i class="fa-solid fa-plus fa-fw"></i></a></li>
                <li class="login-link"><a href="./login">Entrar <i class="fa-solid fa-arrow-right-to-bracket"></i></a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <div class="external-bd">
            <div>
                <h1> Bayadera Partes </h1>
            </div>
        </div>

        <div id="fool">
            <div>
                
            </div>
        </div>

        <section >
            <article  >
                <div class="container-info" id="anim">
                    <div class="text-container">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident expedita maiores quo? Voluptatem distinctio ratione quos amet velit, et necessitatibus doloremque magni soluta, nobis fuga itaque sunt iusto esse neque?</p>
                    </div>
                    <div>
                        <img loading="lazy" src="./img/example.png" alt="">
                    </div>
                </div>
            </article>
            <hr>
            <article  >
                <div class="container-info2" id="anim">
                    <div class="text-container">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident expedita maiores quo? Voluptatem distinctio ratione quos amet velit, et necessitatibus doloremque magni soluta, nobis fuga itaque sunt iusto esse neque?</p>
                    </div>
                    <div>
                        <img loading="lazy"  src="./img/example.png" alt="">
                    </div>
                </div>
            </article>
            <hr>
            <article  >
                <div class="container-info3" id="anim">
                    <div class="text-container">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident expedita maiores quo? Voluptatem distinctio ratione quos amet velit, et necessitatibus doloremque magni soluta, nobis fuga itaque sunt iusto esse neque?</p>
                    </div>
                    <div>
                        <img loading="lazy" src="./img/example.png" alt="">
                    </div>
                </div>
            </article>
            <div class="gallery js-flickity"
            data-flickity-options='{ "wrapAround": true ,"autoPlay": 3100}'>
            <div class="gallery-cell">
                <img loading="lazy"  src="./img/moto2.jpg" alt="">
            </div>
            <div class="gallery-cell">
                
                <img loading="lazy"  src="./img/mecanico2.jpg" alt="">
            </div>
            <div class="gallery-cell">
                <img loading="lazy"  src="./img/carro1.jpg" alt="">
            </div>
            <div class="gallery-cell">
                <img loading="lazy"  src="./img/mecanico1.jpg" alt="">
            </div>
            <div class="gallery-cell">
                <img loading="lazy"  src="./img/moto5.jpg" alt="">
            </div>
          </div>
        </section>
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
    </main>

 

</body>
</html>

<script>
   
    

    var input = document.getElementsByClassName("search")[0];
    var searchbox = document.getElementById("searchbox");

    searchbox.onfocus = function(e){
        input.setAttribute("id","SarchON");
        
    }
    searchbox.addEventListener("focusout", function(){
        input.setAttribute("id","SarchOFF");
        
    });
    s = null
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.setAttribute("id","animOff")
        }else{
            entry.target.setAttribute("id","anim")
        }
        });
    });

    // Tell the observer which elements to track
    observer.observe(document.querySelector('.container-info'));
    observer.observe(document.querySelector('.container-info2'));
    observer.observe(document.querySelector('.container-info3'));


</script>


