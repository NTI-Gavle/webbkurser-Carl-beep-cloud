
//! Ifall det inte finns en med detta inlogg skriv så

const registration = document.getElementById("type-form");



registration.addEventListener("submit", function (event) {

    //! event.preventDefault();

    registration.onsubmit();

    /*
//! Måste fixa senare måste kolla så att det fungerar först
    let diven = document.getElementById("alerten");

    let inpnamn = document.getElementById("name");
    let inpassword = document.getElementById("pass");4

    let str = "Du skrev fel ifall du inte har ett ett konto registrera dig";

        diven.innerHTML = str;
        show();
    


  //? Måste ha en if för att köra denna
/*
    else {
        dontshow();
        registration.submit();
    }
*/
/*
    function show() {
       
        diven.classList.remove("hidden");
        diven.classList.add("showTheHidden");
    }

    function dontshow() {
     
        diven.classList.add("hidden");
        diven.classList.remove("showTheHidden");
    }

*/

});