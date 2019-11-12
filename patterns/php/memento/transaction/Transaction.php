<?php declare (strict_types = 1);

require_once __DIR__ . "/../interfaces/Originator.php";
require_once __DIR__ . "/../interfaces/Memento.php";
require_once __DIR__ . "/TransactionMemento.php";

class Transaction implements Originator {
  private string $state;

  public function set_state(string $state): Transaction {
    if ($state === "some invalid state") {
      throw new \Exception("invalid state at Transaction->set_state(string)");
    }

    $this->state = $state;
    return $this;
  }

  public function save(): Memento {
    return new TransactionMemento($this->state);
  }

  public function restore(Memento $memento): Transaction {
    $this->state = $memento->get_state();
    return $this;
  }
}