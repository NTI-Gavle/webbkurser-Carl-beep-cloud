class Apple{


    static canvas = null;
    static context = null;

    static  updateCanvas(Canvas)
    {
        Apple.canvas=Canvas;
        Apple.context=Canvas.getContext("2d");
    }

constructor(x,y,width,height,radius,color){

    this.x = x;
    this.y = y;
    this.width = width;
    this.height = height;
    this.radius = radius;
    this.color = color;
}

draw(){

    const ctx = Apple.context;

ctx.beginPath();
ctx.arc(this.x,this.y,this.radius,0,2*Math.PI);
ctx.fillStyle=this.color;
ctx.fill();
ctx.stroke();
}


}