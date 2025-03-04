
//! Ifall det inte finns en med detta inlogg skriv så

const registration = document.getElementById("type-form");

registration.addEventListener("submit", function (event) {

    event.preventDefault();

    let diven = document.getElementById("alerten");

    let inpnamn = document.getElementById("name");
    let inpassword = document.getElementById("password");4

    let str = "Du skrev fel ifall du inte har ett ett konto registrera dig";

        diven.innerHTML = str;
        show();
    



/*
    else {
        dontshow();
        registration.submit();
    }
*/

    function show() {
       
        diven.classList.remove("hidden");
        diven.classList.add("showTheHidden");
    }

    function dontshow() {
     
        diven.classList.add("hidden");
        diven.classList.remove("showTheHidden");
    }



});