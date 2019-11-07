<?php declare (strict_types = 1);

class FFMpeg {
  private $video;

  public function create(): FFMpeg {
    return $this;
  }

  public function open(string $path): FFMpeg {
    return $this;
  }

  public function filters(array $filters): FFMpeg {
    return $this;
  }

  public function resize(int $width, int $height): FFMpeg {
    return $this;
  }

  public function synchronize(): FFMpeg {
    return $this;
  }

  public function frame(int $frame_number): FFMpeg {
    return $this;
  }

  public function save(string $path): FFMpeg {
    return $this;
  }
}