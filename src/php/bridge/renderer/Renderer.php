<?php declare (strict_types = 1);

interface Renderer {
  public function render_title(string $title): string;
  public function render_text_block(string $text): string;
  public function render_image(string $url): string;
  public function render_link(string $url, string $title): string;
  public function render_header(): string;
  public function render_footer(): string;
  public function render_parts(array $parts): string;
}