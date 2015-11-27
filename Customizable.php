<?php

class Customizable {
	protected $cssClass;

	public function __construct() {
		$this->cssClass = array();
	}

	public function addCssClass($class) {
		$this->cssClass[] = $class;
	}

	public function rmCssClass($class) {
		if(($key = array_search($class, $this->cssClass)) !== false) {
		    unset($this->cssClass[$key]);
		}
	}

	public function getCssClassStr() {
		$str = '';
		foreach ($this->cssClass as $class) {
			$str .= $class . ' ';
		}
		return $str;
	}

	public function renderCssClass() {
		$res = '';
		if (count($this->cssClass) > 0) {
			$res .= 'class="';
			foreach ($this->cssClass as $class) {
				$res .= $class . ' ';
			}
			$res .= '" ';
		}

		return $res;
	}
}