class Ball{

static BallList =[];
static BallIndex=0;

static Canvas = null;
static context = null;

static  updateCanvas(Canvas)
{
    Ball.Canvas=Canvas;
    Ball.context=Canvas.getContext("2d");
}

constructor(x,y,radius,color,xv,yv){

    this.x =x;
    this.y=y;
    this.radius=radius;
    this.color=color;
    this.xv=xv;
    this.yv=yv;
    
    Ball.BallList[Ball.BallIndex]=this;
    Ball.BallIndex++;
}

move(){
    this.x+=this.xv;
    this.y+=this.yv;
}

draw(){

    const ctx = Ball.context;

ctx.beginPath();
ctx.arc(this.x,this.y,this.radius,0,2*Math.PI);
ctx.fillStyle=this.color;
//ctx.fill();
ctx.stroke();
}

edge()
{
if((this.y+this.radius)>Ball.Canvas.height){
    this.yv *=-1;
} else if((this.y-this.radius)<0){
    this.yv *=-1;
}

if((this.x+this.radius)>Ball.Canvas.width){
    this.xv*=-1;
} else if((this.x-this.radius)<0){
    this.xv *=-1;
}

}

update()
{
    this.move();
    this.edge();
    this.draw();
}
}