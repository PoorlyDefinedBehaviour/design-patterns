<?php declare (strict_types = 1);

require_once __DIR__ . "/interfaces/Notification.php";
require_once __DIR__ . "/notifications/EmailNotification.php";
require_once __DIR__ . "/notifications/SlackNotification.php";
require_once __DIR__ . "/services/SlackApi.php";

function send_message(Notification $notification): void {
  $notification->send("test", "hello world!");
}

function main(): void {
  $email_notification = new EmailNotification("foo@gmail.com");
  send_message($email_notification);

  $slack_notification = new SlackNotification(new SlackApi("login", "api-key"), "chat_id-123");
  send_message($slack_notification);

}
main();