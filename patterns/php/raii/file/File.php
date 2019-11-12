<?php declare (strict_types = 1);

class File {
  private $file;
  private string $path;

  public function __destruct() {
    $this->close();
  }

  public function open(string $path, string $mode = "a+"): File {
    $this->path = $path;
    $this->file = \fopen($path, $mode);
    return $this;
  }

  public function write(string $content): File {
    \fwrite($this->file, $content);
    return $this;
  }

  public function read(): string {
    return $this->file ? \fread($this->file, \filesize($this->path)) : "";
  }

  public function close(): void {
    if ($this->file) {
      \fclose($this->file);
    }
  }
}