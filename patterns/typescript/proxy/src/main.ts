interface Video {
  title: string;
  description: string;
  url: string;
  duration: number;
}

interface Downloader {
  download: (url: string) => Video;
}

class YoutubeDownloader implements Downloader {
  public download(url: string): Video {
    console.log(`YoutubeDownloader.download('${url}')`);

    return {
      title: "Some title",
      description: "Some description",
      url,
      duration: 100
    };
  }
}

class YoutubeDownloaderWithCache implements Downloader {
  private cache: Map<string, Video> = new Map<string, Video>();

  constructor(private readonly youtube_downloader: YoutubeDownloader) {}

  public download(url: string): Video {
    if (!this.cache.has(url)) {
      console.log(`YoutubeDownloaderWithCache.download('${url}')`);
      this.cache.set(url, this.youtube_downloader.download(url));
    }
    return this.cache.get(url)!;
  }
}

function download_from_youtube_with(downloader: Downloader): Video {
  return downloader.download("https://youtube.com/test-url");
}

function main(): void {
  const youtube_downloader = new YoutubeDownloader();
  download_from_youtube_with(youtube_downloader);
  download_from_youtube_with(youtube_downloader);
  download_from_youtube_with(youtube_downloader);

  const youtube_downloader_with_cache = new YoutubeDownloaderWithCache(
    youtube_downloader
  );
  download_from_youtube_with(youtube_downloader_with_cache);
  download_from_youtube_with(youtube_downloader_with_cache);
  download_from_youtube_with(youtube_downloader_with_cache);
}
main();
