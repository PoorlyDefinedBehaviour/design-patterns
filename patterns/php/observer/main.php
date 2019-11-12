<?php declare (strict_types = 1);

require_once __DIR__ . "/news/NewsLetter.php";
require_once __DIR__ . "/person/Person.php";

function main(): void {
  $news_letter = new NewsLetter();

  $john = new Person("John");
  $bob = new Person("Bob");
  $alice = new Person("Alice");

  $news_letter->subscribe($john);
  $news_letter->subscribe($bob);
  $news_letter->subscribe($alice);

  $news_letter->start();
}
main();