<?php declare (strict_types = 1);

require_once __DIR__ . "/../interfaces/Strategy.php";

class NaivePriorityQueue {
  private array $elements = [];
  private int $_length = 0;
  private $sorting_strategy;

  public function __construct($sorting_strategy) {
    $this->sorting_strategy = $sorting_strategy;
  }

  private function assert_not_empty(): void {
    if ($this->_length === 0) {
      throw new \Exception("Operation requires a non empty queue");
    }
  }

  public function length(): int {return $this->_length;}
  public function is_empty(): bool {return $this->_length === 0;}

  public function push($element): NaivePriorityQueue {
    $this->elements[] = $element;
    $this->_length += 1;

    $this->sorting_strategy->sort($this->elements);
    return $this;
  }

  public function next() {
    $this->assert_not_empty();

    $element = $this->elements[0];
    unset($this->elements[0]);

    $this->elements = array_values($this->elements);
    $this->_length -= 1;

    return $element;
  }

  public function peek() {
    $this->assert_not_empty();
    return $this->elements[0];
  }
  public function clear(): NaivePriorityQueue {
    $this->elements = array();
    $this->_length = 0;
    return $this;
  }
}