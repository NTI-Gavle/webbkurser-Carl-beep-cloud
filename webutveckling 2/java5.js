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

oj = ["orange","blue","yellow","pink","darkblue","darkgreen","green",];

function tre()
{

  let b =  Math.floor(Math.random() * 7);

document.getElementById("rut").style.backgroundColor = oj[b];


}


function fyra()
{

  let b =  Math.floor(Math.random() * 255);
  let c =  Math.floor(Math.random() * 255);
  let d =  Math.floor(Math.random() * 255);
console.log(b +" " + c + " " + d );

document.getElementById("rut2").style.backgroundColor = rgb(b,c,d);


}



