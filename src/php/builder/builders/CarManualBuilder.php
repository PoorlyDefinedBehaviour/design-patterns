<?php declare (strict_types = 1);

require_once __DIR__ . "/../interfaces/Builder.php";
require_once __DIR__ . "/../manual/Manual.php";

class CarManualBuilder implements Builder {
  private  ? Manual $manual = null;

  public function reset() : void {}
  public function set_seats(int $number): void {}
  public function set_engine(string $engine): void {}
  public function set_trip_computer(string $computer): void {}
  public function set_gps(string $gps): void {}

  public function get(): ?Manual{
    $this->reset();
    return $this->manual;
  }
}
