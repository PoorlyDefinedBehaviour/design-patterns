<?php declare (strict_types = 1);

require_once __DIR__ . "/socialnetworks/SocialNetwork.php";
require_once __DIR__ . "/socialnetworks/Facebook.php";
require_once __DIR__ . "/socialnetworks/Twitter.php";

function main(): void {
  $username = "username";
  $password = "password";

  \array_map(
    function (SocialNetwork $social_network) {$social_network->post("hello world!");},
    [new Facebook($username, $password), new Twitter($username, $password)]
  );
}
main();