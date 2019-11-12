<?php declare (strict_types = 1);

require_once __DIR__ . "/Flyweight.php";

class FlyweightFactory {
  private array $flyweights = [];

  private function hash(array $flyweight): string {
    return \implode("_", $flyweight);
  }

  public function __construct(array $flyweights) {
    foreach ($flyweights as $flyweight) {
      $this->flyweights[$this->hash($flyweight)] = $flyweight;
    }
  }

  public function get_flyweight(array $shared_state): Flyweight {
    $hash = $this->hash($shared_state);
    if (!isset($this->flyweights[$hash])) {
      echo "creating new flyweight\n";
      $this->flyweights[$hash] = new Flyweight($shared_state);
    }
    return $this->flyweights[$hash];
  }
}