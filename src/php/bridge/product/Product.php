<?php declare (strict_types = 1);

class Product {
  private $id, $title, $description, $image, $price;

  public function __construct(
    string $id,
    string $title,
    string $description,
    string $image,
    float $price
  ) {
    $this->id = $id;
    $this->title = $title;
    $this->description = $description;
    $this->image = $image;
    $this->price = $price;
  }

  public function get_id(): string {return $this->id;}

  public function get_title(): string {return $this->title;}

  public function get_description(): string {return $this->description;}

  public function get_image(): string {return $this->image;}

  public function get_price(): float {return $this->price;}
}