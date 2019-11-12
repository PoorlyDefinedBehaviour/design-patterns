<?php declare (strict_types = 1);

require_once __DIR__ . "/Shape.php";

class Circle extends Shape {
  private float $radius = 0.0;

  public function __construct(float $radius) {
    $this->radius = $radius;
  }

  public function get_area(): float {return pi() * $this->radius ** 2;}
  public function get_radius(): float {return $this->radius;}

  public static function circle_from(Circle $circle): Circle {
    return new Circle($circle->radius);
  }

  public function clone (): Shape {
    return new Circle($this->radius);
  }
}
