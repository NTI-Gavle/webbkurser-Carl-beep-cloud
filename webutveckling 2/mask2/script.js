//! TIden och sådant
let tid = document.getElementById("number");
let tiden = 0;

// är för setinterval på tiden
let timern = null;
function timer() {
    tiden += 1;
    tid.innerHTML = "Snake du har levt i " + tiden + " sekunder" +"<br>"+ " dina poäng är: " + Apple.Point;
}

//! TIden och sådant slutar här



//? Camvas saker börjar
const canvas = document.getElementById("myCanvas");
const ctx = canvas.getContext("2d");

let moveNumber = 4;
let xmove = moveNumber;
let ymove = 0;

// todo äpplen och sådant

Apple.updateCanvas(canvas);
for (let index = 0; index < 2; index++) {


    new Apple(
    Math.floor(Math.random() * canvas.width - 5) + 5,
    Math.floor(Math.random() * canvas.height + 5) + 5,
    25,
    25,
    5,
    "red"
    );
}
// todo här slutar Apple saken nu

const worm = {
    segments: [], // Array to store the worm's segments
    maxLength: 10000, // Maximum number of segments
    width: 35, // Width of each rectangle
    height: 35, // Height of each rectangle
    color: 'orange',
    segmentgap: 20,
};


//! Här startar timern
setInterval(timer, 1000);


// Initialize the worm's starting position
worm.segments.push({ x: canvas.width / 2, y: canvas.height / 2 });

function drawWorm() {
    requestAnimationFrame(drawWorm);

    // Calculate the new head position
    const newHead = {
        x: worm.segments[0].x + xmove,
        y: worm.segments[0].y + ymove
    };

    worm.segments.unshift(newHead);

    if (worm.segments.length > worm.maxLength) {
        worm.segments.pop();
    }

    // Clear the canvas
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Draw all segments of the worm
    for (let i = 0; i < (20*(Apple.Point+1)); i++) {
        const segment = worm.segments[i];
        if (!segment) continue;
        ctx.beginPath();

        if (i === 0) {
            // Head of the worm
            ctx.fillStyle = "blue";
        } else {
            // Body of the worm
            ctx.fillStyle = worm.color;
        }


        //! ritar
        ctx.rect(
            segment.x - worm.width / 2,
            segment.y - worm.height / 2,
            worm.width,
            worm.height
        );

        ctx.fill();
        ctx.closePath();
        ctx.stroke();
    }

    //! ritar alla äpplena
    for ( apple in Apple.AppleList){
        Apple.AppleList[apple].draw();
    }

    //! kollar ifall jag krockar
    for ( const apple of Apple.AppleList){
   if (
    worm.segments[0].x < apple.x + apple.width / 2 &&
    worm.segments[0].x + worm.width / 2 > apple.x &&
    worm.segments[0].y < apple.y + apple.height &&
    worm.segments[0].y + worm.height > apple.y
) {
    
    apple.x = Math.floor(Math.random() * (canvas.width - apple.width) + 5);
    apple.y = Math.floor(Math.random() * (canvas.height - apple.height) + 5);
    console.log("");
    Apple.Point++;
}
    }

    diecheck(newHead.x, newHead.y);
}

function diecheck(x, y) {

    if (x - 5 + worm.width / 2 < 0 || x - 5 + worm.width / 2 > canvas.width || y + 5 - worm.height / 2 < 0 || y - 5 + worm.height / 2 > canvas.height) {
        alert("you died");
        restartProgram();
    }
}


document.addEventListener("keydown", function (event) {

    if (event.key === "ArrowRight" || event.key === "d") {
        ymove = 0;
        xmove = moveNumber;
    }
    if (event.key === "ArrowLeft" || event.key === "a") {
        ymove = 0;
        xmove = -moveNumber;
    }
    if (event.key === "ArrowUp" || event.key === "w") {
        xmove = 0;
        ymove = -moveNumber;
    }
    if (event.key === "ArrowDown" || event.key === "s") {
        xmove = 0;
        ymove = moveNumber;
    }



});





function restartProgram() {
    xmove = moveNumber;
    ymove = 0;
    tiden = 0;
    Apple.point =0;
    tid.innerHTML = "Snake du har levt i 0 sekunder" + "<br>" + " dina poäng är: " + Apple.Point; // Reset timer display
    worm.segments = [{ x: canvas.width / 2, y: canvas.height / 2 }];

}

drawWorm();






