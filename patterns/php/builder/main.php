<?php declare (strict_types = 1);

require_once __DIR__ . "/builders/CarBuilder.php";
require_once __DIR__ . "/builders/CarManualBuilder.php";

function main(): void {
  $car_builder = new CarBuilder();
  $car_builder->set_seats(4);
  $car_builder->set_engine("some engine");
  $car_builder->set_trip_computer("some computer");
  $car = $car_builder->get();

  $car_manual_builder = new CarManualBuilder();
  $car_manual_builder->set_seats(4);
  $car_manual_builder->set_engine("some engine");
  $car_manual_builder->set_trip_computer("some computer");
  $car_manual = $car_manual_builder->get();
}
main();