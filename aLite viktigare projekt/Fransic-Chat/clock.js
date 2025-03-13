function paint() {
    let canvas = document.getElementById("timecanvas");
    const ctx = canvas.getContext("2d");

    ctx.beginPath();
    ctx.strokeStyle = "orange";
    ctx.arc(95, 50, 40, 0, 2 * Math.PI);
    ctx.stroke();

}

setInterval(1000, paint());