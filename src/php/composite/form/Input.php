<?php declare (strict_types = 1);

require_once __DIR__ . "/FormElement.php";

class FormInput extends FormElement {
  private string $type;

  public function __construct(string $type) {
    $this->type = $type;
  }

  public function render(): string {
    return "<label for=\"{$this->name}\">{$this->title}</label>\n" .
      "<input name=\"{$this->name}\" type=\"{$this->type}\" value=\"{$this->data}\">\n";
  }
}