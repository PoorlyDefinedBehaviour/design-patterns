<?php declare (strict_types = 1);

require_once __DIR__ . "/../interfaces/Publisher.php";
require_once __DIR__ . "/../interfaces/Subscriber.php";

class NewsLetter extends Thread implements Publisher {
  private $subscribers = [];

  public function notify($data): void {
    foreach ($this->subscribers as $subscriber) {
      $subscriber->notify([
        "data" => $data,
        "unsubscribe" => $this->unsubscribe,
      ]);
    }
  }

  public function subscribe(Subscriber $subscriber): void {
    $this->subscribers[] = $subscriber;
  }

  public function unsubscribe(Subscriber $subscriber): void {
    $this->subscribers = $array_filter($this->subscribers, function ($sub) use (&$subscriber): bool {
      return $sub === $subscriber;
    });
  }

  public function run(): void {
    while (true) {
      \sleep(2);
      $number = \rand(1, 10);
      $this->notify("random news number: {$number}");
    }
  }
}
