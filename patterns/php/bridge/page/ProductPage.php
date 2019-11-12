<?php declare (strict_types = 1);

require_once __DIR__ . "/Page.php";

class ProductPage extends Page {
  private $product;

  public function __construct(Renderer $renderer, Product $product) {
    parent::__construct($renderer);
    $this->product = $product;
  }

  public function view(): string {
    return $this->renderer->render_parts([
      $this->renderer->render_header(),
      $this->renderer->render_title($this->product->get_title()),
      $this->renderer->render_text_block($this->product->get_description()),
      $this->renderer->render_image($this->product->get_image()),
      $this->renderer->render_link("/cart/add/" . $this->product->get_id(), "Add to cart"),
      $this->renderer->render_footer(),
    ]);
  }
}