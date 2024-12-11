class Apple{

    static AppleList =[];
    static AppleIndex=0;

    static Point=0;

    static canvas = null;
    static context = null;

    static  updateCanvas(Canvas)
    {
        Apple.canvas=Canvas;
        Apple.context=Canvas.getContext("2d");
    }

constructor(x,y,radius,color){

    this.x = x;
    this.y = y;
    this.radius = radius;
    this.color = color;

    Apple.AppleList[Apple.AppleIndex]=this;
    Apple.AppleIndex++;
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