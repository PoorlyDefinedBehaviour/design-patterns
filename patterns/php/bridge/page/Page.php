<?php declare (strict_types = 1);

require_once __DIR__ . "/../renderer/Renderer.php";

abstract class Page {
  private Renderer $renderer;

  public function __construct(Renderer $renderer) {
    $this->renderer = $renderer;
  }

  public function set_rendere(Renderer $renderer) {
    $this->renderer = $renderer;
  }

  public abstract function view(): string;
}