
let start = document.getElementById("start");
let projekt = document.getElementById("projekt");
let om = document.getElementById("om");

start.classList = "headerbox";
projekt.classList="headerbox";
om.classList="selected-headerbox";



let diven = document.getElementById("alerten");


function show(){
    diven.classList.remove("hidden");
    diven.classList.add("alert", "alert-dark");
}

function dontshow(){
    diven.classList.add("hidden");
    diven.classList.remove("alert", "alert-dark");
}