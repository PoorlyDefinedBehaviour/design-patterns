<?php declare (strict_types = 1);

require_once __DIR__ . "/../interfaces/Button.php";

class HTMLButton implements Button {
  private \Closure $click_handler;

  public function render(): void {
    echo "rendering html button\n";
  }

  public function on_click(\Closure $click_handler): void {
    $this->click_handler = $click_handler;
  }
}