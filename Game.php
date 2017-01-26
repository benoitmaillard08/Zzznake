<?php 
class Game {
	private $id;
	private $name;
	private $players;
	private $running;

	public function __construct($id, $name) {
		$this->id = $id;
		$this->name = $name;
		$this->running = false;

		$this->players = array();
	}
	// Allow to add a player in game session
	public function addPlayer($name, $id_db) {
		$player = new Player($id_db, $name);

		// adding player at key "id"
		$this->players[$id_db] = $player;

		return $player;
	}

	public function checkPlayer($idPlayer) {
		$requestingPlayer = $this->getPlayer($idPlayer);

		$posX = $requestingPlayer->getX();
		$posY = $requestingPlayer->getY();

		foreach ($this->players as $id => $p) {
			// only other players positions are checked
			echo(json_encode($p->getPositions()));
			echo("\n");
			echo($posX . " " . $posY);
			echo("\n");
			$positions = $p->getPositions();
			$length = count($positions);
			$i = 0;
			echo("l---".$length."--");
			
			while ($i < $length - 3) {
				$distance = ((posX - positions[i][0])**2 + (posY - positions[i][1])**2)**0.5;

				if ($distance < 2.5) {
					echo($distance);
					return True;
				}
			}
		}
		return False;
	}

	// Returns data about session and player positions
	public function update() {
		// array containing players data
		$players = array();

		$readyFlag = true;

		foreach ($this->players as $id => $p) {
			$players[$id] = $p->getData();

			if (!$p->isReady()) {
				$readyFlag = false;
			}
		}

		// if all the players are ready, the game starts running
		if ($readyFlag && count($this->players) > 0) {
			$this->running = true;
		}

		$sessionData = array(
			"name" => $this->name,
			"running" => $this->running,
			"players" => $players,
		);

		return $sessionData;
	}

	public function getPlayer($id) {
		return $this->players[$id];
	}

	public function isRunning() {
		return $this->running;
	}
}

class Player {
	private $id;
	private $name;
	private $positions;
	private $ready;
	// private $x;
	// private $y;

	public function __construct($id, $name) {
		$this->id = $id;
		$this->name = $name;
		$this->ready = false;

		// Generating random starting position
		$x = rand(0, 500);
		$y = rand(0, 500);

		// History of movements
		$this->positions = array();
		$this->newPoint($x, $y);
	}

	public function ready() {
		$this->ready = true;
	}

	// Adds a new point in movement history
	public function newPoint($x, $y) {
		$pos = array($x, $y);

		array_push($this->positions, $pos);
	}

	// Change current position of snake head
	public function editPoint($x, $y) {
		end($this->positions)[0] = $x;
		end($this->positions)[1] = $y;
	}

	// Returns current x coordinate
	public function getX() {
		return end($this->positions)[0];
	}
	// Returns current y coordinate
	public function getY() {
		return end($this->positions)[1];
	}
	// Returns player name
	public function getName() {
		return $this->name;
	}
	public function isReady() {
		return $this->ready;
	}
	public function getData() {
		$playerData = array();
		$playerData["id"] = $this->id;
		$playerData["name"] = $this->name;
		$playerData["lastpos"] = array($this->getX(), $this->getY());
		$playerData["ready"] = $this->ready;

		return $playerData;
	}

	// Returns whole history of positions
	public function getPositions() {
		return $this->positions;
	}
}
?>