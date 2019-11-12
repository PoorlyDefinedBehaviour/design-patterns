<?php declare (strict_types = 1);

require_once __DIR__ . "/youtubedownloader/YoutubeDownloader.php";

function main(): void {
  $youtube_downloader = new YoutubeDownloader("youtube-api-key");
  $youtube_downloader->download("video-url");
}
main();