<?php declare (strict_types = 1);

interface Builder {
  public function get();
  public function reset(): void;
  public function set_seats(int $number): void;
  public function set_engine(string $engine): void;
  public function set_trip_computer(string $computer): void;
  public function set_gps(string $gps): void;
}