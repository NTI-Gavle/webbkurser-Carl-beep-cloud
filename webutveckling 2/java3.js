//? Skapa en textruta för inläsning av en sträng. Skriv ut följande snyggt i en “div”-ruta
//? Hur många bokstäver
//? Första bokstaven
//? Hela strängen i enbart stora bokstäver.





function Tee()
{
   

    let textasd = document.getElementById("texten").value;
  
let num = textasd.length;
    console.log(textasd.length);

    document.getElementById("1").innerHTML = num;

   let num2 = textasd.slice(0,1);
document.getElementById("2").innerHTML = num2;

let num3 = textasd.toUpperCase();
document.getElementById("3").innerHTML = num3;

} 



//? Skapa 3 textrutor för följande saker. Förnamn, efternamn och e-post. Skapa en ruta där du skriver ut allt snyggt.
//?  Men först kontrollera så att e-postadressen innehåller ett @ om den inte gör det så skall det skrivas ett felmeddelande i div;en.
//? När du skriver ut för och efternamn fint så ska du se till så att den första bokstaven är stor och de andra är små. Exempelvis:




function u2()
{

let Fnamn = document.getElementById("Fnamn").value;

let Enamn = document.getElementById("Enamn").value;

let Epost = document.getElementById("Epost").value;



}