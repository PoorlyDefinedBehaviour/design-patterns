<?php declare (strict_types = 1);

class SlackApi {
  private string $login;
  private string $key;

  public function __construct(string $login, string $key) {
    $this->login = $login;
    $this->key = $key;
  }

  public function login(): SlackApi {
    echo "Logged in to a slack account '{$this->login}'.\n";
    return $this;
  }

  public function send_message(string $chat_id, string $title, string $message): SlackApi {
    echo "Posted following message into the '$chat_id' with title $title in chat: '$message'.\n";
    return $this;
  }
}