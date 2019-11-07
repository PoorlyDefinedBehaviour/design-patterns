<?php declare (strict_types = 1);

interface Notification {
  public function send(string $title, string $message): void;
}