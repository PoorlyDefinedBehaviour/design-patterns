<?php declare (strict_types = 1);

class Router {
  public function get(string $path, $controller): Router {
    return $this;
  }

  public function post(string $path, $controller): Router {
    return $this;
  }

  public function patch(string $path, $controller): Router {
    return $this;
  }

  public function put(string $path, $controller): Router {
    return $this;
  }

  public function delete(string $path, $controller): Router {
    return $this;
  }
}