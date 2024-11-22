function flytt()
{

let thorw = document.getElementById("throw").value;
let thorw2 = document.getElementById("throw");
document.getElementById("get").value = thorw;

//document.getElementById("throw").value = "";

thorw2.value="";

}



//upgift 2

let arr =[];
//arr RandomNumer maker sak
for (let index = 0; index <6; index++) {
   let num = Math.floor(Math.random() * 100)+1;
    arr[index] = num;
}

let tal = document.getElementById("tal");
let list = document.getElementById("list");
let medel = document.getElementById("medel");
let ordning = document.getElementById("ordning");
function räkna()
{


let sum=0;
for (let index = 0; index < arr.length; index++) {
  list.innerHTML += "Talet " + (index+1) + " i listan och värdet är "+ arr[index] + "<br>";
   sum += arr[index];
}

tal.innerHTML = "<br>"+ "summan är " +sum;

medel.innerHTML =" Medel värdet är: "+ sum/arr.length;

ordning.innerHTML = "Talen i storleksordning: " + arr.sort((a, b) => a - b);
}



//!Upgift 3


function tryk()
{

   let sak = document.getElementById("a");
   let sak2 = document.getElementById("b");
   let sak3 = document.getElementById("c");

  sak= parseInt(sak.value);
   sak2=parseInt(sak2.value);
   sak3=parseInt(sak3.value);


document.getElementById("titalen").innerHTML = sak +sak2 +sak3;



}
