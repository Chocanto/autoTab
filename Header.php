<?php

require_once('Cell.php');

class Header extends Cell {
	protected $id;
	protected $position;

	static private $lastAutoId = 0;
	static private $lastAutoPosition = 0;

	public function __construct($id=null, $position=null) {
		if ($id == null) {
			self::$lastAutoId++;
			$id = self::$lastAutoId;
		}

		if ($position == null) {
			self::$lastAutoPosition++;
			$position = self::$lastAutoPosition;
		}

		$this->id = $id;
		$this->content = $id;
		$this->position = $position;

		parent::__construct();
	}

	public function render() {
		echo '<th ' . $this->renderCssClass() . '>';
		echo $this->content;
		echo '</th>';
	}

	/**SETTERS**/
	public function setId($_id) {
		$this->id = $_id;
	}

	public function setPosition($_position) {
		$this->position = $_position;
	}

	/**GETTERS**/
	public function getId() { return $this->id; }
	
	public function getPosition() { return $this->position; }
}