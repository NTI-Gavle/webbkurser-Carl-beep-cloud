<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fransic Chat</title>

    <!-- //! css  -->
    <link rel="stylesheet" href="loggin-css-js/loggin-reg.css">

    <!-- //! JS för att loggain och sådant -->
    <script src="loggin-css-js/register.js" defer></script>

    <!-- //! bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</head>

<body>

    <div class="my-mega-container">

        <div class="my-container">
            <div class="text-container">
                <h1> Loggin to Fransic Chat</h1>
            </div>
            <div class="form-container" id="write-loggin">

                <form id="type-form" action="" method="post">
                    <label for="name">Namn:</label>
                    <input name="name" type="text" id="name" placeholder="Skriv ditt namn"> <br>

                    <label for="lastname">Last-Name:</label>
                    <input name="lastname" type="password" id="lastname" placeholder="Last-Name"> <br>

                    <label for="age">Age:</label>
                    <input name="age" type="number" id="age" placeholder="Age"> <br>

                    <label for="password">Password:</label>
                    <input name="password" type="password" id="password" placeholder="Password"> <br>

                    <button type="submit">Register</button>

                </form>
                <div id="alerten" onclick="check()" class="hidden" role="alert">
                    A simple dark alert—check it out!
                </div>

            </div>

 

            <div class="text-container">
            <a href="loggin.php"> <button type="button" class="btn btn-warning reg-btn"> Go to logg in</button> </a>
            </div>

           

        </div>
    </div>



</body>

</html>