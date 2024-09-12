/*
Skapa en array i koden med 6 olika siffror mellan 0 och 100. Initiera arrayen i koden, dvs stoppa in värden direkt i koden i slumpmässig ordning.
Lägg till en knapp som beräknar summan av talen och skriver ut summan snyggt. (Kanske skriv ut till en div-tagg).
Utöka utskriften så att även talen skrivs ut snyggt.
Utöka utskriften så att även medelvärdet av talen skrivs ut.
Utöka utskriften med att skriva ut alla värden sorterade. OBS! Kolla noggrant på ditt resultat av den sorterade arrayen. Om du hittar några problem så lös dem 🙂*/



let a =[15,56,22,65,71,10];
let summan = 0;
let medel = 0;
function rakna()
{

for (let index = 0; index < a.length; index++) {
    
    summan += a[index];
   
}

medel = summan/a.length;

document.getElementById("talen").innerHTML =  a;
document.getElementById("summan").innerHTML = summan;
document.getElementById("medel").innerHTML = medel;
document.getElementById("sort").innerHTML = a.sort((a,b) => a -b);
}



/*Skapa en “bildväxlare”, skapa en array som innehåller olika länkar till bilder.
Börja med en knapp som manuellt byter bild.
Lägg till automatisk bildbyte. (Timer på exempelvis 5 sekunder om du inte gör en stillbilds animering och vill ha kortare tid)
Lägg till knappar för start och stopp av de automatiska bild bytet.
*/




//del 1
let manuel = ['http://om.china-embassy.gov.cn/eng/fyrth/202009/W020210603200808793816.jpg','https://www.synthpopfanatic.com/wp-content/uploads/2019/10/vnvnoire.jpg'];

let bi = document.getElementById("o");
Bnummer = 0;
function bytan()
{   
bi.src = manuel[Bnummer];



Bnummer++;

if (Bnummer == manuel.length) {
    Bnummer =0;
}
    
}

//del 2

let imagess = ['https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/%E8%B5%B5%E7%AB%8B%E5%9D%9A20200603.png/220px-%E8%B5%B5%E7%AB%8B%E5%9D%9A20200603.png','http://om.china-embassy.gov.cn/eng/fyrth/202009/W020210603200808793816.jpg'];
let imag = document.getElementById("i");
setInterval(function () {
    let random = Math.floor(Math.random() * 2);
    imag.src = imagess[random];
}, 1200);



//del 3

let bilderna = ['https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/%E8%B5%B5%E7%AB%8B%E5%9D%9A20200603.png/220px-%E8%B5%B5%E7%AB%8B%E5%9D%9A20200603.png','http://om.china-embassy.gov.cn/eng/fyrth/202009/W020210603200808793816.jpg'
,'https://upload.wikimedia.org/wikipedia/en/0/03/Ptf2010-AlbumCover.jpg','https://i.ytimg.com/vi/OIMQegjZwRo/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLAt62f1OPpgASYT-4vmRTk3w6OSCA'];

let bo = document.getElementById("p");
let oj;
ABnummer = 0;
function start()
{

  oj =  setInterval(rull,1500);
}


function rull()
{

bo.src = bilderna[ABnummer];


    ABnummer++;

    if (ABnummer == bilderna.length) {
        ABnummer =0;
    }
        

}


function stop()
{

    clearInterval(oj);
}


/*

Kopiera uppgift 1. Nu vill vi vara lite mer flexibel med våra värden i arrayen. Placera ut en textruta som du skall läsa in tal ifrån.
 Då bör du även lägga till en knapp. Du ska skriva in ett tal i rutan sedan trycka på knappen för att lägga in de talet i arrayen,
  sedan skriva in ett tal och klicka på knappen, osv.
Lägg till en knapp som beräknar summan av de inlästa talen och skriver ut det snyggt. (kanske i en div-tagg)
Lägg till en knapp som skriver ut de inlästa talen snyggt.
Lägg till en knapp som beräknar medelvärdet av de inlästa talen och skriver ut det snyggt.
Lägg till en knapp som skriver ut de inlästa talen sorterade.
*/


nummer = [];
tal =0;
function till()
{

  let tal1 =  document.getElementById("num").value;

  
 nummer[tal] = tal1;


 document.getElementById("num").value = "";

    tal++;

    
}

sum = 0;

function summ()
{

    for (let index = 0; index < nummer.length; index++) {
    let ojsan = parseInt(nummer[index]);
        sum +=  ojsan;

        
    }

document.getElementById("sum").innerHTML = "summan är : " +sum;
}

function snyg()
{

document.getElementById("snyg").innerHTML = nummer;


}

medellll= 0;

function mede()
{


    for (let index = 0; index < nummer.length; index++) {
        let ojsan = parseInt(nummer[index]);
            medellll +=  ojsan;
    
            
        }
    
        let osadada = medellll/nummer.length;

    document.getElementById("medell").innerHTML = "Medelvårdet är : "+ osadada;


}


function sorterade()
{
  let fuck =  nummer.sort((a, b) => a - b);

  document.getElementById("sorterade").innerHTML = fuck;
}




/*
? Skriv ett program som läser in 7 domarsiffror (0-10 poäng) i modelltävling, alla är givna med en decimal (exempel 7,8).
 ? Beräkna och skriv ut slutpoängen, som är lika med medelvärdet av de 5 som är kvar när man har tagit bort de största och minsta värdet.
? Medelvärdet ska skrivas ut med 2 decimaler. (Kolla upp hur man gör detta).
*/

let varde = [];
let fu = [];
let resultatet =0;
let rom = 0;
function point()
{

   

    po = document.getElementById("point").value;
    varde = po.split(".");

    let fu =  varde.sort((a, b) => a - b);
document.getElementById("point").value = "";
if (varde.length > 7) {
    alert("DU skrev för mycket idiot");
}


for (let index = 1; index < fu.length-1; index++) {

   let ojoj = parseInt( fu[index]);
    resultatet += ojoj;
}
console.log(resultatet);

 rom = resultatet/(fu.length-2);
let rom2 =parseInt(rom);

//parseInt(rom2);


document.getElementById("resultt").innerHTML = rom2.toFixed(2);


console.log(rom2.toFixed(2));
}





//? Skapa en 2-dimensionell array, 4x4, slumpa ut heltal från 1 till och med 50 på varje plats. 
//? Summera de 4 raderna för sig och de 4 kolumnerna (dvs 8 tal) skriv ut på något snyggt och välstrukturerat sätt.

// Todo var för ska man skriva TODO för att få det orange


let ost=0;
let mus = [];
let dunder =0;
let yeah = [
    [0,0,0,0],
    [0,0,0,0],
    [0,0,0,0],
    [0,0,0,0]
];

function DA()
{

for (let index = 0; index < 4; index++) {
 


    for (let j = 0; j < 4; j++) {
      
        yeah[index][j] = getRandomInt(1,51);
        ost+= yeah[index][j];
    }
    mus[index] = ost;
    
}

for (let index = 0; index < mus.length; index++) {
   
   console.log("Summan på  array nummer " + index + " är " + mus[index] );
   dunder += mus[index]; 
}

console.log("summan på alla 4 kolumnerna är " + dunder);

for (let index = 0; index < 4; index++) {
   
    console.log("Kolumn " + (index+1) + "  " + yeah[index]);
    
}


}

//* använder den här funktionen i upgift 6 också!!!!
function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;   
  
  }



// ? Spara de 100 första primtalen i en array och skriv sedan ut de snyggt. Du ska inte lägga in talen själv utan använd flera funktioner.



let arr = [100];
let ostt =0;
let jonas =0;
function prim()
{

for (let index = 0; index < 100; index++) {
    
    ostt = getRandomInt(1,1500);

     
    while (arr[index] != ostt) {
        
    
    if (isPrime(ostt))
    {
 
        arr[index] = ostt;
    }
else
{

    ostt = getRandomInt(1,1500);


    isPrime(ostt);
   
}
    }


}

console.log(arr);
    document.getElementById("primisar").innerHTML = " Här är 100 primtal mellan 1 och 1500 "+ arr;

    
}



//! använder functionen i uppgift 6 stal den 100% från gemeni

function isPrime(ostt) {
    if (ostt <= 1) {
      return false;
    }
  
    for (let i = 2; i <= Math.sqrt(ostt); i++) {
      if (ostt % i === 0) {
        return false;
      }
    }
  
    return true;   
  
  }