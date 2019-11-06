<?php declare (strict_types = 1);

require_once __DIR__ . "/../interfaces/LoggingStrategy.php";

class FileLoggingStrategy implements LoggingStrategy {
  public function format(string $text): string {
    return $text;
  }

  public function log(string $text): void {
    $file_path = __DIR__ . "/../logs.log";
    $file = \fopen($file_path, "a+");
    \fwrite($file, $this->format($text));
    \fclose($file);
  }
}