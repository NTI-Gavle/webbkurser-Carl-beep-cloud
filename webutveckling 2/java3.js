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


//! upgift 3
//? Skapa 3 textrutor för följande saker. Förnamn, efternamn och e-post. Skapa en ruta där du skriver ut allt snyggt.
//?  Men först kontrollera så att e-postadressen innehåller ett @ om den inte gör det så skall det skrivas ett felmeddelande i div;en.
//? När du skriver ut för och efternamn fint så ska du se till så att den första bokstaven är stor och de andra är små. Exempelvis:


//! upgift 4 
//? Utöka kontrollen av e-postadressen från nr 2. Den skall vara minst 6 tecken lång, varav minst 4 tecken efter @-tecknet.
//? Efter @-teckent skall även vara en punkt ( . ). Punkten får inte vara på någon av de två sista platserna.  


let EPostParts;
function u2()
{

    let Fnamn = document.getElementById("Fnamn").value;

    let Enamn = document.getElementById("Enamn").value;
    
    let Epost = document.getElementById("Epost").value;

//! förnamn
 let SFnamn =Fnamn.toLowerCase();

 let Förnamn = SFnamn.charAt(0).toUpperCase() + SFnamn.slice(1);

 document.getElementById("21").innerHTML = Förnamn;

//! efternamn
 let SEnamn =Enamn.toLowerCase();

 let efternamn = SEnamn.charAt(0).toUpperCase() + SEnamn.slice(1);

 document.getElementById("22").innerHTML = efternamn;

//!    && (Epost.charAt(Epost[Epost.slice('@').length-Epost.slice('@')-1]).includes('.'))       &&        (Epost.charAt(Epost[Epost.slice('@').length-Epost.slice('@'.length)-2]).includes('.'))  


EPostParts = Epost.split("@");



//! bra att ha:  EPostParts[1].substring(EPostParts[1].length-2).includes(".");

//! enligt GPT 277 characters lång if statment och den funkar inte.!!!!!
if ((Epost.includes('@')&& (Epost.length > 6) && ( Epost.slice('@').length>4 ))     &&   EPostParts[1].substring(EPostParts[1].length-2).includes() != "." ) {
    document.getElementById("23").innerHTML = Epost;
}
else   {
    document.getElementById("23").innerHTML = "Du måste ha med en @ och det ska vara minst 6 tecken långt det ska vara 4 tecken efter @ och innehålla en punkt efter @ men inte sista 2 bokstäverna";
}

}





//? Skapa två textrutor. En för användarnamn och en ruta för lösenord.
//? Användarnamnet måste innehålla delsträngen “nti” någonstans.
//? Lösenordet måste vara minst 6 tecken långt och innehålla minst en av följande tecken: “5”, “&”, “!”
//? När du trycker på knappen säger du antingen om allt är okej eller om det är något som är fel snyggt i en “div”-ruta 



let A;
let B;
function log()
{

    let anv = document.getElementById("användare").value;

    let pas = document.getElementById("lösenord").value;

    if (anv.includes('nti')) {
       A = " Anv rätt ";
    }

    else{

    A = "Du måste ha med (nti) i användarnamnet";

    }

    if (pas.includes("5","&","!")) {
        B = " P rätt ";
    }

    else{

       B = "Du måste ha med (5,& eller !) för att det ska funka ";  
    }
    document.getElementById("res").innerHTML  = A +B ;
    
}




//? Ändra i nr 3 så att istället för 5,& eller ! så skall lösenordet innehålla MINST EN siffra.





let Ab;
let Ba;
function logg()
{

    let anvv = document.getElementById("an").value;

    let pass = document.getElementById("lö").value;

    if (anvv.includes('nti')) {
       Ab = " Anv rätt ";
    }

    else{

    Ab = "Du måste ha med (nti) i användarnamnet";

    }

    if (pass.includes("1","2","3","4","5","6","7","8","9","0",)) {
        Ba = " P rätt ";
    }

    else{

       Ba = "Du måste ha med minst en siffra för att det ska funka ";  
    }
    document.getElementById("res11").innerHTML  = Ab +Ba ;
    
}



//? Vi skall kryptera text. Du skall ersätta alla bokstäver med tecknet som finns på samma plats i krypto-strängen.

//? "abcdefghijklmnopqrstuvwxyzåäö"
//? “Hj4%*qv/hxXAB8=)DCf#!;WrUsd63”

//? Det vill säga att ett “c” ersätts med “4” och “e” med “*”
//? Låt mellanslag, comma och punkt vara kvar som de är.

//? Gör så att det är möjligt att läsa in en sträng och skriv ut den krypterade.
//? Lägg kryptering i en funktion och lägg även till en funktion för dekryptering. 



