<?php

require_once('Customizable.php');

class Cell extends Customizable {
	protected $content;
	protected $colspan = null;
	protected $rowspan = null;

	public function __construct($_content='') {
		$this->content = $_content;

		parent::__construct();
	}

	public function render() {
		echo '<td ' . $this->renderCssClass();
		
		if ($this->colspan != null)
			echo ' colspan=' . $this->colspan;
		if ($this->rowspan != null)
			echo 'rowspan=' . $this->rowspan;

		echo '>' . $this->content . '</td>';
	}

	/**SETTERS**/
	public function setContent($_content) {
		$this->content = $_content;
	}

	public function setColspan($_colspan) {
		$this->colspan = $_colspan;
	}

	public function setRowspan($_rowspan) {
		$this->rowspan = $_rowspan;
	}

	/**GETTERS**/
	public function getContent() { return $this->content; }

	public function getColspan() { return $this->colspan; }
	
	public function getRowspan() { return $this->rowspan; }
}