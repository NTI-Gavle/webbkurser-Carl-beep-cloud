
//! Gör så att  Rätt div i Headern får rätt css
let start = document.getElementById("start");
let projekt = document.getElementById("projekt");
let om = document.getElementById("om");

start.classList = "headerbox";
projekt.classList = "headerbox";
om.classList = "selected-headerbox";

let headerBox = document.getElementById("toBeFixed");
headerBox.classList = "header-container";



//! Stoppar php från att köras så kollar ifall allating stämmer innan php skickar formuläret
//! Visar en alert ifall det inte är korrekt och php körs inte
const registration = document.getElementById("type-form");

registration.addEventListener("submit", function (event) {

    event.preventDefault();

    let diven = document.getElementById("alerten");

    let inpnamn = document.getElementById("name");
    let inpage = document.getElementById("age");
    let inpcomment = document.getElementById("comment");
    let str = "";
    if (inpnamn.value.length < 2 || inpage.value.length < 1 || inpcomment.value.length < 5) {
        if (inpnamn.value.length < 2){
                str += "Name must be longer then 1 letter" + "<br>";
        }

        if(inpage.value.length<1){
            str+= "Age must be more then 0 letters" + "<br>";
        }

        if(inpcomment.value.length<5)
        {
            str += "Comment must be longer then 5 letters" + "<br>";
        }

        diven.innerHTML = str;
        show();
    }


    else {
        dontshow();
        registration.submit();
    }


    function show() {
        console.log("del1");
        diven.classList.remove("hidden");
        diven.classList.add("showTheHidden");
    }

    function dontshow() {
        console.log("del2");
        diven.classList.add("hidden");
        diven.classList.remove("showTheHidden");
    }



});