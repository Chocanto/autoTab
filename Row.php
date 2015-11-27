<?php

require_once('Customizable.php');
require_once('Cell.php');

class Row extends Customizable {
	protected $cells;

	public function __construct($arr=null) {
		$this->cells = array();

		if ($arr != null) {
			foreach($arr as $ctn) {
				$row = new Cell($ctn);
				$this->addCell($ctn);
			}
		}
	}

	public function render() {
		echo '<tr>';
		foreach ($this->cells as $cell) {
			$cell->render();
		}
		echo '</tr>';
	}

	public function addCell($cell) {
		$this->cells[] = $cell;
	}

	public function setCells($cells) {
		$this->cells = $cells;
	}

	public function getCells() { return $this->cells; }
}