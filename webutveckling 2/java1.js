function slav()
{

    let ett = document.getElementById("ett").value;
    document.getElementById("tva").value= ett;

          document.getElementById("ett").value = "";
}


function tjo()
{
let a = document.getElementById("a").value;
let b = document.getElementById("b").value;

a=parseInt(a);
b=parseInt(b);

let c = document.getElementById("c").value = a+b;



}


function skr()
{

let S = document.getElementById("S").value;


const Slist = S.split(",");

let a = 0;

let c = 0;

for (let index = 0; index < Slist.length; index++) {
 let b =   parseInt(Slist[index]);
if (isNaN(b)) {
    continue;
}
   a += b;
c++;


  
} 

let g =a/c;

console.log(g);


document.getElementById("fan").innerHTML = g;




}


setInterval(tiden,1000);


let i = 0
function tiden()
{


i++;

document.getElementById("tide").innerHTML    = "Du har varit inne på den här sidan i  " + i + " sekunder";

console.log(i);
}



setInterval(tiden2,50000);



function tiden2()
{

//console.log("HElllo world");
var crsq = document.createElement('div', 'id=created');
crsq.innerHTML = "Hello World";
document.getElementsByTagName("body")[0].appendChild(crsq);

}



function start()
{

setInterval(tir,1000);

}

let k = 0;
function tir()
{

    k++
    document.getElementById("ti").innerHTML = k;

}

function stop()
{




}

