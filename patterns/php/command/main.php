<?php declare (strict_types = 1);

require_once __DIR__ . "/app/App.php";

function main(): void {
  $app = new App();
  $app->init();
}
main();