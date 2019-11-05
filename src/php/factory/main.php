<?php declare (strict_types = 1);

require_once __DIR__ . "/dialogs/WebDialog.php";
require_once __DIR__ . "/dialogs/WindowsDialog.php";

function main(): void {
  $dialog = \rand(0, 10) % 2 == 0 ? new WindowsDialog() : new WebDialog();
  var_dump($dialog);
}
main();