<?php declare (strict_types = 1);

interface Button {
  public function render(): void;
  public function on_click(\Closure $click_handler): void;
}