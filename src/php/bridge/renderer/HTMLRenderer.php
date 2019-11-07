<?php declare (strict_types = 1);

require_once __DIR__ . "/Renderer.php";

class HTMLRenderer implements Renderer {
  public function render_title(string $title): string {
    return "<h1>$title</h1>";
  }

  public function render_text_block(string $text): string {
    return "<div class='text'>$text</div>";
  }

  public function render_image(string $url): string {
    return "<img src='$url'>";
  }

  public function render_link(string $url, string $title): string {
    return "<a href='$url'>$title</a>";
  }

  public function render_header(): string {
    return "<html><body>";
  }

  public function render_footer(): string {
    return "</body></html>";
  }

  public function render_parts(array $parts): string {
    return implode("\n", $parts);
  }
}