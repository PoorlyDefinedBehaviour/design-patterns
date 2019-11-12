#include <iostream>
#include "querybuilder/SQLQueryBuilder.hpp"

template <typename... Ts>
auto print(Ts const &... args) -> void { (std::cout << ... << args); }

template <typename... Ts>
auto println(Ts const &... args) -> void { print(args..., '\n'); }

auto main() -> int
{
  SQLQueryBuilder query_builder;
  println(
      query_builder.insert("users")
          .columns("first_name, last_name, age")
          .values("john, doe, 18")
          .unwrap());

  println(
      query_builder.select("first_name, age")
          .from("users")
          .where("age > 18")
          .unwrap());

  println(
      query_builder.update("users")
          .set("age = '19'")
          .where("first_name = john")
          .unwrap());

  println(
      query_builder.delete_("")
          .from("users")
          .where("first_name = john")
          .unwrap());
}