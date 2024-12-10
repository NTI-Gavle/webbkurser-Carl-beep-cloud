let stopp;
let stopmove;



hdivider=0;
wdivider=0;
first=true;

num=0;

function move()
{   
    if(stopmove == true)
    {
            stopmove=false;
    }

    else if (stopmove == false)
    {
        stopmove = true;
    }

}





 function start()
 {
 stopp = false;
 stopmove=true;
    
let Xaxis= parseFloat(document.getElementById("xaxis").value);
let Yaxis= parseFloat(document.getElementById("yaxis").value);
let Zaxis= parseFloat(document.getElementById("zaxis").value);

console.log("X: "+Xaxis +" Y: " + Yaxis + " Z: " +Zaxis );

console.log(hdivider +" " +wdivider);
    hdivider+=1;
    wdivider+=1;
/*
    let divsaken = document.getElementById("divsaken");
    let knapp = document.getElementById("knapp");

    divsaken.remove();
    knapp.remove();
*/
    const COLOR_BG = "black";
    let COLOR_CUBE = "yellow";
    //? Dessa tre under var const innan   
    //? gjorde det let för då kan jag ändra dem;
    let SPEED_X = 0.11;
    let SPEED_Y = 0.11;
    let SPEED_Z = 0.11;
    const POINT3D = function (x, y, z) {
        this.x = x;
        this.y = y;
        this.z = z;
    }
    if(first==true){
  
    var canvas = document.getElementById("container");
    //var canvas = document.createElement("canvas");
    document.body.appendChild(canvas);
    var ctx = canvas.getContext("2d");

    /* //! dess hör ihop
    hreal = document.documentElement.clientHeight/hdivider;
    wreal = document.documentElement.clientHeight/wdivider;
     -22 för att knappen med start är 21,s  px i heihgt 
    hreal-= 22;

    var h = hreal;//document.documentElement.clientHeight;
    var w = wreal;//document.documentElement.clientWidth;
    canvas.height = h; 
    canvas.width = w; 
*/

// todo    Det görs en kub som snurrar långsamt;
   h= document.documentElement.clientHeight;
   w= document.documentElement.clientWidth;
        h=h-22;
   canvas.height = h; 
    canvas.width = w; 

    //! ta bort fall jag vill göra flera
    // first=false;

    }

    //! Göra ifall jag vill kunna göra flera samtidigt
/*
    else{
        var container = document.getElementById("container").parentElement;
        var ny = document.createElement("canvas");
        container.appendChild(ny);
        var ctx = ny.getContext("2d");

        hreal = document.documentElement.clientHeight/hdivider;
        wreal = document.documentElement.clientHeight/wdivider;
        // -22 för att knappen med start är 21,s  px i heihgt 
        hreal-= 22;
    
        var h = hreal;//document.documentElement.clientHeight;
        var w = wreal;//document.documentElement.clientWidth;
        ny.height = h; 
        ny.width = w; 
    }
  */

   

    ctx.fillStyle = COLOR_BG;
    ctx.strokeStyle = COLOR_CUBE;
    ctx.lineWidth = w / 100;
    ctx.lineCap = "round";

    // parametrar
    var cx = w / 2;
    var cy = h / 2;
    var cz = 0;
    var size = h / 4;
    var vertices = [
        new POINT3D(cx - size, cy - size, cz - size),
        new POINT3D(cx + size, cy - size, cz - size),
        new POINT3D(cx + size, cy + size, cz - size),
        new POINT3D(cx - size, cy + size, cz - size),
        new POINT3D(cx - size, cy - size, cz + size),
        new POINT3D(cx + size, cy - size, cz + size),
        new POINT3D(cx + size, cy + size, cz + size),
        new POINT3D(cx - size, cy + size, cz + size)
    ];

    var edges = [
        [0, 1], [1, 2], [2, 3], [3, 0], // bak
        [4, 5], [5, 6], [6, 7], [7, 4],   // framm
        [0, 4], [1, 5], [2, 6], [3, 7],  // samanslutnings sidor 
    ];

    //animering och dåsant
    var timeDelta, timeLast = 0;
    requestAnimationFrame(loop);
   


    function loop(timenow) {
//! vill at farten ska öka varje snurr
//! 0.01 var standard

    

    SPEED_X += Xaxis; //0.017 eller 0.01 den bästa 0,01
  //  console.log("X "+SPEED_X);
    SPEED_Y += Yaxis;//0.05 eller 1.05 den bästa 0,001
  //  console.log("Y "+SPEED_Y);
    SPEED_Z += Zaxis;//0.05 eller 1.05 den bästa 1,05
   // console.log("Z "+SPEED_Z);


    if(stopp == false)
    {
        //storlek hastighet
        if (stopmove == false) {
            size -= 0.5;
        }

        else{
            size =size;
        }
    if (size<w/25) {
        stopp=true;
    }
    
    }

     if (stopp == true) {
        //storlek hastighet

        if (stopmove == false) {
            size += 0.5;
        }

        else{
            size =size;
        }

       if (size>w/8) {
        stopp=false
        }

    }

    
    
    vertices = [
        new POINT3D(cx - size, cy - size, cz - size),
        new POINT3D(cx + size, cy - size, cz - size),
        new POINT3D(cx + size, cy + size, cz - size),
        new POINT3D(cx - size, cy + size, cz - size),
        new POINT3D(cx - size, cy - size, cz + size),
        new POINT3D(cx + size, cy - size, cz + size),
        new POINT3D(cx + size, cy + size, cz + size),
        new POINT3D(cx - size, cy + size, cz + size)
    ];

        

  

        // tid
        timeDelta = timenow - timeLast;
        timeLast = timenow;
        // backgrund

        
        ctx.fillRect(0, 0, w, h);
        // z axis
        let angle = timeDelta * 0.001 * SPEED_Z * Math.PI * 2;
    for (let v of vertices) {
        let dx = v.x - cx;
        let dy = v.y - cy;
        let x = dx * Math.cos(angle) - dy * Math.sin(angle);
        let y = dx * Math.sin(angle) + dy * Math.cos(angle);
        v.x = x + cx;
        v.y = y + cy;
    }

    //  x axis
    angle = timeDelta * 0.001 * SPEED_X * Math.PI * 2;
    for (let v of vertices) {
        let dy = v.y - cy;
        let dz = v.z - cz;
        let y = dy * Math.cos(angle) - dz * Math.sin(angle);
        let z = dy * Math.sin(angle) + dz * Math.cos(angle);
        v.y = y + cy;
        v.z = z + cz;
    }

    // y axis
    angle = timeDelta * 0.001 * SPEED_Y * Math.PI * 2;
    for (let v of vertices) {
        let dx = v.x - cx;
        let dz = v.z - cz;
        let x = dz * Math.sin(angle) + dx * Math.cos(angle);
        let z = dz * Math.cos(angle) - dx * Math.sin(angle);
        v.x = x + cx;
        v.z = z + cz;
    }

        // kanter/sidor typ
        for (let edge of edges) {
            ctx.beginPath();
            ctx.moveTo(vertices[edge[0]].x, vertices[edge[0]].y);
            ctx.lineTo(vertices[edge[1]].x, vertices[edge[1]].y);
            ctx.stroke();

           
        }
        
        
      
        requestAnimationFrame(loop);
        
    }
} 

 


