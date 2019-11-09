<?php declare (strict_types = 1);

require_once __DIR__ . "/../services/SlackApi.php";
require_once __DIR__ . "/../interfaces/Notification.php";

class SlackNotification implements Notification {
  private SlackApi $slack;
  private string $slack_chat_id;

  public function __construct(SlackApi $slack, string $slack_chat_id) {
    $this->slack = $slack;
    $this->slack_chat_id = $slack_chat_id;
  }

  public function send(string $title, string $message): void {
    $this->slack->login();
    $this->slack->send_message($this->slack_chat_id, $title, \strip_tags($message));
  }
}