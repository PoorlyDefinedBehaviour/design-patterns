#pragma once

#include <string>
#include <iostream>

class SQLQueryBuilder
{
private:
  std::string query = "";

public:
  auto select(std::string const &fields) -> SQLQueryBuilder
  {
    query = "SELECT " + fields;
    return *this;
  }

  auto from(std::string const &table) -> SQLQueryBuilder
  {
    query += " FROM " + table;
    return *this;
  }

  auto where(std::string const &predicate) -> SQLQueryBuilder
  {
    query += +" WHERE " + predicate;
    return *this;
  }

  auto insert(std::string const &table_name) -> SQLQueryBuilder
  {
    query = "INSERT INTO " + table_name;
    return *this;
  }

  auto columns(std::string const &args) -> SQLQueryBuilder
  {
    query += " (" + args + ")";
    return *this;
  }

  auto values(std::string const &args) -> SQLQueryBuilder
  {
    query += " VALUES(" + args + ")";
    return *this;
  }

  auto update(std::string const &table_name) -> SQLQueryBuilder
  {
    query = "UPDATE " + table_name;
    return *this;
  }

  auto set(std::string const &fields) -> SQLQueryBuilder
  {
    query += " SET " + fields;
    return *this;
  }

  auto delete_(std::string const &args) -> SQLQueryBuilder
  {
    query = "DELETE " + args;
    return *this;
  }

  auto unwrap() -> std::string
  {
    std::string const result = std::move(query);
    query = "";
    return result;
  }
};