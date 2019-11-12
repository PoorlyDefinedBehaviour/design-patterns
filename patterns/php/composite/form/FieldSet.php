<?php declare (strict_types = 1);

require_once __DIR__ . "/FieldComposite.php";

class FieldSet extends FieldComposite {
  public function render(): string {
    $output = parent::render();
    return "<fieldset><legend>{$this->title}</legend>\n$output</fieldset>\n";
  }
}