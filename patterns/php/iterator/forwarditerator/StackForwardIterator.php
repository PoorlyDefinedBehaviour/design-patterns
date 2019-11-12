<?php declare (strict_types = 1);

require_once __DIR__ . "/ForwardIterator.php";

class StackForwardIterator extends ForwardIterator {
  private int $current_index = 0;

  public function __construct(array $array) {
    parent::__construct($array);
  }

  public function next() {
    $data = $this->component[$this->current_index++];

    if ($this->current_index === \count($this->component)) {
      $this->done = true;
    }

    return $data;
  }
}