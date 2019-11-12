<?php declare (strict_types = 1);

require_once __DIR__ . "/file/File.php";

function main(): void {
  $file = new File();

  $path = __DIR__ . "/test.txt";

  $file->open($path)
    ->write("hello world\n")
    ->close();

  echo $file->open($path)
    ->read();
}
main();