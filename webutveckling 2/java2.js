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




let imagess = ['https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/%E8%B5%B5%E7%AB%8B%E5%9D%9A20200603.png/220px-%E8%B5%B5%E7%AB%8B%E5%9D%9A20200603.png','http://om.china-embassy.gov.cn/eng/fyrth/202009/W020210603200808793816.jpg'];
let imag = document.getElementById("i");
setInterval(function () {
    let random = Math.floor(Math.random() * 2);
    imag.src = imagess[random];
}, 1200);

