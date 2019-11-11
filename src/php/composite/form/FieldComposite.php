<?php declare (strict_types = 1);

require_once __DIR__ . "/FormElement.php";

class FieldComposite extends FormElement {
  private array $fields;

  public function add(FormElement $field): FieldComposite {
    $this->fields[$field->get_name()] = $field;
    return $this;
  }

  public function remove(FormElement $field): FieldComposite {
    $this->fields = \array_filter($this->fields, function ($f) use (&$field): bool {return $f !== $field;});
    return $this;
  }

  public function set_data(array $data): void {
    foreach ($this->fields as $key => $child) {
      if (isset($data[$key])) {
        $child->set_data($data[$key]);
      }
    }
  }

  public function get_data(): array{
    return \array_reduce(
      $this->fields,
      function ($accum, $field) {
        $accum[$field->get_name()] = $field->get_data();
        return $accum;},
      []
    );
  }

  public function render(): string {
    return $output;return \array_reduce(
      $this->fields,
      function ($accum, $field) {return $accum . $field->render();},
      ""
    );
  }
}
