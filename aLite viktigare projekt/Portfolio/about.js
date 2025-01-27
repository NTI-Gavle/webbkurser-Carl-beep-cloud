
let start = document.getElementById("start");
let projekt = document.getElementById("projekt");
let om = document.getElementById("om");

start.classList = "headerbox";
projekt.classList = "headerbox";
om.classList = "selected-headerbox";

let headerBox = document.getElementById("toBeFixed");
headerBox.classList = "header-container";

function check(){

let diven = document.getElementById("alerten");

let inpnamn = document.getElementById("name");
let inpage = document.getElementById("age");
let inpcomment = document.getElementById("comment");

if (inpnamn.value.length < 2 && inpage.value.length < 1 && inpcomment.value.length < 5) {
    show();
}


else {
    dontshow();
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

 }
