<?php declare (strict_types = 1);

require_once __DIR__ . "/../interfaces/Subscriber.php";

class Person implements Subscriber {
  private string $name;

  public function __construct(string $name) {
    $this->name = $name;
  }

  public function notify($data): void {
    echo "{$this->name} is reading {$data["data"]}\n";
  }
}