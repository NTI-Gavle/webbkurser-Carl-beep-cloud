function ett()
{

    document.getElementById("helasidan").style.backgroundColor = "red";

}

function etti()
{

    document.getElementById("helasidan").style.backgroundColor = "";

}


let tv=0;

function tva()
{
tv++;
    if (tv ==1) {
        
    
    document.getElementById("helasidan").style.backgroundColor = "blue";
    }


    if (tv ==2) {
        document.getElementById("helasidan").style.backgroundColor = "yellow";
        tv=0;
    }


}

oj = ["orange","blue","yellow","pink","darkblue","darkgreen","lightgreen",];

let num = 0;
function tre()
{
let b =  Math.floor(Math.random() * 7);
if (num == b)
{b++;}
num = b;
if (num ==8)
{num =0;}
document.getElementById("rut").style.backgroundColor = oj[b];
}


function fyra()
{

  let b =  Math.floor(Math.random() * 255);
  let c =  Math.floor(Math.random() * 255);
  let d =  Math.floor(Math.random() * 255);
console.log(b +" " + c + " " + d );

document.getElementById("rut2").style.backgroundColor = `rgb(${b}, ${c}, ${d})`;


}

let pos = 0;
function H(way)
{


    pos = Math.min(Math.max(pos+way, 0), 10);;
    let figur_1 = document.getElementById('rör');
    figur_1.textContent=pos;
      
        figur_1.style.position = "absolute";
        figur_1.style.left = (pos*150)+"px";
       
      
}




function U(way)
{

   pos += way;
    let figur_1 = document.getElementById('rör');
    figur_1.textContent=pos;
      
        figur_1.style.position = "absolute";
        figur_1.style.top = (pos*50)+"px";


}

document.addEventListener("keydown", function(event) {
   
    if (event.key === "ArrowRight" ||event.key === 39 ){

      H(1);
    }

  

    if ( event.key === "ArrowLeft" ||event.key === 37 ){

        H(-1);
      }

      if (event.key === "ArrowUp" ||event.key === 38 ){

        U(-1);
      }
  
    
  
      if ( event.key === "ArrowDown" ||event.key === 40 ){
  
          U(1);
        }

});