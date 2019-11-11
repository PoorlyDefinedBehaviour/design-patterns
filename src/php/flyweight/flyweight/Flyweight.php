<?php declare (strict_types = 1);

class Flyweight {
  private $shared_state;

  public function __construct($shared_state) {
    $this->shared_state = $shared_state;
  }
}