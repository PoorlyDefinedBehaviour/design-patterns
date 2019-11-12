<?php declare (strict_types = 1);

require_once __DIR__ . "/logger/Logger.php";
require_once __DIR__ . "/strategies/FileLoggingStrategy.php";

function main(): void {
  $logger = Logger::get_instance();
  $logger->log("hello world!");

  $logger
    ->set_logging_strategy(new FileLoggingStrategy())
    ->log("hello world!\n");

}
main();