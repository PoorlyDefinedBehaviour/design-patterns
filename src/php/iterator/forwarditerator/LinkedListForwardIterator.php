<?php declare (strict_types = 1);

require_once __DIR__ . "/ForwardIterator.php";

class LinkedListForwardIterator extends ForwardIterator {
  public function next() {
    $data = $this->component->data;
    $this->component = $this->component->next;

    if (!$this->component) {
      $this->done = true;
    }

    return $data;
  }
}