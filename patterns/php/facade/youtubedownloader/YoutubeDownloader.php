<?php declare (strict_types = 1);

require_once __DIR__ . "/../services/YoutubeApi.php";
require_once __DIR__ . "/../lib/FFMpeg.php";

class YoutubeDownloader {
  private YoutubeApi $youtube_api;
  private FFMpeg $ffmpeg;

  public function __construct(string $youtube_api_key) {
    $this->youtube_api = new YoutubeApi($youtube_api_key);
    $this->ffmpeg = new FFMpeg();
  }

  public function download(string $url) {
    /** download video, resize, etc using ffmpeg*/
  }
}