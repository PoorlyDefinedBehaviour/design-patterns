<?php declare (strict_types = 1);

require_once __DIR__ . "/flyweight/Flyweight.php";
require_once __DIR__ . "/flyweight/FlyweightFactory.php";

function main(): void {
  $factory = new FlyweightFactory([]);

  $mercedes_1 = $factory->get_flyweight(["Mercedes Benz", "C500", "red"]);
  $mercedes_2 = $factory->get_flyweight(["Mercedes Benz", "C500", "red"]);
  $mercedes_3 = $factory->get_flyweight(["Mercedes Benz", "C500", "red"]);
}
main();