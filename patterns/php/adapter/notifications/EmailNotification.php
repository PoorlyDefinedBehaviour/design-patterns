<?php declare (strict_types = 1);

require_once __DIR__ . "/../interfaces/Notification.php";

class EmailNotification implements Notification {
  private string $receiver;

  public function __construct(string $receiver) {
    $this->receiver = $receiver;
  }

  public function send(string $title, string $message): void {
    \mail($this->receiver, $title, $message);
    echo "Sent email with title '$title' to '{$this->receiver}' that says '$message'.";
  }
}