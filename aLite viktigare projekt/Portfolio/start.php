<?php session_start(); 
require "databas-connect.php"?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Script länkar -->

    <script src="start.js" defer></script>

    <!--Favicon -->
          <link rel="icon" type="Bilder/glad3arigslav.png" href="Bilder/glad3arigslav.png">

    <!-- Vanlig css -->
    <link rel="stylesheet" href="start.css">
    <link rel="stylesheet" href="header&fotter/header.css">
    <link rel="stylesheet" href="header&fotter/fotter.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <title>Protfolio</title>
</head>

<body>


    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="Bilder/Glad3årigslav-backgrund-fix.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5> 3 Årig slav sökerjobb</h5>
                    <p> Han är Episkt och häftig</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="Bilder/HOHO.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5> 3Årig slav med vänner</h5>
                    <p>Wow riktigt coolt</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="Bilder/christmas2png.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5> 3Årig slav firar jul</h5>
                    <p>Riktigt galet</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </div>
    <?php include "header&fotter/header.html" ?>
    <div class="main-info-container">
        <div class="language">
            <div class="div-box">
                <a href="https://html.com/" target="blank"><img src="Bilder/html-icon.png" alt="HTML"></a>
            </div>
            <div class="div-box">
                <a href="https://www.javascript.com/" target="blank"><img src="Bilder/JS-icon.png" alt="JavaScript"></a>
            </div>
            <div class="div-box">
                <a href="https://learn.microsoft.com/en-us/dotnet/csharp/" target="blank"><img
                        src="Bilder/csharp-icon.png" alt="C#"></a>
            </div>
            <div class="div-box">
                <a href="https://www.php.net/" target="blank"><img src="Bilder/php-icon.png" alt="PHP"></a>
            </div>
        </div>

        <p class="just-text"> JavaScript is a powerful, versatile, and widely-used programming language primarily
            designed for web development. It enables developers to add interactivity, dynamic content, and logic to web
            pages. Features like manipulating the DOM, handling events, and making API calls are core to JavaScript.
            It’s often used alongside HTML and CSS, forming the backbone of modern web applications. With frameworks
            like React, Angular, and Vue.js, JavaScript has expanded its role in creating complex user interfaces, while
            Node.js extends its capabilities to server-side development.</p>

        <div class="textandpicture">
            <p class="just-text">C# (pronounced "C-sharp") is a modern, object-oriented programming language developed
                by Microsoft. It's commonly used for building a variety of applications, including desktop software, web
                applications, games (with Unity), and enterprise systems. C# is part of the .NET ecosystem, which
                provides a rich set of libraries and tools for developers. HTML (HyperText Markup Language) is the
                standard markup language for creating web pages. It structures the content of web pages by defining
                elements like headings, paragraphs, images, links, and more. HTML works closely with CSS (for styling)
                and JavaScript (for interactivity) to form the foundation of the web. </p>

            <div class="borde-vara-samma-som-classen-över-i-css">
                <div class="picture-container">
                    <img src="Bilder/glad3arigslav.png" alt="">
                    <h3>3årigslav fast glad</h3>
                </div>
            </div>
        </div>

        <p class="just-text">PHP is a server-side scripting language designed for web development but also used for
            general-purpose programming. It excels in building dynamic and interactive websites by seamlessly
            integrating with databases like MySQL and PostgreSQL. PHP is the backbone of many popular content
            management systems, such as WordPress, Drupal, and Joomla. Despite the rise of newer web technologies,
            PHP remains widely used because of its simplicity, efficiency, and large community support.</p>




    </div>
    <div class="projekt-small-titel">
        <h2> Favorit Projekten </h2>
    </div>

    <div class="projekt-list">

        <div class="card card-change" style="border:2px solid orange; width: 18rem;">
            <img src="Bilder/snake.png" class="card-img-top card-img-top-change" alt="...">
            <div class="card-body card-body-change">
                <h5 class="card-title">JS-snake Game gjort med en dator</h5>
                <p class="card-text">Det är ett riktigt coolt snake spel. Det krävdes år och dagar av arbete att göra
                    klart detta spel</p>
                <a href="#" class="btn btn-primary">Ladda ner</a>
                <a href="projekt.php" class="btn btn-primary">Fler Projekt</a>
            </div>
        </div>


        <div class="card card-change" style="width: 18rem;">
            <img src="Bilder/Flappy-Fransic-Forms.png" class="card-img-top card-img-top-change" alt="...">
            <div class="card-body card-body-change">
                <h5 class="card-title">Flappy Fransic in Windows Forms</h5>
                <p class="card-text">The Program is made with the verry cool .Net frameworks and stuff Windows Forms
                    YEAH</p>
                <a href="#" class="btn btn-primary">Ladda ner</a>
                <a href="projekt.php" class="btn btn-primary">Fler Projekt</a>
            </div>
        </div>
    
    </div>

   
    <?php include "header&fotter/fotter.html" ?>
</body>

</html>