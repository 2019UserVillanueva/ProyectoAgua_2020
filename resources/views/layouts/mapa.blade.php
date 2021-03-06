<!DOCTYPE html>
<html>
<head>


    <link rel="stylesheet" href="responsive/css/style.css">
    <script src="leaflet/leaflet.js"></script>
    <link rel="stylesheet" href="leaflet/leaflet.css"/>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MAPA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="responsive/css/style.css">
    <style>
        #map {
            width: 60%;
            height: 400px;
            box-shadow: 5px 5px 5px #888;
        }

        h1 {
            color: green;
        }

        h2 {
            font-family: Impact;
        }

        body {
            text-align: center;
        }
    </style>

</head>


<body>

<div id="fb-root"></div>
<script async defer crossorigin="anónimo" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v7.0"></script>

<header class="full-width NavBarP">
    <div class="full-width NavBarP-Logo"><a style="color:white;" href="{{ url('/') }}">
            Cha´an Ha
        </a></div>
    <nav class="full-width NavBarP-Nav">

        <ul class="full-width list-unstyled">
            @if (Route::has('login'))

                @auth
                    <li><a href="{{ url('/home') }}">Home </a></li>
                @else
                <!--<li><a href="{{ route('login') }}">Iniciar Sesión</a></li>-->

                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Registro</a></li>
                    @endif
                @endauth

            @endif

        </ul>
    </nav>


</header>


<h1>BIENVENIDOS</h1>


<p>
    Conoce las acciones que realiza la Facultad de Ingeniería para el consumo responsable del agua. Da clic en el mapa.
</p>


<hr>


<div align="center">
    <table>
        <tr>
            <th>LOGO</th>
            <th>Color</th>
            <th>Cantidad en m3</th>
        </tr>
        <tr>
            <td><img src="leaflet/images/oro1.png" alt="" width="30%" height="30%"></td>
            <td>Oro &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>Edificio tiene <= 2500 m3</td>
        </tr>

        <tr>
            <td><img src="leaflet/images/plata1.png" alt="" width="30%" height="30%"></td>
            <td>Plata &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>Edificio tiene > 2500 m3 y < 5000 m3</td>
        </tr>
        <tr>
            <td><img src="leaflet/images/bronce1.png" alt="" width="30%" height="30%"></td>
            <td>Bronce &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>Edificio tiene >= 5000 m3</td>
        </tr>

    </table>

    <br>
    <br>


    <div id="map">
    </div>
</div>


<script>


    var map = L.map('map').setView([19.846244, -90.477483],
        18);


    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
        maxZoom: 18
    }).addTo(map);


    var oro1 = new L.Icon({


        iconUrl: 'leaflet/images/oro1.png',
        iconSize: [40, 40],
        iconAnchor: [15, 50]
    });

    var plata1 = new L.Icon({


        iconUrl: 'leaflet/images/plata1.png',
        iconSize: [40, 40],
        iconAnchor: [15, 50]
    });

    var bronce1 = new L.Icon({


        iconUrl: 'leaflet/images/bronce1.png',
        iconSize: [40, 40],
        iconAnchor: [15, 50]
    });


    <?php   $num = 5;
    $num2 = 10;
    $cantOro = 2500;
    $canPlata = 5000;
    $cantBronce = 5000;
    ?>



    L.control.scale().addTo(map);


    <?php if($categorias <= 2500){ ?>

    L.marker([19.846244, -90.477483], {icon: oro1}).bindPopup( {!!"' Edificio A </br> " .$categorias. " m3'"!!}).openPopup().addTo(map);


    <?php }elseif ($categorias < 5000) {?>

    L.marker([19.846244, -90.477483], {icon: plata1}).bindPopup( {!!"' Edificio A </br> " .$categorias. " m3'"!!}).openPopup().addTo(map);

    <?php }elseif ($categorias >= 5000) {?>

    L.marker([19.846244, -90.477483], {icon: bronce1}).bindPopup( {!!"' Edificio A </br> " .$categorias. " m3'"!!}).openPopup().addTo(map);
    <?php } else { ?>

    <?php } ?>



    <?php if($categorias2 <= 2500){ ?>

    L.marker([19.84634, -90.476968], {icon: oro1}).bindPopup( {!!"' Edificio B </br> " .$categorias2. " m3'"!!}).openPopup().addTo(map);


    <?php }elseif ($categorias2 < 5000) {?>

    L.marker([19.84634, -90.476968], {icon: plata1}).bindPopup( {!!"' Edificio B </br> " .$categorias2. " m3'"!!}).openPopup().addTo(map);

    <?php }elseif ($categorias2 >= 5000) {?>

    L.marker([19.84634, -90.476968], {icon: bronce1}).bindPopup( {!!"' Edificio B </br> " .$categorias2. " m3'"!!}).openPopup().addTo(map);

    <?php } else { ?>

    <?php } ?>



    <?php if($categorias3 <= 2500){ ?>

    L.marker([19.846451, -90.477585], {icon: oro1}).bindPopup({!!"' Edificio C </br> " .$categorias3. " m3'"!!}).openPopup().addTo(map);


    <?php }elseif ($categorias3 < 5000) {?>

    L.marker([19.846451, -90.477585], {icon: plata1}).bindPopup({!!"' Edificio C </br> " .$categorias3. " m3'"!!}).openPopup().addTo(map);

    <?php }elseif ($categorias3 >= 5000) {?>

    L.marker([19.846451, -90.477585], {icon: bronce1}).bindPopup({!!"' Edificio C </br> " .$categorias3. " m3'"!!}).openPopup().addTo(map);

    <?php } else { ?>

    <?php } ?>



    <?php if($categorias4 <= 2500){ ?>

    L.marker([19.846241, -90.476714], {icon: oro1}).bindPopup({!!"' Edificio D </br> " .$categorias4. " m3'"!!}).openPopup().addTo(map);


    <?php }elseif ($categorias4 < 5000) {?>

    L.marker([19.846241, -90.476714], {icon: plata1}).bindPopup({!!"' Edificio D </br> " .$categorias4. " m3'"!!}).openPopup().addTo(map);

    <?php }elseif ($categorias4 >= 5000) {?>

    L.marker([19.846241, -90.476714], {icon: bronce1}).bindPopup({!!"' Edificio D </br> " .$categorias4. " m3'"!!}).openPopup().addTo(map);

    <?php } else { ?>

    <?php } ?>




    <?php if($categorias5 <= 2500){ ?>

    L.marker([19.846726, -90.476751], {icon: oro1}).bindPopup({!!"' Edificio E </br> " .$categorias5. " m3'"!!}).openPopup().addTo(map);


    <?php }elseif ($categorias5 < 5000) {?>

    L.marker([19.846726, -90.476751], {icon: plata1}).bindPopup({!!"' Edificio E </br> " .$categorias5. " m3'"!!}).openPopup().addTo(map);

    <?php }elseif ($categorias5 >= 5000) {?>

    L.marker([19.846726, -90.476751], {icon: bronce1}).bindPopup({!!"' Edificio E </br> " .$categorias5. " m3'"!!}).openPopup().addTo(map);

    <?php } else { ?>

    <?php } ?>




    <?php if($categorias6 <= 2500){ ?>

    L.marker([19.845931, -90.477695], {icon: oro1}).bindPopup( {!!"' Nevería </br> " .$categorias6. " m3'"!!}).openPopup().addTo(map);


    <?php }elseif ($categorias6 < 5000) {?>

    L.marker([19.845931, -90.477695], {icon: plata1}).bindPopup( {!!"' Nevería </br> " .$categorias6. " m3'"!!}).openPopup().addTo(map);

    <?php }elseif ($categorias6 >= 5000) {?>

    L.marker([19.845931, -90.477695], {icon: bronce1}).bindPopup( {!!"' Nevería </br> " .$categorias6. " m3'"!!}).openPopup().addTo(map);

    <?php } else { ?>

    <?php } ?>



    <?php
    $suma;
    $suma = $categorias + $categorias2 + $categorias3 + $categorias4 + $categorias5 + $categorias6;

    ?>


</script>


<hr>


<br>


<div class="container">

    <table class="table table-striped table-hover">
        <tr>
            <th width="30%" bgcolor="#FBD36E" style="text-align:center">Institución Universitaria</th>
            <th width="30%" bgcolor="#FBD36E" style="text-align:center">Sede</th>
            <th width="30%" bgcolor="#FBD36E" style="text-align:center">Medalla</th>
            <th width="70%" bgcolor="#FBD36E" style="text-align:center">Acciones realizadas &nbsp; &nbsp;</th>
        </tr>

        <tr>
            <td align="left"><img src="leaflet/images/uac.png" alt="" width="15%" >


                Universidad Autónoma de Campeche
            </td>


            <td>Facultad de Ingenieria</td>


            <td width="50%"><img src="leaflet/images/oro1.png" alt="" width="15%" >

                Medalla de Oro


            </td>


            <td width="50%" alt="" width="30%" height="30%">Cantidad total en m3: <br/> <?php echo $suma ?> m3</td>

        </tr>

    </table>

</div>
</body>
</html>


