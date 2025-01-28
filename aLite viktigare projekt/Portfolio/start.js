
//! Gör så att  Rätt div i Headern får rätt css
let start = document.getElementById("start");
let projekt = document.getElementById("projekt");
let om = document.getElementById("om");

start.classList = "selected-headerbox";
projekt.classList="headerbox";
om.classList="headerbox";



let headerBox = document.getElementById("toBeFixed");
headerBox.classList = "header-container-for-start";