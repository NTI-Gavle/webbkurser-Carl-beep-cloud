function kalle() {

let a = "kalle anka";

for (let index = 0; index < 10; index++) {
  console.log(a);
    
}

}



function rakna()
{

let nam = document.getElementById("nam").value;
let num = document.getElementById("num").value;

for (let index = 0; index < num; index++) {
  console.log("nam");
    
}
}


function rakna2()
{

    let nam = document.getElementById("nam2").value;
    let num = document.getElementById("num2").value;
let dunder = "";


for (let index = 0; index < num; index++) {
  dunder += nam + ", ";
    
}

console.log(dunder);
}


function rakna3()
{

    let num2 = document.getElementById("nam3").value;
    let num = document.getElementById("num3").value;
let sum = 0;
    
sum = num*num2;

document.getElementById("sum").innerHTML = sum;


}


function rakna4() {
    
    let num2 = document.getElementById("nam4").value;
    let num = document.getElementById("num4").value;
    let num3 = document.getElementById("nom4").value;
let sum = 0;



sum = num2 + num + num3;

console.log(sum);



}