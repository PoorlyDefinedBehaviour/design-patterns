<?php declare (strict_types = 1);

interface Subscriber {
  public function notify($data): void;
}