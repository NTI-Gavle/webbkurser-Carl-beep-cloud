class Mask{


    static Canvas = null;
    static context = null;

    static  updateCanvas(Canvas)
{
    Mask.Canvas=Canvas;
    Mask.context=Canvas.getContext("2d");
}

constructor(x,y,color,xv,yv){

    this.x =x;
    this.y=y;
    this.color=color;
    this.xv=xv;
    this.yv=yv;
    
    
}

move(){
    this.x+=this.xv;
    this.y+=this.yv;
}


draw(){

    const ctx = Mask.context;

ctx.beginPath();
ctx.arc(this.x,this.y,10, 0, Math.PI * 2);
ctx.fillStyle=this.color;
//ctx.fill();
ctx.stroke();
}


edge()
{   
if((this.y)>Mask.Canvas.height){
    this.yv *=-1;
} else if((this.y)<0){
    this.yv *=-1;
}

if((this.x)>Mask.Canvas.width){
    this.xv*=-1;
} else if((this.x)<0){
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