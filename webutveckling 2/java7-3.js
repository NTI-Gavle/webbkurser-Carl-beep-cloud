setInterval(sidtid,1000);


tid=0;
function sidtid()
{
document.getElementById("sidtid").innerHTML = "Du har varit inne på sidan i: "+tid+ " sekudner";
tid++;

}




let parent = document.getElementById("pdiv");


function Hello()
{

    
let pc = document.createElement("div");

pc.textContent = "Hello World";


parent.appendChild(pc);

}


//!  setInterval(Hello,5000);



