function slav()
{

    let ett = document.getElementById("ett").value;
    document.getElementById("tva").value= ett;

          document.getElementById("ett").value = "";
}

// up 2
function tjo()
{
let a = document.getElementById("a").value;
let b = document.getElementById("b").value;

a=parseInt(a);
b=parseInt(b);

let c = document.getElementById("c").value = a+b;


document.getElementById("a").value = "";
document.getElementById("b").value = "";

}

// up 3
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
// up 4

setInterval(tiden,1000);


let i = 0
function tiden()
{


i++;

document.getElementById("tide").innerHTML    = "Du har varit inne på den här sidan i  " + i + " sekunder";

//console.log(i);
}



setInterval(tiden2,5000);



function tiden2()
{

console.log("HElllo world");
var crsq = document.createElement('div', 'id=created');
crsq.innerHTML = "Hello World";
document.getElementsByTagName("body")[0].appendChild(crsq);

}

// upgift 6
let of = false;
let k = 0;
 let ojsan;
 let timeout;
function start()
{
   if (of == false) {
    
    ojsan = setInterval(tir,1000);

   }
   of = true;

    
}



function tir()
{

k++;
document.getElementById("ti").innerHTML = k;

}

function paus()
{


 timeout = setTimeout(tir,500000);

}

function play()
{

clearTimeout(timeout);


}

function stop()
{
 clearInterval(ojsan);
 k =0;
 of = false;
 document.getElementById("ti").innerHTML = 0;

}




/* upgift 7 

Utveckla en timer  sidan där man väljer minut och sekund (det är okej att använda 2 textrutor). Klicka på starta för att börja räkna ner till 0. Skriv gärna ut nedräkningen någonstans samt skriv ut något kul när timern når 0.
*/
/*
function starta()
{

    let H = document.getElementById("Hour").value;
    let S = document.getElementById("Seee").value;

    HH =parseInt(H);
SS = parseInt(S);


  let timmar =  document.getElementById("ho").innerHTML= HH;
 let sekunderna =    document.getElementById("se").innerHTML = SS;

    document.getElementById("Hour").value = "";
    document.getElementById("Seee").value = "";

    for (let index = 0; index < array.length; index++) {
      
        
    }
}
*/

let intervals = setInterval(countdown,1000);
let timers = [];

function startTimer()
{
let m = parseInt( document.getElementById("minutes").value);
let s = parseInt( document.getElementById("secondes").value);

let time = m*60+s;
 
timers.push(time);



}



function countdown()
{

if (timers.length == 0) {
    

    return;
}

let output = document.getElementById("output1");
output.textContent ="";
for (let index = 0; index < timers.length; index++) {

    timers[index]--;
output.textContent += "Timer" + index + ":" + timers[index] + "/n";
    if (timers[index] == 0) {
        alert ("timer is out");
timers.splice(index,1);
    }


    
}



}





