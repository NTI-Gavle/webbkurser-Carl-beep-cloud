

let myCanvas=document.getElementById("myCanvas");
Ball.updateCanvas(myCanvas);

function randomColor() {
    return '#' + Math.floor(Math.random() * 16777215).toString(16).padStart(6, '0');
}

for (let index = 0; index < 75; index++) {
    new Ball(
        //Math.random() * 750 + 25
        400, 
        //Math.random() * 550 + 25
        300, 
        Math.random() * 50 + 10, 
        randomColor(),
        Math.random() * 25 + 1, 
        Math.random() * 11 + 1  
    );
}

const ctx = myCanvas.getContext("2d");

function animate(){
  
    requestAnimationFrame(animate);
    ctx.fillStyle="white";

    ctx.fillRect(0,0,myCanvas.width,myCanvas.height);

for ( ball in Ball.BallList){
    Ball.BallList[ball].update();
}

}

animate();