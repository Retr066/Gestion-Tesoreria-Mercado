<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mercado las Lomas</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/index.css" >
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
            <div id="section" class="location__header"></div>
            <header class="header">
                    <nav class="header__nav">
                        <div class="header__nav-container">
                        <img class="header__nav-img" src="img/logo.png" alt="logo">
                        <div class="header__nav-container-links">
                            <ul class="header__nav-container-ul">
                            <li class="header__nav-li"><a href="#section">Inicio</a></li>
                            <li class="header__nav-li"><a href="#section-1">Nosotros</a></li>
                            <li class="header__nav-li"><a href="#section-2">Ubicacion</a></li>
                            <li class="header__nav-li"><a href="#section-3">Contactos</a></li>
                            </ul>
                        </div>
                        @if (Route::has('login'))
                        @auth
                        <a class="header__nav-a" href="{{ route('login') }}"><img class="titles__login" src="img/user.svg" alt="user"/></a>
                        @else
                        <a href="{{ url('/dashboard') }}"  class="header__nav-login">Inciar Session</a>

                        {{-- @if (Route::has('register'))
                        <a href="{{ route('register') }}"class="ml-4 text-sm text-gray-700 underline" >Register</a>
                                @endif --}}
                        @endauth
                     @endif
                    </div>
                 </nav>
            </header>
            <section  id="carrusel" class="carrusel-container">

                    <div class="carrusel-container-title">
                       <!--  <img  name="slider" class="carrusel__container-img" src="./img/mercado.jpeg"> -->
                       <h2 class="carrusel-container-title--h2"> Asociacion de Comerciantes las Lomas de Pachacamac</h2>
                    </div>

            </section>
            <section id="section-1" class="us" >

                <div class="us__container-logo">
                    <h2 class="us__container-logo--h2">Asociacion de Comerciantes las Lomas de Pachacamac</h2>
                    <img class="us__container-logo--img"  src="./img/Competition.svg">
                </div>
                <div class="us__container-text">
                    <h2 class="us__container-h2">Nosotros</h2>
                    <p class="us__container-p">Somos el Mercado las Lomas, especialistas en el comercio. Somos una empresa de Villa el Salvador  con más de 30 años de experiencia en la industria del comercio abasteciendo a los clientes más exigentes.
                        <br>
                     Te ofrecemos no solo frescura en los productos, sino también altos estándares de higiene porque sabemos lo importante que es para ti alimentarte y alimentar a otros sanamente.</p>
                </div>
            </section>
            <section id="section-2"  class="location">
                <div class="location__header"></div>
                <h2 class="location__h2 nf-oct-location">PUNTO DE VENTA <i class="fas fa-map-marker-alt"></i></h2>
                <label class="social__name-label"></label>
                <iframe class="location__maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3899.1031255023368!2d-76.92605718587672!3d-12.241296248880948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105bb8b8aea3d77%3A0x8e0fbe3f089a7db6!2sMercado%20Las%20Lomas%20V.E.S!5e0!3m2!1ses!2spe!4v1621834608290!5m2!1ses!2spe"  height="520" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </section>
            <section class="social">
                <div class="social__name">
                    <h2 class="social__name-h2">Asociacion de Comerciantes las Lomas de Pachacamac</h2>

                </div>
                <div id="section-3"  class="social__location">
                    <h3 class="social__location-h3">Ubicacion:</h3>
                    <p class="social__location-p">CAL.139 NRO. S/N URB. PACHACAMAC BARRIO 3 SECT. II LIMA - LIMA - VILLA EL SALVADOR
                    </p>
                </div>
                <div class="social__number">
                    <h2 class="social__number-h2">Numero de Contactos:</h2>
                    <p class="social__number-p">+51 986-247-503</p>
                </div>
                <div class="social__frase">
                    <h3 class="social__frase-h3">Somos una Empresa dedicada al Comercio</h3>
                </div>
            </section>
            <footer class="footer">
                <label class="footer__label">TODOS LOS DERECHOS RESERVADOS-DISEÑO Y DESARROLLO POR @RETR0</label>
            </footer>
            <script type="text/javascript" src="js/index.js"></script>

    </body>
</html>
