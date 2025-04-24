
//! Ifall det inte finns en med detta inlogg skriv så

const registration = document.getElementById("type-form");

registration.addEventListener("submit", function (event) {

    event.preventDefault();

    let diven = document.getElementById("alerten");
    let inppass = document.getElementById("pass");
   

    let str = "";

    if (inppass.value.length < 3) {

        if (inppass.value.length < 3) {
            str += "Your password need to be longer then 3 letters" + "<br>";
        }
        

        diven.innerHTML = str;
        show();
    }


    else {
        dontshow();
        registration.submit();
    }


    function show() {

        diven.classList.remove("hidden");
        diven.classList.add("showTheHidden");
    }

    function dontshow() {

        diven.classList.add("hidden");
        diven.classList.remove("showTheHidden");
    }



});
