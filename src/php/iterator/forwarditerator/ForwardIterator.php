<?php declare (strict_types = 1);

abstract class ForwardIterator {
  protected $component;
  protected bool $done = false;

  public function __construct($component) {
    $this->component = $component;
    if (!$this->component) {
      $this->done = true;
    }
  }

  public function done(): bool {return $this->done;}

  abstract public function next();
}