<?php declare (strict_types = 1);

interface LoggingStrategy {
  public function format(string $text): string;
  public function log(string $text): void;
}