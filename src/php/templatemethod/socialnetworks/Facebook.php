<?php declare (strict_types = 1);

require_once __DIR__ . "/SocialNetwork.php";

class Facebook extends SocialNetwork {
  protected function login(string $username, string $password): void {
    // login to facebook
  }

  protected function logout(): void {
    // logout from facebook
  }

  protected function send_message(string $message): void {
    // send message to facebook
  }
}