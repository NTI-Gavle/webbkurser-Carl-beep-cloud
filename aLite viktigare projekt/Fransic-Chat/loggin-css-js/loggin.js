const registration = document.getElementById("type-form");

registration.addEventListener("submit", function (event) {

    registration.onsubmit();

});

document.addEventListener("DOMContentLoaded", function () {
    if (localStorage.getItem("loginFailed") === "true") {
        alertshower();
        localStorage.removeItem("loginFailed"); // Prevent multiple alerts
    }
});


function alertshower(){

    let diven = document.getElementById("alerten");

    let str = "Lösenorder eller namnet är fel. <br> Ifall du inte har ett Konto kan du Registrara dig!";
        console.log("hejsan");
        diven.innerHTML = str;
        diven.classList.remove("hidden");
        diven.classList.add("showTheHidden"); 
}