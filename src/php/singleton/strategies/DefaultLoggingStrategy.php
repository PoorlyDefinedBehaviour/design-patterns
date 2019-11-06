<?php declare (strict_types = 1);

require_once __DIR__ . "/../interfaces/LoggingStrategy.php";

class DefaultLoggingStrategy implements LoggingStrategy {
  public function format(string $text): string {
    return "{$text}\n";
  }

  public function log(string $text): void {
    echo $this->format($text);
  }
}