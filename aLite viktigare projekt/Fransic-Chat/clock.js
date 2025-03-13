function paint() {
    let canvas = document.getElementById("timecanvas");
   

    const ctx = canvas.getContext("2d");
    let time = new Date();

   let hours = time.getHours();
   let minutes = time.getMinutes();
   let Seconds = time.getSeconds();

   
    ctx.clearRect(0, 0, canvas.width, canvas.height);



    ctx.beginPath();
    ctx.strokeStyle = "orange";
    ctx.arc(95, 50, 40, 0, 2 * Math.PI);
    ctx.stroke();

    if(hours > 12){
        hours -=12;
    }
    anglehours = (((hours*60)/720)*(2 * Math.PI) - Math.PI / 2);

    //! radien liksom
    let radnien = 40;

    let hourX = 95 + radnien*0.7 * Math.cos(anglehours);
    let hourY = 50 + radnien *0.7* Math.sin(anglehours);


    ctx.beginPath();
    ctx.strokeStyle = "blue";
    ctx.lineWidth = 3;
    ctx.moveTo(95, 50);
    ctx.lineTo(hourX, hourY);
    ctx.stroke();


    angleminutes =  ((minutes/60)*(2 * Math.PI) - Math.PI / 2);

    let minutesX = 95 + radnien * Math.cos(angleminutes);
    let minutesY = 50 + radnien * Math.sin(angleminutes);    


    ctx.beginPath();
    ctx.strokeStyle = "green";
    ctx.lineWidth=3;
    ctx.moveTo(95, 50);
    ctx.lineTo(minutesX,minutesY);
    ctx.stroke();


    angleseconds =  ((Seconds/60)*(2 * Math.PI) - Math.PI / 2);

    let SecondsX = 95 + radnien * Math.cos(angleseconds);
    let SecondsY = 50 + radnien * Math.sin(angleseconds);    


    ctx.beginPath();
    ctx.strokeStyle = "purple";
    ctx.lineWidth=3;
    ctx.moveTo(95, 50);
    ctx.lineTo(SecondsX,SecondsY);
    ctx.stroke();

}


setInterval(paint, 1000);
