

let myCanvas=document.getElementById("container");
Mask.updateCanvas(myCanvas);


new Mask(400,400,"blue",5,5);

const ctx = Mask.Canvas.getContext("2d");


function animate(){
  
    requestAnimationFrame(animate);
    ctx.fillStyle="black";

    ctx.fillRect(0,0,myCanvas.width,myCanvas.height);

mask.update();

}

animate();

