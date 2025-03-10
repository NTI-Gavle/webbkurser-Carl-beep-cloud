
//! Ifall det inte finns en med detta inlogg skriv så

const registration = document.getElementById("type-form");

registration.addEventListener("submit", function (event) {

    event.preventDefault();

    let diven = document.getElementById("alerten");

    let inpnamn = document.getElementById("name");
    let inplastname = document.getElementById("lastname");
    let inppass = document.getElementById("pass");
    let inpage = document.getElementById("age");

    let str = "";

    if (inpnamn.value.length < 2 || inplastname.value.length < 1 || inppass.value.length < 3 || inpage.value < 1 || inpnamn.value.length > 9 || inplastname.value.length > 9 || inpage.value.length > 3) {
        if (inpnamn.value.length < 2) {
            str += "Name must be longer then 1 letter" + "<br>";
        }

        if (inpnamn.value.length > 9) {
            str += "Name must be shorter then 7 letter" + "<br>";
        }

        if (inplastname.value.length < 1) {
            str += "Last Name must be longer then 1 letters" + "<br>";
        }

        if (inplastname.value.length > 9) {
            str += "Last Name must be shorter then 7 letters" + "<br>";
        }

        if (inpage.value < 1) {
            str += "You need to be older then 0 years old" + "<br>";
        }

        if (inpage.value.length > 3) {
            str += "Your age cant be longer then 3 nummbers" + "<br>";
        }

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




if (localStorage.getItem("regFailed") === "true") {
    alertshower();
    localStorage.removeItem("regFailed");
}


function alertshower() {

    let diven = document.getElementById("alerten");

    let str = "En annan har redan det där namnet och efternamnet";
    console.log("hejsan");
    diven.innerHTML = str;
    diven.classList.remove("hidden");
    diven.classList.add("showTheHidden");
}



