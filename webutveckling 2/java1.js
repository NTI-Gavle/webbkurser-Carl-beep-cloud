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

for (let index = 0; index < Slist.length; index++) {
 let b =   parseInt(Slist[index]);
if (isNaN(b)) {
    continue;
}
   a += b;

  
} 


console.log(a);


document.getElementById("fan").value = a;




}