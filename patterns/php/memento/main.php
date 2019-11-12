<?php declare (strict_types = 1);

require_once __DIR__ . "/transaction/Transaction.php";
require_once __DIR__ . "/transaction/TransactionMemento.php";

function main(): void {
  $transaction = new Transaction();
  $transaction->set_state("some state");

  $memento;

  try {
    $memento = $transaction->save();
    $transaction->set_state("some invalid state");
  } catch (\Exception $e) {
    $transaction->restore($memento);
  }
}
main();