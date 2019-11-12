<?php declare (strict_types = 1);

class SimplePage extends Page {
  protected $title;
  protected $content;

  public function __construct(Renderer $renderer, string $title, string $content) {
    parent::__construct($renderer);
    $this->title = $title;
    $this->content = $content;
  }

  public function view(): string {
    return $this->renderer->render_parts([
      $this->renderer->render_header(),
      $this->renderer->render_title($this->title),
      $this->renderer->render_text_block($this->content),
      $this->renderer->render_footer(),
    ]);
  }
}