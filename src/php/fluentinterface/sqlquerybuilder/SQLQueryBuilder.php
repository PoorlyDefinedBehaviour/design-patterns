<?php declare (strict_types = 1);

class SQLQueryBuilder {
  private string $query = "";

  public function select(string $fields): SQLQueryBuilder {
    $this->query .= "SELECT $fields";
    return $this;
  }

  public function from(string $table): SQLQueryBuilder {
    $this->query .= " FROM ${table}";
    return $this;
  }

  public function where(string $predicate): SQLQueryBuilder {
    $this->query .= " WHERE ${predicate}";
    return $this;
  }

  public function unwrap(): string {
    $result = $this->query;
    $this->query = "";
    return $result;
  }
}