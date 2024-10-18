
// upgift 1
setInterval(sidtid,1000);


tid=0;
function sidtid()
{
document.getElementById("sidtid").innerHTML = "Du har varit inne på sidan i: "+tid+ " sekudner";
tid++;

}




// upgift 2

/*
let parent = document.getElementById("oga");


function Hello()
{

    
let pc = document.createElement("div");

pc.textContent = "Hello World";


parent.appendChild(pc);

}


  setInterval(Hello,2000);
*/


//? Varför funkade inte det här




    let timer2 = setInterval(upg2timer, 5000);
    let output2 = document.getElementById("oga");
    function upg2timer() {
        output2.innerHTML += "HELLO WORLD <br>";
    }


/*
    let timer2 = setInterval(upg2timer, 5000);
    let output2 = document.getElementById("oga");
    function upg2timer() {
        document.getElementById("oga").innerHTML += "HELLO WORLD <br>";
    }


*/




// upgift 3

let pausebool = false;
let startbool = false;
let Mtid=0;

function pause()
{

    pausebool = true;
}

function resume()
{

    pausebool = false;
}
let oj;
function start()
{
    if (startbool == false) {
        
    
oj = setInterval(sidtid2,1000);
    }
startbool=true;
pausebool = false;
}

tid2=0;
function sidtid2()
{

    if (pausebool == false) {
        
    

document.getElementById("sidtid2").innerHTML = "Du har varit inne på sidan i: "+tid2+ " sekudner";
tid2++;
    }

}


function reset()
{
tid2=0;
document.getElementById("sidtid2").innerHTML = "Du har varit inne på sidan i: "+tid2+ " sekudner";
pausebool = true;

}


function mellan()
{
Mtid= tid2;
document.getElementById("mt").innerHTML += Mtid +"<br>";

}





// upgift 4



let tot = 0;

function timer()
{   
let min = document.getElementById("min").value;
let sek = document.getElementById("sek").value;
min = parseInt(min);
sek = parseInt(sek);
tot = min*60 + sek;
 setInterval(rakna,1000);
}



function rakna()
{
    console.log(tot);
    if (tot != 0) {
        
    
document.getElementById("sum").innerHTML= tot;


tot--;
    }
else{
tot = 0;
document.getElementById("sum").innerHTML = "Tiden är ute";
}
}


// upgift 5


let num; 
let nhold = document.getElementById("nhold");



function dub()
{
    num = parseFloat(document.getElementById("o").value);
setInterval(calc,1000);
}

function calc()
{
    document.getElementById("nhold").innerHTML += num+"<br>";
num*=2;
}


