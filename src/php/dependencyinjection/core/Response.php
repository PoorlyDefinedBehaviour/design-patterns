<?php declare (strict_types = 1);

class Response {
  public function status(int $status): Response {
    return $this;
  }

  public function json(array $params): Response {
    return $this;
  }

  public function send(array $params): Response {
    return $this;
  }
}