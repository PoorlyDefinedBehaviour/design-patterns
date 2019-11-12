<?php declare (strict_types = 1);

require_once __DIR__ . "/Renderer.php";

class JSONRenderer implements Renderer {
  public function render_title(string $title): string {
    return '"title": "' . $title . '"';
  }

  public function render_text_block(string $text): string {
    return '"text": "' . $text . '"';
  }

  public function render_image(string $url): string {
    return '"img": "' . $url . '"';
  }

  public function render_link(string $url, string $title): string {
    return '"link": {"href": "' . $title . '", "title": "' . $title . '""}';
  }

  public function render_header(): string {
    return '';
  }

  public function render_footer(): string {
    return '';
  }

  public function render_parts(array $parts): string {
    return "{\n" . implode(",\n", array_filter($parts)) . "\n}";
  }
}
