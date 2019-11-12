import SQLQueryBuilder from "./querybuilder/SQLQueryBuilder";

function main(): void {
  const query_builder: SQLQueryBuilder = new SQLQueryBuilder();

  console.log(
    query_builder
      .select("name, age")
      .from("users")
      .where("age > 18")
      .unwrap()
  );
}
main();
