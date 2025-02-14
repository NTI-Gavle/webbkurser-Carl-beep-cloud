//! Gör så att  Rätt div i Headern får rätt css
let start = document.getElementById("start");
let projekt = document.getElementById("projekt");
let om = document.getElementById("om");

start.classList = "headerbox";
projekt.classList="selected-headerbox";
om.classList="headerbox";


let headerBox = document.getElementById("toBeFixed");
headerBox.classList = "header-container";

