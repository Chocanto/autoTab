<?php

require_once('Header.php');
require_once('Customizable.php');
require_once('Row.php');

class Table extends Customizable {
	protected $headers;
	protected $caption;
	protected $rows;

	public function __construct($_caption='') {
		$this->caption = $_caption;
		$this->rows = array();

		parent::__construct();
	}

	public function addHeader($header) {
		$id = $header->getId();
		$this->headers[$id] = $header;
	}

	public function addRow($row) {
		$this->rows[] = $row;
	}

	public function addRowStr($arr) {
		$row = new Row();

		foreach ($arr as $key => $str) {
			$cell = new Cell($str);
			$row->addCell($cell);
		}

		$this->addRow($row);
	}

	public function delHeader($id) {
		unset($this->headers[$id]);
	}

	public function addHeadersStr($arr) {
		foreach ($arr as $key => $str) {
			$header = new Header();
			$header->setContent($str);
			$this->addHeader($header);
		}
	}

	public function render() {
		echo '<table>';
		if ($this->caption != '')
			echo '<caption>' . $this->caption . '</caption>';

		$this->renderHeaders();
		$this->renderBodyRows();
		echo '</table>';
	}

	public function renderHeaders() {
		$this->sortHeaders();

		echo '<thead><tr>';
		foreach ($this->headers as $header) {
			$header->render();
		}
		echo '</tr></thead>';
	}

	public function renderBodyRows() {
		echo '<tbody>';
		foreach ($this->rows as $row) {
			$row->render();
		}
		echo '</tbody>';
	}

	public function sortHeaders() {
		usort($this->headers, function($a, $b) {
		    return strcmp($a->getPosition(), $b->getPosition());
		});
	}

	public function addMatrix($arr) {
		foreach ($arr as $rowCtn) {
			$row = new Row();
			foreach ($rowCtn as $cellCtn) {
				$cell = new Cell($cellCtn);
				$row->addCell($cell);
			}
			$this->addRow($row);
		}
	}

	/**SETTERS**/
	public function setHeaders($_headers) {
		$this->$headers = $_headers;
	}

	public function setCaption($_caption) {
		$this->$caption = $_caption;
	}

	/**GETTERS**/
	public function getHeaders() { return $this->headers; }

	public function getCaption() { return $this->caption; }
}