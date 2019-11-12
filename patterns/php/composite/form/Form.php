<?php declare (strict_types = 1);

require_once __DIR__ . "/FieldComposite.php";

class Form extends FieldComposite {
  private string $url;

  public function __construct(string $name, string $title, string $url) {
    parent::__construct($name, $title);
    $this->url = $url;
  }

  public function render(): string {
    $output = parent::render();
    return "<form action=\"{$this->url}\">\n<h3>{$this->title}</h3>\n$output</form>\n";
  }
}