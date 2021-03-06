<?php declare (strict_types = 1);

require_once __DIR__ . "/ForwardIterator.php";

class BinarySearchTreeForwardIterator extends ForwardIterator {
  private int $current_index = 0;

  public function __construct($tree) {
    $nodes = [];
    $tree->pre_order_traversal(\Closure::fromCallable(function ($value) use (&$nodes) {$nodes[] = $value;}));
    parent::__construct($nodes);
  }

  public function next() {
    $data = $this->component[$this->current_index++];

    if ($this->current_index === \count($this->component)) {
      $this->done = true;
    }
    return $data;
  }
}