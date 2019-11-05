<?php declare (strict_types = 1);

require_once __DIR__ . "/../interfaces/Button.php";

abstract class Dialog {
  abstract public function render(): void;
  abstract public function create_button(): Button;
}