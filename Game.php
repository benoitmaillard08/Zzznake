<?php 
class Game {
	private $id;
	private $name;
	private $players;
	private $nextId;
	private $running;

	public function __construct($id, $name) {
		$this->id = $id;
		$this->name = $name;
		$this->nextId = 0;

		$this->players = array();
	}
	// Allow to add a player in game session
	public function addPlayer($name) {
		$player = new Player($this->nextId, $name);

		// adding player at key "id"
		$this->players[$this->nextId] = $player;

		$this->nextId ++;

		return $player;
	}

	// Returns 2-dimensional array containing last positions of players
	public function getLastPositions() {
		$last = array();

		foreach ($this->players as $id => $p) {
			$last[$id] = array($p->getX(), $p->getY());
		}

		return $last;
	}

	public function getPlayer($id) {
		return $this->players[$id];
	}
}

class Player implements jsonSerializable {
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
		$x = rand(0, 1000);
		$y = rand(0, 800);

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
	// Returns whole history of positions
	public function getPositions() {
		return $this->positions;
	}

	public function jsonSerialize() {
		return get_object_vars($this);
	}
}
?>