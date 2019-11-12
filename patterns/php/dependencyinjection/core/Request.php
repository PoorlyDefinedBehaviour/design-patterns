<?php declare (strict_types = 1);

class Request {
  public function param(string $param): string {
    return "foo";
  }

  public function query(): string {
    return "foo";
  }

  public function body(): string {
    return "foo";
  }
}