<?php declare (strict_types = 1);

require_once __DIR__ . "/SocialNetwork.php";

class Twitter extends SocialNetwork {
  protected function login(string $username, string $password): void {
    // login to twitter
  }

  protected function logout(): void {
    // logout from twitter
  }

  protected function send_message(string $message): void {
    // send message to twitter
  }
}