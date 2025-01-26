<?php session_start(); 
require "databas-connect.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Script länkar -->

  <script src="projekt.js" defer></script>
  <script src="header&fotter/header.js" defer></script>
 <!--Favicon -->
 <link rel="icon" type="Bilder/glad3arigslav.png" href="Bilder/glad3arigslav.png">

    <!-- Vanlig css -->
    <link rel="stylesheet" href="projekt.css">
    <link rel="stylesheet" href="header&fotter/header.css">
    <link rel="stylesheet" href="header&fotter/fotter.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <title>Portfolio</title>
</head>

<body>
<?php include "header&fotter/header.html" ?>

    <div class="image-container">
        <img src="Bilder/html-css.png" alt="A descriptive text">
        <div class="image-text">Html & Css projekt</div>
    </div>
    <!--
    <div class="under-rubrik">
        <h2> Html Projekten </h2>
    </div>
-->
    <div class="projekt-list">

        <div class="card card-change" style="border:2px solid orange; width: 18rem;">
            <img src="Bilder/html-1.png" class="card-img-top card-img-top-change" alt="...">
            <div class="card-body card-body-change">
                <h5 class="card-title">Fransic Bacon shop</h5>
                <p class="card-text">Det är en 100% fungerande affär där man kan handla fransic bacon merch!</p>
                <a href="#" class="btn btn-primary">Ladda ner</a>
            </div>
        </div>


        <div class="card card-change" style="width: 18rem;">
            <img src="Bilder/html-2.png" class="card-img-top card-img-top-change" alt="...">
            <div class="card-body  card-body-change">
                <h5 class="card-title">Ett Jätte svårt prov</h5>
                <p class="card-text">Det enda som klarade provet var helt galna och världen är en sjuk plats!</p>
                <a href="#" class="btn btn-primary">Ladda ner</a>
            </div>
        </div>

        <div class="card card-change" style="width: 18rem;">
            <img src="Bilder/html-3.png" class="card-img-top card-img-top-change" alt="...">
            <div class="card-body  card-body-change">
                <h5 class="card-title">En uppgift om något som jag inte minns</h5>
                <p class="card-text">Det var jätte Coolt och inte många hade överlevt att skapa det</p>
                <a href="#" class="btn btn-primary">Ladda ner</a>
            </div>
        </div>

        <div class="card card-change" style="width: 18rem;">
            <img src="Bilder/html-4.png" class="card-img-top card-img-top-change" alt="...">
            <div class="card-body  card-body-change">
                <h5 class="card-title">En Makalös uppgift</h5>
                <p class="card-text"> Inga comentarer förutom att jag minns typ inte var det är för något men de är nog ballt</p>
                <a href="#" class="btn btn-primary">Ladda ner</a>
            </div>
        </div>

    </div>

    <div class="image-container">
        <img src="Bilder/php-kod.png" alt="A descriptive text">
        <div class="image-text">PHP:Hypertext Preprocessor projekt</div>
    </div>

    <div class="projekt-list">

        <div class="card card-change" style="border:2px solid orange; width: 18rem;">
            <img src="Bilder/php-1.png" class="card-img-top card-img-top-change" alt="...">
            <div class="card-body card-body-change">
                <h5 class="card-title">Ett PHP Quiz</h5>
                <p class="card-text">Det är 3 quiz som man kan köra och man kan få alla rätt om man vet mycket</p>
                <a href="#" class="btn btn-primary">Ladda ner</a>
            </div>
        </div>


        <div class="card card-change" style="width: 18rem;">
            <img src="Bilder/php-2.png" class="card-img-top card-img-top-change" alt="...">
            <div class="card-body  card-body-change">
                <h5 class="card-title"> En galen Class i php</h5>
                <p class="card-text">Det var helt sjuka egensakaper den här klassen hade man tappar nästan tårna</p>
                <a href="#" class="btn btn-primary">Ladda ner</a>
            </div>
        </div>
    </div>

    <div class="image-container">
        <img src="Bilder/JS-kod.png" alt="A descriptive text">
        <div class="image-text">Java Script</div>
    </div>


    <div class="projekt-list">

        <div class="card card-change" style="border:2px solid orange; width: 18rem;">
            <img src="Bilder/snake.png" class="card-img-top card-img-top-change" alt="...">
            <div class="card-body card-body-change">
                <h5 class="card-title">JS-snake Game gjort med en dator</h5>
                <p class="card-text">Det är ett riktigt coolt snake spel. Det krävdes år och dagar av arbete att göra
                    klart detta spel</p>
                <a href="#" class="btn btn-primary">Ladda ner</a>
            </div>
        </div>


        <div class="card card-change" style="width: 18rem;">
            <img src="Bilder/JS-2.png" class="card-img-top card-img-top-change" alt="...">
            <div class="card-body  card-body-change">
                <h5 class="card-title">En cub gjort i JS som snurrar</h5>
                <p class="card-text">Man kan ställa in hur mycket cuben rör sig och i vilka riktningar det kan bli ganska häftigt</p>
                <a href="#" class="btn btn-primary">Ladda ner</a>
            </div>
        </div>


        <div class="card card-change" style="width: 18rem;">
            <img src="Bilder/JS-3.png" class="card-img-top card-img-top-change" alt="...">
            <div class="card-body  card-body-change">
                <h5 class="card-title">Massa Bollar gjorda i JS som studsar</h5>
                <p class="card-text">Det stutsar så sjukt mycket man tappar räkningen ifall man försöker räkna på antal stuts helt sjukt!</p>
                <a href="#" class="btn btn-primary">Ladda ner</a>
            </div>
        </div>
    </div>
   
    <div class="image-container">
        <img src="Bilder/Csharp-kod.png" alt="A descriptive text">
        <div class="image-text">C#</div>
    </div>



    <div class="projekt-list">

    <div class="card card-change" style="width: 18rem;">
            <img src="Bilder/Flappy-Fransic-Forms.png" class="card-img-top card-img-top-change" alt="...">
            <div class="card-body card-body-change">
                <h5 class="card-title">Flappy Fransic in Windows Forms</h5>
                <p class="card-text">The Program is made with the verry cool .Net frameworks and stuff Windows Forms
                    YEAH</p>
                <a href="#" class="btn btn-primary">Ladda ner</a>
            </div>
        </div>


        <div class="card card-change" style="width: 18rem;">
            <img src="Bilder/C-2.png" class="card-img-top card-img-top-change" alt="...">
            <div class="card-body  card-body-change">
                <h5 class="card-title">Ett kompis register utan sparfunktion</h5>
                <p class="card-text">Man kan skriva in sina vänners hemliga uppgifter och så kan man inte spara det!</p>
                <a href="#" class="btn btn-primary">Ladda ner</a>
            </div>
        </div>


        <div class="card card-change" style="width: 18rem;">
            <img src="Bilder/C-3.png" class="card-img-top card-img-top-change" alt="...">
            <div class="card-body  card-body-change">
                <h5 class="card-title">Ett projekt om Mandelbrott de som vet vet</h5>
                <p class="card-text">Det kan vara det sjukaste som gjorts sedan jag föddes 100% sant och sådant japp!!!</p>
                <a href="#" class="btn btn-primary">Ladda ner</a>
            </div>
        </div>

        <div class="card card-change" style="width: 18rem;">
            <img src="Bilder/C-4.png" class="card-img-top card-img-top-change" alt="...">
            <div class="card-body  card-body-change">
                <h5 class="card-title">Dundgeon Crawler det låter sjukt</h5>
                <p class="card-text">Dundgeon Crawler låter sjukare än vad det är men det är endå realtivt komplicerat???</p>
                <a href="#" class="btn btn-primary">Ladda ner</a>
            </div>
        </div>
    </div>
  

    <?php include "header&fotter/fotter.html" ?>


</body>