<?php declare (strict_types = 1);

require_once __DIR__ . "/Memento.php";

interface Originator {
  public function save(): Memento;
  public function restore(Memento $memento);
}