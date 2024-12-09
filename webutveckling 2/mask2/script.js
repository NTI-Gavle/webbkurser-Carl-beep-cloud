let tid = document.getElementById("number");
let tiden=0;

// är för setinterval på tiden
let timern;
function timer()
{
    tiden+=1;
    tid.innerHTML="Snake du har levt i " + tiden + " sekunder";
}

const canvas = document.getElementById("myCanvas");
const ctx = canvas.getContext("2d");

let xmove = 0;
let ymove = 0;

let moveNumber = 4;
const worm = {
    segments: [], // Array to store the worm's segments
    maxLength: 10000, // Maximum number of segments
    width: 15, // Width of each rectangle
    height: 15, // Height of each rectangle
    color: 'orange'
};

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
    for (let i = 0; i < 5; i++) {
        const segment = worm.segments[i];
        ctx.beginPath();

        if (i === 0) {
            // Head of the worm
            ctx.fillStyle = "blue";
        } else {
            // Body of the worm
            ctx.fillStyle = worm.color;
        }

        // Draw a rectangle instead of a circle
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

    // Check for collisions
    diecheck(newHead.x, newHead.y);
}

function diecheck(x, y) {
    if (x < 0 || x > canvas.width || y < 0 || y > canvas.height) {
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
     
   startTimer();

});

function restartProgram() {
    xmove = 0;
    ymove = 0;

    worm.segments = [{ x: canvas.width / 2, y: canvas.height / 2 }];
}

drawWorm();





function startTimer() {
    if (!timern) {
        timern = setInterval(timer, 1000);
    } 
}