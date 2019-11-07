<?php declare (strict_types = 1);

require_once __DIR__ . "/Shape.php";

class Rectangle extends Shape {
  private float $width;
  private float $height;

  public function __construct(float $width, float $height) {
    $this->width = $width;
    $this->height = $height;
  }

  public function get_width(): float {return $this->width;}
  public function get_height(): float {return $this->height;}
  public function get_area(): float {return $this->width * $this->height;}

  public static function rectangle_from(Rectangle $rectangle): Rectangle {
    return new Rectangle($rectangle->get_width, $rectangle->get_height);
  }

  public function clone (): shape {
    return new Rectangle($this->width, $this->height);
  }
}
