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

    // console.log(x1, y1, x2, y2);
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
        this.moveX = 0;
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

// DistantZnake
function DistantZnake(startX, startY, color, parent) {
    this.headX = startX;
    this.headY = startY;
    this.parent = parent;
}
DistantZnake.prototype.setPos = function(x, y) {
    this.newX = x;
    this.newY = y;
}

DistantZnake.prototype.move = function() {
    // Increment position
    if (this.headX && this.newX) {
        drawLine(this.headX, this.headY, this.newX, this.newY);
    }

    // console.log("distant", this.headX, this.headY, this.newX, this.newY);

    this.headX = this.newX;
    this.headY = this.newY;

    // console.log("test");
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

    $("#ready").click(function() {
        game.ready = true;
    });

    this.running = false;
    this.ready = false;

    // array of snakes
    this.znake = null;
    this.distantZnakes = {};

    // initializing mouse position
    this.mouseX = CWIDTH / 2 + 1;
    this.mouseY = CHEIGHT / 2 + 1;

    // Finding "id" GET parameter
    this.sessionId = window.location.search.split("id=")[1];

    this.joinSession();
}
Game.prototype.joinSession = function() {
    var game = this;

    console.log(this.sessionId);
    $.getJSON("session-join.php", {"id" : this.sessionId}, function(response) {
        console.log(response);

        // this is the player ID in database; not ID of the session
        game.playerID = response.id;
        console.log(game.playerID);

        game.addZnake(response.lastpos[0], response.lastpos[1], "yellow");
    })
}

// addZnake ----------------------------------------------------------
Game.prototype.addZnake = function(startX, startY, color) {
    // instancing and adding a new znake to array
    var znake = new Znake(startX, startY, color, this);
    this.znake = znake;
}

Game.prototype.addDistantZnake = function(id, startX, startY, color) {
    // instancing and adding a new znake to array
    var znake = new DistantZnake(startX, startY, color, this);
    this.distantZnakes[id] = znake;
}

// launch ------------------------------------------------------------
Game.prototype.launch = function() {
    var game = this;
    setInterval(function() {
        game.tic();
    }, 50);
}

// updateGUI ---------------------------------------------------------
Game.prototype.updateGUI = function(response) {
    // code here

    var nbPlayersWaiting = response.players.length;

    if (nbPlayersWaiting > 0){

        var $container = $('<div class="ui raised padded container segment">');
        var $textContainer = $('<div class="ui text container">'); 

            for (var i = 0; i < nbPlayersWaiting; i++){
                var $columnGrid = $('<div class="ui one column grid">');
                var $column = $('<div class="column">');  
                var $content = $('<div class="right floated content">');

                if (response.players[i].ready){
                    var $status = $('<h2 class="ui header">' + response.players[i].name +' &nbsp; <a class="ui green tag label">Ready</a></h2>');
                }else{
                    var $status = $('<h2 class="ui header">' + response.players[i].name +' &nbsp; <a class="ui red tag label">Not ready</a></h2>');
                }
            $content.append($status);
            $content.append('</div>');

            $column.append($content);
            $column.append('</div>');

            $columnGrid.append($column);
            $columnGrid.append('</div>');

            $textContainer.append($columnGrid);
            $textContainer.append('</div>');
            
            }

        $container.append($textContainer);
        $container.append('</div>');

        $('#game_id').html($container);
    }
    
    /*
{  
   "name":"game0",
   "running":true,
   "players":[  
      {  
         "id":0,
         "name":"michel",
         "lastpos":[  
            2411,
            506
         ],
         "ready":true
      },
      {  
         "id":1,
         "name":"jean-michel2",
         "lastpos":[  
            500,
            497
         ],
         "ready":false
      }
   ]
}
    */
}

// tic ---------------------------------------------------------------
Game.prototype.tic = function() {
    if (this.running) {
        this.znake.move();
        for (var z in this.distantZnakes) {
            this.distantZnakes[z].move();
            // console.log("test2");
        }
    }

    var params = {"id" : this.sessionId};
    if (this.running) {
        params["x"] = this.znake.headX;
        params["y"] = this.znake.headY;
        params["type"] = "new";
    }
    else {
        params["ready"] = this.ready;
    }
    var game = this;
    console.log("tic");
    $.getJSON("session-update.php", params, function(response) {
        console.log(response);
        for (var id in response.players) {
            var player = response.players[id];

            // position given by the server
            var x = player.lastpos[0];
            var y = player.lastpos[1];

            if (player.id == game.playerID) {
                // console.log("this is the local player");
            }
            // in case the snake doesn't exist yet
            else if (game.distantZnakes[player.id] == undefined) {
                game.addDistantZnake(player.id, x, y, "blue");
                // console.log("new player added !");
            }
            // in case it already exists
            else {
                game.distantZnakes[player.id].setPos(x, y);
                // console.log("this is a distant player");
            }

            if (response.running) {
                game.running = true;
            }

            game.updateGUI(response);
        }
    });
}

var g = new Game();

g.launch();

});