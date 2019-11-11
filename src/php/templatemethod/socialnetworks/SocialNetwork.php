<?php declare (strict_types = 1);

abstract class Socialnetwork {
  protected string $username;
  protected string $password;

  public function __construct(string $username, string $password) {
    $this->username = $username;
    $this->password = $password;
  }

  public function post(string $message): SocialNetwork {
    $this->login($this->username, $this->password);
    $this->send_message($message);
    $this->logout();

    return $this;
  }

  abstract protected function login(string $username, string $password): void;
  abstract protected function logout(): void;
  abstract protected function send_message(string $message): void;
}