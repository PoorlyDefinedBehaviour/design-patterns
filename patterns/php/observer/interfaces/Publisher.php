<?php declare (strict_types = 1);

require_once __DIR__ . "/Subscriber.php";

interface Publisher {
  public function subscribe(Subscriber $subscriber): void;
  public function unsubscribe(Subscriber $subscriber): void;
  public function notify($data): void;
}