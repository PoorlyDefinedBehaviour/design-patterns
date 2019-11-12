<?php declare (strict_types = 1);

class YoutubeApi {
  private string $key;
  private $video;

  public function __construct(string $key) {
    $this->key = $key;
  }

  public function download_video(string $url): YoutubeApi {
    return $this;
  }

  public function save_to(string $path): YoutubeApi {
    return $this;
  }
}