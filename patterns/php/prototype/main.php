<?php declare (strict_types = 1);

require_once __DIR__ . "/shapes/Shape.php";
require_once __DIR__ . "/shapes/Circle.php";
require_once __DIR__ . "/shapes/Rectangle.php";

function main(): void {
  $rectangle = new Rectangle(10, 10);
  $circle = new Circle(20);

  $random_shape = function ($_) use (&$rectangle, &$circle) {
    return \rand(0, 10) > 5 ? $rectangle->clone() : $circle->clone();
  };

  $shapes =
    array_map(
    $random_shape,
    array_fill(0, 10, null)
  );

  var_dump($shapes);
}
main();