<?php declare (strict_types = 1);

abstract class FormElement {
  protected string $name;
  protected string $title;
  protected array $data;

  public function __construct(string $name, string $title) {
    $this->name = $name;
    $this->title = $title;
  }

  public function get_name(): string {
    return $this->name;
  }

  public function set_data(array $data) {
    $this->data = $data;
  }

  public function get_data(): array{
    return $this->data;
  }

  abstract public function render();
}