<?php declare (strict_types = 1);

require_once __DIR__ . "/Dialog.php";
require_once __DIR__ . "/../interfaces/Button.php";
require_once __DIR__ . "/../buttons/WindowsButton.php";

class WindowsDialog extends Dialog {
  public function render(): void {
    echo "rendering windows dialog\n";
  }

  public function create_button(): Button {
    return new WindowsButton();
  }
}