$(function() {
const CWIDTH = $("#canvas").width();
const CHEIGHT = $("#canvas").height();
const SPEED = 3;

// drawCircle --------------------------------------------------------
function drawCircle(x, y, radius, color) {
    var context = $("#canvas")[0].getContext("2d");
    context.beginPath();
    context.arc(x, y, radius, 0, 2 * Math.PI, false);
    context.fillStyle = color;
    context.lineWidth = 0;
    context.fill();
    context.closePath();
}
// drawLine ----------------------------------------------------------
function drawLine(x1, y1, x2, y2) {
    var context = $("#canvas")[0].getContext("2d");
    context.beginPath();
    context.moveTo(x1, y1);
    context.lineTo(x2, y2);
    context.lineWidth = 5;
    context.lineCap = "round";
    context.strokeStyle = "#000000";
    context.stroke();
    context.closePath();

    console.log(x1, y1, x2, y2);
}

function distance(x1, y1, x2, y2) {
    return Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2));
}

// Znake #############################################################
function Znake(startX, startY, color, parent) {
    this.headX = startX;
    this.headY = startY;
    this.parent = parent;
    this.angle = 0;
}

// move --------------------------------------------------------------
Znake.prototype.move = function() {
    // Change angle
    if (this.parent.arrowRight) {
        this.angle += Math.PI / 20;
    }
    if (this.parent.arrowLeft) {
        this.angle -= Math.PI / 20;
    }

    // Handling canvas borders
    if (this.headX > CWIDTH) {
        this.headX = 0;
    }
    else if (this.headX < 0) {
        this.headX = CWIDTH;
    }
    if (this.headY > CHEIGHT) {
        this.headY = 0;
    }
    else if (this.headY < 0) {
        this.headY = CHEIGHT; 
    }

    // Calculate movement vector
    var moveX = Math.cos(this.angle) * SPEED;
    var moveY = Math.sin(this.angle) * SPEED;

    // Draw new segment
    drawLine(this.headX, this.headY, this.headX + moveX, this.headY + moveY);

    // Increment position
    this.headX += moveX;
    this.headY += moveY;
}

// Game ##############################################################
function Game() {
    var game = this;
    // mouse position is stored as object properties
    $("#canvas").keydown(function(event) {
        if (event.key == "ArrowRight") {
            game.arrowRight = true;
        }
        else if (event.key == "ArrowLeft") {
            game.arrowLeft = true;
        }

    });
    $("#canvas").keyup(function(event) {
        if (event.key == "ArrowRight") {
            game.arrowRight = false;
        }
        else if (event.key == "ArrowLeft") {
            game.arrowLeft = false;
        }

    });

    // array of snakes
    this.znakes = [];

    // initializing mouse position
    this.mouseX = CWIDTH / 2 + 1;
    this.mouseY = CHEIGHT / 2 + 1;
}

// addZnake ----------------------------------------------------------
Game.prototype.addZnake = function(startX, startY, color) {
    // instancing and adding a new znake to array
    znake = new Znake(startX, startY, color, this);
    this.znakes.push(znake);
}

// launch ------------------------------------------------------------
Game.prototype.launch = function() {
    var game = this;
    setInterval(function() {
        game.tic();
    }, 30);
}

// tic ---------------------------------------------------------------
Game.prototype.tic = function() {
    for (var i = 0; i < this.znakes.length; i++) {
        this.znakes[i].move();
    }
}

var g = new Game();
g.addZnake(100, 100, "blue");

g.launch();

});