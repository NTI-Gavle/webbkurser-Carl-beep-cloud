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

let o =0;
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
  o++;
summan += D[Plats];
  let new_div = document.createElement("div");
  new_div.innerHTML = summan +": " + o;
  document.body.appendChild(new_div);


}



// ! weeee skit i det här gör om!!!!!!!!!

let jämn =[];
let j = 0;

let ojämn = [];
let ojj =0;

let jsum = 0;
let osum =0;
function rakna7()
{

  let nummer = document.getElementById("jam").value;
 
if ((nummer %2)==0) {

  jämn[j] = nummer;

j++;

}


else  {

  ojämn[ojj] = nummer;

  ojj++;
  

}

document.getElementById("jam").value = "";

for (let index = 0; index < jämn.length; index++) {
  
 jämnt(jämn[index]);
  
}

for (let index = 0; index < ojämn.length; index++) {
  
  ojämnt(ojämn[index]); 
}



}


function jämnt(jöm)
{

 jöm = parseInt(jöm);
jsum += jöm;  



}

function ojämnt(jom)
{
jom = parseInt(jom);
osum += jom;


}








//! testar igen upgift 8 

let jäm = [];
let jsuman = 0;
let g =0;

let gäm = [];
let gsuman = 0;
let gg =0;

function rakna7i()
{

  let tal = document.getElementById("jami").value;

let ojsan = tal.split(',');



for (let index = 0; index < ojsan.length; index++) {

   ojsan[index] = parseInt(ojsan[index]);
  
if ((ojsan[index] % 2) == 0) {

ui(ojsan[index]);

}

else{
uo(ojsan[index]);


}


}

jsuman = parseInt(jsuman);
gsuman = parseInt(gsuman);

if (jsuman > gsuman) {
  document.getElementById("oga").innerHTML = "jämnt summa är " + jsuman  + ": " + jäm + "och är större än: " + gsuman + ": " + gäm;
}

else{

  document.getElementById("oga").innerHTML = "udda summa är " + gsuman + ": " + gäm + " och är större än: " + jsuman + ": " + jäm; 
}

//! document.getElementById("jami").value = "";


}



function ui(o)
{
jsuman += o;
jäm[g] = o;
g++;



}



function uo(o)
{
gsuman += o;
gäm[g] = o;
gg++;



}



function lotto()
{
let hm = "";
for (let index = 0; index < 7; index++) {

  


let tal =  Math.floor(Math.random() * 36);
hm += tal + " ";
}

document.getElementById("lot").innerHTML = hm;
}














function lotto2()
{

  let str =[];
let nim = 1;

str[0] =  Math.floor(Math.random() * 36);
while (str.length < 7) {
let n = Math.floor(Math.random() * 36);
  if (cr(n,str) == true) {
    str[nim] = n;
    nim++;
  }

}

document.getElementById("lot2").innerHTML = str;
}


function cr(n,str)
{
  for (let index = 0; index < str.length; index++) {
    if (str[index] == n) {
      return false
    }
    
  }
return true;

}

