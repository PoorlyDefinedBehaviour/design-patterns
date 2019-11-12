<?php declare (strict_types = 1);

require_once __DIR__ . "/../interfaces/Originator.php";
require_once __DIR__ . "/../interfaces/Memento.php";
require_once __DIR__ . "/Transaction.php";

class TransactionMemento implements Memento {
  private string $state;

  public function __construct(string $state) {
    $this->state = $state;
  }

  public function get_state(): string {
    return $this->state;
  }
}