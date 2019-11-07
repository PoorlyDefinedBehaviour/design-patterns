<?php declare (strict_types = 1);

require_once __DIR__ . "/sqlquerybuilder/SQLQueryBuilder.php";

function main(): void {
  $query_builder = new SQLQueryBuilder();

  echo $query_builder
    ->select("name, age")
    ->from("users")
    ->where("age > 18")
    ->unwrap();
}
main();