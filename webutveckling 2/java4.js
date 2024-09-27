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

let drum = 0;

function rakna4() {

 

    let bong = document.getElementById("nam4").value;
    let bing = document.getElementById("num4").value;
    let bang = document.getElementById("nom4").value;

bong =parseInt(bong);
bing =parseInt(bing);
bang =parseInt(bang);

drum = bing + bong + bang;

console.log(drum);
document.getElementById("drumdum").innerHTML = drum;


}


let arr = [6,1,5,2,5,1,2,4,5442,12,3,4,23,546,544];

function rakna5()
{
  console.log(arr);
  let drum =0;

for (let index = 0; index < arr.length; index++) {
drum += arr[index];
  
}
console.log(drum);

}


let D = [];


let drum2 = 0;
function rakna6()
{


document.createElement("div");


drum2 = arr[0];


for(let i = 1; i < arr.length; i++){
  drum2 *= arr[i]
    let new_div = document.createElement("div");
    new_div.innerHTML = drum2;
    document.body.appendChild(new_div);


}

}
let Plats = 0;

let summan =0;
function raknaE()
{

let o = document.getElementById("oj").value;
document.getElementById("oj").value = "";
let oj =parseInt(o);
D[Plats] = oj;
dic(D[Plats]);
Plats++;

}

function dic()
{
summan += D[Plats];
  let new_div = document.createElement("div");
  new_div.innerHTML = summan;
  document.body.appendChild(new_div);


}

